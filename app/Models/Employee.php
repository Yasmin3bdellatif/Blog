<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password'

    ];
   /* protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true ;
    public $timestamps = true;
    protected $connection = 'mysql'; */ //كل دول موجودين باي ديفولت ف املف بتاع Model.php

     //Employee has many articles


    //$employee = Employee::find(1)
    //$employee->article
    public function articles () : HasMany
    {
        return $this->hasMany(Article::class);

    }
    public function comments ():HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function roles ()
    {
        return $this->belongsToMany(Role::class);
    }


}
