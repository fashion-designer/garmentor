<?php namespace App\Repositories;

use App\Models\DesignerUser\DesignerUser;
use Illuminate\Support\Facades\Auth;

/**
 * Class DesignerUserRepository
 * @package App\Repositories
 */
class DesignerUserRepository
{
    /**
     * Model
     *
     * @var DesignerUser
     */
    public $model;

    /**
     * DesignerUserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new DesignerUser();
    }

    public function create($input)
    {
        dd($input);

        return false;
    }
}