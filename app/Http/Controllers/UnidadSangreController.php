<?php
namespace App\Http\Controllers;
use App\Models\UnidadSangre;
use App\Models\Hospital;
use App\Models\Examen;
use Illuminate\Http\Request;

class UnidadSangreController extends Controller
{
    public function index()
    {
        $unidades = UnidadSangre::with(['hospital', 'examenes'])->paginate(5);
        return view('inventario.index', compact('unidades'));
    }

    public function create()
    {
        $hospitales = Hospital::all();
        $examenes = Examen::all();
        return view('inventario.create', compact('hospitales', 'examenes'));
    }

    public function store(Request $request)
    {
        $unidad = UnidadSangre::create($request->all());
        
        // Guardar la relación Muchos a Muchos (Exámenes)
        if ($request->has('examenes')) {
            $unidad->examenes()->attach($request->examenes);
        }
        return redirect()->route('inventario.index');
    }

    public function edit($id)
    {
        $unidad = UnidadSangre::findOrFail($id);
        $hospitales = Hospital::all();
        $examenes = Examen::all();
        return view('inventario.edit', compact('unidad', 'hospitales', 'examenes'));
    }

    public function update(Request $request, $id)
    {
        $unidad = UnidadSangre::findOrFail($id);
        $unidad->update($request->all());
        
        // Actualizar la relación Muchos a Muchos (Exámenes)
        if ($request->has('examenes')) {
            $unidad->examenes()->sync($request->examenes);
        } else {
            $unidad->examenes()->detach(); // Si desmarca todos, se borran
        }
        return redirect()->route('inventario.index');
    }

    public function destroy($id)
    {
        UnidadSangre::destroy($id);
        return redirect()->route('inventario.index');
    }
}