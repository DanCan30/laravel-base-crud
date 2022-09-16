@extends("layouts.main")

@section("title", "Edit a comic")

@section("main-content")
    <h2>Edit a comic</h2>

    @include("admin.form", [$routeName = "comics.update", $HTTPMethod = "PUT", $submitType = "Edit"])
@endsection