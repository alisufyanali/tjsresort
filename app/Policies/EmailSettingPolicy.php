<?php

namespace App\Policies;

use App\Models\EmailSetting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailSettingPolicy
{
    use HandlesAuthorization;

    public function update(User $user, EmailSetting $emailSetting)
    {
        return $user->id === $emailSetting->user_id;
    }

    public function delete(User $user, EmailSetting $emailSetting)
    {
        return $user->id === $emailSetting->user_id;
    }
}
