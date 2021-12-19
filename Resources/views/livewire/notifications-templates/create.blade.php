<div>
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#create_notifications_template_modal">Create</button>
<!--Create Notifications Template Modal-->
    <div wire:ignore.self  class="modal fade" id="create_notifications_template_modal" tabindex="-1" role="dialog"  aria-hidden="true"  >
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title">Create Notifications Template</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                <form wire:submit.prevent="create()">
                    <div class="mb-3 ">
                        <label class="col-form-label">Action</label>
                        <input type="text" wire:model="action" class="form-control" >
                        @error('action')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label" >Tags</label>
                        <textarea   wire:model="tags" class="form-control"></textarea>
                        @error('tags')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group ">
                        <label class="col-form-label">Content</label>
                        <textarea wire:model="content" class="form-control" ></textarea>
                        @error('content')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save </button>
                    </div>
                </form>
             </div>
          </div>
       </div>
    </div>

</div>
