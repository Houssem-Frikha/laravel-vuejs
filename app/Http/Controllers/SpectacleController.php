<?php

namespace App\Http\Controllers;

use App\Models\Spectacle;
use Illuminate\Http\Request;

class SpectacleController extends Controller
{
    public function store(Request $request)
    {
        $Spectacle = new Spectacle([
            'idpiece' => $request->input('idpiece'),
            'idsalle' => $request->input('idsalle'),
            'datespectacle' => $request->input('datespectacle')
        ]);
        $Spectacle->save();
        return response()->json('Spectacle créé !');
    }
}
