<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public function articles ():BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    public function employees ():BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
