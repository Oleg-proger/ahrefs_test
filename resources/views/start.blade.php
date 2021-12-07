@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <a class="nav-link" href="{{route('table', ['id' => $id])}}">
                            Таблица
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <chart-component :id='{{$id}}'></chart-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
