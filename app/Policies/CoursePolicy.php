<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user) //index
    {
        return $user->is_admin;
    }

    public function view(User $user) // show
    {
        return $user->is_admin;
    }

    public function create(User $user) //create e store
    {
        return $user->is_admin;
    }

    public function update(User $user) //edit e update
    {
        return $user->is_admin;
    }

    public function delete(User $user)//delete
    {
        return $user->is_admin;
    }

    public function is_admin(User $user){
        return $user->is_admin;
    }
}
