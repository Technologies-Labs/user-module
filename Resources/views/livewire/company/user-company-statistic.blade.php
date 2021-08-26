<div class="central-meta">
    <div class="editing-info">
        <h5 class="f-title"><i class="ti-info-alt"></i>{{__('company-statistic')}}</h5>
        <div class="edit-contact-info">
            @foreach($userCompanyStatistic as $statistic)
                <div class="form-group mt-0">
                    <label class="text-primary d-flex" >{{__('name')}}</label>
                    <p class=" d-flex">{{ $statistic->name }}</p><i class="mtrl-select"></i>
                </div>
                <div class="form-group my-0">
                    <label class="text-primary d-flex">{{__('number')}}</label>
                    <p class=" d-flex">{{ $statistic->number }}</p>
                </div>
                <div class="submit-btns mb-4 mt-0">
                    @include('usermodule::components.company.update-company-statistic')
                    <button  class="mtr-btn" wire:click="deleteCompanyStatistic({{ $statistic->id }})"><span>{{__('delete')}}</span></button>
                </div>
            @endforeach
            @include('usermodule::components.company.create-company-statistic')
        </div>
    </div>
</div>
