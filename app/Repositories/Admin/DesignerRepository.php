<?php namespace App\Repositories\Admin;

use App\Designer;
use App\Mail\Invitation;
use App\Models\Gender\Gender;
use App\Repositories\Common\DisplayImageRepository;
use Illuminate\Support\Facades\Mail;

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
        $profile = $this->model->where('id', $id)->with(['getGender'])->get()->first();

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
     * @return bool
     */
    public function sendInvitation($input)
    {
        $input['is_active']     = 1;
        $input['is_verified']   = 0;
        $invitedDesigner        = $this->model->create($input);
        $invitationCode         = str_random(6);
        $invitationLink         = route('verify-designer', $invitedDesigner->id);

        Mail::to($invitedDesigner)->send(new Invitation('designer', 'BATTULA', $invitationLink));

        return $invitedDesigner->update(['verification_code' => 'BATTULA']);
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

    /**
     * @return Designer|mixed
     */
    public function getMyProfile()
    {
        $id                         = auth('designer')->id();
        $data                       = $this->model->where('id', $id)->get();
        $data[0]['display_image']   = (new DisplayImageRepository('designer_id', auth('designer')->id()))->getDisplayImageData();

        return $data[0];
    }

    /**
     * @param array $input
     * @return bool
     * @throws \Exception
     */
    public function updateMyProfile($input)
    {
        $id                 = auth('designer')->id();
        $input['gender_id'] = intval($input['gender_id']);

        if(array_key_exists('remove_display_image', $input) && $input['remove_display_image'] === '1')
        {
            (new DisplayImageRepository('admin_id', auth('admin')->id()))->removeDisplayImage();
        }
        elseif (array_key_exists('display_image_file_input', $input) && array_key_exists('remove_display_image', $input) && $input['remove_display_image'] === '0')
        {
            (new DisplayImageRepository('designer_id', auth('designer')->id()))->saveDisplayImage($input['display_image_file_input']);
        }

        if(array_key_exists('password', $input))
        {
            $input['password'] = bcrypt($input['password']);
        }

        unset($input['_token']);
        unset($input['remove_display_image']);
        unset($input['display_image_file_input']);

        return $this->model->where('id', $id)->update($input);
    }
}