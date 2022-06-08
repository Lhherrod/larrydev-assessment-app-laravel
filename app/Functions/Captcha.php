<?php

declare(strict_types=1);

namespace App\Functions;

use App\Enums\Gcap;

class Captcha
{
    public static function captchaValue(Gcap $checkCaptcha)
    {
        return $checkCaptcha->value;
    }

    public static function captchaUrl(Gcap $captchaUrl)
    {
        return $captchaUrl->value;
    }
}
