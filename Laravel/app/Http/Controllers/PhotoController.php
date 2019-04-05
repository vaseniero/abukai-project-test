<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return Photo::all();
    }

    public function show(Photo $photo)
    {
        return $photo;
    }

    public function store(Request $request)
    {
        $photo = Photo::create($request->all());

        return response()->json($photo, 201);
    }

    public function update(Request $request, Photo $photo)
    {
        $photo->update($request->all());

        return response()->json($photo, 200);
    }

    public function delete(Photo $photo)
    {
        $photo->delete();

        return response()->json(null, 204);
    }
}
