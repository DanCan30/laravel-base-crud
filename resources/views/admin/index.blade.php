@extends("layouts.main")

@section("title", "Admin index")

@section("main-content")

    <h2>
        Welcome back Admin!
    </h2>
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
                    <a href="{{ route("comic.show", $comic->slug) }}">
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
            </tr>
            @empty
                <h2>
                    There are no comics.
                </h2>
            @endforelse
        </tbody>
    </table>
@endsection