<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $primaryKey = "milestone_id";

    protected $guarded = [ "milestone_id" ];

    protected $dates = ['start_date', 'due_date', ];

    protected $appends = [ 'days_left', ];

    public $timestamps = false;

    public function project()
    {
        return $this->hasOne("App\Project", "project_id", "project_id");
    }
}
