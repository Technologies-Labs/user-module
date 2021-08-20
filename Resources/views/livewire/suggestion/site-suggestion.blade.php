<div class="colla-apps">
    <li><a href="#suggestion_site_modal" ata-target="#suggestion_site_modal" data-toggle="modal" title=""></i>Add Suggestion</a></li>
    <!-- SuggestionController Modal -->
    <div class="modal fade" wire:ignore.self id="suggestion_site_modal" aria-hidden="true" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">{{__('send-suggestion')}}</h4>
                        <form wire:submit.prevent="addSiteSuggestion" enctype="multipart/form-data" id="form-upload">
                            <div class="form-group">
                                <textarea type="textarea" required="required" wire:model.defer="details" placeholder="{{__('write-your-suggestion')}}"></textarea>
                                @error('details') <span class="error">{{ $message }}</span> @enderror
                                <input type="file" wire:model="file">
                            </div>
                            <button type="submit"  class="btn btn-primary">{{__('send')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('cancel')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /SuggestionController Modal -->
</div>
