<div class="new-question-popup" wire:ignore.self>
    <div class="popup">
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
                        </svg></i> {{__('Add Suggestion')}}</h5>
            </div>
            <div class="post-new">
                <form class="c-form" wire:submit.prevent="addSuggestion" enctype="multipart/form-data" id="form-upload">
                    <textarea wire:model.defer="details" placeholder="{{__('Write Your-Suggestion')}}"
                        required="required"></textarea>
                    @error('details') <span class="error">{{ $message }}</span> @enderror
                    <div class="uploadimage">
                        <i class="icofont-eye-alt-alt"></i>
                        <label class="fileContainer">
                            <input type="file" wire:model="file">Upload File
                            @error('file') <span class="error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="file" class="sp sp-circle"></div>
                        </label>
                    </div>

                    <button type="submit" class="main-btn">{{__('Send Suggestion')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="float-right add">
    <a href="#suggestion_modal" ata-target="#suggestion_modal" data-toggle="modal" title=""
        data-ripple="">{{__('add-suggestion')}}</a>
    <!-- User Suggestion Modal -->
    <div class="modal fade" wire:ignore.self id="suggestion_modal" aria-hidden="true" role="dialog"
        data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">{{__('send-suggestion')}}</h4>
                        <form wire:submit.prevent="addSuggestion" enctype="multipart/form-data" id="form-upload">
                            <div class="form-group">
                                <textarea wire:model.defer="details" type="textarea" required="required"
                                    placeholder="{{__('write-your-suggestion')}}"></textarea>
                                @error('details') <span class="error">{{ $message }}</span> @enderror
                                <input wire:model="file" type="file">
                                @error('file') <span class="error">{{ $message }}</span> @enderror
                                <div wire:loading wire:target="file">Uploading...</div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('send')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /User Suggestion Modal -->
</div> --}}
