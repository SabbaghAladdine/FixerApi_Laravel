<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    public function getImage($imagePath)
    {
        $path = ('C:/Users/alade/OneDrive/Desktop/WorkSpace/Laravel/my-api/public/images/'.$imagePath);
        
        if (!file_exists($path)) {
       return response()->json(['error' => 'Image not found.'], 404);
        }
        
        $file = file_get_contents($path);
        
       return response($file, 200)->header('Content-Type', 'image/jpeg');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = ''.$image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            return response()->json(['success' => true, 'image' => asset('images/'.$imageName)], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'No image uploaded'], 400);
        }
    }

}
