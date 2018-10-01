<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        return view('admin.files.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);



        auth()->user()->files()->create($request->all());
        // File::create($request->all());

        return redirect()->route('admin.files.index')->withFlash('El archivo ha sido creado');

        // return 'procesando imagen';
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
    public function edit(File $file)
    {
        return view('admin.files.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        $file->update($request->all());

        return redirect()->route('admin.files.index')->withFlash('Los datos del archivo han sido actualizado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function updateUrl(Request $request, File $file)
    // {
    //     $this->validate(request(), [
    //         'file' => 'required|max:2048'
    //     ]);

    //     auth()->user()->files()->update([
    //         'url' => request()->file('file')->store('files', 'public')
    //     ]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if($file->upload != null) {
            Storage::disk('public')->delete($file->upload->url);
        }

        $file->delete();

        return redirect()
            ->route('admin.files.index')
            ->withFlash('El archivo ha sido eliminado');
    }
}
