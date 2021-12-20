<?php
namespace Modules\User\Services;

use Modules\User\Entities\CompanyCustomerSay;
use App\Traits\UploadTrait;

use function PHPUnit\Framework\isNull;

class CompanyCustomerSayService{

    use UploadTrait;

    public $customerName;
    public $customerSay;
    public $customerImage;
    public $userId;

    public function createCompanyCustomerSay(){

            return CompanyCustomerSay::create(
            [
                'user_id'              => $this->userId,
                'customer_name'        => $this->customerName,
                'customer_say'         => $this->customerSay,
                'customer_image'       => $this->customerImage,

            ]
            );
    }

    public function updateCompanyCustomerSay(CompanyCustomerSay $companyCustomerSay)
    {
         $companyCustomerSay->update(
            [
                'customer_name'        => $this->customerName,
                'customer_say'         => $this->customerSay,
                'customer_image'       => ($this->customerImage??$companyCustomerSay->customer_image),
            ]
        );
        return $companyCustomerSay;

    }
     /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
        return $this;
    }


      /**
     * @param mixed $customerSay
     */
    public function setCustomerSay($customerSay)
    {
        $this->customerSay = $customerSay;
        return $this;
    }


    /**
     * @param mixed $customerImage
     */
    public function setCustomerImage($customerImage)
    {
        $this->customerImage = $customerImage->store('customers say','public');
        return $this;
    }
    public function setUserID($userId)
    {
        $this->userId = $userId;
        return $this;
    }
         /**
     * @param mixed $customerImage
     */
    public function updateCustomerImg($customerImage)
    {
        if (!is_string($customerImage)) {
            $this->customerImage  = $customerImage->store('customers say','public');
        }
        return $this;

    }

}
