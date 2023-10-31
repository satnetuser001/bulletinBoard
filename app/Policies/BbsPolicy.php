<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Bbs;

class BbsPolicy
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

    //верификация пользоваиеля при исправлении объявления
    public function verificationUpdateTupleDB(User $user, Bbs $bbs)
    {
        //надо будет попробовать рассписать (User $user, Bbs $bbs)
        return $bbs->user->id === $user->id;
    }

    //верификация пользователя при удалении объявления
    public function verificationDeleteTupleDB(User $user, Bbs $bbs)
    {
        return $this->verificationUpdateTupleDB($user, $bbs);
    }
}
