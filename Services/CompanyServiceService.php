<?php

namespace Modules\User\Services;

use Modules\User\Entities\CompanyService;
use Modules\User\Enum\UserEnum;
use App\Traits\UploadTrait;

use function PHPUnit\Framework\isNull;

class CompanyServiceService
{

    use UploadTrait;

    public $userId;
    public $nama;
    public $description;
    public $image;

    public function createCompanyService()
    {

        return CompanyService::create(
            [
                'user_id'       => $this->userId,
                'name'          => $this->name,
                'description'   => $this->description,
            ]
        );
    }

    public function updateCompanyService(CompanyService $companyService)
    {
        $companyService->update(
            [
                'name'                => $this->name,
                'description'         => $this->description,
            ]
        );
        return $companyService;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }


    /**
     * @param mixed $image
     */
    public function setImage($image)
    {

        $this->image = $this->storeImage($image, UserEnum::COMPANYSERVICE_IMAGE_PATH);
        return $this;
    }
    /**
     * @param mixed $image
     */
    public function updateImg($image, $old_image)
    {
        if (isNull($old_image)) {
            $this->image = $this->storeImage($image, UserEnum::COMPANYSERVICE_IMAGE_PATH);
        } else
            $this->image = $this->updateImage($image, UserEnum::COMPANYSERVICE_IMAGE_PATH, $old_image);
    }
}
