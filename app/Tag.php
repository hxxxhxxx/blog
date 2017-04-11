<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    // 定义文章和标签多对多的关联关系
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag_pivot');
    }

    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) return;

        $found = static::whereIn('name', $tags)->pluck('name')->all();

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'name' => $tag,
            ]);
        }
    }
}
