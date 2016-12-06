<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ["content", "finished", "priority"];

    protected $hidden = ["todo_id"];


    /**
     * Return list of user associated with the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Return todo who are associated to the task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function todo()
    {
        return $this->belongsTo('App\Models\Todo');
    }

    public function getFinishedAttribute($attribute)
    {
        return boolval($attribute);
    }

    public function setFinishedAttribute($attribute)
    {
        $this->attributes['finished'] = intval($attribute);
    }

}
