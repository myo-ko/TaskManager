<ul>
    @foreach ($projects as $project)
        <li class='{{ isset($id) && $id == $project->project_id ? "active" : "" }}'>
            <a href="{{ route('ProjectMilestones', [ 'id' => $project->project_id, ]) }}" class="project-title">{{ $project->description }}</a>
            <div class="due">
                <img src="{{ asset('img/due.png') }}" width="16" alt="">
                <time>Due: {{ $project->end_date->format('Y-m-d') }} ({{ $project->days_left }} days left)</time>
            </div>
            <div class="meta">
                <img src="{{ asset('img/users.png') }}" width="16" alt="">
                <a href="#">{{ count($project->users) }} members</a>

                <img src="{{ asset('img/milestones.png') }}" width="16" alt="">
                <span>{{ count($project->milestones) }} milestones</span>
            </div>
            <div class="progress">
				<span class="bar"></span>
				<span class="percent">23 tasks, 45% Done</span>
			</div>
        </li>
    @endforeach
</ul>
