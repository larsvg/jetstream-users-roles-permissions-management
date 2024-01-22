@php
    /**
     * @var App\Models\User $users
     */


@endphp
<div class="flex flex-col gap-8">

    <form class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 flex gap-2 items-end" wire:submit.prevent="submit">
        <div class="w-full">
            <x-label for="email" value="{{ __('users-management::pages/users-overview.invite.label.email') }}" />
            <x-input id="email" placeholder="E-mail adres" class="block mt-1 w-full" type="email" name="email" wire:model="email" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="role" value="{{ __('users-management::pages/users-overview.invite.label.role') }}" />
            <x-select
                id="role"
                name="role"
                :options="$roles"
                wire:model.defer="role"
            />
            <x-input-error for="role" class="mt-2" />
        </div>

        <x-button class="ml-4 mb-1" type="submit">
            {{ __('users-management::pages/users-overview.btn.invite') }}
        </x-button>

    </form>

</div>
