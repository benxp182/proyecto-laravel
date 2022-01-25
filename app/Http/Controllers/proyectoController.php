<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consult;

class proyectoController extends Controller
{
    //index para mostrar tosos los elementos
    //store para guardar un todo
    //update para actualizar todo
    //destroy para eliminar todo
    //edit para mostar el formulario de edicion

    //guarda las consultas 
    public function store(Request $request){
        //validacion
        $request->validate([
            'num' => 'required|min:1'
        ]);
        //crear objeto
        $consu = new consult;
        //asignacion de valores
        $consu-> num = $request->num;
        $consu->save();
        //redireccionamiento con with que es el mensaje que se muestra
        return redirect()->route('Consult')->with('success','consulta generada');
    }
    //crea vista para las consultas generadas
    public function index(){
        $consul = consult::all();
        return view('index', ['consul'=>$consul]);
        dd($consul);
    }

    public function show($id){
        $consu = consult::find($id);
        return view('show', ['consu'=>$consu]);
    }
    public function update(Request $request, $id){
        $consu = consult::find($id);
        $consu-> num = $request->num;
        $consu->save();

        return redirect()->route('Consult')->with('success','Registro actualizado');
        //dd($request);
    }
    public function destroy($id){
        $consu = consult::find($id);
        $consu->delete();
       
        return redirect()->route('Consult')->with('success','Registro eliminado');
    }

}
