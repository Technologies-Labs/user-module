<div class="add-offer-popup" wire:ignore.self>
    <div class="popup" >
        <span class="popup-closed"><i class="icofont-close"></i></span>
        <div class="popup-meta">
            <div class="popup-head">
                <h5><i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-help-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg></i>

                    {{$modal['title']}}
                </h5>
            </div>
            <div class="post-new">
                <form wire:submit.prevent="{{$modal['route']}}" enctype="multipart/form-data" class="c-form">

                    <textarea wire:model.defer="details" rows="5" type="textarea" required="required"
                        placeholder="تفاصيل العرض"></textarea>
                    @error('details') <span class="error">{{ $message }}</span> @enderror

                    {{-- @if($modal['name'] =="update" && $offer->image)
                    <img src="{{ asset('storage')}}/{{Modules\User\Enum\OfferEnum::IMAGE}}{{$image}}" class="w-50 p-4">
                    @endif --}}

                    <div class="uploadimage">
                        <i class="icofont-eye-alt-alt"></i>
                        <label class="fileContainer">
                            <input wire:model.defer="image" type="file">تحميل صورة العرض
                            @error('image') <span class="error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="image" class="sp sp-circle">
                                {{-- <livewire:user::offer.user-offer :user="$user" :isCurrantUser="$isCurrantUser" /> --}}
                            </div>
                        </label>

                    </div>
                    <button type="submit" class="main-btn">حفظ</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div>
    <button class="mtr-btn" style="margin-bottom: 10px;"><a data-toggle="modal"
            href="#create_offer"><span>{{__('add-new-offer')}}</span></a></button>
</div>
<!-- create offer Modal -->
<div wire:ignore.self class="modal fade" id="create_offer" aria-hidden="true" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered post-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="f-title"><i class="ti-pencil"></i>{{__('add-offer')}}</h5>
                <button wire:click="cancel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <textarea wire:model="details" rows="5" type="textarea" required="required"></textarea>
                        <label class="control-label" for="textarea">{{__('description')}}</label><i
                            class="mtrl-select"></i>
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
                    <button wire:click.prevent="createUserOffer()"
                        class="mtr-btn btn-block"><span>{{__('save')}}</span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /create offer Modal --> --}}
