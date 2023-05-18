<?php

namespace App\Models;

use App\Models\FacturaCliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{    
    use HasFactory;
    public $table="facturas";

    protected $fillable = [
        'cliente_id',
        'fecha'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(FacturaCliente::class,'cliente_id');
    }
    public function facturaDetalles(): HasMany
    {
        return $this->hasMany(FacturaDetalle::class,'factura_id');
    }
}
