<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isAdmin($user)
    {
        return $user->role === 'administrateur';
    }

    // Ajout utilisateur
    public function administrateur($user)
    {
        return in_array($user->role, ['administrateur']);
    }

    // Produits / fournisseurs / stock
    public function gererStock($user)
    {
        return in_array($user->role, ['administrateur', 'gestionnaire_stock']);
    }

    // Client / ventes
    public function gererVentes($user)
    {
        return in_array($user->role, ['administrateur', 'caissier']);
    }
}
