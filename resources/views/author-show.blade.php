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
            <li class="list-inline-item">
              <a href="#" title="Facebook"><img src="icons/facebook.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#" title="Twitter"><img src="icons/twitter.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#" title="Instagram"><img src="icons/instagram.svg" alt=""></a>
            </li>
            <li class="list-inline-item">
              <a href="#" title="Website"><img src="icons/website.svg" alt=""></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <div class="container-fluid mt-4">
    <div class="row" data-masonry='{"percentPosition": true }'>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img1.jpeg" height="100%" alt="Image 1" class="card-img-top"></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img2.jpeg" height="100%" alt="Image 2" class="card-img-top"></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img3.jpeg" height="100%" alt="Image 3" class="card-img-top"></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img4.jpeg" height="100%" alt="Image 4" class="card-img-top"></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img5.jpeg" height="100%" alt="Image 5" class="card-img-top"></a>
        </div>
      </div>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <a href="show.html"><img src="images/img6.jpeg" height="100%" alt="Image 6" class="card-img-top"></a>
        </div>
      </div>
    </div>
    <nav class="mt-4">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
</x-layout>
