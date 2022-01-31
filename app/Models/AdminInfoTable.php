<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInfoTable extends Model
{
    use HasFactory;
    public $table = "admin_info";
    public $id = "id";
    public $incrementing = true;
    public $keytype = 'int';
    public $timestamps = true;
}
