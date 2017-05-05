@extends('index')
@section('title', 'New Project')

@section('content')
<h2>Add new project</h2>
@includeIf('shared.result')
<form class="form" action="" method="post" style="font-size: 14px;">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="">
        <label for="">{{ __("Project Description") }}</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}" placeholder="{{ __("Project Description") }}">
    </div>
    <br>
    <div class="">
        <label for="">{{ __("Project Start Date") }}</label>
        <input type="text" class="form-control date-picker" name="start_date" placeholder="{{ __("start date") }}" value="{{ old('start_date') }}">
    </div>
    <br>
    <div class="">
        <label for="">{{ __("Project End Date") }}</label>
        <input type="text" class="form-control date-picker" name="end_date" placeholder="{{ __("end date") }}" value="{{ old('end_date') }}">
    </div>
    <br>
    <div class="">
        <label for="users" style="display: block;">{{ __("Users") }}</label>
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
        <input type="submit" name="submit" value="{{ __("Save") }}" class="ui-button ui-widget ui-corner-all">
        <a href="/" class="ui-button ui-widget ui-corner-all">{{ __("Back") }}</a>
    </div>
</form>
@endsection
