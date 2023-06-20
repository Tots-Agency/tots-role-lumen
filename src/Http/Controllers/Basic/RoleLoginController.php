<?php

namespace Tots\Role\Http\Controllers\Basic;

use Illuminate\Http\Request;
use Tots\Auth\Http\Controllers\Basic\LoginController;

class RoleLoginController extends LoginController
{
    /**
     *
     * @var int
     */
    protected $role;

    public function login(Request $request)
    {
        // Get role
        $this->role = $request->input('role');
        // Process
        return parent::login($request);
    }

    protected function getActiveUser($email, $password)
    {
        $user = parent::getActiveUser($email, $password);
        // Verify if same role  
        if($user->role != $this->role){
            throw new \Exception('Not has permission');
        }

        return $user;
    }
}
