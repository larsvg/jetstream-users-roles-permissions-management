<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\Mail;
use App\Models\MailRecipients;
use App\Models\User;
use Livewire\Component;

class RecipientsByMailing extends Component
{
    public Mail $mail;

    public function mount(Mail $mail): void
    {
        $this->mail = $mail;
    }

    public function render()
    {
        $users = User::all();
        $mail = $this->mail;

        return view('user-management::livewire.recipients-by-mailing', compact('users', 'mail'));
    }

    public function toggleRecipient(User $user, Mail $mail)
    {
        $model = MailRecipients::where('user_id', $user->id)
            ->where('mail_id', $mail->id)
            ->first();

        if ($model) {
            $model->delete();
        } else {
            MailRecipients::create([
                'user_id' => $user->id,
                'mail_id' => $mail->id,
            ]);
        }
    }
}
