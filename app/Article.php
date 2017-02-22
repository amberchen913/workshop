<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' //temporary
    ];

    protected $dates = ['published_at'];

    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnPublished($query){
        $query->where('published_at', '>', Carbon::now());
    }

    public function setPublshedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * A articles is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relation\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\user');
    }
    
    /**
     * Get the tags associated with the given article.
     *
     * @return \Illuminate\Database\Eloquent\Relation\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
