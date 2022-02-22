<?php

namespace App\Repositories;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageRepository
{
    /**
     * Upload the image
     * @param $image UploadedFile
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function uploadImage(UploadedFile $image, $path)
    {
        return $this->upload($image, $path);
    }

    /**
     * Upload the image
     * @param $image UploadedFile
     * @return string|\Illuminate\Http\Response
     */
    private function upload(UploadedFile $image, $path)
    {
        try {
            if ($image->isValid()) {
                $imageURL = $image->store($path);
                $path_ar = explode('/', $imageURL);

                $image_instance = Image::make($image);
                $encoded_image_instance = Image::make($image)->encode('webp');

                $image_name_with_origin_ext = end($path_ar);

                $value = $image_name_with_origin_ext;

                $image_name = explode('.', $image_name_with_origin_ext)[0];

                $encoded_image_instance->save(public_path("uploads/{$path}/") . $image_name . '.webp');

                switch (true) {
                    case ($image_instance->width() >= 1024) :

                        $image_instance->resize(1024, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                            ->save(public_path("uploads/{$path}/") . '/1024/' . $image_name_with_origin_ext);

                        $encoded_image_instance
                            ->resize(1024, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save(public_path("uploads/{$path}/") . '/1024/' . $image_name . '.webp');

                    case ($image_instance->width() >= 768) :

                        $image_instance->resize(768, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                            ->save(public_path("uploads/{$path}/") . '/768/' . $image_name_with_origin_ext);

                        $encoded_image_instance
                            ->resize(768, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save(public_path("uploads/{$path}/") . '/768/' . $image_name . '.webp');

                    case ($image_instance->width() >= 480) :

                        $image_instance->resize(480, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                            ->save(public_path("uploads/{$path}/") . '/480/' . $image_name_with_origin_ext);

                        $encoded_image_instance
                            ->resize(480, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save(public_path("uploads/{$path}/") . '/480/' . $image_name . '.webp');

                        break;
                }
            }

            return $value;

        }catch (\Exception $exception){
            return response('Internal Server Error', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
