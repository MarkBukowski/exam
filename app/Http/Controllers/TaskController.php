<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Status;
use Validator;
use PDF;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $statuses = Status::all();

        if ($request->status_id) {
            $tasks = Task ::where('status_id', $request->status_id)->get()->sortByDesc("add_date");
            $status_id = $request->status_id;
        }
        else {
            $tasks = Task ::all()->sortByDesc("add_date");
            $status_id = 0;
        }

        return view('task.index', [
            'tasks' => $tasks,
            'statuses' => $statuses,
            'order' => $order ?? '',
            'sort' => $sort ?? '',
            'status_id' => $status_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();
        return view('task.create', ['statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'task_name' => ['required', 'min:3', 'max:32'],
                'task_description' => ['required'],
                'status_id' => ['required', 'integer', 'min:1']
            ],
            [
                'task_name.min' => 'Task name too short. Use 3 or more letters',
                'task_name.max' => 'Task name too long. Use 32 or less letters',
                'task_description' => 'Please add a description',
                'status_id.min' => 'Please select a status',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $task = new Task ;
        $task->name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->status_id = $request->status_id;
        $task->save();
        return redirect()->route('task.index')->with('success_message', 'Task added successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses = Status::all();
        return view('task.edit', ['task' => $task, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(),
            [
                'task_name' => ['required', 'min:3', 'max:32'],
                'task_description' => ['required'],
                'status_id' => ['required', 'integer', 'min:1']
            ],
            [
                'task_name.min' => 'Task name too short. Use 3 or more letters',
                'task_name.max' => 'Task name too long. Use 32 or less letters',
                'task_description' => 'Please add a description',
                'status_id.min' => 'Please select a status',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $task->name = $request->task_name;
        $task->task_description = $request->task_description;
        $task->status_id = $request->status_id;
        $task->save();
        return redirect()->route('task.index')->with('success_message', 'Task info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('success_message', 'Task removed successfully.');
    }

    public function pdf(Task $task) {
        $pdf = PDF::loadView('task.pdf', ['task' => $task]);
        return $pdf->download('task-id'.$task->id.'.pdf');
    }
}
