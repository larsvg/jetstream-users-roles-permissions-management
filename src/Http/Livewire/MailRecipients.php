<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Livewire;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class MailRecipients extends Component
{
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render()
    {
        $mails = Mail::get();
        $user = $this->user;

        return view('user-management::livewire.mail-recipients', compact('mails', 'user'));
    }

    public function toggleRecipient(User $user, Mail $mail)
    {
        $model = \App\Models\MailRecipients::where('user_id', $user->id)
            ->where('mail_id', $mail->id)
            ->first();

        if ($model) {
            $model->delete();
        } else {
            \App\Models\MailRecipients::create([
                'user_id' => $user->id,
                'mail_id' => $mail->id,
            ]);
        }
    }
}
