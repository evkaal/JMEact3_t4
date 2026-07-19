<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnidadSangre extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_sanguineo', 'volumen_ml', 'fecha_extraccion', 'estado', 'hospital_id'];

    // Relación 1:N (Pertenece a un Hospital)
    public function hospital() {
        return $this->belongsTo(Hospital::class);
    }
    // Relación N:M (Tiene muchos Exámenes)
    public function examenes() {
        return $this->belongsToMany(Examen::class);
    }
}