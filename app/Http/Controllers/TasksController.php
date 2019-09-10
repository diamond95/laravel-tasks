<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "index site";
        $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        //validacije
        $this->validate($request, [
            
            'name' => 'required|string|max:255|min:4',
            'description' => 'required|string|max:10000|min:10',
            'date' => 'required|date'
        ]);
        // novi zadatak
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->date = $request->date;

        //spremanje
        $task->save();
        Session::flash('success', 'Task created!');

        return redirect()->route('task.create');
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
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit')->with('task', $task);
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
        //validacije
        $this->validate($request, [
            
            'name' => 'required|string|max:255|min:4',
            'description' => 'required|string|max:10000|min:10',
            'date' => 'required|date'
        ]);
        // nadji zadatak
        $task = Task::find($id);
        $task->name = $request->name;
        $task->description = $request->description;
        $task->date = $request->date;

        //update
        $task->save();
        Session::flash('success', 'Task updated!');

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        Session::flash('success', 'Task deleted!');
        return redirect()->route('task.index');
    }
}
