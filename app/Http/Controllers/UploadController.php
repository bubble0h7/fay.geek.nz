<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Upload;
use App\Traits\UploadTrait;

class UploadController extends Controller
{
    use UploadTrait;

    /**
     * Show the now page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uploads = Upload::get();
        $active = "files";
        return view ('uploads/index')->with(compact('uploads', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('uploads/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:uploads|alpha_dash',
            'file' => 'required',
        ]);

        // Check if a file has been uploaded
        if ($request->has('file')) {
            // Get image file
            $file = $request->file('file');
            // Make a file name based on file name
            $name = str_slug($request->input('name'));
            // Define folder path
            $folder = '/uploads/files/';
            // Make a file path where file will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $file->getClientOriginalExtension();
            // Upload file
            $this->uploadOne($file, $folder, 'public', $name);
        }

        $project = Upload::create([
            'name' => $request['name'],
            'file' => $filePath,
        ]);

        return redirect()->action('UploadController@index')->with(['status' => 'File Uploaded.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $upload = Upload::where('name', '=', $name)->first();
        header("Content-disposition: inline; filename=".basename($upload->file));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Upload::find($id);
        $file->delete();
        return redirect()->action('UploadController@index')->with(['status' => 'File deleted.']);
    }
}
