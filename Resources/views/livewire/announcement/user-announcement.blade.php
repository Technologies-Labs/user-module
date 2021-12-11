<div class="add-announcement-popup"  wire:ignore.self >
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
                        </svg></i> Add  Announcement</h5>
            </div>
            <div class="post-new">
                <form wire:submit.prevent="addAnnouncement()" enctype="multipart/form-data" class="c-form">
                    <textarea  wire:model.defer="details" placeholder="Write Question"></textarea>
                    @error('details') <span class="error">{{ $message }}</span> @enderror

                    <div class="uploadimage">
                        <i class="icofont-eye-alt-alt"></i>
                        <label class="fileContainer">
                            <input wire:model.defer="file" type="file">Upload File
                            @error('file') <span class="error">{{ $message }}</span> @enderror
                            <div wire:loading wire:target="file" class="sp sp-circle"></div>
                        </label>

                    </div>

                    <button type="submit" class="main-btn">Announcement</button>
                </form>
            </div>
        </div>
    </div>
</div>
