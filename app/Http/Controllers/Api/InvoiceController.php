<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //

    public function index(){
        return response([
            'invoice'=>  Invoice::with('organization:id,name,email,is_active')->with('transaction:id,reference,amount,invoice_id,method,created_at')->orderBy('id','desc')->get()
        ],200);
    }
}
