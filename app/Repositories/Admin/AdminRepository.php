<?php namespace App\Repositories\Admin;

use App\Admin;
use App\Mail\AdminInvitation;
use App\Mail\Invitation;
use App\Models\Gender\Gender;
use App\Repositories\Common\DisplayImageRepository;
use Illuminate\Support\Facades\Mail;

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
     * AdminRepository constructor.
     */
    public function __construct()
    {
        $this->model        = new Admin();
        $this->genderModel  = new Gender();
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
     * @return boolean
     */
    public function sendInvitation($input)
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

        $invitedAdmin   = $this->model->create($input);
        $invitationCode = hyd_encrypt_string($invitedAdmin->id);
        $invitationLink = route('verify-admin', $invitedAdmin->id);

        Mail::to($invitedAdmin)->send(new Invitation('admin', $invitationCode, $invitationLink));

        return true;
    }

    /**
     * @return Admin|mixed
     */
    public function getMyProfile()
    {
        $id                         = auth('admin')->id();
        $data                       = $this->model->where('id', $id)->get();
        $data[0]['display_image']   = (new DisplayImageRepository('admin_id', auth('admin')->id()))->getDisplayImageData();
        $data[0]['default_image']   = false;

        if($data[0]['display_image'] === false)
        {
            $data[0]['default_image'] = true;
            $data[0]['display_image'] = hyd_get_default_display_image();
        }

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

        if(array_key_exists('remove_display_image', $input) && $input['remove_display_image'] === '1')
        {
            (new DisplayImageRepository('admin_id', auth('admin')->id()))->removeDisplayImage();
        }
        elseif (array_key_exists('display_image_file_input', $input) && array_key_exists('remove_display_image', $input) && $input['remove_display_image'] === '0')
        {
            (new DisplayImageRepository('admin_id', auth('admin')->id()))->saveDisplayImage($input['display_image_file_input']);
        }

        unset($input['_token']);
        unset($input['password']);
        unset($input['remove_display_image']);
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