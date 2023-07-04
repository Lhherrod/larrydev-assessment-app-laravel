<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsController;

class UpdateUserAction
{
    use AsAction;
    use AsController;

    public function rules(): array
    {
        return [
            'check_in_status' => ['int', 'max:1'],
            'status' => ['int', 'max:1'],
        ];
    }

    public function handle(array $request)
    {
        $user = new User;
        if($user->where('id', auth()->user()->id)->update($request)) {
            return back()->with('status', 'User updated successfully');
        }
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request->validated());
    }
}