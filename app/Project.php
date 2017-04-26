<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Task;

class Project extends Model
{
    protected $primaryKey = 'project_id';

    protected $guarded = [ "project_id" ];

    protected $dates = ['start_date', 'end_date', ];

    protected $appends = [ 'days_left', 'total_tasks', 'done_tasks', 'percent_done' ];

    public $timestamps = false;

    public function getDaysLeftAttribute()
    {
        $count = floor((strtotime($this->end_date) - time()) / (60 * 60 * 24));
        return $count < 0 ? 0 : $count;
    }

    public function getTotalTasksAttribute()
    {
        return count($this->tasks);
    }

    public function getDoneTasksAttribute()
    {
        $count = 0;
        foreach ($this->tasks as $task)
        {
            $count += $task->status;
        }
        return $count;
    }

    public function getPercentDoneAttribute()
    {
        return $this->total_tasks == 0 ? 0 : ($this->done_tasks / $this->total_tasks) * 100;
    }

    public function milestones()
    {
        return $this->hasMany('App\Milestone', 'project_id', 'project_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', "project_users", "project_id", "user_id");
    }

    public function tasks()
    {
        return $this->hasManyThrough("App\Task", "App\Milestone", "project_id", "milestone_id", "project_id");
    }


}
