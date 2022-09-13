@extends("layouts.main")

@section("title", "Homepage")

@section("main-content")
    <h2>
        Welcome Adventurer...
    </h2>
    <h4>Our last Comics</h4>

    <div class="comics-container">

        @forelse ($comics as $comic)
            
            <div class="comic-mini-card">
                <a href="{{ route("comic.show", $comic->slug) }}">

                    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                    <h3>
                        {{ $comic->title }}
                    </h3>
                </a>
            </div>
        @empty
            <h3>There are no comics.</h3>    
        @endforelse

    </div>

@endsection 

@section("admin")
    <div class="admin-button">
        <a href="{{ route("admin.index") }}">Are you an admin? Click here to show the admin screen.</a>
    </div>    
@endsection 