<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('title')->get();
        $active = "projects";
        return view ('projects/index')->with(compact('projects', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('projects/create');
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
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'string',
        ]);

        $project = Project::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'content' => $request['content'],
        ]);

        return redirect()->action('ProjectController@index')->with(['status' => 'Project created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $project = Project::where('title', '=', str_replace('-', ' ', $title))->first();
        $active = "projects";
        return view ('projects/show')->with(compact('project', 'active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view ('projects/edit')->with(compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'string',
        ]);

        $project = Project::find($id);
        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->content = $request['content'];
        $project->save();

        return redirect()->action('ProjectController@show', str_replace(' ', '-', strtolower($project->title)))->with(['status' => 'Project updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->action('ProjectController@index')->with(['status' => 'Project deleted.']);
    }
}
