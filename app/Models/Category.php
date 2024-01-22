<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    //$category = Category::find(1);
    //$Category->article

    public function articles () : BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }
}
