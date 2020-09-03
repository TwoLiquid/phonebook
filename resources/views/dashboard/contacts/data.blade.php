@php /** @var \App\Models\Contact $contact */ @endphp
<div class="row">

    <div class="col-md-7">
        @component('dashboard.layouts.partials.card')
            @slot('cardTitle')
                {{ $contact->name }}
            @endslot

            <p>{{ isset($contact) ? $contact->phone : '' }}</p>

        @endcomponent
    </div>
</div>
