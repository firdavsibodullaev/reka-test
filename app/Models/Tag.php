<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 */
class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
