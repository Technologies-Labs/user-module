<form method="POST" action="{{route('edit.logo')}}" class="edit-phto">
    @csrf
    <i class="fa fa-camera-retro"></i>
    <label class="fileContainer">
        Edit Cover Photo
        <input type="file" name="logo"/>
    </label>
    <input type="submit"/>
</form>
