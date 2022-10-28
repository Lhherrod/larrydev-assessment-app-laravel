<?php

namespace App\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class GoogleCaptchaService
{
    private string $g_recaptcha_response;

    public function __construct(string $g_recaptcha_response)
    {
        return $this->g_recaptcha_response = $g_recaptcha_response;
    }
    public function checkCaptchaResponse(): bool | Response
    {
        if(!empty($this->g_recaptcha_response)) {
            $response = Http::asForm()->post(config('app.GOOGLE_CAPTCHA_URL'), [
                'secret' => config('app.GOOGLE_CAPTCHA_SECRET'),
                'response' => $this->g_recaptcha_response,
                'remoteid' => $_SERVER['REMOTE_ADDR']
            ]);
            $google_response = json_decode($response->getBody()->getContents(),true);
            if(!empty($google_response['score']) && $google_response['score'] > 0.5 && $google_response['success'] === true) {
                return true;
            }
        } else {
            abort(401);
        }
        return true;
    }
}
