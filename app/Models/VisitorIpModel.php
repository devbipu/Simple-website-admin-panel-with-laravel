<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorIpModel extends Model
{
    use HasFactory;

    public $table = "visitorips";
    public $id = "id";
    public $incrementing = true;
    public $keytype = 'int';
    public $timestamps = true;
    
}
