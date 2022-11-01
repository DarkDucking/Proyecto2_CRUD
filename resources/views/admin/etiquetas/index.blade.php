@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.etiquetas.create')}}">Nueva etiqueta</a>

    <h1>Mostrar detalles de etiquetas</h1>  
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert bg-secondary">
            <strong>{{session('info')}}</strong>

        </div>
    @endif
    
   <div class= "card">
        <div class= "card-body">   
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan= "2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etiquetas as $etiqueta)
                        <tr > 
                            <td>{{$etiqueta->id}}</td>
                            <td>{{$etiqueta->name}}</td>
                            <td width="10px"> <a class= "btn btn-primary btn-sm" href = "{{route('admin.etiquetas.edit',$etiqueta)}}">Editar</a></td>
                            <td width="10px"> <form action="{{route('admin.etiquetas.destroy', $etiqueta)}}" method="POST">
                            @csrf    
                            @method('delete')
                            <button type= "submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>    
                        </td>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>


@stop