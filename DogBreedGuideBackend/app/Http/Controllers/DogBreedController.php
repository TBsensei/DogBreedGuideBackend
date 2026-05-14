<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DogBreedController extends Controller
{
    // GET /api/groups
    public function getGroups()
    {
        $groups = Group::all();
        return response()->json($groups, 200);
    }

    // GET /api/types
    public function getTypes()
    {
        $types = Type::all();
        return response()->json($types, 200);
    }
    // GET /api/types/:id
    public function show($id)
    {
        // Megkeressük a típust az ID alapján
        $type = Type::find($id);

        // Ha nem létezik ilyen ID-jú kutyafajta, hibát adunk vissza
        if (!$type) {
            return response()->json([
                'message' => 'A kért kutyafajta nem található.'
            ], 404);
        }

        // Ha létezik, visszaadjuk a kutya adatait
        return response()->json($type, 200);
    }
    // POST /api/types
    public function store(Request $request)
    {
        // Összeállítjuk a szabályokat a feladatlap leírása alapján
        $validator = Validator::make($request->all(), [
            'group_id' => 'required|exists:groups,id', // kötelező és léteznie kell a groups táblában
            'name'     => 'required|string|max:50',     // kötelező, max 50 karakter
            'speed'    => 'required|integer|min:1|max:70', // egész szám 1 és 70 között
            'height'   => 'required|integer',           // kötelező egész szám
            'weight'   => 'required|integer|min:1|max:100', // egész szám 1 és 100 között
            'origin'   => 'required|string|max:255',    // kötelező, max 255 karakter
            'lifetime' => 'required|integer|min:1|max:25', // egész szám 1 és 25 között
            'colors'   => 'required|string|max:255',    // kötelező, max 255 karakter
        ]);

        // Ha a validáció elbukott, 400-as vagy 422-es kóddal visszaadjuk a hibákat JSON-ben
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validációs probléma lépett fel.',
                'errors'  => $validator->errors()
            ], 422);
        }

        // Ha az adatok megfelelőek, elmentjük az adatbázisba
        $type = Type::create([
            'group_id' => $request->group_id,
            'name'     => $request->name,
            'speed'    => $request->speed,
            'height'   => $request->height,
            'weight'   => $request->weight,
            'origin'   => $request->origin,
            'lifetime' => $request->lifetime,
            'colors'   => $request->colors,
        ]);

        // 201-es státuszkóddal és Created üzenettel, valamint a mentett objektummal térünk vissza
        return response()->json([
            'message' => 'Created',
            'data'    => $type
        ], 201);
    }
}
