<x-layout title="Discover free images">
  <section class="py-3 border-bottom bg-white">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <a href="{{ route('images.create') }}" class="btn btn-primary">
            <x-icon iconSrc="upload.svg" alt="Upload" class="me-2" />
            <span>Upload</span>
          </a>
        </div>
        <div class="col"></div>
        <div class="col text-right">
          <form class="search-form">
            <input type="search" name="q" placeholder="Search..." aria-label="Search..." autocomplete="off">
          </form>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid mt-4">
    <x-flash-message />

    <div class="row" data-masonry='{"percentPosition": true }'>
      @foreach ($images as $image)
        <div class="col-sm-6 col-lg-4 mb-4">
          <div class="card">
            <a href="{{ $image->permalink() }}">
              <img src="{{ $image->fileUrl() }}" height="100%" alt="{{ $image->title }}" class="card-img-top">
            </a>
            @canany(['update', 'delete'], $image)
              <div class="photo-buttons">
                @can('update', $image)
                  <a href="{{ $image->route('edit') }}" class="btn btn-sm btn-info me-2">Edit</a>
                @endcan

                @can('delete', $image)
                  <x-form action="{{ $image->route('destroy') }}" method="delete">
                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                  </x-form>
                @endcan
              </div>
            @endcanany
          </div>
        </div>
      @endforeach
    </div>
    {{ $images->links() }}
  </div>
</x-layout>
