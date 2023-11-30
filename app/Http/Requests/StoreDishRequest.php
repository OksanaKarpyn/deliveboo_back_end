<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255', 'required'],
            'ingredients' => ['text', 'required'],
            'price' => ['string', 'max:10', 'required'],
            'visiblility' =>['boolean', 'required'],
            'photo' =>['string', 'required']
        ];
    }
}
