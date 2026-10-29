<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class ServiceInquiryNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $proposal;

    public function __construct($proposal)
    {
        if (!$proposal) {
            Log::error(
                'ServiceInquiryNotification: Proposal object is null.'
            );

            throw new \InvalidArgumentException(
                'Proposal data is missing.'
            );
        }

        $this->proposal = $proposal;

        // Retry failed email jobs up to 3 times.
        $this->tries = 3;

        // Maximum execution time for this queued job.
        $this->timeout = 60;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Service Inquiry: '
                . ($this->proposal->full_name ?? 'Unknown Client'),
        );
    }

    public function content(): Content
    {
        try {
            // Services may be null, an array, or JSON.
            $services = $this->proposal->services ?? [];

            if (is_string($services)) {
                $decoded = json_decode($services, true);

                $services = is_array($decoded) ? $decoded : [];
            }

            if (!is_array($services)) {
                Log::warning(
                    'ServiceInquiryNotification: Invalid services value.',
                    [
                        'proposal_id' => $this->proposal->id ?? null,
                        'services_type' => get_debug_type($services),
                    ]
                );

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
            Log::error(
                'ServiceInquiryNotification Content Error.',
                [
                    'proposal_id' => $this->proposal->id ?? null,
                    'message' => $e->getMessage(),
                ]
            );

            throw $e;
        }
    }

    public function attachments(): array
    {
        return [];
    }
}
