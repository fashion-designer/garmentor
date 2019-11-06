<?php namespace App\Repositories\Designer;

use App\Designer;

/**
 * Class DesignerRepository
 * @package App\Repositories\Designer
 */
class DesignerRepository
{
    /**
     * Model
     *
     * @var Designer
     */
    public $model;
    /**
     * DesignerUserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Designer();
    }

    public function getList()
    {
        $list = $this->model->with(['getGender'])->get();

        return $list;
    }

    public function getDesignerProfile($id)
    {
        $profile = $this->model->where('id', $id)->with(['getGender'])->get();

        return $profile;
    }
}