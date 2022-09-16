@extends("layouts.main")

@section("title", "Edit a comic")

@section("main-content")
    <h2>Edit a comic</h2>

    <form action="{{ route("comics.update", $comic->slug) }}" method="POST">
        @csrf
        @method("PUT")
        
        <label for="title-input">Title</label>
        <input required type="text" name="title" id="title-input" value="{{ old("title", $comic->title) }}">
        @error("title")
            <div class="displayed-error">{{ $message }}</div>
        @enderror

        <label for="description-input">Description</label>
        <textarea required type="text" name="description" id="description-input">
            {{ old("description", $comic->description) }}
        </textarea>
        @error("description")
            <div class="displayed-error">{{ $message }}</div>
        @enderror
        
        <label for="thumb-input">Thumb</label>
        <input required type="text" name="thumb" id="thumb-input" value="{{ old("thumb", $comic->thumb) }}">
        @error("thumb")
            <div class="displayed-error">{{ $message }}</div>
        @enderror
        
        <label for="price-input">Price</label>
        <input required type="text" name="price" id="price-input" value="{{ old("price", $comic->price) }}">
        @error("price")
            <div class="displayed-error">{{ $message }}</div>
        @enderror
        
        <label for="series-input">Series</label>
        <input required type="text" name="series" id="series-input" value="{{ old("series", $comic->series) }}">
        @error("series")
            <div class="displayed-error">{{ $message }}</div>
        @enderror
        
        <label for="sale-date-input">Sale Date</label>
        <input required type="date" name="sale_date" id="sale-date-input" value="{{ old("sale_date", $comic->sale_date) }}">
        @error("sale_date")
            <div class="displayed-error">{{ $message }}</div>
        @enderror
        
        <label for="type-input">Type</label>
        <select required name="type" id="type-input">
            <option value="comic book">Comic book</option>
            <option value="graphic novel">Graphic novel</option>
        </select>
        @error("type")
            <div class="displayed-error">{{ $message }}</div>
        @enderror

        <input type="submit" value="Edit">
    </form>

@endsection