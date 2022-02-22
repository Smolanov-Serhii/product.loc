<?php

namespace App\Services;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\Response;

class ImageUploader
{
    /**
     * Upload the image
     * @param string $path
     * @param UploadedFile|null $image
     * @param array $thumbsAttributes
     * @return string | null
     */
    public function uploadImage(
        string       $path,
        UploadedFile $image = null,
        array        $thumbsAttributes = []): ?string
    {
        return $image
            ? $this->upload($path, $image, $thumbsAttributes)
            : null;
    }

    /**
     * @param string $path
     * @param UploadedFile $image
     * @param array $thumbsAttributes
     * @return string|null
     */
    protected function upload(
        string $path,
        UploadedFile $image,
        array $thumbsAttributes): ?string
    {
        try {
            $publicPath = public_path("uploads/{$path}/");
            $imageURL = $image->store($path);
            $path_ar = explode('/', $imageURL);
            $imageNameWithExt = end($path_ar);

            Image::make("{$publicPath}{$imageNameWithExt}")
                ->resize(320, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save("{$publicPath}/thumbs/{$imageNameWithExt}");

            return $imageNameWithExt;

//            TODO add remove old file

//            Remove old images
//                    Storage::delete('additions/'. $addition->thumbnail);
//                    Storage::delete('additions/thumbs/'. $addition->thumbnail);


        } catch (\Exception $exception) {
            return response('Internal Server Error', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}