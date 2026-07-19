<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['nombre'];
    
    public function unidades() {
        return $this->hasMany(UnidadSangre::class);
    }
}