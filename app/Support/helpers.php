<?php

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists("get_tags")) {
    function get_tags(Collection $tags)
    {
        return $tags->map(function (Tag $tag) {
            return "<a href='" . route('todo.index', ['tag' => $tag->name]) . "'>$tag->name</a>";
        })->implode(" ");
    }
}
