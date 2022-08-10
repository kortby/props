<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            'first_name' => 'required|max:155',
            'middle_name' => 'max:155',
            'last_name' => 'required|max:155',
            'date_of_birth' => 'required|before:15 years ago',
            'email' => 'required|max:155',
            'ssn' => 'required|max:10',
            'phone' => 'required',
            'address_line_1' => 'required|max:155',
            'address_line_2' => 'max:155',
            'city' => 'required|max:155',
            'state' => 'required|max:155',
            'country' => 'required|max:155',
            'postal_code' => 'required|max:9',
            'move_in_date' => 'required|before:' . now(),
            'job_type' => 'required|max:155',
            'employer_name' => 'required|max:155',
            'annual_income' => 'required|max:155',
            'additional_income' => 'max:155',
            'employer_email' => 'max:155',
            'employer_phone' => 'required',
            'employer_address' => 'required|max:155',
            'pets' => 'required|max:155',
        ];
    }
}
