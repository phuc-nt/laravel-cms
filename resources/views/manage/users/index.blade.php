@extends('layouts.manage')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>

      <div class="column">
        <a href="{{ route('users.create') }}" class="button is-primary is-pulled-right">
          <i class="fa fa-user-plus m-r-10"></i>Create New User
        </a>
      </div>
    </div>
    <hr>

    <div class="card">
      <div class="card-content">
        <table class="table is-narrow">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created At</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->toFormattedDateString() }}</td>
                <td class="has-text-right">
                  <a href="{{ route('users.show', $user->id) }}" class="button is-small is-success m-r-5">View</a>
                  <a href="{{ route('users.edit', $user->id) }}" class="button is-small is-primary">Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div> {{-- end of card --}}

    {{$users->links()}}

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
