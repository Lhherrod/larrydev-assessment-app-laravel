<?php

namespace App\Services;
use App\Enums\Gcap;
use App\Functions\Captcha;
use Illuminate\Http\Response;
use GuzzleHttp\Client;

class GoogleCaptchaService
{
    private string $request;

    public function __construct(string $g_recaptcha_response)
    {
        return $this->request = $g_recaptcha_response;
    }

    private function checkCaptchaResponse(string $g_recaptcha_response): bool | Response
    {
        if(!empty($g_recaptcha_response)) {
            $client = new Client();
            $response = $client->post(Captcha::captchaValue(Gcap::GCapUrl),[
                'form_params' => [
                    'secret' => config('app.GOOGLE_CAPTCHA_SECRET'),
                    'response' => $g_recaptcha_response,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]);

            $google_response = json_decode($response->getBody()->getContents(),true);

            if(isset($google_response['score']) && $google_response['success']) {
                if($google_response['score'] < 0.5 || $google_response['success'] === false || isset($google_response['error-codes'])) {
                    abort(401);
                } else {
                    return true;
                }
            } else {
                abort(401);
            }
        } else {
            abort(401);
        }
    }

    public static function GetCaptchaResponse(string $g_recaptcha_response): bool | Response
    {
        $getCaptcha = new GoogleCaptchaService($g_recaptcha_response);
        return $getCaptcha->checkCaptchaResponse($g_recaptcha_response);
    }
}
