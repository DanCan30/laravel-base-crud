@extends("layouts.main")

@section("title", $comic->title)

@section("main-content")

    <a href="{{ route("comics.edit", $comic->slug) }}">Edit</a>
    <form action="{{ route("comics.destroy", $comic->slug) }}" method="POST">
        @csrf @method("DELETE")
        <button type="submit">Delete</button>
    </form>

    <div class="comic-card">
        <div class="comic-thumb-container">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}' thumbnail">
        </div>
        <div class="comic-infos">
            <h3>
                {{ $comic->title }}
            </h3>
            <h4>
                {{ $comic->series }} <br>
                Price: {{ $comic->price }} €
            </h4>

            <p>
                {{ $comic->description }}
            </p>
        </div>
    </div>

@endsection