<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\TourInformationRepositoryEloquent;

class PackageController extends Controller
{

    private $tourinfo;
    public function __construct(TourInformationRepositoryEloquent $tourinfo){
        $this->tourinfo = $tourinfo;
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
        return view('backend.packages.create');
    }

    public function store(Request $request){
        $this->tourinfo->create($request->all());
        return route('admin.packages.index');
    }

    public function edit($id){
        $package = $this->tourinfo->find($id);
        return view('backend.packages.edit', compact('package'));
    }

    public function update($id, Request $request){
        return $this->tourinfo->update($request->all(), $id);
        return route('admin.packages.index');
    }
}