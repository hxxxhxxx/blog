<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 定义文章和标签的多对多关联关系
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag_pivot')->withTimestamps();
    }

    public function syncTags(array $tags)
    {
        Tag::addNeededTags($tags);

        if (count($tags)) {
            $this->tags()->sync(Tag::whereIn('name', $tags)->pluck('id')->all());
            return;
        }

        $this->tags()->detach();
    }
}
