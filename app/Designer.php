<?php namespace App;

/**
 * Class Designer
 * @package App
 */

use App\Models\Gender\Gender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Designer extends Authenticatable
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
        'phone',
        'portfolio_name',
        'gender_id',
        'is_active',
        'is_verified',
        'display_image',
        'password'
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
     * Get Gender
     */
    public function getGender()
    {
        return $this->belongsTo(Gender::class, 'id');
    }
}