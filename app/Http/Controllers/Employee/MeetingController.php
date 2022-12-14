<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Meeting;
use App\Models\MeetingParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class MeetingController extends Controller
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
        $meetings = Meeting::orderBy('id','desc')->orWhere('department_id',Auth::user()->department_id)->get();
        return view('employee.meeting.index',compact('meetings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        App::setLocale(auth()->user()->lang);
        return view('employee.meeting.create');
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

        Meeting::create([
            'subject'=>$data['subject'],
            'date'=>$data['date'],
            'start_time'=>$data['start_time'],
            'end_time'=>$data['end_time'],
            'organization_id'=>Auth::user()->organization_id,
            'department_id'=>Auth::user()->department_id,
            'created_by_user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('employee-meeting.index')->with('messageSuccess', 'Acta da Reunião criada com sucesso');
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
        App::setLocale(auth()->user()->lang);
        $meeting = Meeting::find($id);

        $this->authorize('view',$meeting);
        
        $participants = User::where('department_id',Auth::user()->department_id)->where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
        $departments = Department::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();

        $user_participant = $meeting->participants->where('user_id',Auth::user()->id)->first();


        if($user_participant == null){
            $meeting_participant_id = 0;
           
        }else{
            $meeting_participant_id = $user_participant->id;
           
        }

        $days = now()->diffInDays($meeting->created_at);
        
       
        return view('employee.meeting.show',compact('meeting','participants','departments','meeting_participant_id','days'));
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
        // App::setLocale(auth()->user()->lang);
        // $meeting = Meeting::find($id);

        // return view('employee.meeting.edit',compact('meeting'));

       

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
        $data= $request->all();

        $meeting = Meeting::find($id);

        $meeting->update($data);

        return redirect()->route('employee-meeting.index')->with('messageSuccess', 'Acta da Reunião editada com sucesso');

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
    }


    public function download($id)
    {
        $meeting = Meeting::find($id);
        $pdf = Pdf::loadView('employee.meeting.meeting', compact('meeting'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('meeting.pdf');
    }

    public function sendmail(Request $request){

        $data = $request->all();
        $participant = MeetingParticipant::find($data['participant_id']);
        $meeting = Meeting::find($data['meeting_id']);

        $pdf = Pdf::loadView('employee.meeting.meeting', compact('meeting'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);

       
        $msg = "Esta Acta da Reunião criada no dia ".$meeting->created_at->format('d-m-Y')." as ".$meeting->created_at->format('H:i').", enviada para ".$participant->name.". \nEncontre em anexo a Acta da Reunião.";

        // new \App\Mail\MeetingMail($participant,$msg);
        $participant->update([
            'status'=>1
        ]);
        Mail::send(new \App\Mail\MeetingMail($participant,$msg,$pdf));

        return back()->with('messageSuccess','Email enviado com sucesso');
    }
}
