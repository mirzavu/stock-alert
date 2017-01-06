@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Stocks</div>
                    <div class="panel-body">

                        <a href="{{ url('/stocks/create') }}" class="btn btn-primary btn-xs" title="Add New Stock"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Stock </th><th> Buyprice </th><th> Todaysprice </th><th> Current price </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->stock }}</td><td>{{ $item->buyprice }}</td><td>{{ $item->todaysprice }}</td><td>{{ $item->currentprice }}</td>
                                        <td>
                                            <a href="{{ url('/stocks/' . $item->id) }}" class="btn btn-success btn-xs" title="View Stock"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/stocks/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Stock"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/stocks', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Stock" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Stock',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stocks->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection