<?php

namespace App\Http\Controllers;
use App\Models\Klass;
use App\Models\Homework;
use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function create(Klass $class)
    {
        return view("homework.create", compact("class"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'klass_id' => 'required|numeric',
            'homework_name' => 'required|max:255',
            'homework_file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240'
        ]);
        $file = $request->file('homework_file');

        $filename = time() . '_' . $file->getClientOriginalName();

        $path = $file->storeAs(
            'documents',
            $filename,
            'public'
        );
        Homework::create([
            'klass_id' => $validated['klass_id'],
            'homework_name' => $validated['homework_name'],
            'homework_file' => $path
        ]);
        return redirect('class/'.$validated['klass_id']);
    }
}
