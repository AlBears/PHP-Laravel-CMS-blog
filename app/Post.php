<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function author()
    {
      return $this->belongsTo(User::class);
    }

    // accessor
    public function getImageUrlAttribute($value)
    {
      $imageUrl = "";
      if ( ! is_null($this->image))
      {
        $imagePath = public_path() . "/img/" . $this->image;
        if (file_exists($imagePath)) $imageUrl = asset("img/". $this->image);
      }

      return $imageUrl;
    }

    //use Carbon class for DateTime
    public function getDateAttribute($value)
    {
      return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    //new scope for latestFirst from BlogController
    public function scopeLatestFirst($query)
    {
      return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
      return $query->where('published_at', '<=', Carbon::now());
    }
}
