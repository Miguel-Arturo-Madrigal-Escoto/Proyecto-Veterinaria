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
    public static function update(UploadedFile $f, $id)
    {
        // check if the pet already has a photo
        $pet_photo = PetPhoto::where('pet_id', $id);

        // if pet already has photo
        if ($pet_photo->count() > 0){
            // get the current photo (get first row of possible multiple retrieval)
            $file = $pet_photo->first();

            // TODO: remove the current photo from local storage
            // sRSvTkwRNW5doqvIXOVEGaXEDrrXPcer7Y0ec7IC
            PetPhotoController::destroy($file->hash);

            // store the current photo (get the path)
            $path = $f->store('pet_photos', 'public');

            // update the model in the db
            $file->update([
                'hash'        => $path,
                'name'        => $f->getClientOriginalName(),
                'extension'   => $f->guessExtension(),
                'mime'        => $f->getMimeType(),
                'pet_id'      => $id
            ]);
        }
        // if pet doesn't have photo
        else {
            // so, store the photo with the existing method (only store, not database update)
            PetPhotoController::store($f, $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function destroy(string $path)
    {
        // delete photo from local storage
        Storage::disk('public')->delete($path);
    }
}
