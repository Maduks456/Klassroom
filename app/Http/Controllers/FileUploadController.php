<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FileUploadController extends Controller
{


public function upload(Request $request)
{
    $request->validate([
        'icon' => 'required|image|mimes:jpg,png,webp|max:10048',
    ]);
    $user = auth()->user();
    if($user->icon){
        Storage::disk('public')->delete($user->icon);
    }
    $filename = time() . '_' . $request->file('icon')->getClientOriginalName();
    $path = $request->file('icon')->storeAs('uploads/icon', $filename, 'public');
    
    $user->update([
        "icon" => $path
    ]);
    return redirect('/dashboard');
}
public function create(){
    return view('file');
}

}
