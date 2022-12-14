<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('auth');
        $this->middleware('organization');
    }

    public function index()
    {
        //
        App::setLocale(auth()->user()->lang);
        $tickets = Ticket::orderBy('id','desc')->where('user_id',Auth::user()->id)->get();
        return view('organization.tickets.index', compact('tickets'));

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
        return view('organization.tickets.create');

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
       
        if(request('file')){
            $imagePath = request('file')->store('ticket','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500,500);
            $image->save();
            $imageArray = ['file'=> $imagePath ];
        }
        $request->validate([
            'type_ticket_id' => ['required'],
            'priority' => ['required'],
            'subject' => ['required'],
            'message' => ['required'],
            'file' => ['max:500|mimes:jpeg,png,jpg,gif'],
        ]);


        Ticket::create( array_merge(
            $data,
            $imageArray ?? []
        ));

       

        return redirect()->route('tickets.index')->with('messageSuccess', 'Ticket criado com sucesso'); 
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
        $ticket = Ticket::find($id);

        return view('organization.tickets.show',compact('ticket'));
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
}
