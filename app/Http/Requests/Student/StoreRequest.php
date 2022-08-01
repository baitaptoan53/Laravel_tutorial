<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //yeu cau phai dang nhap
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    //  kiem tra du lieu nhap vao
    public function rules()
    {
        return [
            ' fist_name' => 'required|min:3|max:50',
            ' last_name' => 'required|min:3|max:50',
            ' birthdate' => 'required|date',
            'gender' => 'required'
        ];
    }
    public function messages()
    {
        
    }
}
