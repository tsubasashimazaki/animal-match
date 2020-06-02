<?php
// bootstrap --authdeで生成されたもの
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','self_introduction', 'sex', 'img_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // リレーションの記述
    public function toUserId()
    {   // 1対多の関係
        // hasMany(相手のモデル名、相手のモデルID、自身のモデル)
        return $this->hasMany('App\Reaction', 'to_user_id', 'id');
    }

    public function fromUserId()
    {

        return $this->hasMany('App\Reaction', 'from_user_id', 'id');
    }
}
