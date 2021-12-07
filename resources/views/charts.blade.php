@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Charts') }}</div>

                    <div class="card-body">
                        <chart-component></chart-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
