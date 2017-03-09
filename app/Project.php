<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    protected $primaryKey = 'project_id';

    protected $guarded = [ "project_id" ];

    protected $dates = ['start_date', 'end_date', ];

    protected $appends = [ 'days_left', ];

    public $timestamps = false;

    public function getDaysLeftAttribute()
    {
        $count = floor((strtotime($this->end_date) - time()) / (60 * 60 * 24));
        return $count < 0 ? 0 : $count;
    }

    public function milestones()
    {
        return $this->hasMany('App\Milestone', 'project_id', 'project_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', "project_users", "project_id", "user_id");
    }


}
