<?php

declare(strict_types=1);

namespace App\Functions;

use App\Enums\Status;


class GetStatus
{   
    private static $status;

    public static function setStatus (int $status): int {

        if(!isset(Status::ALL_STATUSES[$status])) {
            abort('404');
        }

        self::$status = $status;

        return $status;
       
    }
}