<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Meeting;
use App\Models\Organization;
use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        $total_organizations = Organization::count();
        $total_active_organizations =  Organization::where('is_active',1)->count();
        $total_inactive_organizations = Organization::where('is_active',0)->count();;
        $total_users = User::count();
        $total_invoices = Invoice::count();
        $total_transactions = Transaction::count();
        $total_meetings = Meeting::count();
        $total_tickets = Ticket::count();
        $total_tickets_opened =  Ticket::where('status',1)->count();
        $total_tickets_closed =  Ticket::where('status',0)->count();
        

        $d1[] = array(
            'total_organizations'=> $total_organizations,
            'total_active_organizations'=> $total_active_organizations,
            'total_inactive_organizations'=> $total_inactive_organizations,
            'total_users'=> $total_users,
            'total_invoices'=> $total_invoices,
            'total_transactions'=> $total_transactions,
            'total_meetings'=> $total_meetings,
            'total_tickets'=> $total_tickets,
            'tickets_opened' => $total_tickets_opened,
            'tickets_closed' => $total_tickets_closed,
        );

        return response([
            'dashboard'=>$d1
        ],200);
    }
}
