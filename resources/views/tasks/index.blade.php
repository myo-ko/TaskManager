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
            <input type="checkbox" {{ $task->status ? "checked" : "" }}>
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
@endsection

@section('milestones')
    @includeIf('milestones.list')
@endsection
