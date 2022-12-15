<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'folder_id',
        'url',
        'description'
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
