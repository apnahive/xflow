<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class ImageController extends Controller
{
    //
    public function show($id)
    {
        // get the image named $slug from storage and display it

        // Something like (not sure)
        $fullpath="form_sign/{$id}";
        //dd($fullpath);
        return response()->download(storage_path($fullpath), null, [], null);
    }
}
