<x-layout :title="$user->username">
  <section class="jumbotron-author-image-background"
    @if ($user->hasCoverImage()) style="background-image: url({{ $user->coverImageUrl() }});" @endif>
    <div class="jumbotron jumbotron-fluid py-4">
      <div class="container-fluid text-center">
        <h1 class="jumbotron-heading">{{ $user->username }}</h1>
        <p class="lead">
          {{ $user->inlineProfile() }}
        </p>
        <img src="{{ $user->profileImageUrl() }}" width="150" class="rounded-circle" alt="{{ $user->name }}">
        <div class="mt-3">
          <ul class="list-unstyled list-inline">
            @foreach ($user->socialList() as $key => $social)
              <li class="list-inline-item">
                <a href="{{ $social }}" title="{{ ucfirst($key) }}">
                  <x-icon iconSrc="{{ $key }}.svg" alt="{{ ucfirst($key) }}" />
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="container-fluid mt-4">
    @if ($images->count())
      @include('shared._grid-images', ['images' => $images])
    @else
      <x-alert type="warning">
        <h4 class="alert-heading">Wow</h4>
        <p>That's a very clean portfolio!</p>
      </x-alert>
    @endif
  </div>
</x-layout>
