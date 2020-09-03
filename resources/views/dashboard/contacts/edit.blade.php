@extends('dashboard.layouts.pages.createdit')

@section('breadcrumb')
    @include('dashboard.layouts.partials.breadcrumb', ['links' => [
        'Список контактов' => route('contacts')
    ]])
@stop

@section('title', 'Изменение контакта')

@section('fields')
    @include('dashboard.contacts.fields')
@stop

@section('back-link')
    {{ route('contacts') }}
@stop
