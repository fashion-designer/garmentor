<?php
namespace App\Models\ContactForm;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactForm
 * @package App\Models\ContactForm
 */
class ContactForm extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_form';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country_code',
        'phone',
        'comment'
    ];
}