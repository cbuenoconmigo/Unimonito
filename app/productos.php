<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    use SoftDeletes;
    protected $table = "productos";
    protected $fillable = ['idproductos', 'nombre', 'precio', 'fechacompra', 'idlocalidad', 'idtipoproducto', 'stock', 'idproveedor'];

    public function detallesVenta()
    {
        return $this->hasOne('App\detalles_venta', 'idproductos', 'idproducto');
    }
}
