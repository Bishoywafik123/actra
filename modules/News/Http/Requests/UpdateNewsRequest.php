<?php

namespace Modules\News\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            
       
            'content_en'=>'required',
            'content_ar'=>'required',
            'content_fr'=>'required',
            'content_ja'=>'required',
            'photo'=>'nullable|file|image',
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
