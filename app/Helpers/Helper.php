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
}
