@extends('index')
@section('title', 'Tasks')

@section('projects')
    @includeIf('projects.list')
@endsection

@section('milestones')
    @includeIf('milestones.list')
@endsection

@section('tasks')
    blah blah blah
    <ul class="tasks">
        <li>Task</li>
    </ul>
@overwrite
