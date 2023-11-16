<?php

namespace App\Policies;

use App\Models\Assessment;
use App\Models\User;

class AssessmentPolicy
{
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, ?Assessment $assessment): bool
    {   
        // ulids are very unique, if ulid exists just show the view
        return true;
    }

    public function create(?User $user)
    {
        if (!\request()->hasValidSignature()) {
            return false;
        }

        return true;
    }

    public function update(?User $user, Assessment $assessment): bool
    {   
        return $assessment
            ->where('signature', $assessment->signature)
            ->exists() ? true : false;
    }
}
