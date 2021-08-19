<?php

namespace Modules\UserModule\Services;

use Modules\UserModule\Entities\CompanyService;
use Modules\UserModule\Enum\UserEnum;
use App\Traits\UploadTrait;

use function PHPUnit\Framework\isNull;

class CompanyServiceService{

    use UploadTrait;

    public $companyId;
    public $nama;
    public $description;
    public $image;

    public function createCompanyService(){

            return CompanyService::create(
            [
                'company_id'          =>$this->companyId,
                'name'                =>$this->name,
                'description'         =>$this->description,
                'image'               =>$this->image,

            ]
            );
    }

    public function updateCompanyService(CompanyService $companyService)
    {
         $companyService->update(
            [
                'name'                =>$this->name,
                'description'         =>$this->description,
                'image'               =>($this->image??$companyService->image),
            ]
        );
        return CompanyService::find($companyService->id);

    }

    /**
     * @param mixed $company_id
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
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

        $this->image = $this->storeImage($image,UserEnum::COMPANYSERVICE_IMAGE_PATH);
        return $this;
    }
         /**
     * @param mixed $image
     */
    public function updateImg($image ,$old_image)
    {
        if(isNull($old_image)){
            $this->image =$this->storeImage($image,UserEnum::COMPANYSERVICE_IMAGE_PATH);
        }else
        $this->image =$this->updateImage($image,UserEnum::COMPANYSERVICE_IMAGE_PATH,$old_image);

    }

}
