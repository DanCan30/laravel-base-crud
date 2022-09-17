
    <form action="{{ route($routeName, $comic->slug) }}" method="POST">
        @csrf
        @method($HTTPMethod)
        
        <label for="title-input">Title</label>
        <input required type="text" name="title" id="title-input" value="{{ old("title", $comic->title) }}">
        {{-- @error("title")
            <div class="displayed-error">{{ $message }}</div>
        @enderror --}}
        @include("includes.error", [$inputName = "title"])

        <label for="description-input">Description</label>
        <textarea required type="text" name="description" id="description-input">
            {{ old("description", $comic->description) }}
        </textarea>
        @include("includes.error", [$inputName = "description"])
        
        <label for="thumb-input">Thumb</label>
        <input required type="text" name="thumb" id="thumb-input" value="{{ old("thumb", $comic->thumb) }}">
        @include("includes.error", [$inputName = "thumb"])
        
        <label for="price-input">Price</label>
        <input required type="text" name="price" id="price-input" value="{{ old("price", $comic->price) }}">
        @include("includes.error", [$inputName = "price"])
        
        <label for="series-input">Series</label>
        <input required type="text" name="series" id="series-input" value="{{ old("series", $comic->series) }}">
        @include("includes.error", [$inputName = "series"])
        
        <label for="sale-date-input">Sale Date</label>
        <input required type="date" name="sale_date" id="sale-date-input" value="{{ old("sale_date", $comic->sale_date) }}">
        @include("includes.error", [$inputName = "sale_date"])
        
        <label for="type-input">Type</label>
        <select required name="type" id="type-input">
            <option value="comic book">Comic book</option>
            <option value="graphic novel">Graphic novel</option>
        </select>
        @include("includes.error", [$inputName = "type"])

        <input type="submit" value="{{ $submitType }}">
    </form>
