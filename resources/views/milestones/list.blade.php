
<h2 class="late">Late Milestones</h2>
@if (count($dueMilestones))
<ol class="overdue">
    @foreach($dueMilestones as $dueMilestone)
        <li class="{{ isset($mid) && $mid == $dueMilestone->milestone_id ? 'open' : '' }}">
            <a href="{{ route('MilestoneTasks', [ 'id' => $dueMilestone->milestone_id, ]) }}">{{ $dueMilestone->ms_description }}</a>
            <time>Due: {{ $dueMilestone->due_date->format('Y-m-d') }}<b> ({{ $dueMilestone->late_days }} days ago)</b></time>
            @if (isset($mid) && $mid == $dueMilestone->milestone_id)
                @yield('tasks')
            @endif
        </li>
    @endforeach
</ol>
@else
<p class="alert-text">** Hooray! No late milestone... **</p>
@endif
<div class="hr"></div>

<h2 class="upcoming">Upcoming Milestones</h2>
@if (count($milestones))
<ol>
    @foreach ($milestones as $milestone)
        <li class="{{ isset($mid) && $mid == $milestone->milestone_id ? 'open' : '' }}">
            <a href="{{ route('MilestoneTasks', [ 'id' => $milestone->milestone_id, ]) }}">{{ $milestone->ms_description }}</a>
            <time>Due: {{ $milestone->due_date->format('Y-m-d') }}</time>
            @if (isset($mid) && $mid == $milestone->milestone_id)
                @yield('tasks')
            @endif
        </li>
    @endforeach

    <!-- <li class="open">
        <a href="#">Amet dignissimos optio sit facilis aut quod.</a>
        <time>Due: 2016-12-9</time>
        <ul class="tasks">
            <li>
                <input type="checkbox">
                <i>Something to do</i>
                <span>(<a href="#">Alice</a>, <a href="#">Bob</a>)</span>
            </li>
            <li>
                <input type="checkbox">
                <i>Another thing to do</i>
                <span>(<a href="#">Bob</a>)</span>
            </li>
            <li>
                <input type="checkbox">
                <i>Yet another thing to do</i>
                <span>(<a href="#">Alice</a>)</span>
            </li>
            <li class="done">
                <input type="checkbox" checked>
                <s>More thing to do</s>
                <span>(<a href="#">Alice</a>, <a href="#">Bob</a>)</span>
            </li>
        </ul>
        <form action="">
            <input type="text"><button>+</button>
        </form>
    </li> -->

</ol>
@else
<p class="alert-text">** No milestone yet... **</p>
@endif
<div class="hr"></div>

<h2 class="new">New Milestone</h2>
@includeIf('shared.result')
<form class="" action="{{ route('MilestoneStore') }}" method="post">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <input type="hidden" name="project_id" value="{{ $pid }}" />
    <input type="text" name="ms_description" value="{{ old('description') }}" placeholder="Milestone description" >
    <input type="text" class="form-control date-picker" name="start_date" placeholder="Start date" value="{{ old('start_date') }}">
    <input type="text" class="form-control date-picker" name="due_date" placeholder="Due date" value="{{ old('due_date') }}">
    <input type="submit" name="submit" value="Save" class="ui-button ui-widget ui-corner-all">
</form>
