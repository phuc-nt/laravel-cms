@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit User: {{ $user->name }}</h1>
      </div>
    </div>
    <hr>

    <div class="columns">
      <div class="column">
        <form class="" action="{{route('users.update', $user->id)}}" method="POST">
          {{method_field('PUT')}}
          {{ csrf_field() }}
          <div class="field">
            <label for="name" class="label">Name</label>
            <p class="control">
              <input class="input" type="text" name="name" id="name" value="{{ $user->name }}"></input>
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email</label>
            <p class="control">
              <input class="input" type="email" name="email" id="email" value="{{ $user->email }}"></input>
            </p>
          </div>

          <div class="field">
            <label for="password" class="label">Password</label>
              <b-radio-group v-model="password_options">
                <div class="field">
                  <b-radio name="password_options" value="keep">Do Not Change Password</b-radio>
                </div>
                <div class="field">
                  <b-radio name="password_options" value="auto">Auto-Generate New Password</b-radio>
                </div>
                <div class="field">
                  <b-radio name="password_options" value="manual">Manually Set New Password</b-radio>
                  <p class="control m-t-10">
                    <input class="input" type="text" name="password" id="password" v-if="password_options == 'manual'" placeholder="Manually give a password to this user"></input>
                  </p>
                </div>
              </b-ratio-group>
          </div>

          <button class="button is-primary">Edit User</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        password_options: 'keep'
      }
    });
  </script>
@endsection
