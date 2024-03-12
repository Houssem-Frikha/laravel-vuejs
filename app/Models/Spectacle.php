<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'idpiece',
        'idsalle',
        'datespectacle'
    ];
    
    public function piece()
    {
        return $this->belongsTo(Piece::class, 'idpiece');
    }

    public function Salle()
    {
        return $this->belongsTo(Salle::class, 'idsalle');
    }
}
