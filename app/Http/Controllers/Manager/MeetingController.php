<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Department;
use App\Models\Meeting;
use App\Models\MeetingAttachment;
use App\Models\MeetingParticipant;
use App\Models\MeetingTask;
use App\Models\TypeMeeting;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $meetings = Meeting::orderBy('id','desc')->where('department_id',Auth::user()->department_id)->get();
        return view('manager.meeting.index',compact('meetings'));
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
        $type_meeting = TypeMeeting::where('organization_id',Auth::user()->organization_id)->get();
        return view('manager.meeting.create',compact('type_meeting'));
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
        App::setLocale(auth()->user()->lang);
        $data = $request->all();
        $request->validate([
            'subject' => ['required'],
            'date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'type_meeting_id' => ['required'],
        ]);


        Meeting::create([
            'subject'=>$data['subject'],
            'date'=>$data['date'],
            'start_time'=>$data['start_time'],
            'type_meeting_id'=>$data['type_meeting_id'],
            'end_time'=>$data['end_time'],
            'organization_id'=>Auth::user()->organization_id,
            'department_id'=>Auth::user()->department_id,
            'created_by_user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('manager-meeting.index')->with('messageSuccess', 'Acta da Reunião criada com sucesso');
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
        $participants = User::where('department_id',Auth::user()->department_id)->where('organization_id',Auth::user()->organization_id)->where('role_id',4)->orderBy('name','asc')->get();
        $departments = Department::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();

       
        return view('manager.meeting.show',compact('meeting','participants','departments'));
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
        App::setLocale(auth()->user()->lang);
        $meeting = Meeting::find($id);


        return view('manager.meeting.edit',compact('meeting'));
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

        $files = $request->file('attachment');

       

        $meeting = Meeting::find($id);
        $allowedfileExtension=['pdf'];

        if($request->has('attachment')){
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                $imagePath = $file->store('meeting-attachment','public');
                $imageArray = ['image'=> $imagePath ];

                if($check){
                    MeetingAttachment::create([

                        'attachment' => $imagePath,
                        'meeting_id' => $meeting->id,
    
                    ]);
                }else{
                    return redirect()->route('manager-meeting.index')->with('messageError', 'Erro ao carregar o anexo. Apenas permitido arquivo .pdf');
                }
                
               

            }
        }

        $meeting->update([
            'date'=>$data['date'],
            'subject'=>$data['subject'],
            'body'=>$data['body'],
            'start_time'=>$data['start_time'],
            'end_time'=>$data['end_time'],


        ]);

        return redirect()->route('manager-meeting.index')->with('messageSuccess', 'Acta da Reunião editada com sucesso');
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
        $meeting = Meeting::find($id);

        $meeting_participants = MeetingParticipant::where('meeting_id',$id)->get();
        $comments = Comments::where('meeting_id',$id)->get();
        $meeting_tasks = MeetingTask::where('meeting_id',$id)->get();

        foreach($meeting_participants as $item){
            $item->delete();
        }

        foreach($comments as $item){
            $item->delete();
        }

        foreach($meeting_tasks as $item){
            $item->delete();
        }

        $meeting->delete();

        return back()->with('messageSuccess','Reunião apagada com sucesso');
    }


    public function download($id)
    {
        $meeting = Meeting::find($id);
        $pdf = Pdf::loadView('manager.meeting.meeting', compact('meeting'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);
        return $pdf->setPaper('a4')->stream('meeting.pdf');
    }

    public function sendmail(Request $request){

        $data = $request->all();
        $participant = MeetingParticipant::find($data['participant_id']);
        $meeting = Meeting::find($data['meeting_id']);

        $pdf = Pdf::loadView('manager.meeting.meeting', compact('meeting'))->setOptions([
            'defaultFont' => 'sans-serif',
            'isRemoteEnabled' => 'true'
        ]);

       
        $msg = "Esta Acta da Reunião criada no dia ".$meeting->created_at->format('d-m-Y')." as ".$meeting->created_at->format('H:i').", enviada para ".$participant->name.". \nEncontre em anexo a Acta da Reunião.";

        // new \App\Mail\MeetingMail($participant,$msg);
        $participant->update([
            'email_status'=>1
        ]);
        Mail::send(new \App\Mail\MeetingMail($participant,$msg,$pdf));

        return back()->with('messageSuccess','Email enviado com sucesso');
    }
}
