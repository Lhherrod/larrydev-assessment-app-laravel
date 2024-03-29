<?php

namespace App\Actions;

use Illuminate\Contracts\View\View;
use Lorisleiva\Actions\Concerns\AsAction;

class DashboardAction
{
    use AsAction;

    public function asController(): View
    {
        return view('dashboard');
    }
}
