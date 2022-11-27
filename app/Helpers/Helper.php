<?php

namespace App\Helpers;

use Carbon\Carbon;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class Helper
{
    public static function getArrayOfErrorsOfValidator($validator) {
        $errors = [];
        foreach ($validator->errors()->getMessages() as $key => $value) {
            foreach($value as $error) {
                $errors[$key] = $error;
            }
        }
        return $errors;
    }

    public static function addErrorsOfValidatorToErrorBag($validator, $bag) {
        $arrayOfErrors = Helper::getArrayOfErrorsOfValidator($validator);
        foreach ($arrayOfErrors as $errorName => $errorMessage) {
            $bag->add($errorName, $errorMessage);
        }
        return $bag;
    }

    public static function UploadImageFromFileAsVoyagerViaModelSlugUsingName($file, $typeSlug, $name) {

        $dataType = Voyager::model('DataType')->where('slug', '=', $typeSlug)->first();

        if (isset($dataType)) {
            $path = $typeSlug.'/'.date('F').date('Y').'/';

            $image = file_get_contents($file->getRealPath());
            $image = Image::make($image);
            $image->fit(200);
            $image->encode('jpg', 99);

            $baseName = $name;
            $extension = $file->extension();
    
            $fullImageName = $baseName.'.'.$extension;
    
            $filename_counter = 1;
            $originalBaseName = $baseName;
            while (Storage::disk(config('voyager.storage.disk'))->exists($path.$baseName.'.'.$extension)) {
                $baseName = $originalBaseName.(string) ($filename_counter++);
            }
    
            if (in_array($extension, ['jpeg', 'jpg', 'png', 'gif'])) {
    
                $fullPath = $path.$baseName.'.'.$extension;
    
                if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                    $fullFilename = $fullPath;
                    return $fullFilename;
                }
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    public static function removeProfilePicture($url) {
        Storage::disk(config('voyager.storage.disk'))->delete($url);
    }

}
