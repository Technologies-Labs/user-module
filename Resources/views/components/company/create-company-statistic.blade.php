<button type="button" class="mtr-btn" data-toggle="modal" data-target="#createCompanyStatistic">
    <span>{{__('add-statistic')}}</span>
</button>
<!-- Create Company Statistic Modal -->
<div class="modal fade" wire:ignore.self id="createCompanyStatistic" aria-hidden="true" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('create-statistic')}}</h4>
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
                    <button wire:click.prevent="createCompanyStatistic()"  class="btn btn-primary">{{__('save')}}</button>
                    <button wire:click.prevent="cancel()" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Create Company Statistic Modal -->
