<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentRequest extends FormRequest
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
            'as_ws_pages' => ['required','string', 'min:5'],
            'as_ws_styles' => ['required','string','min:2','max:3'],
            'as_ws_styles_text' => ['required_unless:as_ws_styles,no'],
            'as_ws_functions' => ['required','string','min:2','max:3'],
            'as_ws_functions_text' => ['required_unless:as_ws_functions,no'],
            'as_ws_budget' => ['required'],
            'as_ws_budget_text' => ['required_unless:as_ws_budget,no'],
            'as_ws_timeframe' => ['required','string','min:2','max:3'],
            'as_ws_timeframe_text' => ['required_unless:as_ws_timeframe,no'],
            'as_ws_hosting' => ['required'],
            'as_ws_domain' => ['required'],
            'as_ws_content' => ['required'],
            
        ];
    }
}
