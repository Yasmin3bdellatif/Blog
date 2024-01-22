<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'employee_id'
    ];
    //$article = Article::find(1);
    //$article->employee
    public function employees (): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    //$article = Article::find(1);
    //$article->category

    public function categories () :BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags() :BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments ():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public static function getLastArticles()
    {
        return self::query()
            ->approved()
            ->with(['employees:id,name,image', 'categories:id,name'])
            ->latest()
            ->take(3)
            ->get();
    }

    public function scopeApproved($query)
    {
        return $query->where('status', '=' , 'approved');
    }


}
