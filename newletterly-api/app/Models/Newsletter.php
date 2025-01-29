<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['title', 'subtitle', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }
}
