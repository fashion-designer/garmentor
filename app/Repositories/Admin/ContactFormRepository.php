<?php
namespace App\Repositories\Admin;

use App\Models\ContactForm\ContactForm;

/**
 * Class ContactFormRepository
 * @package App\Repositories\Admin
 */
class ContactFormRepository
{
    /**
     * @var ContactForm
     */
    public $model;

    /**
     * ContactFormRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ContactForm();
    }

    /**
     * @return ContactForm[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllRequests()
    {
        return $this->model->get();
    }

    /**
     * @param $input
     * @return ContactForm|\Illuminate\Database\Eloquent\Model
     */
    public function submitContactForm($input)
    {
        return $this->model->create($input);
    }
}