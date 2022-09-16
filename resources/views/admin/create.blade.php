@extends("layouts.main")

@section("title", "Add a new comic")

@section("main-content")
    <h2>Add a new comic</h2>

        
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route("comics.store") }}" method="POST">
        @csrf
        
        <label for="title-input">Title</label>
        <input required type="text" name="title" id="title-input">

        <label for="description-input">Description</label>
        <textarea required type="text" name="description" id="description-input">
        </textarea>
        
        <label for="thumb-input">Thumb</label>
        <input required type="text" name="thumb" id="thumb-input">
        
        <label for="price-input">Price</label>
        <input required type="text" name="price" id="price-input">
        
        <label for="series-input">Series</label>
        <input required type="text" name="series" id="series-input">
        
        <label for="sale-date-input">Sale Date</label>
        <input required type="date" name="sale_date" id="sale-date-input">
        
        <label for="type-input">Type</label>
        <select required name="type" id="type-input">
            <option value="comic book">Comic book</option>
            <option value="graphic novel">Graphic novel</option>
        </select>

        <input type="submit" value="Add">
    </form>

@endsection