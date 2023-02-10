<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Episodes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row g-2">
            @if (count($episodes) == 0)
                <h2>Episodes not loaded!</h2>
            @else
                @foreach ($episodes as $episode)
                    <span class="col-sm-6 col-md-4">
                        <div class="card p-1">
                            <img src="{{ $episode->image }}" class="card-img-top">
                            <h5 class="card-title">{{ $episode->name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ 'Season ' . $episode->season . ' Episode ' . $episode->episode }}</h6>
                            <p class="card-text">{!! $episode->summary !!}</p>
                        </div>
                    </span>
                @endforeach
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
