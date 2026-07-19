<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    protected $fillable = ['nombre_examen'];

    public function unidades() {
        return $this->belongsToMany(UnidadSangre::class);
    }
}