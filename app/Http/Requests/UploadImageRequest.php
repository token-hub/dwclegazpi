<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use AppHttpRequestsRequest;
use App\Rules\ImageUploadChecker;

class UploadImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            "image_name"  => ['Required', 'Max:5000', new ImageUploadChecker],
            "image_name.*"  => ['Required', 'File', 'Image', 'Max:5000', new ImageUploadChecker],
        ];
    }
}
