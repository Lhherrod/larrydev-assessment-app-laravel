<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            
            'contact_name' => ['required', 'string', 'min:5'],
            'contact_email' => ['required', 'string', 'email'],
            'contact_inquiry' => ['required', 'string', 'min:5'],
            'g-recaptcha-response' => ['required', 'string'],
            
        ];
    }
    
}
