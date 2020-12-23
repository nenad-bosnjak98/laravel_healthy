<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Smoothie;
use DB;

class SmoothieController extends Controller
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
            'smoothienum'=> Smoothie::orderBy('created_at', 'desc')->paginate(2),
            'title'=>'VICTUS'
         );
         return view('pages.smoothies')->with($data);
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
        return view('pages.create_smoothie')->with($data);
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
        
        
        $post = new Smoothie;
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('/smoothies')->with('success', "Post Created");
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
            'smoothienum'=> Smoothie::find($id),
            'title'=>'VICTUS'
         );
         return view('pages.show_smoothies')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $smoothie = Smoothie::find($id);
         if(auth()->user()->id !== $smoothie->user_id) {
            return redirect('/salads')->with('error', 'Unauthorized Page');
        }
         return view('pages.smoothie_edit')->with('smoothienum', $smoothie);
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
        
        $post = Smoothie::find($id);
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('/smoothies')->with('success', "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Smoothie::find($id);
        if(auth()->user()->id !== $post->user_id) {
            return redirect('/salads')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/cover_images/'. $post->cover_image);
        }

        $post->delete();
        return redirect('/smoothies')->with('success', "Post Removed");
    }
}
