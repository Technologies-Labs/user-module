<div >
    <button class="mtr-btn" style="margin-bottom: 10px;"><a  data-toggle="modal" href="#create_offer"><span>{{__('add-new-offer')}}</span></a></button>
</div>
<!-- create offer Modal -->
<div wire:ignore.self class="modal fade" id="create_offer" aria-hidden="true" role="dialog" data-backdrop="false" >
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="f-title"><i class="ti-pencil"></i>{{__('add-offer')}}</h5>
                <button wire:click="cancel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form >
                    <div class="form-group">
                        <textarea wire:model="details" rows="5" type="textarea" required="required"></textarea>
                        <label class="control-label" for="textarea">{{__('description')}}</label><i class="mtrl-select"></i>
                        @error('details')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group ">
                        <div class="upload-img ">
                            <div class="change-photo-btn">
                                <span><i class="fa fa-upload"></i>{{__('upload-photos')}}</span>
                                <input wire:model="image" type="file" class="upload">
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <button wire:click.prevent="createUserOffer()" class="mtr-btn btn-block"><span>{{__('save')}}</span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /create offer Modal -->
