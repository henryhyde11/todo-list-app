<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::query();
        $notes = $notes->latest()->get();

        return response()->json(compact('notes'), 200);
    }

    public function store(StoreNoteRequest $request)
    {
        $note = new Note();
        $note->title = Str::ucfirst($request->title);
        $note->description = Str::ucfirst($request->description);
        $note->category = Str::ucfirst($request->category);
        $note->started_at = $request->started_at;

        // Si el usuario no especifica una fecha de vencimiento se inserta un valor NULL.
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
    }

    public function edit($id)
    {
        $note = Note::find($id);

        return response()->json(compact('note'), 200);
    }

    public function update(StoreNoteRequest $request, Note $note)
    {
        $note->title = Str::ucfirst($request->title);
        $note->description = Str::ucfirst($request->description);
        $note->category = Str::ucfirst($request->category);
        $note->started_at = $request->started_at;

        // Si el usuario no especifica una fecha de vencimiento se inserta un valor NULL.
        $note->finished_at = $request->finished_at;

        if ($request->image != $note->image) {
            $strpos = strpos($request->image, ';');
            $sub = substr($request->image, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . "." . $ex;
            $img = Image::read($request->image)->resize(200, 200);
            $imagenes_path = public_path() . "/imagenes/";

            $image = $imagenes_path . $note->image;
            if (file_exists($image)) {
                @unlink($image);
            }

            $img->save($imagenes_path . $name);
            $note->image = $name;
        } else {
            $note->image = $note->image;
        }

        $note->save();
    }

    public function destroy(Note $note)
    {
        $image_path = public_path() . "/imagenes/";
        $image = $image_path . $note->image;

        if (file_exists($image)) {
            @unlink($image);
        }

        $note->delete();
    }
}
