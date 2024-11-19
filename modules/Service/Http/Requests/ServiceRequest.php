<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //

            'title_en'=>'string|required',
            'title_ar'=>'string|required',
            'title_fr'=>'string|required',
            'title_ja'=>'string|required',
            
            'description_en'=>'required',
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_ja'=>'required',
            'photo'=>'required|file|image',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
