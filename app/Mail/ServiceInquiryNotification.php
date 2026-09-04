<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class ServiceInquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $proposal;

    public function __construct($proposal)
    {
        if (!$proposal) {
            Log::error('ServiceInquiryNotification: Proposal object is null.');
            throw new \Exception('Proposal data is missing.');
        }

        $this->proposal = $proposal;
    }

    public function envelope(): Envelope
    {
        try {
            return new Envelope(
                subject: '🚀 New Project Proposal: ' . ($this->proposal->full_name ?? 'Unknown Client'),
            );
        } catch (Throwable $e) {
            Log::error('ServiceInquiryNotification Envelope Error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function content(): Content
    {
        try {

            // Ensure services is always array
            $services = $this->proposal->services;

            if (is_string($services)) {
                $services = json_decode($services, true);
            }

            if (!is_array($services)) {
                Log::warning('ServiceInquiryNotification: Services is not array', [
                    'proposal_id' => $this->proposal->id ?? null,
                    'services_value' => $services
                ]);
                $services = [];
            }

            return new Content(
                view: 'emails.service_notify',
                with: [
                    'proposal' => $this->proposal,
                    'services' => $services,
                    'page_url' => $this->proposal->page_url ?? null,
                ],
            );

        } catch (Throwable $e) {
            Log::error('ServiceInquiryNotification Content Error: ' . $e->getMessage(), [
                'proposal_id' => $this->proposal->id ?? null,
                'trace' => $e->getTraceAsString()
            ]);

            throw $e;
        }
    }

    public function attachments(): array
    {
        return [];
    }
}