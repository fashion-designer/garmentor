<?php namespace App\Repositories\EmailVerification;

use App\Admin;
use App\Designer;
use App\Mail\Invitation;
use App\User;
use Illuminate\Support\Facades\Mail;

class EmailVerificationRepository
{
    /**
     * @var string
     */
    public $role;

    /**
     * @var Admin|Designer|User
     */
    public $modal;

    /**
     * EmailVerificationRepository constructor.
     * @param $role
     * @param $modal
     */
    public function __construct($role, $modal)
    {
        $this->role     = $role;
        $this->modal    = $modal;
    }

    /**
     * @param $input
     * @return bool
     */
    public function checkIfAccountEmailExist($input)
    {
        if(array_key_exists('email', $input))
        {
            $accountData = $this->modal->where('email', $input['email'])->get();

            if(isset($accountData[0]) && array_key_exists('is_active', $accountData[0]) && $accountData[0]['is_active'] === 1)
            {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $input
     * @return bool
     */
    public function sendVerificationEmail($input)
    {
        if(array_key_exists('email', $input))
        {
            $accountData = $this->modal->where('email', $input['email'])->get();

            if(isset($accountData[0]))
            {
                $invitationCode = hyd_encrypt_string($accountData[0]->id);

                if($this->role === 'user')
                {
                    $invitationLink = route('verify-user', $accountData[0]->id);
                }
                elseif ($this->role === 'designer')
                {
                    $invitationLink = route('verify-designer', $accountData[0]->id);
                }
                else
                {
                    $invitationLink = route('verify-admin', $accountData[0]->id);
                }

                Mail::to($accountData[0])->send(new Invitation($this->role, $invitationCode, $invitationLink));

                $accountData[0]->update([
                    'verification_code' => $invitationCode,
                    'is_verified' => 0,
                    'is_active' => 0
                ]);

                return $accountData[0]->id;
            }
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     */
    public function isVerificationEmailSent($id)
    {
        $verificationCode = $this->modal->where('id', $id)->value('verification_code');

        if($verificationCode)
        {
            return true;
        }

        return false;
    }

    /**
     * @param $input
     * @param $id
     * @return bool
     */
    public function verifyEmail($input, $id)
    {
        $verificationCode = $this->modal->where('id', $id)->value('verification_code');

        if($verificationCode && array_key_exists('verification_code', $input) && $input['verification_code'] === $verificationCode)
        {
            return true;
        }

        return false;
    }

    /**
     * @param $input
     * @param $id
     * @return bool
     */
    public function setPassword($input, $id)
    {
        $data = [
            'is_verified'       => 1,
            'verification_code' => null,
            'password'          => bcrypt($input['password'])
        ];

        if(array_key_exists('gender_id', $input))
        {
            $data['gender_id'] = $input['gender_id'];
        }


        if(array_key_exists('password', $input))
        {
            return $this->modal->where('id', $id)->update($data);
        }

        return false;
    }
}