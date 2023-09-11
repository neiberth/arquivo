<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    use HasFactory;


    protected $fillable = [
        'num_caixa',
        'status',
        'obs',
        'responsavel',
    ];

        /**
     * Get all of the comments for the caixa
     *
     */
    public function comments()
    {
        return $this->hasMany(Processo::class);
    }
}