<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\MeetingParticipant;
use App\Models\MeetingTask;
use App\Models\User;
use App\Notifications\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MeetingTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        App::setLocale(auth()->user()->lang);
        $tasks = MeetingTask::orderBy('id','desc')->where('organization_id',Auth::user()->organization_id)->where('department_id',Auth::user()->department_id)->get();
        return view('manager.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $participant = MeetingParticipant::find($data['meeting_participant_id']);

        $request->validate([
            'meeting_participant_id' => ['required'],
            'what' => ['required'],
            'when' => ['required'],
      
        ]);
        MeetingTask::create([
            'meeting_id'=>$data['meeting_id'],
            'organization_id'=>$participant->organization_id,
            'department_id'=>$participant->department_id,
            'employee_id'=>$participant->employee_id,
            'meeting_participant_id'=>$data['meeting_participant_id'],
            'what'=>$data['what'],
            'when'=>$data['when'],
            'status'=>0,

        ]);

        if($participant->user_id != null){
            $user = User::where('id',$participant->user_id)->get();
            $msg = "Foi adicionado uma a seguinte tarefa na reuinião: ".$data['what'];
            Notification::send($user,new Operation($msg));
        }

        return back()->with('messageSuccess','Tarefa adicionada com sucesso');
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
        //
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
        //
        $task = MeetingTask::find($id);
        $data = $request->all();

        $task->update($data);

        return back()->with('messageSuccess','Tarefa editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = MeetingTask::find($id);
    
        $task->delete();
        return back()->with('messageSuccess','Tarefa apagada com sucesso');
    }
}
