@extends('layouts.app')
@section('content')
<br/>
 <div class="my-5 mx-5">
    <div class="row my-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clienti </h2>
            </div>
            <div class="pull-right mt-2">
                <a class="btn btn-success" href="{{ route('clienti.create') }}"> Client Nou</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Success!</strong>  {{ $message }} </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <div class="table-responsive">
        <table class="table align-items-center table-dark">
        <thead class="thead-dark">
        <tr>
            <th>Nume Firma</th>
            <th>Cui Firma</th>
            <th>Owner</th>
            <th>Status</th>
            <th>Actiuni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clienti as $c)
        <tr>
            <td>{{ $c->nume_firma }}</td>
            <td>{{ $c->cui_firma }}</td>
            <td>{{ \App\Models\User::where('id',$c->owner)->first()->name }}</td>
            <td>{{ $c->status == "1" ? "Activ" : "Inactiv" }}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">

                    <a class="btn btn-sm btn-primary rounded mx-2" href="{{ route('clienti.edit',$c->id) }}">Editeaza</a>

                    <form action="{{ route('clienti.destroy',$c->id) }}" method="POST">       
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Sterge</button>
                    </form>
            </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
 </div>
@endsection