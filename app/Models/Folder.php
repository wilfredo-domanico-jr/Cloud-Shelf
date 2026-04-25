<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Folder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'parent_id',
        'name',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    // 👤 Owner of the folder
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 📁 Parent folder (self reference)
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    // 📂 Child folders
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    // 📄 Files inside this folder
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes (very useful)
    |--------------------------------------------------------------------------
    */

    // Root folders only
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Belongs to user
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    // Check if folder is root
    public function isRoot()
    {
        return is_null($this->parent_id);
    }

    // Get full path (recursive)
    public function path()
    {
        if (!$this->parent) {
            return $this->name;
        }

        return $this->parent->path() . '/' . $this->name;
    }
}
