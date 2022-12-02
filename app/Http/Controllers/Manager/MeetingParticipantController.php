<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\MeetingParticipant;
use App\Models\MeetingTask;
use App\Models\User;
use App\Notifications\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class MeetingParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $meeting = Meeting::find($data['meeting_id']);
        if($data['source']==0){
            return back()->with('messageError','Erro. Escolhe a proveniência do participante.');
        }

        if($data['source']==1){
            $test=  MeetingParticipant::where('user_id',$data['user_id_atual'])->where('meeting_id',$data['meeting_id'])->first();
            if($test == null){
                $user = User::find($data['user_id_atual']);
                MeetingParticipant::create([
                    'meeting_id'=>$data['meeting_id'],
                    'organization_id'=>Auth::user()->organization_id,
                    'department_id'=>Auth::user()->department_id,
                    'user_id'=>$data['user_id_atual'],
                    'employee_id'=>$user->employee_id,
                    'email'=>$user->email,
                    'name'=>$user->name,
                    'obs'=>$data['obs_atual'],
                    'source'=>$data['source_atual'],
                    'email_status'=>0,

                ]);
                $msg = "Foi adicionado como participante em uma reunião no dia ".$meeting->created_at->format('d-m-Y H:i').". <a href='employee-meeting/".$meeting->id."'>Clique aqui para ver <a/>";
                Notification::send($user,new Operation($msg));

                return back()->with('messageSuccess','Participante do departamento adicionado com sucesso');
            }else{
                return back()->with('messageError','Participante do departamento já registrado nesta Reunião');
            }
        }

        if($data['source']==2){

            $test=  MeetingParticipant::where('user_id',$data['user_id_outro'])->where('meeting_id',$data['meeting_id'])->first();
            if($test == null){
                $user = User::find($data['user_id_outro']);
                MeetingParticipant::create([
                    'meeting_id'=>$data['meeting_id'],
                    'organization_id'=>Auth::user()->organization_id,
                    'department_id'=>$data['department_id_outro'],
                    'user_id'=>$data['user_id_outro'],
                    'employee_id'=>$user->employee_id,
                    'email'=>$user->email,
                    'name'=>$user->name,
                    'obs'=>$data['obs_outro'],
                    'source'=>$data['source_outro'],
                    'email_status'=>0,

                ]);

                $msg = "Foi adicionado como participante em uma reunião no dia ".$meeting->created_at->format('d-m-Y H:i').". <a href='employee-meeting/".$meeting->id."'>Clique aqui para ver <a/>";
                Notification::send($user,new Operation($msg));

                return back()->with('messageSuccess','Participante de outro departamento adicionado com sucesso');
            }else{
                return back()->with('messageError','Participante de outro departamento já registrado nesta Reunião');
            }

        }

        if($data['source']==3){

            $test=  MeetingParticipant::where('email',$data['email_guest'])->where('meeting_id',$data['meeting_id'])->first();
            if($test == null){
                
                MeetingParticipant::create([
                    'meeting_id'=>$data['meeting_id'],
                    'email'=>$data['email_guest'],
                    'name'=>$data['name_guest'],
                    'obs'=>$data['obs_guest'],
                    'source'=>$data['source_guest'],
                    'email_status'=>0,

                ]);

                return back()->with('messageSuccess','Participante convidado adicionado com sucesso');
            }else{
                return back()->with('messageError','Participante convidado já registrado nesta Reunião');
            }
        }


        // $test=  MeetingParticipant::where('email',$data['email'])->where('meeting_id',$data['meeting_id'])->first();

        // if($test == null){
        //     MeetingParticipant::create($data);

        //     return back()->with('messageSuccess','Participante adicionado com sucesso');
        // }else{
        //     return back()->with('messageError','Participante já registrado nesta Acta');
        // }
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
        $participant = MeetingParticipant::find($id);
        $data = $request->all();

        $participant->update($data);

        return back()->with('messageSuccess','Participante editado com sucesso');
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
        $participant = MeetingParticipant::find($id);

        $test=  MeetingTask::where('meeting_participant_id',$id)->first();

        if($test == null){
            $participant->delete();
            return back()->with('messageSuccess','Participante apagado com sucesso');
        }else{
            return back()->with('messageError','Existe uma tarefa para este participante, apague a tarefa primeiro e depois o participante.');
        }
    }

    public function getEmployees(Request $request)
    {
        // $data['equipment'] = Employee::where('area_id',Auth::user()->area_id)->where("type_equipment_id",$request->type_equipment_id)->get(["name","id"]);
        $datarequest = $request->all();
        $data['participants'] = User::where('department_id',$request->department_id)->where('organization_id',Auth::user()->organization_id)->where('role_id',4)->orderBy('name','asc')->get();
        
        return response()->json($data);
    }
}
