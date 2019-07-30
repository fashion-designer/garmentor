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
     * @return MeasurementChart|\Illuminate\Database\Eloquent\Model
     */
    public function create($input)
    {
        $input['image'] = file_get_contents($input['chart_file']);

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
            $item['image'] = '';
        }

        return $items;
    }
}