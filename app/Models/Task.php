<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'assigned_to_id',
        'assigned_by_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'assigned_by_id');
    }
}
