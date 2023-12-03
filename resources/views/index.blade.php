@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2 class="text-white">Lista de Tareas</h2>
            </div>
            <div>
                <a href="{{route('create')}}" class="btn btn-primary">Crear tarea</a>
            </div>
        </div>

        @if(Session::get("success"))
            <div class="alert alert-success">
                <strong>{{Session::get("success")}} <br> </strong>
            </div>
        @endif

        <div class="col-12 mt-4">
            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>Tarea</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                @foreach ($task as $i)
                <tr>
                    <td class="fw-bold">{{$i->title}}</td>
                    <td>{{$i->description}}</td>
                    <td>
                        {{$i->date}}
                    </td>
                    <td>
                        <span class="badge bg-warning fs-6">{{$i->status}}</span>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Editar</a>

                        <form action="{{route('destroy', $i)}}" method="post" class="d-inline">
                            @csrf
                            @method("delete")
                            {{-- @method('delete') --}}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
