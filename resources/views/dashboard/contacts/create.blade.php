@extends('dashboard.layouts.pages.createdit')

@section('breadcrumb')
    @include('dashboard.layouts.partials.breadcrumb', ['links' => [
        'Список контактов' => route('contacts')
    ]])
@stop

@section('title', 'Новый контакт')

@section('fields')
    @include('dashboard.contacts.fields')
@stop

@section('back-link')
    {{ route('contacts') }}
@stop
