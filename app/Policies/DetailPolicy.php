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
        // $detail = Detail::all();
        // if ($user->can('view-unpublished-post')){
        //     return true;
        // }
        // if ($user->can('view-post')){
        //     return true;
        // }
        // if ($user === null){
        //     return false;
        // }
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
    public function view(User $user)
    {
        // return $user->id === $detail->user_id;
        // return $user->id === $detail->user->id;

        if ($user->can('view-unpublished-post')){
            return true;
        }
        if ($user->can('view-post')){
            return true;
        }

        // if ($user === null){
        //     return false;
        // }
        // else {
        //     return false;
        // }

        // return $user->id == $detail->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if ($user->can('create-post')){
            // return $detail->user_id === $user->id;
            return true;
        }
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
        if ($user->can('edit-own-post')){
            return $detail->user_id === $user->id;
        }
        if ($user->can('edit-post')){
            return true;
        }
        
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
        if ($user->can('delete-own-post')){
            return $detail->user_id === $user->id;
        }
        if ($user->can('delete-post')){
            return true;
        }
        
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
