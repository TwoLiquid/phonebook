@extends('dashboard.layouts.default')

@section('title', 'Список контактов')

@section('content')

    @component('dashboard.layouts.partials.card')
        @slot('cardHeader')
            <!-- <div class="pull-left">
                @include('dashboard.layouts.partials.datatable-search-input')
            </div> -->
            @include('dashboard.layouts.partials.create-new-button', [
                'link' => route('contacts.create')
            ])
        @endslot

        @php /** @var \App\Models\User[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $contacts */ @endphp

        @if(count($contacts) > 0)
            <table class="table table-hover table-condensed no-footer" role="grid">
                <thead>
                    <tr>
                        <th style="width: 20%" rowspan="1" colspan="1">Имя</th>
                        <th style="width: 20%;" rowspan="1" colspan="1">Телефон</th>
                        <th style="width: 20%;" rowspan="1" colspan="1">Избранное</th>
                        <th style="width: 40%;" class="text-right" rowspan="1" colspan="1">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->favorite ? 'Да' : 'Нет' }}</td>
                            <td>
                                @include('dashboard.layouts.partials.button-list-delete-big', [
                                    'link' => route('contacts.delete', $contact->id)
                                ])
                                @include('dashboard.layouts.partials.button-list-edit-big', [
                                    'link' => route('contacts.edit', $contact->id)
                                ])
                                @include('dashboard.layouts.partials.button-list-view-big', [
                                    'link' => route('contacts.view', $contact->id)
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row padding-20">
                {{ $contacts->links() }}
            </div>
        @else
            <span class="hint-text m-l-5">Пока нет контактов</span>
        @endif

    @endcomponent

@stop
