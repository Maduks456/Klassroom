<?php

namespace App\Http\Controllers;

use App\Models\Homework;
use App\Models\HomeworkAnswers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeworkAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Homework $homework)
    {
        $answers = $homework->homeworkanswers()->with('user')->get();
        return view('homework.answers.index', compact('answers'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Homework $homework)
    {
        return view('homework.answers.create', compact('homework'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'homework_id' => 'required|numeric',
            'comment' => 'nullable|string',
            'answer_file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240'
        ]);
        $homework = Homework::findOrFail($validated['homework_id']);
        $file = $request->file('answer_file');

        $filename = time() . '_' . $file->getClientOriginalName();

        $path = $file->storeAs(
            'documents',
            $filename,
            'public'
        );
        HomeworkAnswers::create([
            'user_id' => Auth::user()->id,
            'homework_id' => $validated['homework_id'],
            'comment' => $validated['comment'],
            'answer_file' => $path
        ]);
        return redirect('class/'.$homework->klass_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeworkAnswers $homeworkAnswers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeworkAnswers $homeworkAnswers)
    {
        return view('homework.answers.edit', compact('homeworkAnswers'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, HomeworkAnswers $homeworkAnswers)
{
    $validated = $request->validate([
        'comment'     => 'required|string|max:255',
        'homework_id' => 'required|exists:homework,id',
        'answer_file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240',
    ]);

    $data = [
        'comment'     => $validated['comment'],
        'homework_id' => $validated['homework_id'],
    ];

    if ($request->hasFile('answer_file')) {
        // Delete old file from public disk
        if (Storage::disk('public')->exists($homeworkAnswers->answer_file)) {
            Storage::disk('public')->delete($homeworkAnswers->answer_file);
        }

        // Store new file the same way as your store() method
        $file = $request->file('answer_file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $data['answer_file'] = $file->storeAs('documents', $filename, 'public');
    }

    $homeworkAnswers->update($data);

    return redirect('class/'.$homeworkAnswers->homework->klass_id);
}

    public function rating(Request $request, HomeworkAnswers $homeworkAnswers)
{
    $validated = $request->validate([
        'raiting' => 'required|integer|min:1|max:10',
    ]);

    $homeworkAnswers->update($validated);

    return redirect('/answers/'. $homeworkAnswers->homework_id);
}
}
