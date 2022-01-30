<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTable extends Model
{
    use HasFactory;

    public $table = "services";
    public $id = "id";
    public $incrementing = true;
    public $keytype = 'int';
    public $timestamps = true;

}
