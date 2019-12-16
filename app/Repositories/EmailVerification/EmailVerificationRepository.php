<?php namespace App\Repositories\EmailVerification;

class EmailVerificationRepository
{
    public $modal;

    public function __construct($modal)
    {
        $this->modal = $modal;
    }

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
        if(array_key_exists('password', $input))
        {
            return $this->modal->where('id', $id)->update([
                'is_active' => 1,
                'is_verified' => 1,
                'gender_id' => $input['gender_id'],
                'verification_code' => null,
                'password' => bcrypt($input['password'])
            ]);
        }

        return false;
    }
}