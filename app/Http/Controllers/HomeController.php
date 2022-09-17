<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $sweety)
    {   
         
        if ($sweety->method('post') == 'POST') {
            $data = $sweety->all();
            $data['ip'] = (isset($sweety->url) && $sweety->url!="")?gethostbyname($sweety->url):'';
            Website::create($data);
        }

        $websites=Website::orderBy('id','desc')->get();
        return view('home', compact('websites'));
    }
}
