@php
    /**
     * @var Spatie\Permission\Models\Role $role
     */
@endphp

<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('profile.show') }}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col gap-10">
        <div>
            <x-blade-form-section>
                <x-slot name="title">
                    {{ __('users-management::pages/roles-edit.title') }}
                </x-slot>

                <x-slot name="description">

                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-label for="role" value="{{ __('') }}" />

                        <form method="POST" action="{{ route('roles.update', $role) }}">
                            @method('PUT')
                            @csrf

                            <div>
                                <x-label for="name" value="{{ __('users-management::pages/roles-edit.field.name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $role->name)" required autofocus autocomplete="name" />
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
        </div>

        <div>
            <x-blade-form-section>
                <x-slot name="title">
                    {{ __('Projecten') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Change user permissions') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="role" value="{{ __('') }}" />

                        @livewire('role-has-project-access', ['role' => $role])
                    </div>
                </x-slot>
            </x-blade-form-section>
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

                        @livewire('role-permissions', ['role' => $role])
                    </div>
                </x-slot>
            </x-blade-form-section>
        </div>

    </div>
</x-app-layout>
