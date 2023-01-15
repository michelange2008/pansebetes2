<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Mail\Avis;
use Mail;

use App\Models\Espece;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        dd($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note.note_create',[
          'especes' => Espece::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $note = Note::firstOrCreate([
          'user_id' => auth()->user()->id,
          'note_fond' => $datas['note_fond'],
          'avis_fond' => $datas['avis_fond'],
          'note_forme' => $datas['note_forme'],
          'avis_forme' => $datas['avis_forme'],
          'utilisation' => $datas['utilisation']
        ]);
        foreach ($datas as $key => $value) {
          if(explode("_", $key)[0] == "espece") {
            $note->especes()->attach($value);
          }
        }
        Mail::to(config('mail.contact.address'))
                ->send(new Avis(auth()->user()));

        return view('note.merci');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
