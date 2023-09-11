<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFundRequest extends FormRequest
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
            'fundsManagerId' => 'sometimes|required|integer',
            'name' => 'sometimes|required',
            'startYear' => 'sometimes|required|integer|between:2000,2060',
            'aliases' => 'sometimes|required|array',
            'companies' => 'sometimes|required|array'
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->fundsManagerId) {
            $this->merge (['funds_manager_id' => $this->fundsManagerId]);
        }
        if ($this->startYear) {
            $this->merge (['start_year' => $this->startYear]);
        }
    }
}
