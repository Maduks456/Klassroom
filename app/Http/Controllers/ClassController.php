<?php

namespace App\Http\Controllers;
use App\Models\Klass;
use App\Models\JoinedKlass;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
class ClassController extends Controller
{
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "class_name" => "required|max:255"
        ]);
        $class = Klass::create([
            "class_name" => $request->class_name,
            "teacher_id"=> Auth::user()->id,
            "join_code" => Str::upper(Str::random(6))
        ]);
        JoinedKlass::create([
            "user_id"=> Auth::user()->id,
            "class_id"=> $class->id
        ]);
        return redirect("/dashboard");
    }
    public function show(Klass $class)
    {
        return view("teacher.show", compact("class"));
    }
    public function view(){
        return view("class.view");
    }
    public function join(Request $request){
        $validated = $request->validate([
            'join_code' => 'required|max:6'
        ]);
        $class = Klass::where('join_code', $validated['join_code'])->first();
        if (!$class) {
            return back()->with('error', 'Invalid class code');
        }
        JoinedKlass::create([
            "user_id"=> Auth::user()->id,
            "class_id"=> $class->id
        ]);
        return redirect('/dashboard');

    }
}
