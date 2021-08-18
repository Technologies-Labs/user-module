<?php

namespace Modules\UserModule\Services;

use App\Models\User;
use Modules\UserModule\Entities\Upgrade;

class UpgradeService
{
    public $currentPackage;
    public $nextPackage;
    public $user;

    /**
     * @param mixed $currentPackage
     */
    public function setCurrentPackage($currentPackage)
    {
        $this->currentPackage = $currentPackage;
        return $this;
    }

    /**
     * @param mixed $nextPackage
     */
    public function setNextPackage($nextPackage)
    {
        $this->nextPackage = $nextPackage;
        return $this;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function createUpgrade()
    {
        $upgrade = Upgrade::create([
            'current_package'   => $this->currentPackage,
            'next_package'      => $this->nextPackage,
            'user_id'           => $this->user->id,
        ]);

        return response()->json([
            'success'       => ($upgrade) ? true : false,
            'message'       => ($upgrade) ? 'Upgrade created successfully' : 'Upgrade Failed created',
        ]);
    }
}
