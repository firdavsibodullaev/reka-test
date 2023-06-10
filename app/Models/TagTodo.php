<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $tag_id
 * @property int $todo_id
 */
class TagTodo extends Pivot
{
    public $timestamps = false;
}
