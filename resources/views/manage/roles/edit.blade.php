@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Edit {{$role->display_name}}</h1>
        <h5>{{$role->description}}</h5>
      </div>
    </div>
    <hr class="m-t-0">

    <form action="{{route('roles.update', $role->id)}}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Role Details:</h2>
                  <div class="field">
                    <p class="control">
                      <label for="display_name" class="label">Name (Human Readable)</label>
                      <input type="text" class="input" name="display_name" id="display_name" value="{{$role->display_name}}">
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <label for="name" class="label">Slug (Cannot be edited)</label>
                      <input type="text" class="input" name="name" id="name" value="{{$role->name}}" disabled>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <label for="description" class="label">Description</label>
                      <input type="text" class="input" name="description" id="description" value="{{$role->description}}">
                    </p>
                  </div>

                  <input type="hidden" name="permissions" :value="permissionsSelected">
                </div>
              </div>
            </article>
          </div> {{-- end of .box --}}
        </div>
      </div>

      <div class="columns">
        <div class="column">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h2 class="title">Permission:</h2>
                  <b-checkbox-group v-model="permissionsSelected">
                    @foreach ($permissions as $permission)
                      <div class="field">
                        <b-checkbox :custom-value="{{$permission->id}}">
                          {{$permission->display_name}} <em>({{$permission->description}})</em>
                        </b-checkbox>
                      </div>
                        {{-- {{$permission->display_name}} <em class="m-l-15">({{$permission->description}})</em> --}}

                    @endforeach
                  </b-checkbox-group>
                </div>
              </div>
            </article>
          </div> {{-- end of .box --}}

          <button class="button is-primary">Save Changes</button>
        </div>
      </div>

    </form>
@endsection

@section('scripts')
  <script>
    var app = new Vue({
      el: '#app',
      data: {
        permissionsSelected: {!!$role->permissions->pluck('id')!!}
      }
    });
  </script>
@endsection
