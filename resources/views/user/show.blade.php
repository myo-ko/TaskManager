@extends('index')
@section('title', 'User')

@section('content')
    <form class="simple-form" action="{{ route("UpdateUser", ["id" => $user->id, ]) }}" method="post">
        <h3 class="simple-form-heading">{{ __("User Information") }}</h3>
        @includeIf("shared.result")
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">

        @if ($usernameEditable)
        <label for="username">
            <span>{{ __("Login Name") }} :</span>
            <input type="text" class="input-field" id="username" name="username" value="{{ old('username') ? old('username') : $user->username }}" placeholder="{{ __("Login username") }}" disabled="disabled">
        </label>
        @endif

        <label for="displayName">
            <span>{{ __("Username") }} :</span>
            <input type="text" class="input-field" id="displayName" name="displayName"
                {{ $usernameEditable ? "" : "disabled" }}
                value="{{ old('displayName') ? old('displayName') : $user->display_name  }}"
                placeholder="{{ __("Your username") }}">
        </label>

        <label for="role">
            <span>{{ __("Role") }} :</span>
            <select class="select-field" name="role" id="role" {{ $roleEditable ? "" : "disabled" }}>
                <option value="2" {{ $user->is_admin ? "selected" : "" }}>Admin</option>
                <option value="1" {{ $user->is_admin ? "" : "selected" }}>User</option>
            </select>
        </label>

        <div>
            <input type="submit" name="submit" value="{{ __("Save") }}"
                {{ $usernameEditable || $roleEditable ? "" : "disabled" }}
                class="ui-button ui-widget ui-corner-all">
            <a href="/" class="ui-button ui-widget ui-corner-all">{{ __("Back") }}</a>
        </div>
    </form>
    <br>
    <div class="simple-form">
        <h4 class="simple-form-heading">{{ __("Participated projects") }}</h4>
        <ul class="helveti-list">
            @foreach ($user->projects as $project)
                <li><a href="{{ route("ProjectMilestones", [ 'id' => $project->project_id, ]) }}">{{ $project->description }}
                    <span>{{ $project->start_date->format("Y-m-d") }}&nbsp;{{ __("to") }}&nbsp;{{ $project->end_date->format("Y-m-d") }}</span>
                    <span>[{{ __(":no tasks", ["no" => $project->total_tasks]) }}, {{ __(":percent% Done", ["percent" => $project->percent_done]) }}]</span>
                </a></li>
            @endforeach
        </ul>
    </div>

@endsection
