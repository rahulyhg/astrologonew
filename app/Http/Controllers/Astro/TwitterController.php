<?php

namespace App\Http\Controllers\Astro;

use App\Http\Controllers\Controller;



class TwitterController extends Controller
{

    /**
     * Display the home page.
     *
     * @return Response
     */
    public function index()
    {
        return view('astro.twitter');
    }


}
