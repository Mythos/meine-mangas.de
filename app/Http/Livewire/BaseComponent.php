<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Exceptions\UnauthorizedException;

class BaseComponent extends Component
{
    /** override per usare spatie */
    public function authorize($roleOrPermission): void
    {
        /** @var User $user */

        //check logged
        $user = auth()->user();
        if (!$user) {
            throw UnauthorizedException::notLoggedIn();
        }

        //check rule or pemission (like spatie middleware  i.e. "admin|edit posts")
        $rolesOrPermissions = is_array($roleOrPermission)
            ? $roleOrPermission
            : explode('|', $roleOrPermission);

        if (!$user->hasAnyRole($rolesOrPermissions) && !$user->hasAnyPermission($rolesOrPermissions)) {
            throw UnauthorizedException::forRolesOrPermissions($rolesOrPermissions);
        }
    }
}
