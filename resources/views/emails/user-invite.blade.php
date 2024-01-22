@component('mail::layout')

@slot('header')
    @component('mail::header', ['url' => config('app.platform_url')])
        {{ config('app.name')  }}
    @endcomponent
@endslot

{{-- Subcopy --}}
@slot('subcopy')
@endslot

{{-- Footer --}}
@slot('footer')
    @component('mail::footer', ['url' => config('app.platform_url')])
        © {{ date('Y') }} {{ config('app.name') }}. Alle rechten voorbehouden.
    @endcomponent
@endslot


# Registreer je account

Hierbij ontvang je een uitnodiging om een account te registreren. Met dit account verkrijg je toegang tot:

- https://ref-influx.nl

@component('mail::button', ['url' => config('app.url') . '/register?h=' . $hash])
    Registreren
@endcomponent

**Let op! De registratie pagina is 48 uur geldig.**

Is de pagina verlopen? Doe dan een nieuw account aanvraag.



Met vriendelijke groet,<br>
{{ config('app.name') }}


@endcomponent
