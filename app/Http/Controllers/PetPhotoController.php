<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use App\Models\PetPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(UploadedFile $f, $id)
    {
        // Store pet photo in local storage
        $path = $f->store('pet_photos', 'public');

        // Store file info in table through model
        $file            = new PetPhoto();
        $file->hash      = $path;
        $file->name      = $f->getClientOriginalName();
        $file->extension = $f->guessExtension();
        $file->mime      = $f->getMimeType();
        $file->pet_id    = $id;
        $file->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(PetPhoto $petPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PetPhoto $petPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PetPhoto $petPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PetPhoto $petPhoto)
    {
        //
    }
}
