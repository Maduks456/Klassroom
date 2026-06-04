<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Klass;
use App\Models\JoinedKlass;
use App\Models\Homework;
use App\Models\HomeworkAnswers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.accounts', compact('users'));
    }
    public function show(User $user)
    {
        return view("admin.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            "name"=>'required|max:255',
            "password"=> 'required|max:255',
            "role" => 'required|in:Admin,Teacher,Pupil'
        ]);
        $user->name = $validated["name"];
        $user->password = $validated["password"];
        $user->role = $validated["role"];
        $user->save();
        return redirect("/accounts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/accounts');
    }
    public function logs(){
        $users = User::all();
        $klass = Klass::all();
        $joined = JoinedKlass::all();
        $homework = Homework::all();
        $answers = HomeworkAnswers::all();
        return view('admin.logs', compact('users', 'klass', 'joined', 'homework', 'answers'));

    }
}
