<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
      return $this->hasMany(Post::class, 'author_id');
    }

    public function gravatar()
    {
      $email = $this->email;
      $default = "https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/User_icon_1.svg/1024px-User_icon_1.svg.png";
      $size = 40;

      return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }

    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function getBioHtmlAttribute($value)
    {
      return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }
}
