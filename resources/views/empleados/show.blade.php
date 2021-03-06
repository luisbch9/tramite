@extends('template')

@section('title','Perfil Empleado')

@section('content')

	
	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <div class="text-center">
              <h3 class="panel-title">Perfil de:  {{ $empleado->user->nombre }}</h3>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
            
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre: </td>
                        <td>{{ $empleado->user->nombre }}</td>
                      </tr>
                      <tr>
                        <td>Apellidos: </td>
                        <td>{{ $empleado->user->apellido}}</td>
                      </tr>
                      <tr>
                        <td>DNI:</td>
                        <td>{{ $empleado->user->dni }}</td>
                      </tr>
                      <tr>
                        <td>Cargo:</td>
                        <td>{{ $empleado-> cargo->nombreCargo }}</td>
                      </tr>
                      <tr>
                        <td>Area:</td>
                        <td>{{ $empleado-> area -> nombre }}</td>
                      </tr>
                      <tr>
                        <td> e-mail: </td>
                        <td>{{$empleado -> user-> email}}</td>
                      </tr>
                      <tr>
                        <td> Estado: </td>
                        <td>{{$empleado -> estado-> nombre}}</td>
                      </tr>
                     
                    </tbody>
                  </table>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a href="{{asset('empleados')}}{{'/'.$empleado->id.'/editar'}}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                        <span class="pull-right">
                            <a href="{{asset('empleados')}}{{'/'.$empleado->id.'/eliminar'}}" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>


          </div>
        </div>

@endsection