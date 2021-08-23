<div class="form-content p-2">
    <h4 class="modal-title">{{__('send-complaint')}}</h4>
    <form wire:submit.prevent="addComplaint" enctype="multipart/form-data" id="form-upload">
        <div class="form-group">
            <textarea wire:model.defer="details" type="textarea" required="required"  placeholder="{{__('write-your-complaint')}}"></textarea>
            @error('details') <span class="error">{{ $message }}</span> @enderror
            <input wire:model="file" type="file">
        </div>
        <button type="submit" class="btn btn-primary">{{__('send')}}</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
    </form>
</div>
