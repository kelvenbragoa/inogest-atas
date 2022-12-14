<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MeetingParticipant;
use App\Models\MeetingTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $employee = Employee::orderBy('name','asc')->where('organization_id',Auth::user()->organization_id)->get();
        return view('organization.employee.index', compact('employee'));
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
        $departments = Department::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
        return view('organization.employee.create',compact('departments'));
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

            return redirect()->route('employee.index')->with('messageError', 'Não possível salvar o Funcionário. Primeiro termine as configurações da sua organização.');

        }else{
            $data = $request->all();
            $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'mobile' => ['required'],
                'department_id' => ['required'],
            ]);

            $test=  User::where('email',$data['email'])->first();
            
            if($test == null){

                $employee = Employee::create([
                    'name'=>$data['name'],
                    'email'=>$data['email'],
                    'mobile'=>$data['mobile'],
                    'department_id'=>$data['department_id'],
                    'is_deleted'=>0,
                    'organization_id'=>Auth::user()->organization_id,
                ]);

                User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'role_id' => 4,
                    'full_access' => 0,
                    'employee_id' => $employee->id,
                    'organization_id'=>Auth::user()->organization_id,
                    'department_id'=>$data['department_id'],
                    'is_active' => 1,
                    'is_deleted' => 0,
                    'lang' => 'en',
                    'password' => Hash::make($data['email']),
                ]);

                return redirect()->route('employee.index')->with('messageSuccess', 'Funcionário criado com sucesso');

            }else{
                return redirect()->route('employee.index')->with('messageError', 'Erro ao registrar. Já existe um email associado. Escolhe um outro email');
            }

            
            
            
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
        $employee = Employee::find($id);
        $this->authorize('vieworganization',$employee);
        $task_done = MeetingTask::where('employee_id',$id)->where('status',1)->get();
        $task_not_done = MeetingTask::where('employee_id',$id)->where('status',0)->get();

        return view('organization.employee.show', compact('employee','task_done','task_not_done'));
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
        $employee = Employee::find($id);
        $this->authorize('vieworganization',$employee);
        $departments = Department::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
        return view('organization.employee.edit', compact('employee','departments'));
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
        $employee = Employee::find($id);

        $employee->update($data);
        return redirect()->route('employee.index')->with('messageSuccess', 'Funcionário editado com sucesso');


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
        $employee = Employee::find($id);
        $user = User::where('employee_id',$id)->first();

        $test1=  MeetingParticipant::where('user_id',$user->id)->first();
        $test2=  MeetingTask::where('employee_id',$employee->id)->first();

        if($test1 != null){
            return redirect()->route('employee.index')->with('messageError', 'Erro ao eliminar. Primeiro elimine todas participações deste funcionário em todas reuniões.');  
        }
        if($test2 != null){
            return redirect()->route('employee.index')->with('messageError', 'Erro ao eliminar. Primeiro elimine todas tarefas deste funcionário em todas reuniões.');  
        }

        $comments = Comments::where('user_id',$user->id)->get();

        foreach($comments as $item){
            $item->delete();
        }

        // if($employee->is_deleted ==1){
        //     $employee->update([
        //         'is_deleted'=>0
        //     ]);
        // }else{
        //     $employee->update([
        //         'is_deleted'=>1
        //     ]);
        // }

        $employee->delete();
        $user->delete();

       

        return redirect()->route('employee.index')->with('messageSuccess', 'Funcionário foi apagado com sucesso');
    }
}
