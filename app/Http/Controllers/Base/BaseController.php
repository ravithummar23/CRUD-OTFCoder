<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Permission;


class BaseController extends Controller
{
    public $deleted = 'deleted';
    public $created = 'created';
    public $updated = 'updated';

    public function __construct(){
    	$this->Log = new Log;
    	$this->User = new User;
    	$this->Role = new Role;
    	$this->RoleUser = new RoleUser;
    	$this->Permission = new Permission;
    }
}
