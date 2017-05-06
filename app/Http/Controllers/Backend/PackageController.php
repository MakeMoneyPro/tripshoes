<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Illuminate\Http\Request;
use Validator;

class PackageController extends Controller
{

    private $tourinfo;
    private $userRepo;
    private $placeRepo;
    private $imageRepo;
    public function __construct(TourInformationRepositoryEloquent $tourinfo, UserRepositoryEloquent $userRepo, PlaceRepositoryEloquent $placeRepo, ImageRepositoryEloquent $imageRepo){
        $this->tourinfo = $tourinfo;
        $this->userRepo = $userRepo;
        $this->placeRepo = $placeRepo;
        $this->imageRepo = $imageRepo;
    }

    public function index(){
        $packages = $this->tourinfo->all();
        return view('backend.packages.index', compact('packages'));
    }

    public function show($id){
        $package = $this->tourinfo->find($id);
        return view('backend.packages.show', compact('package'));
    }

    public function create(){
        $users = $this->userRepo->all();
        $places = $this->placeRepo->all();
        return view('backend.packages.create', compact('users', 'places'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' 		    => 'required',
            'address' 	    => 'required',
            'guide_id'      => 'required',
            'time'          => 'required',
            'place_id'      => 'required',
            'lat'           => 'required',
            'lng'           => 'required',
            'time_period'   => 'required',
            'transport'  	=> 'required',
            'price' 	    => 'required',
            'about' 		=> 'required',
            'about_tour'    => 'required',
            'about_guide'   => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $tour_guides = $this->tourinfo->findByField('guide_id', $request->get('guide_id'));
        $new_time_guide = $request->get('time');
        $new_time_period = $request->get('time_period');
        $new_small_guide = strtotime($new_time_guide ." +" . $new_time_period . " days");
        foreach($tour_guides as $tour){
            $time_tour = $tour->time;
            if(!($new_small_guide < strtotime($time_tour) || $new_time_guide > strtotime($time_tour . " +" . $tour->time_period . " days" ))){
                return redirect()->back()->withInput()->with('error', 'Guide has been conflicted');
            }
        }
        $tour = $this->tourinfo->create($request->all());
        if($tour){
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $file) {
                    $img = $file->getClientOriginalName();
                    $file-> move('/frontend/images', $img);
                    $this->imagerepo->create([
                        'url' => $img,
                        'tour_information_id' => $tour->id,
                    ]);
                }
            }
        }

        return redirect('admin/packages')->with('message', 'Create Success');
    }

    public function edit($id){
        $package = $this->tourinfo->find($id);
        return view('backend.packages.edit', compact('package'));
    }

    public function update($id, Request $request){
        $this->tourinfo->update($request->all(), $id);
        return route('admin.packages.index');
    }

    public function destroy($id, Request $request){
        try {
            $package = $this->tourinfo->find($id);
            if (!empty($package)) {
                $imageItem=$this->imagerepo->findByField('tour_information_id', $id);
                for ($i=0; $i<count($imageItem); $i++) {
                     $this->imagerepo->delete($imageItem[$i]['id']);
                }
                $this->tourinfo->delete($id);
                return redirect() -> route('admin.packages.index')->with('message', 'Delete Success');
            } else {
                return redirect() -> route('admin.packages.index')->with('error', 'Package Not Found');
            }

        } catch (Exception $ex) {
            Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.food.index');
        }
    }
}