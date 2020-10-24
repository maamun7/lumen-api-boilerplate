<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	//const CREATED_AT = 'CreatedAt';
	//const UPDATED_AT = 'CreatedBy';

	public $timestamps = false;
	
	protected $table = 'Profiles';

	protected $fillable = [
        'FirstName', 'LastName', 'CreatedBy', 'CreatedAt', 'UserId', 'CountryId'
    ];
}
