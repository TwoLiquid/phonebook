@extends('dashboard.layouts.default')

@section('content')
    @component('dashboard.layouts.partials.form-view')

        @slot('formId')
            @yield('form-id')
        @endslot

        @slot('backLink')
            @yield('back-link')
        @endslot

        @yield('fields')

    @endcomponent
@stop
