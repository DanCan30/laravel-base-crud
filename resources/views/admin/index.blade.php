@extends("layouts.main")

@section("title", "Admin index")

@section("main-content")

    <h2>
        Welcome back Admin!
    </h2>
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
                    <form action="{{ route("comics.destroy", $comic->slug) }}" method="POST">
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