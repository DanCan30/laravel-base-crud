@extends("layouts.main")

@section("title", $comic->title)

@section("main-content")
    <div class="show-buttons-container">
        <a href="{{ route("comics.edit", $comic->slug) }}">Edit</a>
        <form action="{{ route("comics.destroy", $comic->slug) }}" method="POST" class="delete-element-button">
            @csrf @method("DELETE")
            <button type="submit">Delete</button>
        </form>
    </div>

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

@section("scripts")
    <script>

        const deleteElement = document.querySelector(".delete-element-button");
            
            deleteElement.addEventListener("submit", function(event) {

                event.preventDefault();

                const response = window.confirm("Your choice can't be reverted. Are you sure you want to delete this record?");
                if (response) {
                    this.submit();
                }    
            })

    </script>
    
@endsection