<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceStoreRequest extends FormRequest
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
            'title' => 'required|max:155',
            'unit_id' => 'required',
            'category_id' => 'required',
            'preferred_maintenece_time' => 'after:' . now(),
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'description' => 'required|max:255',
            'access_code' => 'max:25',
            'permission_to_enter' => 'required'
        ];
    }
}
