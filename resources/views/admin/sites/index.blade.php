@extends('layouts.admin')

@section('content')

<div class="col s12">
    <header class="row navigation-row">
        <div class="col s6">
            <h1>Strony</h1>
        </div>
        <div class="col s6">
            <a href="{{ url('/admin/sites/create') }}" class="waves-effect waves-light btn right" title="Dodaj nowy wpis"><i class="fa fa-plus"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col s12 m12 animated flipInX">
            <div class="card">
                <div class="card__header">
                    <span>Lista wpisów</span>
                </div>
                <div class="card-content">
                    <table class="responsive-table bordered striped highlight">
                        <thead>
                        <tr>
                            <th class="center"> # </th>
                            <th> Tytuł </th>
                            <th> Treść </th>
                            <th class="center"> Aktywny </th>
                            <th> Akcje </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sites as $item)
                            <tr>
                                <td class="center">{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ str_limit($item->content, 64, '...') }}</td>
                                <td class="center">
                                    @if ($item->active === 1)
                                        <span class="new badge blue" data-badge-caption="">Tak</span>
                                    @else
                                        <span class="new badge red" data-badge-caption="">Nie</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/sites/' . $item->id) }}" class="waves-effect waves-light btn" title="Zobacz"><i class="fa fa-folder-open"></i></a>
                                    <a href="{{ url('/admin/sites/' . $item->id . '/edit') }}" class="waves-effect waves-light btn" title="Edycja"><i class="fa fa-edit"></i></a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/admin/sites', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'waves-effect waves-light btn',
                                            'title' => 'Usuń',
                                            'onclick'=>'return confirm("Potwierdź usunięcie?")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @include('admin.partials.form.pagination', ['items' => $sites])

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
