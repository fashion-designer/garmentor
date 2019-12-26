<?php namespace App;

use App\Models\Gender\Gender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country_code',
        'phone',
        'gender_id',
        'is_active',
        'is_verified',
        'verification_code',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verification_code'
    ];

    /**
     * Get Gender
     */
    public function getGender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}