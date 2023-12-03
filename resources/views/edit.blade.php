@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-12">
            <div>
                <h2>Editar Tarea</h2>
            </div>
            <div>
                <a href="{{ route('index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error al enviar los datos</strong> Asegurese de no dejar campos en blanco..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('update', $task->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Tarea: {{ $task->status }}</strong>
                        <input type="text" name="title" class="form-control" placeholder="{{ $task->title }}"
                            value="{{ $task->title }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px" name="description">{{ $task->description }}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Fecha límite:</strong>
                        <input type="date" name="date" class="form-control" value="{{ $task->date }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                    <div class="form-group">
                        <strong>Estado (inicial):</strong>
                        <select name="status" class="form-select" id="">
                            <option value="">-- Elige el status --</option>
                            <option value="pending" @selected($task->status == 'pending')>Pendiente</option>
                            <option value="in progress" @selected($task->status == 'in progress')>En progreso</option>
                            <option value="completed" @selected($task->status == 'completed')>Completada</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
