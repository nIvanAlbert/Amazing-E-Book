<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'accounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'role_id',
        'gender_id',
        'password',
        'display_picture_link',
        'delete_flag',
        'modified_by'
    ];

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
    ];

    /** * The table associated with the model. 
     * 
     *  @var string 
     */
    
     public function role(){
         return $this->belongsTo(Role::class);
     }
     public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
}
