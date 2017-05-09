@extends('index')
@section('title', 'New Project')

@section('content')
@includeIf('shared.result')
<form class="simple-form" action="" method="post">
    <h2 class="simple-form-heading">Add new project</h2>
    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

    <label for="description">
        <span>{{ __("Project Description") }}</span>
        <input type="text" class="input-field" id="description" name="description"
            value="{{ old('description') }}" placeholder="{{ __("Project Description") }}">
    </label>

    <label for="start_date">
        <span>{{ __("Project Start Date") }}</span>
        <input type="text" class="input-field date-picker" id="start_date" name="start_date"
            placeholder="{{ __("start date") }}" value="{{ old('start_date') }}">
    </label>

    <label for="end_date">
        <span>{{ __("Project End Date") }}</span>
        <input type="text" class="input-field date-picker" id="end_date" name="end_date"
            placeholder="{{ __("end date") }}" value="{{ old('end_date') }}">
    </label>

    <label for="users">
        <span>{{ __("Users") }}</span>
        <select class="select-field" name="users[]" multiple="multiple" id="users">
            @foreach ($users as $user)
                <option value="{{ $user->id }}" style="padding: 5px;">
                    {{ $user->display_name }}
                </option>
            @endforeach
        </select>
    </label

    <div class="">
        <input type="submit" name="submit" value="{{ __("Save") }}" class="ui-button ui-widget ui-corner-all">
        <a href="{{ route("Home") }}" class="ui-button ui-widget ui-corner-all">{{ __("Back") }}</a>
    </div>
</form>
@endsection
