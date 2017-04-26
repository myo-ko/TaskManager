<ul>
    @foreach ($projects as $project)
        <li class='{{ isset($pid) && $pid == $project->project_id ? "active" : "" }}'>
            <a href="{{ route('ProjectMilestones', [ 'id' => $project->project_id, ]) }}" class="project-title">{{ $project->description }}</a>
            <div class="due">
                <img src="{{ asset('css/img/due.png') }}" width="16" alt="">
                <time>Due: {{ $project->end_date->format('Y-m-d') }} ({{ $project->days_left }} days left)</time>
            </div>
            <div class="meta">
                <img src="{{ asset('css/img/users.png') }}" width="16" alt="">
                <a href="#">{{ count($project->users) }} members</a>

                <img src="{{ asset('css/img/milestones.png') }}" width="16" alt="">
                <span>{{ count($project->milestones) }} milestones</span>
            </div>
            <div class="progress">
				<span class="bar" style="width: {{ $project->percent_done }}%;"></span>
				<span class="percent">{{ $project->total_tasks }} tasks, {{ $project->percent_done }}% Done</span>
			</div>
        </li>
    @endforeach
</ul>
