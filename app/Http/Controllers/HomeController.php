<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CameraImage;
use App\Models\CameraImageGroup;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function images(Request $request) {
        $user = auth()->user();

        if ($request->starred) {
            return $user->starredImages()->orderBy('image_timestamp', 'desc')->simplePaginate(24);
        } else {
            return CameraImage::orderBy('image_timestamp', 'desc')->simplePaginate(24);
        }
    }
}
