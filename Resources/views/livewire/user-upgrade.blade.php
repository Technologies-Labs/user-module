{{-- <div>
    <i class="ti-user"></i>
    <a href="#" data-toggle="modal" data-target="#user-upgrade-modal" title="">Upgrade</a>

    <div class="modal fade" id="user-upgrade-modal" tabindex="-1" aria-labelledby="user-upgrade-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{route('user.upgrade')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upgrade User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <select name="package" required>
                            @foreach($packages as $package)
                                <option value="{{$package->name}}">{{$package->display_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
 --}}
