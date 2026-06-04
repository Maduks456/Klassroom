<?php

namespace App\Http\Controllers;
use App\Models\Klass;
use App\Models\Homework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function destroy(Homework $homework){
        $id = $homework->id;
        $homework->delete();
        return redirect("/class/$id");
    }
    public function edit(Homework $homework){
        return view('homework.edit', compact("homework"));
    }
    public function update(Request $request, Homework $homework){
        $validated = $request->validate([
        'homework_name' => 'required|max:255',
        'homework_file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240',
    ]);

    $data = [
        'homework_name'=> $validated['homework_name'],
    ];

    if ($request->hasFile('homework_file')) {
        // Delete old file from public disk
        if (Storage::disk('public')->exists($homework->homework_file)) {
            Storage::disk('public')->delete($homework->homework_file);
        }

        // Store new file the same way as your store() method
        $file = $request->file('homework_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $data['homework_file'] = $file->storeAs('documents', $filename, 'public');
    }

    $homework->update($data);

    return redirect('class/'.$homework->klass_id);
    }
}
