<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = "task_id";

    protected $guarded = [ "task_id" ];

    protected $dates = ['start_date', 'due_date', ];

    public $timestamps = false;

    public function milestone()
    {
        return $this->belongsTo("App\Milestone", "milestone_id", "milestone_id");
    }

    public function users()
    {
        return $this->belongsToMany("App\User", "assignments", "task_id", "user_id");
    }

}
