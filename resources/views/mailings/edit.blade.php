@php
    /**
     * @var \App\Models\Mail $mail
     */
@endphp

<x-app-layout>
    <x-slot name="header">
        //
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col gap-10">
        <x-blade-form-section>
            <x-slot name="title">
                {{ __('users-management::pages/mailings/update.title') }}
            </x-slot>

            <x-slot name="description">

            </x-slot>

            <x-slot name="form">
                <div class="col-span-6">
                    <x-label for="role" value="{{ __('') }}" />

                    <form method="POST" action="{{ route('mailings.update', $mail) }}" class="flex flex-col gap-6">
                        @method('PUT')
                        @csrf

                        <div class="flex flex-col gap-2">
                            <x-label for="subject" value="{{ __('users-management::pages/mailings/update.field.subject') }}" />
                            <x-input id="subject" class="block w-full" type="text" name="subject" :value="old('subject', $mail->subject)" required autofocus autocomplete="subject" />
                            <x-input-error for="subject" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <x-label for="body" value="{{ __('users-management::pages/mailings/update.field.body') }}" />
                            <x-textarea id="body" class="block mt-1 w-full" type="text" name="body" rows="10">{{ old('body', $mail->body) }}</x-textarea>
                            <x-input-error for="body" />
                        </div>

                        <div class="flex flex-col gap-2">
                            <x-label for="task_name" value="{{ __('users-management::pages/mailings/update.field.task.name') }}" />
                            <x-input id="task_name" class="block mt-1 w-full" type="text" name="task_name" :value="$mail->task_name" disabled />
                            <x-input-error for="task_name" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>

                </div>

            </x-slot>
        </x-blade-form-section>


        <x-blade-form-section>
            <x-slot name="title">
                {{ __('Ontvangers') }}
            </x-slot>

            <x-slot name="description">

            </x-slot>

            <x-slot name="form">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="role" value="{{ __('') }}" />


                    @livewire('mail-receivers', ['mail' => $mail])

                </div>

            </x-slot>
        </x-blade-form-section>


    </div>
</x-app-layout>
