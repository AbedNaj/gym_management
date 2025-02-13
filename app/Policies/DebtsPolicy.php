<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use App\Models\debts;
use Illuminate\Auth\Access\Response;

class DebtsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user,  ?Customer $customer): bool
    {
        if ($customer == false) {
            return true;
        }
        return $customer->gym->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user,  ?Customer $customer): bool
    {
        return $customer->gym->user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, debts $debt): bool
    {
        return $debt->gym->user->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, debts $debts): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, debts $debts): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, debts $debts): bool
    {
        return false;
    }
}
