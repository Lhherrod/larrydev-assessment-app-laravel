<?php

namespace App\Rules\Google;

use App\Services\Google\Captcha as GoogleCaptcha;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = (new GoogleCaptcha($value))->post();
        !$response ? $fail('Google said that something is not right...please try again. Thank you.') : '';
        return;
    }
}
