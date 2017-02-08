<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about(){
    	$banner = false;
		$text_banner = '';
		return view('frontend.aboutUs', compact('banner', 'text_banner'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function support(){
    	$banner = false;
		$text_banner = '';
		return view('frontend.support', compact('banner', 'text_banner'));
    }
}
