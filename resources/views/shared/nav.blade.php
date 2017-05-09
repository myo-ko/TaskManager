<div class="header">
    <h1>{{ __("Task Manager") }}</h1>
    <div>
        <a href="{{ route("ShowUser", ["id" => Auth::id(), ]) }}">{{ __("Profile") }}</a> |
        <a href="{{ route("Home") }}">{{ __("Project List") }}</a> |
        <a href="{{ route("Logout") }}">Logout</a>
        <form method="POST" action="{{ route('LANG_CHANGE') }}" id="LangChangeForm" class="widget" style="margin-top: 5px;">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <label for="radio-1" class="checkboxradiolabel">EN</label>
            <input type="radio" name="radio-1" id="radio-1" class="checkboxradio" value="en" {{ App::isLocale('en') ? "checked" : "" }}>
            <label for="radio-2" class="checkboxradiolabel">MM</label>
            <input type="radio" name="radio-1" id="radio-2" class="checkboxradio" value="mm" {{ App::isLocale('mm') ? "checked" : "" }}>
        </form>
    </div>
</div>
