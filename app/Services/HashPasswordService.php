<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class HashPasswordService
{
    private string $unHashedPassword;

    public function __construct(string $unHashedPassword)
    {
        $this->unHashedPassword = $unHashedPassword;
        $this->unHashedPassword = Hash::make($unHashedPassword);
        return $this->unHashedPassword;
    }

    private function hashPassword(): string {
        return $this->unHashedPassword;
    }

    public function getHashedPassword (): string {
        return $this->hashPassword();
    }
}