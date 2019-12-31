<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Role
     * @var string
     */
    public $role;

    /**
     * Invitation Code
     * @var string
     */
    public $invitationCode;

    /**
     * Invitation link
     * @var string
     */
    public $invitationLink;

    /**
     * Create a new message instance.
     *
     * @param $role
     * @param $invitationCode
     * @param $invitationLink
     */
    public function __construct($role, $invitationCode, $invitationLink)
    {
        $this->role             = $role;
        $this->invitationCode   = $invitationCode;
        $this->invitationLink   = $invitationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->role === 'admin')
        {
            return $this->view('emailS.invitations.admin')->with([
                'invitationCode' => $this->invitationCode,
                'invitationLink' => $this->invitationLink
            ]);
        }
        elseif ($this->role === 'designer')
        {
            return $this->view('emailS.invitations.designer')->with([
                'invitationCode' => $this->invitationCode,
                'invitationLink' => $this->invitationLink
            ]);
        }
        elseif ($this->role === 'user')
        {
            return $this->view('emailS.invitations.user')->with([
                'invitationCode' => $this->invitationCode,
                'invitationLink' => $this->invitationLink
            ]);
        }
    }
}
