<div class="colla-apps">
    <li><a href="#complaint_modal" data-toggle="modal" title="">{{__('add-complaint')}}</a></li>
    <!-- Complaint Modal -->
    <div class="modal fade" wire:ignore.self id="complaint_modal" aria-hidden="true" role="dialog" data-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <div class="modal-body">
                    <livewire:usermodule::complaint.site-complaint/>
                </div>
            </div>
        </div>
    </div>
    <!-- /Complaint Modal -->
</div>
