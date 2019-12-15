<?php namespace App\Repositories\EmailVerification;

use App\Admin;

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
     * @param Admin $modal
     * @param $input
     * @param $id
     * @return bool
     */
    public function verifyEmail($input, $id)
    {
        $verificationCode = $this->modal->where('id', $id)->value('verification_code');

        if($verificationCode && array_key_exists('verification_code', $input) && $input['verification_code'] === $verificationCode)
        {
            $this->modal->where('id', $id)->update([
                'is_active' => 1,
                'is_verified' => 1
            ]);

            return true;
        }

        return false;
    }
}