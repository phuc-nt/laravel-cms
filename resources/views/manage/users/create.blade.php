@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Create New User</h1>
      </div>
    </div>
    <hr class="m-t-10" />


    <form class="" action="{{ route('users.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="columns">
        <div class="column">
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
        </div> <!-- end of .column -->

        <div class="column">
          <label for="roles" class="label">Roles:</label>
          <input type="hidden" name="roles" :value="rolesSelected" />
          <b-checkbox-group v-model='rolesSelected'>
            @foreach ($roles as $role)
              <div class="field">
                <b-checkbox :custom-value='{{$role->id}}'>{{$role->display_name}}</b-checkbox>
              </div>
            @endforeach
          </b-checkbox-group>
        </div> <!-- end of .column -->
      </div> <!-- end of .columns for forms -->

      <div class="columns">
        <div class="column">
          <hr />
          <button class="button is-primary" style="width: 250px;">Create New User</button>
        </div>
      </div> <!-- end of .columns -->

    </form>
  </div> <!-- end of .flex-container -->
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        auto_password:true,
        rolesSelected: [{!! old('roles') ? old('roles') : '' !!}]
      }
    });
  </script>
@endsection
