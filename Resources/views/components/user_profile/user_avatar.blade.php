<div class="user-avatar">
    <figure>
        <img src="{{asset('assets/images/resources/user-avatar.jpg')}}" alt="">
        @if($isCurrantUser)
            <form class="edit-phto">
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Display Photo
                    <input type="file"/>
                </label>
            </form>
        @endif

    </figure>
</div>
