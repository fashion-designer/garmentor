<?php namespace App\Models\DisplayImage;

use Illuminate\Database\Eloquent\Model;

class DisplayImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'display_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id',
        'designer_id',
        'user_id',
        'display_thumb',
        'display_image'
    ];
}