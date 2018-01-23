<?php

namespace App\Http\Controllers;

use App\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  if (Auth::check()) {
         $notes = Notes::all();
         return view('notes.index', compact('notes'));
        // } else {
          //  return 'You have to login first.';
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('notes.create');
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
      //   $notes = Notes::create($request->only('title'),"adasda","fafa");
        $note = new Notes;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->addeby = "test";
        $note->save();
         return redirect(route('notes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {
        //
         return view('notes.edit', compact('note'));
    }

    /**
     * Search for notes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function searchView()
    {
    $search = \Request::get('search'); //<-- we use global request to get the param of URI
 
    $notes = Notes::where('title','like','%'.$search.'%')
        ->orderBy('title')
        ->paginate(20);
            
    return view('notes.searchView', compact('notes'));
    }

        /**
     * Search for notes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function mySearch(Request $request)
    {
        if($request->has('search')){
            $notes = Notes::search($request->get('search'))->get();  
        }else{
            $notes = Notes::get();
        }

        return view('notes.my-search', compact('notes'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {
        //
        $note->title = $request->title;
        $note->content = $request->content;

         $note->update();
         return redirect()->route('notes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        //
         $note->delete();
         return redirect(route('notes.index'));
    }
}
