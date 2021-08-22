<div class="colla-apps">
    <li><a href="#complaint_modal" data-toggle="modal" title="">Add Complaint</a></li>
    <!-- Complaint Modal -->
    <div class="modal fade" wire:ignore.self id="complaint_modal" aria-hidden="true" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">{{__('send-complaint')}}</h4>
                        <form wire:submit.prevent="addComplaint" enctype="multipart/form-data" id="form-upload">
                            <div class="form-group">
                                <textarea type="textarea" wire:model.defer="details" required="required"  placeholder="{{__('write-your-complaint')}}"></textarea>
                                @error('details') <span class="error">{{ $message }}</span> @enderror
                                <input type="file" wire:model="file">
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('send')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Complaint Modal -->
</div>
