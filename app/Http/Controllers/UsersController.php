<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);

        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
         ]);

         $newUser = User::create($data);
         return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':attribute je obavezan.',
            'email'    => ':attribute mora biti u ispravnom email formatu.'
        ];
        $this->validate($request, [
            "name" => "required",
            "email" => "required|email"
        ], $messages);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->status = $request->input('status');

        $user->save();

        return redirect(route('users.index'))->with("message", "Korisnik uspješno uređen");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user->id == auth()->user()->id) {
            return redirect()->route('users.index')
                ->with('Ne možeš obrisati sebe!');
        }

        User::find($id)->delete();

        return redirect(route('users.index'))->with("message", "Korisnik je obrisan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function blockUser(string $id)
    {
        $user = User::find($id);

        if ($user->id == auth()->user()->id) {
            return redirect()->route('users.index')
                ->with('Ne možeš blokirati sebe!');
        }

        $user->status = "Blokiran";
        $user->save();

        return redirect(route('users.index'))->with("message", "Korisnik je blokiran");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function unblockUser(string $id)
    {
        $user = User::find($id);

        $user->status = "Redovan";
        $user->save();

        return redirect(route('users.index'))->with("message", "Korisnik je odblokiran");
    }

    
}
