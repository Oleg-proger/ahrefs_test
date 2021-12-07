@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('import') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="csv" class="col-md-4 col-form-label text-md-right">{{ __('CSV файл') }}</label>

                        <div class="col-md-6">
                            <input id="csv" type="file" class="form-control" name="csv" required>

                            @error('csv')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Import') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
