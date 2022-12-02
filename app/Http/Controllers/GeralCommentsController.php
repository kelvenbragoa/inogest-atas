<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\GeralComments;
use Illuminate\Http\Request;

class GeralCommentsController extends Controller
{

  
    public function __construct(){;
        $this->middleware('auth');
    }
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

        Comments::create($data);

        return back()->with('messageSuccess', 'Comentário adicionado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeralComments  $geralCommentsController
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeralComments  $geralCommentsController
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
     * @param  \App\Models\GeralCommentsController  $geralCommentsController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $comment = Comments::find($id);
        $data = $request->all();

        $comment->update($data);

        return back()->with('messageSuccess','Comentário respondido com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeralCommentsController  $geralCommentsController
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
