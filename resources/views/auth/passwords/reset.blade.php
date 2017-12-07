@extends('layouts.app')

@section('content')

  @if (session('status'))
      <div class="notification is-success">
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

          <form action="{{ route('password.request') }}" method="POST" role="form">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="field">
              <label for="email" class="label">Email Address</label>
              <p class="control">
                <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
              </p>
              @if ($errors->has('email'))
                <strong><p class="help is-danger">{{ $errors->first('email') }}</p></strong>
              @endif
            </div>

            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                    <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" id="password" required>
                  </p>
                  @if ($errors->has('password'))
                    <strong><p class="help is-danger">{{ $errors->first('password') }}</p></strong>
                  @endif
                </div>
              </div>

              <div class="column">
                <div class="field">
                  <label for="password-confirm" class="label">Confirm Password</label>
                  <p class="control">
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                  </p>
                  @if ($errors->has('password_confirmation'))
                    <strong><p class="help is-danger">{{ $errors->first('password_confirmation') }}</p></strong>
                  @endif
                </div>
              </div>
            </div>

            <button class="button is-primary is-outlined is-fullwidth m-t-30">Reset Password</button>
          </form>
        </div> <!-- end of .card-content -->
      </div> <!-- end of .card -->
    </div>
  </div>

@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {}
    });
  </script>
@endsection
