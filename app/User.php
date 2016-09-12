<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Models\Interest;
use App\Models\UserInterests;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'user_interests');
    }
    public function friends() 
    {
        return $this->hasMany(Friends::class);
    }
    public function events()
    {
        return $this->hasMany(Events::class);
    }
    public function quests()
    {
        return $this->hasMany(Quests::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'username', 'email', 'password', 'profile_img'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function hasProfileImage($fileToUpload)
    {
        return is_uploaded_file($_FILES[$fileToUpload]['tmp_name']);
    }

    public static function saveUploadImage($fileToUpload)
    {
        $tempFile = $_FILES[$fileToUpload]['tmp_name'];
        $image_url = __DIR__ . '/../public/img/' . $_FILES[$fileToUpload]['name'];
        $r = move_uploaded_file($tempFile, $image_url);
        return $_FILES[$fileToUpload]['name'];  
    }
}
