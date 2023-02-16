<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(){
        return view('admin.dashboard');
    }


    public function user(User $user){
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        User::create([
            'id' => Uuid::uuid4()->toString(),
            'name' => $request->name,
            'nickname' => $request->nickname,
            'gender_id' => $request->gender_id,
            'birth_order' => $request->birth_order,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo_path' => $request->photo_path,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, User $user)
    {      


        $user = User::findOrFail($user->id);
        $user->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'gender_id' => $request->gender_id,
            'birth_order' => $request->birth_order,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo_path' => $request->photo_path,
        ]);
        // dd($request->photo_path);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDestroy(User $user){
        // dd($user);
        $user = User::where('id', $user->id)->firstOrFail();
        $user->delete();

        return back();
    }
}
