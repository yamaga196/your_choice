@extends('layouts.app')

@section('content')
    <h1>product_post</h1>
    <form action="{{ route('product_create') }}" method="post" enctype="multipart/form-data">
    @csrf
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <input type="text" name="type" required>
      <input type="file" name="img_path" id="img" onchange="setImage(this);" onclick="this.value = '';" required>
      <img id="preview" class="diary_preview">

      <textarea name="product_explanation" id="" cols="30" rows="10" placeholder="product_explanation" required></textarea>

      <input type="submit" value="アップロード" class="diary_submit">
  </form>

  <script>
    function setImage(target) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById("preview").setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(target.files[0]);
    };
    </script>
@endsection