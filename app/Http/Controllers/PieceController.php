<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieceController extends Controller
{
    public function index()
    {
        $pieces = Piece::get()->toArray();
        return $pieces;
    }
    public function store(Request $request)
    {
        $piece = new Piece([
            'titre' => $request->input('titre'),
            'flyer' => $request->input('flyer')
        ]);
        $piece->save();
        return response()->json('Piece créé !');
    }
    public function show($id)
    {
        $piece = Piece::find($id);
        return response()->json($piece);
    }
    public function update($id, Request $request)
    {
        $piece = Piece::find($id);
        $piece->update($request->all());
        return response()->json($piece);
    }
    public function destroy($id)
    {
        $piece = Piece::find($id);
        if (!$piece) {
            return response()->json(['message' => 'Piece not found'], 404);
        }
        DB::table('Pieces')->where('id', $piece->id)->delete();
        $piece->delete();
        return response()->json(['message' => 'Piece deleted successfully']);
    }
}
