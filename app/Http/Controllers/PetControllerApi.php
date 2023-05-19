<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexPetRequest;
use App\Http\Requests\StorePetApiRequest;
use App\Http\Requests\UpdatePetApiRequest;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class PetControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * For pagination use the following params:
     *
     * per_page: int
     * page: int
     */
    public function index(IndexPetRequest $request)
    {

        try {
            $pets = Pet::paginate($request->query('per_page', 1), ['id', 'dob', 'species', 'race', 'color', 'gender', 'sterilized', 'weight'], 'page', $request->query('page', 1));
            return response()->json($pets);
        } catch (Throwable $e) {
            return response()->json([
                'ok'    => false,
                'error' => 'Please contact the administrator.'
            ], 500);
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetApiRequest $request)
    {
        try {
            $pet = Pet::create([
                'name'       => $request->name,
                'species'    => $request->species,
                'race'       => $request->race,
                'dob'        => Carbon::parse($request->dob),
                'color'      => $request->color,
                'gender'     => $request->gender,
                'sterilized' => $request->sterilized,
                'weight'     => $request->weight,
                'user_id'    => $request->user_id
            ]);

            return response()->json($pet, 201);

        } catch (\Throwable $th) {
            return response()->json([
                'ok'    => false,
                'error' => 'Please contact the administrator.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            # request->route('pet') -> id
            $pet = Pet::find($request->route('pet'), ['id', 'dob', 'species', 'race', 'color', 'gender', 'sterilized', 'weight']);

            if ($pet){
                return response()->json($pet, 201);
            }
            else {
                $id = $request->route('pet');
                return response()->json([
                    'ok' => false,
                    'message' => "The pet with id $id was not found."
                ], 404);
            }


        } catch (\Throwable $th) {
            return response()->json([
                'ok'    => false,
                'error' => 'Please contact the administrator.'
            ], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetApiRequest $request)
    {
        try {
            $pet = Pet::find($request->route('pet'));

            if ($pet){
                $id = $request->route('pet');
                $pet->update($request->all());
                return response()->json([
                    'ok' => true,
                    'message' => "The pet with id $id was updated successfully.",
                    'pet'     => $pet
                ]);
            }
            else {
                $id = $request->route('pet');
                return response()->json([
                    'ok' => false,
                    'message' => "The pet with id $id was not found."
                ], 404);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'ok'    => false,
                'error' => 'Please contact the administrator.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $pet = Pet::find($request->route('pet'));

            if ($pet){
                $id = $request->route('pet');
                $pet->delete();
                return response()->json([
                    'ok' => true,
                    'message' => "The pet with id $id was deleted successfully.",
                    'pet'     => $pet
                ], 200);
            }
            else {
                $id = $request->route('pet');
                return response()->json([
                    'ok' => false,
                    'message' => "The pet with id $id was not found."
                ], 404);
            }

            return response()->json($pet, 201);

        } catch (\Throwable $th) {
            return response()->json([
                'ok'    => false,
                'error' => 'Please contact the administrator.'
            ], 500);
        }
    }
}
