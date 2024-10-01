<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        // $notes = Auth::user()->note;
        // return response()->json($notes);
    }

    public function create()
    {
        //
    }

    public function store(StoreNoteRequest $request)
    {
        $note = new Note();

        $note->title = Str::ucfirst($request->title);
        $note->description = Str::ucfirst($request->description);
        $note->category = Str::ucfirst($request->category);
        $note->started_at = $request->started_at;
        $note->finished_at = $request->finished_at;

        if ($request->image != "") {
            $strpos = strpos($request->image, ';');
            $sub = substr($request->image, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::read($request->image)->resize(200, 200);
            $imagenes_path = public_path() . "/imagenes/";
            $img->save($imagenes_path . $name);
            $note->image = $name;
        } else {
            $note->image = "No image";
        }

        $note->save();

        // return response()->json(['message' => 'Nota creada exitosamente', 'note' => $note]);
    }

    public function show(Note $id)
    {
        // $note = Note::findOrFail($id);
        // return response()->json($note);
    }

    public function edit(Note $note)
    {
        //
    }

    public function update(StoreNoteRequest $request, Note $id)
    {
        // $note = Note::findOrFail($id);
        // $note->title = $request->title;
        // $note->description = $request->description;
        // $note->category_id = $request->category_id;
        // $note->expiration_at = $request->expiration_at;

        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('images', 'public');
        //     $note->image = $imagePath;
        // }

        // $note->save();

        // return response()->json(['message' => 'Nota actualizada', 'note' => $note]);
    }

    public function destroy(Note $id)
    {
        // $note = Note::findOrFail($id);
        // $note->delete();

        // return response()->json(['message' => 'Nota eliminada exitosamente']);
    }
}
