<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = ["name","archived"];

    /**
     * Return list of task of the todo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    /**
     * Return field name used for route model binding
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getArchivedAttribute($attribute)
    {
        return boolval($attribute);
    }

    public function setArchivedAttribute($attribute)
    {
        $this->attributes['archived'] = ($attribute == "true") ? 1 : 0;
    }

    /**
     * Return list of archived todos
     *
     * @param $query
     * @return mixed
     */
    public function scopeArchived($query)
    {
        return $query->where('archived',true);
    }

    /**
     * Return list of unarchived todos
     *
     * @param $query
     * @return mixed
     */
    public function scopeUnarchived($query)
    {
        return $query->where('archived',false);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
