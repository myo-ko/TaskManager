<a href="{{ route("NewProject") }}">{{ __("New Project") }}</a>
<ul>
    @foreach ($projects as $project)
        <li class='{{ isset($pid) && $pid == $project->project_id ? "active" : "" }}'>
            <a href="{{ route('ProjectMilestones', [ 'id' => $project->project_id, ]) }}" class="project-title">{{ $project->description }}</a>
            <div class="due">
                <img src="{{ asset('css/img/due.png') }}" width="16" alt="">
                <time>{{ __("Due") }}: {{ $project->end_date->format('Y-m-d') }} ({{ __(":days days left", ["days" => $project->days_left]) }})</time>
            </div>
            <div class="meta">
                <img src="{{ asset('css/img/users.png') }}" width="16" alt="">
                <a href="#">{{ __(":members members", ["members" => count($project->users)])}}</a>

                <img src="{{ asset('css/img/milestones.png') }}" width="16" alt="">
                <span>{{ __(":no milestones", ["no" => count($project->milestones)]) }}</span>
            </div>
            <div class="progress">
				<span class="bar" style="width: {{ $project->percent_done }}%;"></span>
				<span class="percent">{{ __(":no tasks", ["no" => $project->total_tasks]) }}, {{ __(":percent% Done", ["percent" => $project->percent_done]) }}</span>
			</div>
        </li>
    @endforeach
</ul>
