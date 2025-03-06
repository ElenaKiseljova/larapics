<h1>Upload new Image</h1>

<x-form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
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
</x-form>
