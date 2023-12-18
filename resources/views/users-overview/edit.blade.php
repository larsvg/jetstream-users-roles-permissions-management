@php
    /**
     * @var \App\Models\User $user
     * @var \Illuminate\Support\Collection $roles
     * @var int $selected
     */
@endphp

<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('profile.show') }}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col gap-10">
        <div>

            <form method="POST" action="{{ route('users-overview.update', compact('user')) }}">
                @method('PUT')
                @csrf
                <x-blade-form-section>
                    <x-slot name="title">
                        {{ __('Role') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Change user role') }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="role" value="{{ __('Role') }}" />

                            <x-select
                                id="role"
                                name="role"
                                class="dual-listbox"
                                :options="$roles"
                                :selected="$selected"
                            />

                            <x-input-error for="role" class="mt-2" />
                        </div>


                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="company_name" value="{{ __('users-management::pages/users-overview.table.company-name') }}" />

                            <x-input
                                type="text"
                                id="company_name"
                                name="company_name"
                                :value="old('company_name', $user->company_name)"
                            />

                            <x-input-error for="company_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-label for="email" value="{{ __('users-management::pages/users-overview.table.email') }}" />

                            <x-input
                                type="email"
                                id="email"
                                name="email"
                                :value="old('email', $user->email)"
                            />

                            <x-input-error for="email" class="mt-2" />
                        </div>

                    </x-slot>

                    <x-slot name="actions">

                        <x-button type="submit">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-blade-form-section>
            </form>
        </div>

        <div>
            <x-blade-form-section>
                <x-slot name="title">
                    {{ __('Permissions') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Change user permissions') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="role" value="{{ __('') }}" />


                        @livewire('user-permissions', ['user' => $user])

                    </div>

                </x-slot>
            </x-blade-form-section>
        </div>

    </div>
</x-app-layout>
