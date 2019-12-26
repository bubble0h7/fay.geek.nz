<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Now;

class NowController extends Controller
{
    /**
     * Show the now page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $active = "now";
        $current = Now::orderBy('updated_at')->first();
        
        // Convert text areas to arrays - each value being each line 
        $current->excited_about = explode("\n", str_replace("\r", "", $current->excited_about));
        $current->working_on = explode("\n", str_replace("\r", "", $current->working_on));

        return view ('now/index')->with(compact('active', 'current'));
    }

    /**
     * Show the now archive page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function archive()
    {
        $active = "now";
        $now_entries = Now::orderBy('updated_at')->get();
        
        foreach($now_entries as $now) {
            // Convert text areas to arrays - each value being each line 
            $now->excited_about = explode("\n", str_replace("\r", "", $now->excited_about));
            $now->working_on = explode("\n", str_replace("\r", "", $now->working_on));
        }
        
        return view ('now/archive')->with(compact('active', 'now_entries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $current = Now::orderBy('updated_at')->get(['sex','location', 'occupation'])->first();
        return view ('now/create')->with(compact('current'));
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
            'age' => 'required|integer',
            'sex' => 'required|max:1|string',
            'location' => 'required|max:50|string',
            'occupation' => 'string',
            'listening_to' => 'string',
            'watching' => 'string',
            'playing' => 'string',
            'reading' => 'string',
            'excited_about' => 'string',
            'working_on' => 'string'
        ]);

        $project = Now::create([
            'age' => $request['age'],
            'sex' => $request['sex'],
            'location' => $request['location'],
            'occupation' => $request['occupation'],
            'listening_to' => $request['listening_to'],
            'watching' => $request['watching'],
            'playing' => $request['playing'],
            'reading' => $request['reading'],
            'excited_about' => $request['excited_about'],
            'working_on' => $request['working_on'],
        ]);

        return redirect()->action('NowController@index')->with(['status' => 'Now entry created.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // This may not be necessary 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $now = Now::find($id);
        return view ('now/edit')->with(compact('now'));
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
            'age' => 'required|integer',
            'sex' => 'required|max:1|string',
            'location' => 'required|max:50|string',
            'occupation' => 'string',
            'listening_to' => 'string',
            'watching' => 'string',
            'playing' => 'string',
            'reading' => 'string',
            'excited_about' => 'string',
            'working_on' => 'string'
        ]);

        $now = Now::find($id);
        $now->age = $request['age'];
        $now->sex = $request['sex'];
        $now->location = $request['location'];
        $now->occupation = $request['occupation'];
        $now->listening_to = $request['listening_to'];
        $now->watching = $request['watching'];
        $now->playing = $request['playing'];
        $now->reading = $request['reading'];
        $now->excited_about = $request['excited_about'];
        $now->working_on = $request['working_on'];
        $now->save();

        return redirect()->action('NowController@index')->with(['status' => 'Now entry updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $now = Now::find($id);
        $now->delete();
        return redirect()->action('NowController@index')->with(['status' => 'Now entry deleted.']);
    }
}
