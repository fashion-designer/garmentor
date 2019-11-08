<?php namespace App\Repositories\Admin;

use App\Designer;
use App\Models\Gender\Gender;

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

    /**
     * Get Designers List
     *
     * @return Designer[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        $list = $this->model->with(['getGender'])->get();

        return $list;
    }

    /**
     * @param int $id
     * @return Designer[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDesignerProfile($id)
    {
        $profile = $this->model->where('id', $id)->with(['getGender'])->get();

        return $profile;
    }

    /**
     * @param int $id
     * @param array $input
     * @return bool
     */
    public function updateDesignerProfile($id, $input)
    {
        if(!array_key_exists('is_active', $input))
        {
            $input['is_active'] = 0;
        }
        else
        {
            $input['is_active'] = 1;
        }

        if(!array_key_exists('is_verified', $input))
        {
            $input['is_verified'] = 0;
        }
        else
        {
            $input['is_verified'] = 1;
        }

        unset($input['_token']);

        return $this->model->where('id', $id)->update($input);
    }

    /**
     * @param $input
     * @return Designer|\Illuminate\Database\Eloquent\Model
     */
    public function save($input)
    {
        if(!array_key_exists('is_active', $input))
        {
            $input['is_active'] = 0;
        }
        else
        {
            $input['is_active'] = 1;
        }

        if(!array_key_exists('is_verified', $input))
        {
            $input['is_verified'] = 0;
        }
        else
        {
            $input['is_verified'] = 1;
        }

        return $this->model->create($input);
    }

    /**
     * Get All Genders
     *
     * @return Gender[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllGenders()
    {
        return (new Gender())->get(['id', 'name']);
    }
}