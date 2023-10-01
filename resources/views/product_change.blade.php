@extends('layouts.app')

@section('content')

<form action="{{ route('product_update',['id'=>$product_id->id]) }}" enctype="multipart/form-data" method="POST" id="new">
  
      @csrf
        
        <div class="form-group">
          <p>
            product_type
          </p>
          <input type="text" class="w-3/4 @error('title') border-red-400 @endif" name="type" placeholder="type" required value="{{ $product_id->type }}">
        </div>
        
        <div class="form-group">
          <p>
            product_image
          </p>
          <input type="file" name="image" id="image" onchange="setImage(this);" onclick="this.value = '';" accept="image/png, image/jpeg"
          class="form-control-file">
          <img src="{{ asset(Storage::url($product_id->img_path)) }}" id="preview" class="diary_preview">
        </div>

        <div class="form-group">
          <p>
            product_explanation
          </p>
          <textarea name="product_explanation" class="w-3/4 @error('product_explanation') border-red-400 @endif" id="" cols="30" rows="10" required>{{ $product_id->product_explanation }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">
          編集する
        </button>

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