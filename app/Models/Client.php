<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        "name",
        "address",
        "email",
        "position",
        "income"
    ];

    public $protected = [
        "id",
        "created_at",
        "updated_at",
    ];

}
