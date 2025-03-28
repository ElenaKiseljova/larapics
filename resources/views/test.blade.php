<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blade Components</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  @php
    $src = 'logo.svg';
  @endphp
  <x-icon :icon-src="$src" />

  <x-ui.button />

  <x-alert type="warning" dismissible id="my-alert" class="mt-4" role="flash">
    <x-slot name="title">Success</x-slot>
    {{-- <x-slot:title>Success</x-slot> --}}

    {{-- {{ $component->icon() }} --}}
    {{-- {{ $component->icon(asset('icons/heart.svg')) }} --}}

    <p class="mb-0">Data has been removed. {{ $component->link('Undo') }}</p>
  </x-alert>

  <x-form action="/images" method="post">
    <input type="text" name="name">

    <button type="submit">Submit</button>
  </x-form>
</body>

</html>
