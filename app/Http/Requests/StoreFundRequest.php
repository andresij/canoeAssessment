<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreFundRequest extends FormRequest
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
            'fundsManagerId' => 'required|integer',
            'name' => 'required',
            'startYear' => 'required|integer|between:2000,2060'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge ([
            'funds_manager_id' => $this->fundsManagerId,
            'start_year' => $this->startYear
        ]);
    }
}
