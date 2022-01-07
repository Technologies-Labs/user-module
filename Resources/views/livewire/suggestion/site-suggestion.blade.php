<div class="price-plan-wraper">
    @include("user::website.suggestion.templates.".$template)


    <div class="add-site-suggestion-popup" wire:ignore.self>
        <div class="popup">
            <span class="popup-closed"><i class="icofont-close"></i></span>
            <div class="popup-meta">
                <div class="popup-head">
                    <h5><i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-help-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg></i> إضافة مقترح للموقع</h5>
                </div>
                <div class="post-new">


                    <form class="c-form" wire:submit.prevent="addSiteSuggestion" enctype="multipart/form-data" id="form-upload">

                        <textarea wire:model.defer="details" placeholder="اكتب مقترحك"
                            required="required"></textarea>
                        @error('details') <span class="error">{{ $message }}</span> @enderror

                        <div class="uploadimage">
                            <i class="icofont-eye-alt-alt"></i>
                            <label class="fileContainer">
                                <input type="file" wire:model="file">تحميل ملف
                                @error('file') <span class="error">{{ $message }}</span> @enderror
                                <div wire:loading wire:target="file" class="sp sp-circle"></div>
                            </label>
                        </div>

                        <button type="submit" class="main-btn">إرسال المقترح</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="colla-apps">
    <li><a href="#suggestion_site_modal" ata-target="#suggestion_site_modal" data-toggle="modal"
            title=""></i>{{__('add-suggestion')}}</a></li>
    <!-- Site Suggestion Modal -->
    <div class="modal fade" wire:ignore.self id="suggestion_site_modal" aria-hidden="true" role="dialog"
        data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">{{__('send-suggestion')}}</h4>
                        <form wire:submit.prevent="addSiteSuggestion" enctype="multipart/form-data" id="form-upload">
                            <div class="form-group">
                                <textarea wire:model.defer="details" type="textarea" required="required"
                                    placeholder="{{__('write-your-suggestion')}}"></textarea>
                                @error('details') <span class="error">{{ $message }}</span> @enderror
                                <input wire:model="file" type="file">
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('send')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Site Suggestion Modal -->
</div> --}}
