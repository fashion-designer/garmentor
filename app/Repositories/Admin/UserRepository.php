<?php namespace App\Repositories\Admin;

use App\Models\Gender\Gender;
use App\User;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 */
class UserRepository
{
    /**
     * @var User
     */
    public $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        $list = $this->model->with(['getGender'])->get();

        return $list;
    }

    /**
     * @param int $id
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
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
     * @return User|\Illuminate\Database\Eloquent\Model
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