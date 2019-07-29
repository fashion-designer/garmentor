<?php namespace App\Models\DesignerOrder;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DesignerOrder
 * @package App\Models\DesignerOrder
 */
class DesignerOrder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'designer_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designer_user_id',
        'designer_id',
        'user_id',
        'measurement_chart_id',
        'title',
        'notes',
        'measurements'
    ];
}