<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateRegister extends FormRequest
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
            'first_name' => 'required | max:50',
            'last_name' => 'required | max:50',
            'email' => 'required | email:rfc',
            'password' => 'required | min:2',
            'cfpassword' => 'required | same:password',
            'address' => 'required | min:2 | max:100',
            'birthday' => 'required | before:2010',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Bat buoc nhap Username',
            'last_name.required' => 'Bat buoc nhap Username',
            'first_name.max' => 'Khong nhap ten qua dai vuot qua 50 ky tu',
            'last_name.max' => 'Khong nhap ten qua dai vuot qua 50 ky tu',
            'email.required' => 'Bat buoc nhap Email',
            'password.min' => 'Nhap toi thieu 2 ky tu',
            'address.min' => 'Nhap toi thieu 2 ky tu',
            'birthday.required' => 'Bat buoc chon ngay sinh',
            'cfpassword.same' => 'CF Pass bat buoc phai giong Pass',
            'birthday.before' => 'Nguoi dung it nhat 10 tuoi',
        ];
    }
}
