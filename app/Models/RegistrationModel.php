<?php

namespace App\Models;

use CodeIgniter\Model;

class RegistrationModel extends Model
{
    // ... save data to the database model
    protected $table = 'registration';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'fname',
        'lname',
        'email',
        'country',
        'address',
        'city',
        'state',
        'zip',
        'pswd',
        'phone'
    ];

}