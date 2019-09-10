@extends('layouts.main')

@section('title', 'Edit task')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <h1>Edit task</h1>
            {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'PUT']) !!}

                @component('components.taskForm')
                    
                @endcomponent
            {!! Form::close() !!}
        </div>
    </div>
@endsection