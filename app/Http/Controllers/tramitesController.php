<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Area;
use App\Tramite;
use App\Empleado;
use App\TipoTramite;
use App\TipoDocumento;
use App\EstadoTramite;
use App\Documento;
use App\User;
use App\Movimiento; 



class tramitesController extends Controller
{
    //
    public function create(Request $datos)
    {
        //-----------------------------codigo para generar bd
        /*
        $area=new Area;
        $area->nombre='Mesa de Partes';
        $area->descripcion='Descripcion';
        $area->save();

        $area2=new Area;
        $area2->nombre='Gerencia';
        $area2->descripcion='Descripcion';
        $area2->save();        

        $tipo=new TipoTramite;
        $tipo->nombre='solicitud';
        $tipo->descripcion='descripcion';
        $tipo->save();

        $tipo2=new TipoTramite;
        $tipo2->nombre='reclamo';
        $tipo2->descripcion='descripcion';
        $tipo2->save();        
        

        $estado=new EstadoTramite;
        $estado->nombre='iniciado';
        $estado->descripcion='descripcion';
        $estado->save();    
        */        
        
        //obtenemos a la persona dado un dni
        $persona=User::all()->where('dni',$datos->dni)->first();
        //obtenemos el area dado su nombre

        $area_destino= Area::find($datos->destino);
        //obtenemos el estado inicial
        //-----------------------FALTA MODIFICAR ESTO
        $estado=EstadoTramite::all()->where('id',1)->first();

        //-----------------------AQUI FALTA EL AREA DE MESA DE PARTES
        $id_mesa=1;
        $mesa_de_partes= Area::find($id_mesa);

        //obtenemos el tipo de tramite dado su nombre
        $tipo_tramite= TipoTramite::find($datos->tipoTramite);
        //asunto y prioridad
        $asunto= $datos->asunto;
        $prioridad= $datos->prioridad;
        
    

        //crear Tramite;
        $tramite=new Tramite;
        $tramite->prioridad=$prioridad;
        $tramite->asunto=$asunto;
        $tramite->area()->associate($area_destino);
        $tramite->tipoTramite()->associate($tipo_tramite);
        $tramite->persona()->associate($persona);
        $tramite->estado()->associate($estado);
        $tramite->save();

        //crear movimiento
    
        
    
    
        $tiposDocumentos=TipoDocumento::all();
        $nro_expediente=$tramite->id;
        
        return view('tramites.subir',["tiposDocumentos"=>$tiposDocumentos,"nro_expediente"=>$nro_expediente]);
    }

    public function createGet(){
        
        $tipoTramites = TipoTramite::all();
        $areas= Area::all()->where('area_id',NULL);

        return view('tramites.crear',["tipos"=>$tipoTramites,"areas"=>$areas]);
        
    }

    public function subirDocumento(Request $datos)
    {
        /*
        $tipoDoc=TipoDocumento->find($datos->tipoDoc);
        $tramite=Tramite::find($datos->numExp);


        $doc= new Documento;
        $doc->nombre=$datos->nomDoc;
        $doc->nombre_archivo=$datos->archivo;
        $doc->entregado=0;
        $doc->virtual=$datos->checkbox;
        $doc->tipoDocumento()->associate($tipoDoc);
        $doc->tramite()->associate($tramite);
        */
        //return view('tramites.subir');
        
    }

    public function todos()
    {
        $tramites = Tramite::all();
        return response()->json($tramites);
    }

    
}
