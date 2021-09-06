<div class="float-right add">
    <a href="#announcement_modal" data-target="#announcement_modal" data-toggle="modal" title="" data-ripple="">{{__('add-announcement')}}</a>

    <div class="modal fade" wire:ignore.self id="announcement_modal" aria-hidden="true" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('send-announcement')}}</h4>
                </div>
                <div class="modal-body">
                    <form  wire:submit.prevent="addAnnouncement()" enctype="multipart/form-data">
                        <textarea wire:model.defer="details" type="textarea" required="required" placeholder="{{__('write-your-announcement')}}"></textarea>
                        @error('details') <span class="error">{{ $message }}</span> @enderror
                        <input wire:model.defer="file" type="file" class="d-flex my-3">
                        <button type="submit"  class="btn btn-primary">{{__('send')}}</button>
                        <button wire:click.prevent="cancel()" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
