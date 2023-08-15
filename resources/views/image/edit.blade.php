<h1>Edit Image</h1>

<form action="{{ $image->route('update') }}" method="POST">
  @csrf

  @method('PUT')

  <div class="">
    <img src="{{ $image->fileUrl() }}" alt="{{ $image->title }}" width="400" />
  </div>

  <div class="">
    <label for="title">
      Title
    </label>

    <input type="text" name="title" id="title" value="{{ old('title', $image->title) }}">
    @error('title')
      <div class="">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit">Update</button>
</form>
