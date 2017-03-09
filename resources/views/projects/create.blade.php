@extends('index')
@section('title', 'New Project')

@section('content')
<h2>Add new project</h2>
@foreach ($errors->all() as $error)
    <p style="color: firebrick; font-size: 0.8em;">Warning: {{ $error }}</p>
@endforeach
@if (session("status"))
    <p style="color: steelblue; font-size: 0.9em;">{{ session("status") }}</p>
@endif
<form class="form" action="" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="Project Description">
    </div>
    <br>
    <div class="">
        <label for="">Start Date</label>
        <input type="text" class="form-control date-picker" name="start_date" placeholder="Start date" value="{{ old('start_date') }}">
    </div>
    <br>
    <div class="">
        <label for="">End Date</label>
        <input type="text" class="form-control date-picker" name="end_date" placeholder="End date" value="{{ old('end_date') }}">
    </div>
    <br>
    <div class="">
        <label for="users" style="display: block;">Users</label>
        <select class="" name="users[]" multiple="multiple" id="users">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" style="padding: 5px;">
                    {{ $user->display_name }}
                </option>
            @endforeach
        </select>
    </div>

    <br>
    <div class="">
        <input type="submit" name="submit" value="Save" class="ui-button ui-widget ui-corner-all">
        <a href="" class="ui-button ui-widget ui-corner-all">Back</a>
    </div>
</form>
@endsection
