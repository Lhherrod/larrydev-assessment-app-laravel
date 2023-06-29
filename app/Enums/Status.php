<?php

namespace App\Enums;

class Status
{
    public const ASSESSMENT_STATUS_ZERO = 0;
    public const ADMIN_STATUS_ZERO = 0;
    public const ASSESSMENT_CHECK_IN_STATUS_ZERO = 0;

    public const ALL_STATUSES = [
        self::ASSESSMENT_STATUS_ZERO => 0,
        self::ADMIN_STATUS_ZERO => 0,
        self::ASSESSMENT_CHECK_IN_STATUS_ZERO => 0
    ];
}

