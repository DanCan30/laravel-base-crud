@extends("layouts.main")

@section("title", "Add a new comic")

@section("main-content")
    
    <form action="{{ route("comics.store") }}" method="POST">
        @csrf
        
        <label for="title-input">Title</label>
        <input type="text" name="title" id="title-input">

        <label for="description-input">Description</label>
        <textarea type="text" name="description" id="description-input">
        </textarea>
        
        <label for="thumb-input">Thumb</label>
        <input type="text" name="thumb" id="thumb-input">
        
        <label for="price-input">Price</label>
        <input type="text" name="price" id="price-input">
        
        <label for="series-input">Series</label>
        <input type="text" name="series" id="series-input">
        
        <label for="sale-date-input">Sale Date</label>
        <input type="date" name="sale_date" id="sale-date-input">
        
        <label for="type-input">Type</label>
        <select name="type" id="type-input">
            <option value="graphic novel">graphic novel</option>
            <option value="comic book">comic book</option>
        </select>

        <input type="submit" value="Add">
    </form>

@endsection