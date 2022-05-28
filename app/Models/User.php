<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\RoleUser;
use App\Models\Technician;
use App\Models\Customer;
use App\Models\Message;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use HasRoles;
    use TwoFactorAuthenticatable;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'is_admin',
    //     'password',
    // ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $connection = 'mysql2';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'email',
        'username',
        'phone',
        'id_role',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function role(){
        return $this->belongsTo(RoleUser::class);
    }

    public function customer(){
        return $this->hasOne(Customer::class);
    }

    public function technician(){
        return $this->hasOne(Technician::class);
    }

    public function sender(){
        return $this->hasMany(Message::class, 'sender');
    }

    public function receiver(){
        return $this->hasMany(Message::class, 'receiver');
    }
        

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:d-M-Y'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['role'];

}
