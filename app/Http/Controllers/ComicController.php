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

    protected $validationRules = [
        "title" => "required|min:5",
        "description" => "min:5",
        "thumb" => "required|active_url",
        "price" => "required|numeric|between:1, 199.99",
        "series" => "required|min:5|max:40",
        "sale_date" => "required|date|before:today",
        "type" => "required|exists:comics,type"
    ];

    protected $validationErrorMessages = [
        "title.require" => "The title is necessary.",
        "title.min" => "The title must be at least 5 characters.",
        "description.min" => "The description is too short.",
        "thumb.require" => "The thumb is necessary.",
        "thumb.active_url" => "The thumb's URL is not valid.",
        "price.require" => "The price is necessary.",
        "price.numeric" => "Please insert only numbers.",
        "price.between" => "The price must be between 1 and 199.99€, for special/limited editions please contact the admins.",
        "series.require" => "The series is necessary.",
        "series.min" => "The series must be at least 5 characters.",
        "series.max" => "The series is too long.",
        "sale_date.required" => "Please select a sale date.",
        "sale_date.date" => "The sale date must be a date.",
        "sale_date.before" => "For real do you come from the future?",
        "type.require" => "Please select a type.",
        "type.exists" => "Please select a type from the list.",




    ];
    
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
        $validatedData = $request->validate($this->validationRules, $this->validationErrorMessages);

        $newComic = new Comic();
        $data = $request->all();
        $newComic->fill($data);
        $newComic["slug"] = Str::slug($request["sale_date"] . " " . $request["title"], '-');
        $newComic->save();

        return redirect()->route("comics.index", $newComic->slug)->with("added", $newComic->title);
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
        $validatedData = $request->validate($this->validationRules, $this->validationErrorMessages);

        $editedData = $request->all();
        $selectedComic = Comic::Where("slug", $slug)->firstOrFail();
        $selectedComic["slug"] = Str::slug($editedData["sale_date"] . " " . $editedData["title"], '-');
        $selectedComic->update($editedData);

        return redirect()->route("comics.index", $selectedComic->slug)->with("updated", $selectedComic->title);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $selectedComic = Comic::Where("slug", $slug)->firstOrFail();
        $selectedComic->delete();

        return redirect()->route("comics.index")->with("deleted", $selectedComic->title);
    }
}
