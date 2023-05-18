<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    use HasFactory;
    public $table="facturadetalles";

    protected $fillable = [
        'factura_id',
        'producto',
        'cantidad',
        'preciounitario'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
