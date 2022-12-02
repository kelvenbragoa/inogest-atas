<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale(auth()->user()->lang);

        //
        $department = Department::orderBy('name','asc')->where('organization_id',Auth::user()->organization_id)->get();
        return view('organization.department.index', compact('department'));
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

        return view('organization.department.create');
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



        if(Auth::user()->organization_id == null){

            return redirect()->route('department.index')->with('messageError', 'Não possível salvar o Departamento. Primeiro termine as configurações da sua organização.');

        }else{

            $data = $request->all();
            $request->validate([
                'name' => ['required'],
            ]);
            Department::create([
                'name'=>$data['name'],
                'organization_id'=>Auth::user()->organization_id,
            ]);
            return redirect()->route('department.index')->with('messageSuccess', 'Departamento criado com sucesso');
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

        $department = Department::find($id);

        return view('organization.department.show', compact('department'));
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

        $department = Department::find($id);
        $employee = Employee::where('department_id',$department->id)->where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
        return view('organization.department.edit', compact('department','employee'));
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
        $department = Department::find($id);
        
        if($department->user_id == null){
            $new_user1 = User::where('employee_id',$data['user_id'])->first();
            $new_user1->update([
                'role_id'=>3
            ]);
            $department->update($data);
            return redirect()->route('department.index')->with('messageSuccess', 'Departamento editado com sucesso');
        }

        if($department->user_id == $data['user_id']){
            $new_user2 = User::where('employee_id',$data['user_id'])->first();
            $new_user2->update([
                'role_id'=>3
            ]);
            $department->update($data);
            return redirect()->route('department.index')->with('messageSuccess', 'Departamento editado com sucesso');
        }

        if($department->user_id != $data['user_id']){

            $actual_user = User::where('employee_id',$department->user_id)->first();
            $new_user = User::where('employee_id',$data['user_id'])->first();

            $actual_user->update([
                'role_id'=>4
            ]);

            $new_user->update([
                'role_id'=>3
            ]);
            $department->update($data);
            return redirect()->route('department.index')->with('messageSuccess', 'Departamento editado com sucesso');
        }
        


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
        $department = Department::find($id);

        $test1=  Employee::where('department_id',$department->id)->first();
        $test2=  Meeting::where('department_id',$department->id)->first();

        if($test1 != null){
            return redirect()->route('department.index')->with('messageError', 'Erro ao eliminar. Primeiro elimine todos funcionários relacionados ao departamento');  
        }
        
        if($test2 != null){
            return redirect()->route('department.index')->with('messageError', 'Erro ao eliminar. Primeiro elimine todas reuniões relacionadas ao departamento');
        }

        $department->delete();
        return redirect()->route('department.index')->with('messageSuccess', 'Departamento apagado com sucesso');  


    }
}
