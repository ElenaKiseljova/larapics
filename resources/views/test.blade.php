<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Blade Components</title>
</head>

<body>
  @php
    $src = 'logo.svg';
  @endphp
  <x-icon :icon-src="$src" />

  <x-ui.button />
</body>

</html>
