<?php

namespace App\Policies;

use App\Models\Detail;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
        // return $user->id === $detail->user_id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Detail $detail)
    {
        return $user->id === $detail->user_id;
        // return $user->id === $detail->user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Detail $detail)
    {
        return $user->id === $detail->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Detail $detail)
    {
        return $user->id === $detail->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Detail $detail)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Detail $detail)
    {
        //
    }
}
