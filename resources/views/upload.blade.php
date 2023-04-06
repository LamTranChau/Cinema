<form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="avata[]" id="">
    <input type="text" name="avata[]" id="">
    <input type="text" name="avata[]" id="">
    <input type="text" name="avata[]" id="">
    <input type="text" name="avata[]" id="">
    <input type="submit" value="Send">
</form>