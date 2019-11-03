<?php namespace App\Models\MeasurementChart;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MeasurementChart
 * @package App\Models\MeasurementChart
 */
class MeasurementChart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'measurement_charts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chart_id',
        'title',
        'description',
        'thumb',
        'image',
        'file_extension'
    ];

    protected $gaurded = [
        'id'
    ];

    /**
     * Get Chart Image
     *
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getChartImage()
    {
        if($this->image)
        {
            return "data:image/png;base64," . base64_encode($this->image);
        }

        return url('public/images/default_image.jpeg');
    }
}