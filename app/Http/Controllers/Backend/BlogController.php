<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\BlogDetailRepositoryEloquent;
use App\Repositories\Eloquent\ImageRepositoryEloquent;
use App\Repositories\Eloquent\PlaceRepositoryEloquent;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use Illuminate\Http\Request;
use Validator;

class BlogController extends Controller
{

    private $tourinfo;
    private $blogrepo;
    public function __construct(TourInformationRepositoryEloquent $tourinfo, BlogDetailRepositoryEloquent $blogrepo){
        $this->tourinfo = $tourinfo;
        $this->blogrepo = $blogrepo;
    }

    public function index(){
        $blogs = $this->blogrepo->all();
        return view('backend.blog.index', compact('blogs'));
    }

    public function show($id){
        $blog = $this->blogrepo->find($id);
        return view('backend.blog.show', compact('blog'));
    }

    public function create(){
        $tours = $this->tourinfo->all();
        return view('backend.blog.create', compact('tours'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'tour_information_id' 		    => 'required',
            'content'                       => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $blog = $this->blogrepo->create($request->all());

        return redirect('admin/blog')->with('message', 'Create Success');
    }

    public function edit($id){
        $tours = $this->tourinfo->all();
        $blog = $this->blogrepo->find($id);
        return view('backend.blog.edit', compact('tours', 'blog'));
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'tour' 		    => 'required',
            'article'       => 'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $this->blogrepo->update($request->all(), $id);
        return redirect('admin/blog')->with('message', 'Update Success');
    }

    public function destroy($id, Request $request){
        try {
            $blog = $this->blogrepo->find($id);
            if (!empty($blog)) {
                $this->blogrepo->delete($id);
                return redirect() -> route('admin.blog.index')->with('message', 'Delete Success');
            } else {
                return redirect() -> route('admin.blog.index')->with('error', 'Blog Not Found');
            }

        } catch (Exception $ex) {
            /*Session::flash(trans('lang_admin_manager_user.danger_cf'), trans('lang_admin_manager_user.no_id'));
            return redirect() -> route('admin.food.index');*/
        }
    }
}