<div class="user-avatar">
    <figure>
        <img src="{{asset($image)}}" alt="">
        @if($isCurrantUser)
            <form method="POST" action="{{route('edit.image')}}" class="edit-phto">
                @csrf
                <i class="fa fa-camera-retro"></i>
                <label class="fileContainer">
                    Edit Display Photo
                    <input name="image" type="file"/>
                </label>
                <label class="fileContainer">
                    <input type="submit" placeholder="save"/>
                </label>
            </form>
        @endif

    </figure>
</div>
