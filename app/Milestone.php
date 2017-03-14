<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $primaryKey = "milestone_id";

    protected $guarded = [ "milestone_id" ];

    protected $dates = ['start_date', 'due_date', ];

    protected $appends = [ 'late_days', ];

    public $timestamps = false;

    public function tasks()
    {
        return $this->hasMany("App\Task", "milestone_id", "milestone_id");
    }

    public function project()
    {
        return $this->belongsTo("App\Project", "project_id", "project_id");
    }

    public function getLateDaysAttribute()
    {
        $now = new \DateTime();
        $due = date_create($this->due_date);
        $count = $now->diff($due)->days;
        return $count > 0 ? $count : 0;
    }
}
