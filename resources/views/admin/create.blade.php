@extends("layouts.main")

@section("title", "Add a new comic")

@section("main-content")
    <h2>Add a new comic</h2>

    @include("includes.form", [$routeName = "comics.store", $HTTPMethod = "POST", $submitType = "Add"])
@endsection