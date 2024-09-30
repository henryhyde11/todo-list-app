<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Auth::user()->note;
        return response()->json($notes);
    }

    public function create()
    {
        //
    }

    public function store(StoreNoteRequest $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->description = $request->description;
        $note->category_id = $request->category_id;
        $note->expiration_at = $request->expiration_at;
        $note->user_id = Auth::id();

        if ($request->hasFile('image_uri')) {
            $imagePath = $request->file('image_uri')->store('images', 'public');
            $note->image_uri = $imagePath;
        }

        $note->save();

        return response()->json(['message' => 'Nota creada exitosamente', 'note' => $note]);
    }

    public function show(Note $id)
    {
        $note = Note::findOrFail($id);
        return response()->json($note);
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(StoreNoteRequest $request, Note $id)
    {
        $note = Note::findOrFail($id);
        $note->title = $request->title;
        $note->description = $request->description;
        $note->category_id = $request->category_id;
        $note->expiration_at = $request->expiration_at;

        if ($request->hasFile('image_uri')) {
            $imagePath = $request->file('image_uri')->store('images', 'public');
            $note->image = $imagePath;
        }

        $note->save();

        return response()->json(['message' => 'Nota actualizada', 'note' => $note]);
    }

    public function destroy(Note $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();

        return response()->json(['message' => 'Nota eliminada exitosamente']);
    }
}
