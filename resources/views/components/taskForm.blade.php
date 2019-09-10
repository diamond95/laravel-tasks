
    {{ Form::label('name', 'Task name', ['class' => 'control-label']) }}
    {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Task name']) }}
    
    {{ Form::label('description', 'Description', ['class' => 'control-label mt-3']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) }}

    {{ Form::label('date', 'Date', ['class' => 'control-label mt-3']) }}
    {{ Form::date('date', null, ['class' => 'form-control']) }}

    <div class="row justify-content-center mt-3">
        <div class="col-sm-4">
            <a href="{{ route('task.index') }}" class="btn btn-block btn-secondary">Go back</a>
        </div>
        <div class="col-sm-4">
            <button class="btn btn-block btn-primary" type="submit">Save task</button>
        </div>
    </div>
