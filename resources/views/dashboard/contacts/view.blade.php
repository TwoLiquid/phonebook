@extends('dashboard.layouts.pages.view')

@section('breadcrumb')
    @include('dashboard.layouts.partials.breadcrumb', ['links' => [
        'Список контактов' => route('contacts')
    ]])
@stop

@section('title', 'Просмотр контакта')

@section('fields')
    @include('dashboard.contacts.data')
@stop

@section('back-link')
    {{ route('contacts') }}
@stop
