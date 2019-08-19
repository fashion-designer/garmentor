<?php namespace App\Models\Measurement;

/**
 * Class Measurement
 * @package App\Models\Measurement
 */

use App\Models\DesignerOrder\DesignerOrder;
use App\Models\DesignerUser\DesignerUser;
use App\Models\MeasurementChart\MeasurementChart;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'measurements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data',
        'chart_id',
        'user_id',
        'designer_user_id',
        'designer_order_id',
    ];

    protected $gaurded = [
        'id'
    ];

    /**
     * Relation With Measurement Chart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurementChart()
    {
        return $this->belongsTo(MeasurementChart::class, 'chart_id');
    }

    /**
     * Relation With User Relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation With Designer User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function designerUser()
    {
        return $this->belongsTo(DesignerUser::class, 'designer_user_id');
    }

    /**
     * Relation With Designer Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function designerOrder()
    {
        return $this->belongsTo(DesignerOrder::class, 'designer_order_id');
    }
}