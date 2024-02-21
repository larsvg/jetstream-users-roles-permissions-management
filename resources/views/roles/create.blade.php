<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('profile.show') }}
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col gap-10">
        <div>
            <x-blade-form-section>
                <x-slot name="title">
                    {{ __('users-management::pages/roles-create.title') }}
                </x-slot>

                <x-slot name="description">

                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6">
                        <x-label for="role" value="{{ __('') }}" />

                        <form method="POST" action="{{ route('roles.store') }}">
                            @csrf

                            <div>
                                <x-label for="name" value="{{ __('users-management::pages/roles-create.field.name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                <x-input-error for="name" class="mt-2" />
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

    </div>
</x-app-layout>
