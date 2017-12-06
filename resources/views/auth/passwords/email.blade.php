@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

  <div class="columns">
    <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
        <div class="card-content">
          <h1 class="title">
            Reset Password
          </h1>

          <form action="{{ route('password.email') }}" method="POST" role="form">
            {{ csrf_field() }}
            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
              </p>
              @if ($errors->has('email'))
                <strong><p class="help is-danger">{{ $errors->first('email') }}</p></strong>
              @endif
            </div>

            <button class="button is-primary is-outlined is-fullwidth m-t-30">Send Password Reset Link</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
    </div>
  </div>

@endsection
