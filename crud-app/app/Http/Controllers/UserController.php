<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        return view("users/index", ['users' => User::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        return view("users/create", ['user' => new User]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $validated = User::validateEntry($request);

        $user = new User($validated);
        $user->password = Hash::make('password');
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        return
            redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->cannot('update', [User::class, User::find($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        return view("users/create", ['user' => User::where('id', $id)->first()]);
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
        if ($request->user()->cannot('update', [User::class, User::find($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $validated = User::validateEntry($request);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return
            redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->cannot('delete', [User::class, User::find($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }
        $user = User::find($id);
        $reviews = $user->reviews;

        //Delete the users reviews
        foreach ($reviews as $review) {
            $review->delete();
        }

        //Delete the user
        $user->delete();

        return redirect()->action([UserController::class, 'index']);
    }
}
