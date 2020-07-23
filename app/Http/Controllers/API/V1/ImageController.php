<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5000'
        ]);

        $user = Auth::user();
        $image = $request->file('image');
        $filename = $user->id . "_" . time() . "_" . preg_replace('/\s+/', '_', strtolower($image->getClientOriginalName()));
        $image->storeAs('public/prof_pic/', $filename, 'local');

        $prof_pic = new Image(['path' => $filename]);

        $user->image()->save($prof_pic);
        return response()->json(['profile_link' => Storage::url('prof_pic/' . $filename)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
