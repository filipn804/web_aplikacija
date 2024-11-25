<?php

namespace App\Policies;

use App\Models\Knjige;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KnjigePolicy
{
    public function before(User $user, string $ability): bool|null
{
    if ($user->role === "administrator") {
        return true;
    }
 
    return null;
}

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, Knjige $knjige) 
    {
        return $user->id === $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu");
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Knjige $knjige)
    {
        return $user->id == $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Knjige $knjige)
    {
        return $user->id == $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu"); 
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Knjige $knjige)
    {
        return $user->id == $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Knjige $knjige)
    {
        return $user->id == $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu");
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Knjige $knjige)
    {
        return $user->id == $knjige->user_id
        ? Response::allow()
        : Response::deny("Ne možeš promjeniti tuđu knjigu");
    }
}
