<x-app-layout>
    <x-slot name="header">
        {{ Breadcrumbs::render('profile.show') }}
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <x-form-section submit="updateLocale">
                <x-slot name="title">
                    {{ __('Todo') }}
                </x-slot>

                <x-slot name="description">
                    {{ __('Todo') }}
                </x-slot>

                <x-slot name="form">
                    <div class="col-span-6 sm:col-span-4">
                        <x-label for="current_password" value="{{ __('Todo') }}" />
                        <x-select
                            id="courses_listbox"
                            name="courses[]"
                            class="dual-listbox"
                            :options="config('app.avaliable_locales')"
                            :selected="Auth::user()->locale ?? config('app.locale')"
                            wire:model.defer="state.language"
                        />

                        <x-input-error for="current_password" class="mt-2" />
                    </div>

                </x-slot>

                <x-slot name="actions">

                    <x-button>
                        {{ __('Save') }}
                    </x-button>
                </x-slot>
            </x-form-section>



        </div>
    </div>
</x-app-layout>
