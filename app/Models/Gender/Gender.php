<?php namespace App\Models\Gender;

use App\Admin;
use App\Designer;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gender
 * @package App\Models\Gender
 */
class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Designers Gender
     */
    public function getDesignerGender()
    {
        return $this->hasMany(Designer::class);
    }

    /**
     * Users Gender
     */
    public function getUserGender()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Admins Gender
     */
    public function getAdminGender()
    {
        return $this->hasMany(Admin::class);
    }
}