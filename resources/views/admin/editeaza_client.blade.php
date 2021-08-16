@extends('layouts.app')
@section('content')
<br/>
<div class="my-4 mx-4">
<div class="row">
    <div class="col-lg-12 margin-tb mx-2 my-2">
        <div class="pull-left">
            <h2>Editeaza Client</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('clienti.index') }}"> Inapoi</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('clienti.update',$clienti->id) }}" method="POST">

    @csrf
    @method('PUT')


     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Firma:</strong>
                <input type="text" name="nume_firma" class="form-control" placeholder="Numele Firmei" value="{{ $clienti->nume_firma }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CUI:</strong>
                <input type="text" name="cui_firma" class="form-control" placeholder="Cui Firma" value="{{ $clienti->cui_firma }}">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Propietar:</strong>
                <select class="form-control form-control-alternative form-select" name="owner">
                    @foreach(\App\Models\User::All() as $u)
                    <option value="{{$u->id}}" {{$clienti->owner == $u->id ? "selected" : ""}}>{{$u->name}}</option>
                    @endforeach                 
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                <select class="form-control form-control-alternative form-select" name="status">
                    <option value="1" {{$clienti->status == "1" ? "selected" : ""}} >Activ</option>
                    <option value="2" {{$clienti->status == "2" ? "selected" : ""}} >Inactiv</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Editeaza Client</button>
        </div>
    </div>
</form>
</div>
@endsection