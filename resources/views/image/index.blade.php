<h1>All images</h1>

@foreach ($images as $image)
  <div class="">
    <a href="{{ $image->permalink() }}" class="">
      <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="300" />
    </a>
  </div>
@endforeach
