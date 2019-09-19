<?php

namespace DiscussIt;

class Discussion extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }


    /**
     * Helpful method during Route-Model Binding,
     * Basically, overwrite Laravel from using the default 'id', to use the field we give it
     * to find the item we want to use in the controller
     *
     * We return 'slug' in this case, since it will act as our ID in this case
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @param Reply $reply
     * @return bool
     */
    public function markAsBestReply(Reply $reply)
    {
        return $this->update([
            'reply_id' => $reply->id
        ]);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }
}
