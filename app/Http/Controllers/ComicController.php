<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all(); 
        return view("admin.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newComic = new Comic();
        $newComic->title = $request["title"];
        $newComic->description = $request["description"];
        $newComic->thumb = $request["thumb"];
        $newComic->price = $request["price"];
        $newComic->series = $request["series"];
        $newComic->sale_date = $request["sale_date"];
        $newComic->type = $request["type"];
        
        $newComic->slug = Str::slug($request["sale_date"] . " " . $request["title"], '-');

        $newComic->save();

        return redirect()->route("comics.index", $newComic->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $comic = Comic::Where("slug", $slug)->firstOrFail();

        return view("guest.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $comic = Comic::Where("slug", $slug)->firstOrFail();

        return view("admin.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $editedData = $request->all();
        $selectedComic = Comic::Where("slug", $slug)->firstOrFail();
        $selectedComic["slug"] = Str::slug($editedData["sale_date"] . " " . $editedData["title"], '-');
        $selectedComic->update($editedData);

        return redirect()->route("comics.index", $selectedComic->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
