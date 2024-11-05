<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Inertia\Inertia;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = User::orderBy('id', 'DESC')
            ->get()
            ->map(function($user){
            return [
                'name' => $user->name,
                'email' => $user->email,
                'edit_user_link' => route('users.edit', $user),
                'delete_user_link' => route('users.delete', $user)
            ];
        });

        return Inertia::render('Users/Index',[
            'users' => $users
        ]);
    }

    public function create(Request $request)
    {

        return Inertia::render('Users/Create');
    }

    public function store(UserRequest $request){

        $arrayRequest = $request->validated();

        User::create([
            'name' => $arrayRequest['username'],
            ...$arrayRequest
        ]);

        return
            to_route('users.index')
            ->with('success', 'Usuário salvo com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index')->with('success', 'Usuário excluído com sucesso');
    }
}
