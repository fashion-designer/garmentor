<?php namespace App\Models\DesignerUser;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DesignerUser
 * @package App\Models\DesignerUser
 */
class DesignerUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'designer_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender_id',
        'designer_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];
}