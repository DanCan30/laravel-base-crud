@extends("layouts.main")

@section("title", $comic->title)

@section("main-content")
    <div class="comic-card">
        <div class="comic-thumb-container">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}' thumbnail">
        </div>
        <div class="comic-infos">
            <h3>
                {{ $comic->title }}
            </h3>
            <h4>
                {{ $comic->series }}
            </h4>
            <h4>
                {{ $comic->price }}
            </h4>

            <p>
                {{ $comic->description }}
            </p>
        </div>
    </div>
@endsection