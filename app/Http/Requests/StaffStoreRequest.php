<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
            'lastname'=>'required|min:3|max:25',
            'firstname'=>'required|min:3|max:25',
            'staffnumb'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required|unique:users',
            // 'password'=>'required',
        ];
    }
}
