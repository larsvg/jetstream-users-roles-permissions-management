
<div>

    @foreach($mails as $mail)
        <div wire:click="toggleRecipient('{{ $user->id }}', '{{ $mail->id }}')">
            @php
                $checked = \App\Models\MailRecipients::where('mail_id', $mail->id)
                    ->where('user_id', $user->id)
                    ->exists();
            @endphp

            <input type="checkbox"  class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                   @if($checked) checked @endif
            >

            <label class="{{ $checked ? '' : 'text-red-700 line-through' }}">
                {{ __($mail->subject) }}
            </label>
        </div>

    @endforeach

</div>
