<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\TypeMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TypeMeetingController extends Controller
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
        $type_meeting = TypeMeeting::orderBy('name','asc')->where('organization_id',Auth::user()->organization_id)->get();
        return view('organization.type_meeting.index', compact('type_meeting'));
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
        return view('organization.type_meeting.create');
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

        if(Auth::user()->organization_id == null){

            return redirect()->route('type-meeting.index')->with('messageError', 'Não possível salvar o Departamento. Primeiro termine as configurações da sua organização.');

        }else{

            $data = $request->all();
            $request->validate([
                'name' => ['required'],
            ]);
            TypeMeeting::create([
                'name'=>$data['name'],
                'organization_id'=>Auth::user()->organization_id,
            ]);
            return redirect()->route('type-meeting.index')->with('messageSuccess', 'Tipo de Reunião criado com sucesso');
        }
        
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
        $type_meeting = TypeMeeting::find($id);

        return view('organization.type_meeting.show', compact('type_meeting'));
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
        $type_meeting = TypeMeeting::find($id);
       
        return view('organization.type_meeting.edit', compact('type_meeting'));
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
        $data = $request->all();
        $type_meeting = TypeMeeting::find($id);
       
        
       
            $type_meeting->update($data);
            return redirect()->route('type-meeting.index')->with('messageSuccess', 'Departamento editado com sucesso');
     


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
        $type_meeting = TypeMeeting::find($id);
        $test=  Meeting::where('type_meeting_id',$type_meeting->id)->first();

        if($test==null){
            $type_meeting->delete();
            return redirect()->route('type-meeting.index')->with('messageSuccess', 'Tipo de Reunião apagada com sucesso');
        }else{
            return redirect()->route('type-meeting.index')->with('messageError', 'Erro. Para apagar primeiro elimine reunião associadas a este tipo de reunião.');
        }
       

    }
}
