<?php

namespace Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Controller;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Larsvg\JetstreamUsersRolesPermissionsManagement\Http\Requests\MailUpdateRequest;

class MailsController extends Controller
{
    public function index()
    {
        $mails = Mail::paginate();

        return view('user-management::mailings.index', compact('mails'));
    }

    public function edit(Mail $mail)
    {
        return view('user-management::mailings.edit', compact('mail'));
    }

    public function update(Mail $mail, MailUpdateRequest $request)
    {
        $mail->update($request->validated());

        $request->session()->flash('success', __('notifications.saved'));

        return redirect()->route('mailings.index');
    }
}
