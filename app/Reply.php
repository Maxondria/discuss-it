<?php

namespace DiscussIt;

class Reply extends Model
{
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
