<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'title_id'=>'required',
            'school_id'=>'required',
            'department_id'=>'required',
            'state_id'=>'required',
            'lga_id'=>'required',
            'assumptiondate'=>'required',
            'firstassumptionstatus'=>'required|min:3|max:30',
            'userimage' => 'required|image|mimes:jpg,jpeg,png|max:10240',
        ];
    }
}
