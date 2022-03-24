<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageSubmitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return request()->apikey === config('app.data_source_apikey');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|image',
            'camera_id' => 'required|string',
            'num_people' => 'required|numeric|integer|min:0',
            'num_tanks' => 'required|numeric|integer|min:0',
            'timestamp' => 'required|date'
        ];
    }
}
