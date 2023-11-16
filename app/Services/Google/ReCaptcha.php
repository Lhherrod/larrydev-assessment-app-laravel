<?php

namespace App\Services\Google;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class ReCaptcha
{
    private Response $response;
    private array $validate;

    public function __construct(private string $client_request)
    {
        $this->client_request = $client_request;
    }

    public function post(): bool
    {
        $this->response = Http::asForm()->post(config('app.google_captcha_url'), [
            'secret' => config('app.google_captcha_secret'),
            'response' => $this->client_request,
            'remoteid' => $_SERVER['REMOTE_ADDR']
        ]);
        return $this->validate();
    }

    private function validate(): bool
    {
        $this->validate = json_decode($this->response->getBody()->getContents(),true);
        if(!empty($this->validate['score']) && $this->validate['score'] > 0.5 && $this->validate['success'] === true) {
            return true;
        }
        return false;
    }
}