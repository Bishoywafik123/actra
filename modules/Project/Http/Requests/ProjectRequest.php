<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        'main_photo' => 'required',
        'title_en'=>'string|required',
        'title_ar'=>'string|required',
        'title_fr'=>'string|required',
        'title_ja'=>'string|required',
        
        ];
    }
    
        public function messages()
    {
        return [
            'title.required' => 'The name field is required.',
            'main_photo.required' => 'The main photo field is required.',
            'description.required' => 'The description field is required.',
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
