<?php

namespace Modules\Blog\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\Factories\BlogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'true' : 'false';
    }

    public function getPublicationDateAttribute($value)
    {
        return $value ? \Carbon\Carbon::createFromTimeStamp(strtotime($value))->diffForHumans() : 'not published';
    }
}
