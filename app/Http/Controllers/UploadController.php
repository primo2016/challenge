<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function edit(File $file)
    {
        return view('admin.files.upload', compact('file'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file)
    {
    	//dd($file->id);
    	// if(filled($file->url)) {

    	// 	Storage::disk('public')->delete($file->url);
    	// }

        $this->validate(request(), [
            'file' => 'required|max:2048'
        ]);

        $file->upload()->create([
            'url' => request()->file('file')->store('files', 'public')
        ]);
    }

    public function update(Request $request, File $file)
    {
        //dd($file->id);
        if($file->upload != null) {
            Storage::disk('public')->delete($file->upload->url);
        }

        $this->validate(request(), [
            'file' => 'required|max:2048'
        ]);

        $file->upload()->update([
            'url' => request()->file('file')->store('files', 'public')
        ]);
    }
}
