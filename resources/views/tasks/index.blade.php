@extends('index')
@section('title', 'Tasks')

@section('projects')
    @includeIf('projects.list')
@endsection

@section('tasks')
    <ul class="tasks">
        @if (count($tasks))
        @foreach ($tasks as $task)
        <li class="{{ $task->status ? 'done' : '' }}">
            <input type="checkbox" {{ $task->status ? "checked" : "" }} class="statusToggle" data-id="{{ $task->task_id }}">
            @if ($task->status)
                <s>{{ $task->task_description }}</s>
            @else
                <i>{{ $task->task_description }}</i>
            @endif
            <span>(
                @foreach ($task->users as $user)
                    <a href="#">{{ $user->username }}</a>{{ $loop->last ? "" : "," }}
                @endforeach)
            </span>
        </li>
        @endforeach
        @else
        <li class="alert-text">** No tasks... **</li>
        @endif
    </ul>
    <!-- new task form -->
    <form action="{{ route('TaskStore') }}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="milestone_id" value="{{ $mid }}">
        <input type="text" name="task_description" value="{{ old('task_description') }}" placeholder="description">
        <input type="text" name="start_date" class="form-control date-picker" value="{{ old('start_date') }}" placeholder="start date">
        <input type="text" name="due_date" class="form-control date-picker" value="{{ old('due_date') }}" placeholder="due date">
        <div style="margin: 3px 0px;">
            <select class="" name="users[]" multiple="multiple" id="users">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" style="padding: 5px;">
                        {{ $user->display_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" name="submit" value="Save" class="ui-button ui-widget ui-corner-all">
    </form>
    <!-- end form -->
@endsection

@section('milestones')
    @includeIf('milestones.list')
@endsection
