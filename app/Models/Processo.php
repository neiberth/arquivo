<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_siarco',
        'responsavel_processo',
        'posicao',
        'path',
        'corrigir_pdf',
        'caixa_id',
    ];

       /**
     * Get the user that owns the Processo
     *
     */
    public function caixa()
    {
        return $this->belongsTo(Caixa::class);
    }
}
