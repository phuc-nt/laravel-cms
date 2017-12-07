@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New User</h1>
      </div>
    </div>
    <hr>

    <div class="columns">
      <div class="column">
        <form class="" action="{{ route('users.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="field">
            <label for="name" class="label">Name</label>
            <p class="control">
              <input class="input" type="text" name="name" id="name"></input>
            </p>
          </div>

          <div class="field">
            <label for="email" class="label">Email</label>
            <p class="control">
              <input class="input" type="email" name="email" id="email"></input>
            </p>
          </div>

          <div class="field">
            <label for="password" class="label">Password</label>
            <p class="control">
              <input class="input" type="text" name="password" id="password" v-if="!auto_password" placeholder="Manually give a password to this user"></input>
              <b-checkbox class="m-t-15" name="auto-generate" v-model="auto_password">Auto-Generate Password</b-checkbox>
            </p>
          </div>

          <button class="button is-success">Create User</button>
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
        auto_password:true
      }
    });
  </script>
@endsection
