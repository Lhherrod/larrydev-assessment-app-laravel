<?php

namespace App\Actions;

use App\Models\Contact;
use App\Services\GoogleCaptchaService;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ContactAction
{
    use AsAction;

    public function rules(): array
    {
        return [
            'contact_name' => ['required', 'string', 'min:5'],
            'contact_email' => ['required', 'string', 'email'],
            'contact_inquiry' => ['required', 'string', 'min:5'],
            'g-recaptcha-response' => ['required', 'string'],
        ];
    }

    public function handle(array $contactData): string | false
    {
        GoogleCaptchaService::GetCaptchaResponse($contactData['g-recaptcha-response']);
        $results = false;

        $payload = [
            'contact_name' => $contactData['contact_name'],
            'contact_email' => $contactData['contact_email'],
            'contact_inquiry' => $contactData['contact_inquiry'],
        ];

        if(Contact::create($payload)) {
            return back()->with('status', 'Contact request received thank you.');
        }
        return $results;
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request->validated());
    }
}
