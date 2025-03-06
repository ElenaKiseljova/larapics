<div
  {{ $attributes->class(['alert-dismissible fade show' => $dismissible])->merge(['class' => "alert alert-{$validType}", 'role' => $attributes->prepends('alert')]) }}>
  Waste no more time arguing what a good man should be, be one. - Marcus Aurelius

  @if ($dismissible)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  @endif
</div>
