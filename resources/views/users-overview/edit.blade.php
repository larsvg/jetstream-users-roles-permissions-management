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

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('users-overview.update', compact('user')) }}">
                @csrf
                <x-blade-form-section>
                    <x-slot name="title">
                        {{ __('Todo') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Todo') }}
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

                    </x-slot>

                    <x-slot name="actions">

                        <x-button type="submit">
                            {{ __('Save') }}
                        </x-button>
                    </x-slot>
                </x-blade-form-section>
            </form>



        </div>
    </div>
</x-app-layout>
