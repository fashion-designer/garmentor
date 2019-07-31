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

    /**
     * MeasurementRepository constructor.
     */
    public function __construct()
    {
        $this->model = new MeasurementChart();
    }

    /**
     * Create
     *
     * @param array $input
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
     * List Of Items
     *
     * @return MeasurementChart[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $items = $this->model->get();

        foreach($items as $item)
        {
            $item['image'] = "data:image/png;base64,".base64_encode($item->image);
        }

        return $items;
    }

    /**
     * Get Chart Measurement Config Data
     *
     * @param int $id
     * @return array
     */
    public function getConfigData($id)
    {
        $item = $this->model->find($id)->toArray();

        $item['image'] = "data:image/png;base64,".base64_encode($item['image']);

        $configKey = 'charts.' . $item['chart_id'];

        if(config($configKey))
        {
            $item['configKeys'] = config($configKey);
        }

        return $item;
    }

    /**
     * Update
     *
     * @param int $id
     * @param array $input
     * @return bool
     */
    public function update($id, $input)
    {
        unset($input['_token']);

        return $this->model->where(['id' => $id])->update($input);
    }
}