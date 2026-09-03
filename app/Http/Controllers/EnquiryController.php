<?php

namespace App\Http\Controllers;

use App\Mail\NewEnquiryMail;
use App\Http\Requests\ContactEnquiryRequest;
use App\Http\Requests\HomeEnquiryRequest;
use App\Models\Enquiry;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    public function storeQuick(HomeEnquiryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        [$firstName, $lastName] = $this->splitName($data['name']);

        $enquiry = Enquiry::create([
            'source' => 'home_quick',
            'first_name' => $firstName,
            'last_name' => $lastName,
            'company' => $data['company'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'equipment_type' => $data['equipment_type'] ?? null,
            'message' => $data['message'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        $this->notify($enquiry, $request);

        return back()->with('success', 'Thanks — we received your request and will be in touch shortly.');
    }

    public function storeContact(ContactEnquiryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $enquiry = Enquiry::create([
            'source' => 'contact_full',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'company' => $data['company'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'city' => $data['city'] ?? null,
            'state' => $data['state'] ?? null,
            'zip' => $data['zip'] ?? null,
            'country' => $data['country'] ?? null,
            'application_types' => $data['application_types'] ?? null,
            'hear_about_us' => $data['hear_about_us'] ?? null,
            'hear_about_other' => $data['hear_about_other'] ?? null,
            'message' => $data['message'] ?? null,
            'ip_address' => $request->ip(),
        ]);

        $this->notify($enquiry, $request);

        return back()->with('success', 'Thanks for reaching out — our team will get back to you shortly.');
    }

    /**
     * Enquiries are saved to the database first, above, so the submission is
     * never lost even if the notification email fails to send.
     */
    private function notify(Enquiry $enquiry, Request $request): void
    {
        $recipient = Setting::get('company_email_orders');

        if (! $recipient) {
            return;
        }

        try {
            Mail::to($recipient)->send(new NewEnquiryMail($enquiry));
        } catch (\Throwable $e) {
            Log::error('Failed to send enquiry notification email', [
                'enquiry_id' => $enquiry->id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function splitName(string $name): array
    {
        $parts = explode(' ', trim($name), 2);

        return [$parts[0], $parts[1] ?? null];
    }
}
