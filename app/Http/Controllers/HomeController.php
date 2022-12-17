<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Invoice;
use App\Models\Meeting;
use App\Models\MeetingTask;
use App\Models\Organization;
use App\Models\Ticket;
use App\Models\TypeMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    public function __construct()
    {
        $this->middleware('auth');
      
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        App::setLocale(auth()->user()->lang);

        if(Auth::user()->role_id == 1){
            return view('admin.index');
        }

        if(Auth::user()->role_id == 2){
            
           
            $departments = Department::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
            $employees = Employee::where('organization_id',Auth::user()->organization_id)->get();
            $type_meetings = TypeMeeting::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
            $meetings = Meeting::where('organization_id',Auth::user()->organization_id)->get();
            $tickets = Ticket::where('user_id',Auth::user()->id)->where('status',1)->get();
            $invoice = Invoice::where('organization_id',Auth::user()->organization_id)->where('status',0)->get();
            $tasks = MeetingTask::where('organization_id',Auth::user()->organization_id)->orderBy('id','desc')->limit(10)->get();
            $organization = Organization::find(Auth::user()->organization_id);
            $data_bar = [];
            $task_done = [];
            $task_not_done = [];

            $data_meeting = [];
            $data_meeting_count = [];

            foreach($departments as $item){
                $data_bar[]=$item->name;
                $task_done[]=count($item->task_done);
                $task_not_done[]=count($item->task_not_done);
            }

            foreach($type_meetings as $item){
                $data_meeting[]=$item->name;
                $data_meeting_count[]=count($item->meeting);
                
            }


            // dd($data_bar,$task_done,$task_not_done);
           

            
        
            return view('organization.index',compact('departments','employees','type_meetings','meetings','data_bar','task_done','task_not_done','data_meeting','data_meeting_count','tasks','invoice','tickets','organization'));
        }

        if(Auth::user()->role_id == 3){
            $employees = Employee::where('organization_id',Auth::user()->organization_id)->where('department_id',Auth::user()->department_id)->get();
            $type_meetings = TypeMeeting::where('organization_id',Auth::user()->organization_id)->orderBy('name','asc')->get();
            $meetings = Meeting::where('organization_id',Auth::user()->organization_id)->where('department_id',Auth::user()->department_id)->get();
            $tickets = Ticket::where('user_id',Auth::user()->id)->where('status',1)->get();
            $department = Department::find(Auth::user()->department_id);
            $tasks = MeetingTask::where('organization_id',Auth::user()->organization_id)->where('department_id',Auth::user()->department_id)->orderBy('id','desc')->limit(10)->get();
            $data_meeting = [];
            $data_meeting_count = [];
            foreach($type_meetings as $item){
                $data_meeting[]=$item->name;
                $data_meeting_count[]=count($item->meeting);
                
            }

            return view('manager.index',compact('meetings','data_meeting','data_meeting_count','employees','department','tasks','tickets'));
        }

        if(Auth::user()->role_id == 4){

            $employee = Employee::find(Auth::user()->employee_id);
            $tickets = Ticket::where('user_id',Auth::user()->id)->where('status',1)->get();
            $task_done = MeetingTask::where('employee_id',Auth::user()->employee_id)->where('status',1)->get();
            $task_not_done = MeetingTask::where('employee_id',Auth::user()->employee_id)->where('status',0)->get();
            $tasks = MeetingTask::where('organization_id',Auth::user()->organization_id)->where('department_id',Auth::user()->department_id)->where('employee_id',Auth::user()->employee_id)->orderBy('id','desc')->limit(10)->get();
            return view('employee.index',compact('employee','task_done','task_not_done','tasks','tickets'));
        }
        
    }
}
