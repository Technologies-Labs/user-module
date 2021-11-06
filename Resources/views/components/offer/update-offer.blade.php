

{{-- <span style="float: right;padding-left: 10px;"><a class="edit-link" wire:click="editUserOffer({{$offer->id}})" data-toggle="modal" href="#update_offer"><i class="fa fa-edit mr-1"></i></a></span>
<!-- create offer Modal -->
<div wire:ignore.self class="modal fade" id="update_offer" aria-hidden="true" role="dialog" data-backdrop="false" >
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  class="f-title"><i class="ti-pencil"></i>{{__('edit-offer')}}</h5>
                <button wire:click="cancel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea wire:model="details" rows="5" type="textarea" required="required"></textarea>
                    <label class="control-label" for="textarea">{{__('description')}}</label><i class="mtrl-select"></i>
                    @error('details')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group ">
                    @if($offer->image)
                        <img src="{{ asset('storage/'.$image)}}" class="w-50 p-4">
                    @endif
                    <div class="upload-img ">
                        <div class="change-photo-btn">
                            <span><i class="fa fa-upload"></i>{{__('upload-photos')}}</span>
                            <input wire:model="image" type="file" class="upload"  id="pr">
                        </div>
                    </div>
                </div>
                <button wire:click.prevent="updateUserOffer()" class="mtr-btn btn-block"><span>{{__('save')}}</span></button>
            </div>
        </div>
    </div>
</div>
<!-- /create offer Modal --> --}}
