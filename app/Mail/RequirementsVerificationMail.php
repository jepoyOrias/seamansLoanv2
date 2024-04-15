<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RequirementsVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $borrower;
    public $typeOfEmail;
    public function __construct($borrower, $typeOfEmail)
    {
        //
        $this->borrower = $borrower;
        $this->typeOfEmail = $typeOfEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject:  $this->typeOfEmail === 'informationVerification' ? 'Information Verification' : 
                ($this->typeOfEmail === 'forInterview' ? 'Interview Information' :
                ($this->typeOfEmail === 'forApproval' ? 'Loan Approval' :
                ($this->typeOfEmail === 'approve' ? 'Loan Approved' :
                ($this->typeOfEmail === 'decline' ? 'Loan Declined' :
                ($this->typeOfEmail === 'forReleasing' ? 'Loan Releasing' :
                // Add more conditions as needed
                ''))))),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->typeOfEmail === 'informationVerification' ? 'mail.requirements' : 
                ($this->typeOfEmail === 'forInterview' ? 'mail.forInterview' :
                ($this->typeOfEmail === 'forApproval' ? 'mail.forApproval' :
                ($this->typeOfEmail === 'approve' ? 'mail.approve' :
                ($this->typeOfEmail === 'decline' ? 'mail.decline' :
                ($this->typeOfEmail === 'forReleasing' ? 'mail.forReleasing' :
                // Add more conditions as needed
                ''))))),
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

}
