@extends('includes.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">{{ __('Enter Your Token') }}</div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('checkToken') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="token">{{ __('Token') }}</label>
                            <input id="token" type="text" class="form-control @error('token') is-invalid @enderror" name="token" required autofocus>
                            @error('token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify Token') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection