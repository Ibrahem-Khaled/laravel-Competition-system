<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'user_competitions', 'user_id', 'competition_id');
    }


    //this accessor 
    public function getFormattedPhoneAttribute()
    {
        if ($this->phone) {
            // عرض أول 3 أرقام وإخفاء الباقي بالنجوم
            return substr($this->phone, 0, 3) . 
            str_repeat('*', strlen($this->phone) - 4)
            . substr($this->phone, -1);
        }
        return 'غير متوفر'; // إذا لم يكن هناك رقم هاتف
    }
}
