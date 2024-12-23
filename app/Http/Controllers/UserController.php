<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Policies\UserPolicy;
class UserController extends Controller
{

    public function index()
    {
        $this->authorize("manageUser" , User::class);
        $users = User::all();
        return view("users.index", compact("users"));
    }

    public function create()
    {
        $this->authorize("manageUser" , User::class);
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *     $post = Post::create($request->all());

     */
    public function store(Request $request)
    {
/*         if ($request->hasFile("image")) {
            $imageNames = [];
            foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/images/posts"), $imageName);
            $imageNames[] = $imageName;
            }
            $imageNamesString = implode(',', $imageNames);
    } */
    $this->authorize("manageUser" , User::class);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "is_admin" => false,

        ]);
        return redirect()->route("users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
/*         return view("users.show", compact("user"));
 */    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize("manageUser" , User::class);
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
/*         if ($request->hasFile("image")) {
            $imageNames = [];
            foreach ($request->file('image') as $image) {
            $imageName = $image->getClientOriginalName() . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path("/images/users"), $imageName);
            $imageNames[] = $imageName;
            }
            $imageNamesString = implode(',', $imageNames);
    } else {
        $imageNamesString = $user->image;
    } */
    $this->authorize("manageUser" , User::class);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        return redirect()->route("users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize("manageUser" , User::class);
        $user->delete();
        return redirect()->route("users.index");
    }

}

