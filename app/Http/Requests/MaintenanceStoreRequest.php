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
            'title' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'preferred_maintenece_time' => '',
            'phone' => 'required',
            'description' => 'required',
            'access_code' => 'required',
            'permission_to_enter' => 'required'
        ];
    }
}
