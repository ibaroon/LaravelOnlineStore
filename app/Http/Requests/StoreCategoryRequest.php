<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'Arabic_Name'=>'required',
        'English_Name'=>'required',
        'Slug'=>'required',
        'Arabic_Desc'=>'required',
        'English_Desc'=>'required',
        'Image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'Status'=>'required',
        // 'Popular'=>'required',
        // 'Arabic_Meta_Title'=>'required',
        // 'English_Meta_Title'=>'required',
        // 'Arabic_Meta_Desc'=>'required',
        // 'English_Meta_Desc'=>'required',
        // 'Key_Words'=>'required'
        ];
    }
}
