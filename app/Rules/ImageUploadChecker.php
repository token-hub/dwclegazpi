<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Entities\Image;

class ImageUploadChecker implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        foreach ($value as $key => $img) {
            $image = Image::where('image_name', '=', $img->getClientOriginalName() )->get();
            if (count($image) > 0) {
               return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Image already exist!';
    }
}
