<button  class="mtr-btn" wire:click="updateCompanyStatistic({{ $statistic->id }})" data-toggle="modal" data-target="#updateCompanyStatistic">
    <span>{{__('edit')}}</span>
</button>
<!-- Update Company Statistic Modal -->
<div class="modal fade" wire:ignore.self id="updateCompanyStatistic" aria-hidden="true" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('edit-statistic')}}</h4>
            </div>
            <div class="modal-body">
                <div class="form-content p-2">
                    <form>
                        <div class="form-group">
                            <input wire:model="name" type="text" id="input" required/>
                            <label class="control-label" for="input">{{__('name')}}</label>
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group mb-5">
                            <input wire:model="number" type="text"  id="input" required/>
                            <label class="control-label" for="input">{{__('number')}}</label>
                            @error('number')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </form>
                    <button wire:click.prevent="update()"  class="btn btn-primary">{{__('edit')}}</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Update Company Statistic Modal -->
