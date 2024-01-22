<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class UserInvitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public string $email, public Role $role)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registreer je account',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $hash = Crypt::encrypt([
            'timestamp' => Carbon::now()->timestamp,
            'email'     => $this->email,
            'roles'     => $this->role->id,
        ]);

        return new Content(
            markdown: 'user-management::emails.user-invite',
            with: [
                'hash' => $hash,
            ],
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
