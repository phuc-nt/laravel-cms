<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'desc')->paginate(10);
      return view('manage.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      # Validation
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users'
      ]);

      if (!empty($request->password)) {
        # set a manual password
        $password = trim($request->password);
      } else {
        # generate a random password
        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $password = $str;
      }

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($password);

      if ($user->save()) {
        Session::flash('success', 'User Created Successfully');
        return redirect()->route('users.show', $user->id);
      } else {
        Session::flash('danger', 'Sorry a problem occurred while creating this user.');
        return redirect()->route('users.create');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $user = User::findOrFail($id);
      return view('manage.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('manage.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      # Validation
      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;

      // if ($request->password_options == 'manual') {
      //   # set a manual password
      //   $user->password = Hash::make($request->password);
      // } elseif ($request->password_options == 'auto') {
      //   # generate a random password
      //   $length = 10;
      //   $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
      //   $str = '';
      //   $max = mb_strlen($keyspace, '8bit') - 1;
      //   for ($i = 0; $i < $length; ++$i) {
      //       $str .= $keyspace[random_int(0, $max)];
      //   }
      //   $user->password = Hash::make($str);
      // }

      if ($request->password_options == 'auto') {
        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $user->password = Hash::make($str);
      } elseif ($request->password_options == 'manual') {
        $user->password = Hash::make($request->password);
      }

      if ($user->save()) {
        Session::flash('success', 'User Updated Successfully');
        return redirect()->route('users.show', $user->id);
      } else {
        Session::flash('danger', 'Sorry a problem occurred while creating this user.');
        return redirect()->route('users.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
