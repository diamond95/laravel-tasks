@extends('layouts.main')

@section('title', 'Tasks - Home')



@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-sm-4">
        <a href="{{ route('task.create')}}" class="btn btn-block btn-success">Create new task</a>
        </div>
        
    </div>
    @if ($tasks->count() == 0)
        <p class="lead">Currently there is no any task. Go and create one.</p>
    @else
    @foreach ($tasks as $t)
        <div class="row">
            <div class="col-sm-12">
                <div >
                    <h3>{{ $t->name }}</h3>
                    
                    <h5>{{ $t->description }}</h5>
                    
                    <h4>{{ $t->date }}</h4>
                    
                    {!! Form::open(['route'=> ['task.destroy', $t->id], 'method'=> 'DELETE']) !!}
                        <a href="{{route('task.edit', $t->id) }}" class="btn btn-sm btn-primary">Edit task</a>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    {!! Form::close() !!}
                    <hr />
                    
                </div>
            </div>
        </div>
    @endforeach
    @endif


@endsection