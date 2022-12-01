<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateUserAction
{
    use AsAction;
    use AsController;

    public function rules(): array
    {
        return [
            'assessmentCheckInStatus' => ['int', 'max:1'],
            'assessmentStatus' => ['int', 'max:1'],
        ];
    }

    public function handle(array $request)
    {
        $user = new \App\Models\User;
        if($user->where('id', auth()->user()->id)->update($request)) {
            return back()->with('status', 'User updated successfully');
        }
    }

    public function asController(\Lorisleiva\Actions\ActionRequest $request)
    {
        return $this->handle($request->validated());
    }
}