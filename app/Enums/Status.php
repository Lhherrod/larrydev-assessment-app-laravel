<?php

declare(strict_types=1);

namespace App\Enums;

class Status
{

    public const ASSESSMENT_STATUS = 0;
    public const ADMIN_STATUS = 0;
    public const ASSESSMENT_CHECK_IN_STATUS = 0;

    public const ALL_STATUSES = [
        self::ASSESSMENT_STATUS => 0,
        self::ADMIN_STATUS => 0,
        self::ASSESSMENT_CHECK_IN_STATUS => 0
    ];

}

