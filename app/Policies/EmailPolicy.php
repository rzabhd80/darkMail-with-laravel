<?php

namespace App\Policies;

use App\Models\Email;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Email $email
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Email $email)
    {
        if ($user->id == $email->sender_id || $user->id == $email->rec_id)
            return true;
        else return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Email $email
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Email $email
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Email $email)
    {
        if ($user->id == $email->sender_id || $user->id == $email->rec_id)
            if ($user->id == \Auth::user())
                return true;
            else return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Email $email
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Email $email)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Email $email
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Email $email)
    {
        //
    }
}
