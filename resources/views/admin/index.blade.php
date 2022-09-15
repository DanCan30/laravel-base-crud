@extends("layouts.main")

@section("title", "Admin index")

@section("main-content")

    <h2>
        Welcome back Admin!
    </h2>


    @if ( session("deleted") )

        <div class="element-changed removed">
            The comic "{{ session("deleted") }}" has been removed succesfully.
        </div>

    @elseif ( session("updated") )
    
        <div class="element-changed updated">
            The comic "{{ session("updated") }}" has been updated succesfully.
        </div>
    @elseif ( session("added") )
        
        <div class="element-changed added">
            The comic "{{ session("added") }}" has been added succesfully.
        </div>
    @endif


    <div class="add-button-container">
        <a href="{{ route("comics.create") }}">Add</a>
    </div>
    <table>
        <thead>
            <td>ID</td>
            <td>Title</td>
            <td>Series</td>
            <td>Price</td>
            <td>Sales started</td>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
            <tr>
                <td>
                    {{ $comic->id }}
                </td>
                <td>
                    <a href="{{ route("comics.show", $comic->slug) }}">
                        {{ $comic->title }}
                    </a>
                </td>
                <td>
                    {{ $comic->series }}
                </td>
                <td>
                    {{ $comic->price }} €
                </td>
                <td>
                    {{ $comic->sale_date }}
                </td>
                <td>
                    <a href="{{ route("comics.edit", $comic->slug) }}">Edit</a>
                    <form action="{{ route("comics.destroy", $comic->slug) }}" method="POST" class="delete-element-button">
                        @csrf @method("DELETE")
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <h2>
                    There are no comics.
                </h2>
            @endforelse
        </tbody>
    </table>
@endsection

@section("scripts")
    <script>

        const deleteElement = document.querySelectorAll(".delete-element-button");

        deleteElement.forEach(element=> {
            
            element.addEventListener("submit", function(event) {

                event.preventDefault();

                const response = window.confirm("Your choice can't be reverted. Are you sure you want to delete this record?");
                if (response) {
                    element.submit();
                } 
                    
            })
        }

        )

    </script>
    
@endsection