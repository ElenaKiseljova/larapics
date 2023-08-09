<h1>Upload new Image</h1>

<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="">
    <label for="file">
      File
    </label>

    <input type="file" name="file" id="file">
    @error('file')
      <div class="">{{ $message }}</div>
    @enderror
  </div>

  <div class="">
    <label for="title">
      Title
    </label>

    <input type="text" name="title" id="title" value="{{ old('title') }}">
    @error('title')
      <div class="">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit">Upload</button>
</form>
