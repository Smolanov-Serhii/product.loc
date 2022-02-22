<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    /**
     * upload image
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function image() {
        if(
            request()->hasFile('image')
            && request()->file('image')->isValid()
        ) {
            $imageURLs['original'] = request()->file('image')->store('images');

            $image_name = explode('.',request()->file('image')->hashName())[0];

            $image_instance = Image::make(request()->file('image'));
            $encoded_image_instance = $image_instance->encode('webp');
            $webp = $encoded_image_instance->save(public_path('uploads/images/') . $image_name . '.webp');

            $imageURLs['webp'] = "images/{$webp->basename}";

            return response()->json([
                'status' => true,
                'urls' => $imageURLs
            ]);
        }
    }
}
