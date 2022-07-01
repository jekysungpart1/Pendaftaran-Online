<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Siswa extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $guard = 'siswa'; 
    protected $guarded = [];
}
