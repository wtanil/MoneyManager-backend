<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRecordRequest extends FormRequest
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
            'title' => 'required|max:100',
            'currency' => 'required|max:4',
            'note' => 'max:1000',
            'amount' => 'required|numeric',
            'isIncome' => 'required|boolean',
            'isLoan' => 'required|boolean',
            'date' => 'required|date',
            'updateDate' => 'required|date',
        ];
    }
}
