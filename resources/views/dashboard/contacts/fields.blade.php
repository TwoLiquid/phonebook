@php /** @var \App\Models\Contact $contact */ @endphp
<div class="row">

    <div class="col-md-7">
        @component('dashboard.layouts.partials.card')
            @slot('cardTitle')
                Основные данные
            @endslot

            @include('dashboard.layouts.partials.forms.text', [
                'title' => 'Имя',
                'name' => 'name',
                'required' => true,
                'value' => old('name', isset($contact) ? $contact->name : ''),
                'placeholder' => 'Введите имя пользователя'
            ])
            @include('dashboard.layouts.partials.forms.text', [
                'title' => 'Номер телефона',
                'name' => 'phone',
                'required' => true,
                'value' => old('phone', isset($contact) ? $contact->phone : ''),
                'placeholder' => 'Введите номер телефона'
            ])
            @include('dashboard.layouts.partials.forms.checkbox', [
                'title' => 'Избранное',
                'name' => 'favorite',
                'checked' => old('favorite', isset($contact) ? $contact->favorite : false),
                'color' => 'complete'
            ])
        @endcomponent
    </div>
</div>
