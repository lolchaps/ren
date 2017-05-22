<?php
namespace App\Controllers;

use Core\App;
use Core\Flash;
use App\Models\User;

class UsersController
{
    /**
     * Show all users.
     */
    public function index()
    {
        $users = User::all();

        // $users = ['name' => 'carl'];
        return view('users.index', ['users' => $users]);
    }

    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {
        $user = new User;

        $user->name = $_POST['name'];

        $user->save();

        Flash::message('success', 'User created.');

        return redirect('users');
    }

    public function destroy($id) 
    {
        User::destroy($id);

        Flash::message('info', 'user deleted.');

        return redirect('users');
    }

    public function edit($id) 
    {
        $user = User::find($id);

        Flash::message('info', 'User successfully updated.');

        return view('users.edit', ['user' => $user]);
    }

    public function show($id) 
    {
        $user = User::find($id);

        return view('users.show', ['user' => $user]);
    }

    public function update($id) 
    {
        $user = User::find($id);

        $user->name = $_POST['user'];

        $user->save();

        return redirect('users');
    }
}
