<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Salad;
use DB;

class SaladController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
           'saladnum'=> Salad::orderBy('created_at', 'desc')->paginate(2),
           'title'=>'VICTUS'
        );
        return view('pages.salads')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'=>'VICTUS'
         );
        return view('pages.create_salad')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:10000'
        ]);

        if($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName. '_' .time(). '.' .$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        
        $post = new Salad;
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('/salads')->with('success', "Post Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'saladnum'=> Salad::find($id),
            'title'=>'VICTUS'
         );
         return view('pages.show_salads')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salad = Salad::find($id);
         if(auth()->user()->id !== $salad->user_id) {
             return redirect('/salads')->with('error', 'Unauthorized Page');
         }
         return view('pages.salad_edit')->with('saladnum', $salad);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:10000'
        ]);

        if($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName. '_' .time(). '.' .$extension;

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        
        $post = Salad::find($id);
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/salads')->with('success', "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Salad::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/salads')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/'. $post->cover_image);
        }

        $post->delete();
        return redirect('/salads')->with('success', "Post Removed");
    }
}
