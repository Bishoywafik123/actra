<?php

namespace Modules\Why\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWhyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_en'=>'required',
            'name_ar'=>'required',
            'name_fr'=>'required',
            'name_ja'=>'required',

            'description_en'=>'required',
            'description_ar'=>'required',
            'description_fr'=>'required',
            'description_ja'=>'required',
            'photo'=>'nullable|image',
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
