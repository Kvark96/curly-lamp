<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        'type',
        'parent_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function parent()
    {
        return $this->parent_id;
    }

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
