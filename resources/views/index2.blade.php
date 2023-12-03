@extends('layouts.base2')
@section('content')
    <h1>Lista de Tareas</h1>
    <a href="{{ route('create') }}" class="newTask">+</a>
    @if (Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ Session::get('success') }} <br> </strong>
        </div>
    @endif
    <div class="contenedor">
        <ul>
            @foreach ($task as $i)
                <li>
                    <div class="title">
                        @if ($i->status == 'completed')
                            <a class="completed material-symbols-outlined" href="{{route('update_status', [$i->id, 'pending'])}}">check_box</a>
                        @elseif ($i->status == 'in progress')
                            <a class="inProgress material-symbols-outlined" href="{{route('update_status', [$i->id, 'completed'])}}">pending</a>
                        @else
                            <a class="pending material-symbols-outlined" href="{{route('update_status', [$i->id, 'in progress'])}}">check_box_outline_blank</a>
                        @endif

                        @if ($i->status == 'completed')
                            <div class="note note_completed">{{ $i->title }}</div>
                        @else
                            <div class="note">{{ $i->title }}</div>
                        @endif

                        <form action="{{ route('edit', $i->id) }}" method="get" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-edit"><span class="material-symbols-outlined">border_color</span></button>
                        </form>

                        <form action="{{ route('destroy', $i->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-destroy"><span class="material-symbols-outlined">delete</span></button>
                        </form>
                    </div>
                    <div class="linea"></div>
                    <div class="description">{{ $i->description }}</div>
                    <div class="date">{{ $i->date }}</div>
                </li>
            @endforeach

        </ul>

    </div>
@endsection
