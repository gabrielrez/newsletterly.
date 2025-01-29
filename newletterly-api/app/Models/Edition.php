<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['title', 'subtitle', 'content', 'newsletter_id'];

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }
}
