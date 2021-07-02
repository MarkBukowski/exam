<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Validator;

class StatusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', ['statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status.create');
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
                'status_name' => ['required', 'min:3', 'max:16'],
            ],
            [
                'status_name.min' => 'Task name too short. Use 3 or more letters',
                'status_name.max' => 'Task name too long. Use 16 or less letters',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $status = new Status;
        $status->name = $request->status_name;
        $status->save();
        return redirect()->route('status.index')->with('success_message', 'Status added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $status->name = $request->status_name;
        $status->save();
        return redirect()->route('status.index')->with('success_message', 'Status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        if($status->statusTasks->count()) {
            return redirect()->route('status.index')->with('info_message', 'Cannot delete, has active tasks');
        }
        $status->delete();
        return redirect()->route('status.index')->with('success_message', 'Status removed successfully.');
    }
}
