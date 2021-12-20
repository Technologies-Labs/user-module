<?php

namespace Modules\User\Services;

use Modules\User\Enum\UserEnum;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use Modules\User\Entities\CompanyVideo;

class CompanyVideoService
{
    use UploadTrait;

    public $companyVideo;

    public function createCompanyVideo()
    {

        return CompanyVideo::create(
        [
            'company_video'    =>$this->companyVideo,
            'user_id'          =>Auth::user()->id,
        ]
        );
    }

    public function updateCompanyVideo(CompanyVideo $companyVideo)
    {
     $companyVideo->update(
        [
            'company_video'     =>$this->companyVideo,
            'user_id'           =>Auth::user()->id,
        ]
    );
    return CompanyVideo::find($companyVideo->id);

    }

    public function setVideo($video)
    {
        $this->companyVideo = $this->storeImage($video , UserEnum::COMPANY_VIDEO_PATH);
        return $this;
    }

    public function updateVideo($video ,$old_video)
    {
        $this->companyVideo =$this->updateImage($video,UserEnum::COMPANY_VIDEO_PATH,$old_video);
    }
}
