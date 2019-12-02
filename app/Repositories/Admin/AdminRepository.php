<?php namespace App\Repositories\Admin;

use App\Admin;
use App\Models\DisplayImage\DisplayImage;
use App\Models\Gender\Gender;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Class AdminRepository
 * @package App\Repositories\Admin
 */
class AdminRepository
{
    /**
     * Model
     *
     * @var Admin
     */
    public $model;

    /**
     * @var Gender
     */
    public $genderModel;

    /**
     * @var DisplayImage
     */
    public $displayImageModel;

    /**
     * Display Image Folder Name
     * @var string
     */
    public $displayImagesFolder;

    /**
     * Display Thumb Folder Name
     *
     * @var string
     */
    public $displayThumbsFolder;

    /**
     * AdminRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Admin();
        $this->genderModel = new Gender();
        $this->displayImageModel = new DisplayImage();
        $this->displayImagesFolder = storage_path('DisplayImages/');
        $this->displayThumbsFolder = storage_path('DisplayThumbs/');
    }

    /**
     * Get Admins List
     *
     * @return Admin[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getList()
    {
        $list = $this->model->with(['getGender'])->get();

        return $list;
    }

    /**
     * @param int $id
     * @return Admin[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAdminProfile($id)
    {
        $profile = $this->model->where('id', $id)->with(['getGender'])->get();

        return $profile;
    }

    /**
     * @param int $id
     * @param array $input
     * @return bool
     */
    public function updateAdminProfile($id, $input)
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
     * @return Admin|\Illuminate\Database\Eloquent\Model
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
     * @return Admin|mixed
     */
    public function getMyProfile()
    {
        $id = auth('admin')->id();

        $data = $this->model->where('id', $id)->get();

        return $data[0];
    }

    /**
     * @param array $input
     * @return bool
     */
    public function updateMyProfile($input)
    {
        $id = auth('admin')->id();

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

        $input['gender_id'] = intval($input['gender_id']);
        unset($input['_token']);
        unset($input['password']);

        if(array_key_exists('display_image_file_input', $input))
        {
            $displayImageFile = $input['display_image_file_input'];
            $extension = $displayImageFile->getClientOriginalExtension();
            $imageFile = Image::make($displayImageFile);
            $imageFile->resize(600, 600)->save($this->displayImagesFolder . auth('admin')->id() . '.' . $extension);
            $imageFile->resize(200, 200)->save($this->displayThumbsFolder . auth('admin')->id() . '.' . $extension);

            $this->displayImageModel->create([
                'admin_id'          => auth('admin')->id(),
                'image_name'        => auth('admin')->id(),
                'image_extension'   => $displayImageFile->getClientOriginalExtension()
            ]);
        }

        unset($input['display_image_file_input']);

        return $this->model->where('id', $id)->update($input);
    }

    /**
     * Get All Genders
     *
     * @return Gender[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllGenders()
    {
        return $this->genderModel->get(['id', 'name']);
    }
}