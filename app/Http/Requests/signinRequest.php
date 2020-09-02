<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class signinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];
    }


    // with this method we can change or translate the output message for specific element 
    /*     public function messages()
    {
        return [
            'email.required' => 'אימייל הוא שדה חובה',
            'email.email' => 'יש להזין כתובת אימייל תקינה',
            'password.required' => 'הסיסמה היא חובה'
        ];
    } */
}
