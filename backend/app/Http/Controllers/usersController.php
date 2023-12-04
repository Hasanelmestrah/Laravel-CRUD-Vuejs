<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class usersController extends Controller
{
    protected $users;
    public function __construct(){
        $this->users = new Users();

    }
    public function index()
    {
        return $this->users->all();
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'sex' => 'required',
            'blood_type' => 'required',
        ]);

        return $this->users->create($validatedData);
    }


    public function show(string $id)
    {

        return $this->users->find($id);
    }


    public function update(Request $request, string $id)
    {
        $users = $this->users->find($id);
        $users->update($request->all());
        return $users;
    }


    public function destroy(string $id)
    {
        $users = $this->users->find($id);
        return $users->delete();
    }
}
