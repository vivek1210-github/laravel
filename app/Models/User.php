<?php

namespace App\Models;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // mutators set
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // //accessors get
    // public function getNameAttribute($value) {
    //    return "my name is ".strtoupper($value);
    // }

    public static function uploadAvatar($image) {
        $filename = $image->getClientOriginalName();
        //(new self())->deleteOldImage();
        if(Auth::user()->avatar)
        {
            Storage::delete('/public/images/'.Auth::user()->avatar);
        }
        $image->storeAs('images', $filename, 'public');
        Auth::user()->update(['avatar' => $filename]);
        // $image->store('images', 'public');
        //$image->move('custom-images/', $filename);
        // Auth::user()->update(['avatar' => $filename]);
    }

    public function deleteOldImage() {
        if($this->avatar)
        {
            Storage::delete('/public/images/'.$this->avatar);
        }

    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }


}
