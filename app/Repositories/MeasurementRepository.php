<?php namespace App\Repositories;


use App\Models\MeasurementChart\MeasurementChart;

/**
 * Class MeasurementRepository
 * @package App\Repositories
 */
class MeasurementRepository
{
    /**
     * Measurement Model
     *
     * @var MeasurementChart
     */
    public $model;

    public function __construct()
    {
        $this->model = new MeasurementChart();
    }

    /**
     * @param $input
     * @param $chartFile
     * @return MeasurementChart|\Illuminate\Database\Eloquent\Model
     */
    public function create($input, $chartFile)
    {
        $input['chart_id']  = '2';
        $input['image']     = file_get_contents($chartFile);
        $input['thumb']     = null;

        return $this->model->create($input);
    }

    /**
     * @return MeasurementChart[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $items = $this->model->get();

        foreach($items as $item)
        {
            $item['chartFile'] = "data:image/png;base64,".base64_encode($item->image);
        }

        return $items;
    }
}