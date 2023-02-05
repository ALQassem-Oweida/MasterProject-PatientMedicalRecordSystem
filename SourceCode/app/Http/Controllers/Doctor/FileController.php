<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller

{
  public function store(Request $request)
  {
    $request->validate([
      'file' => 'required|file|mimes:jpeg,png,jpg,pdf|max:3048',
      'file_name'=>'required'
    ]);

    // $file = $request->file('file');
    // $path = $file->store('public/files');
    
    $fileName=$request->file_name.'_'.$request->national_id.'_'.time().'.'.request()->file->getClientOriginalExtension();
    request()->file->move(public_path('files'), $fileName);
    $file_type=request()->file->getClientOriginalExtension();
  
    File::create([
      'path' => $fileName,
      'national_id'=>$request->national_id,
      'user_id'=>$request->user_id,
      'doctor_id'=>$request->doctor_id,
      'file_name'=>$request->file_name,
      'file_type'=>$file_type,
    ]);

    return redirect()->back();
  }

//   public function show(File $file)
//   {
//     return Storage::download($file->path);
//   }
}
