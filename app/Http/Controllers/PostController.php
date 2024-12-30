<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }


    public function filestore(Request $request){

        $validated = $request->validate([
            'name' =>'required',
            'description' => 'required',
            'image' => 'nullable',
        ]);

        //upload Image
        $imageName=null;
        if(isset($request->image)){
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();

        return redirect()->route('home')->with('success', 'Your Post has been created');
    }

    public function editData($id){
        $post = Post::findOrFail($id);
            return view('edit',['ourPost'=> $post]);
    }

    public function updateData($id, Request $request){
            $post = Post::findOrFail($id);

            $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'nullable',
            ]);

            //upload Image
            if (isset($request->image)) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $post->image = $imageName;
            }


            $post->name = $request->name;
            $post->description = $request->description;


            $post->save();

            return redirect()->route('home')->with('success', 'Your Post has been Updated');
    }
        public function deleteData($id){
                $post = Post::findOrFail($id);
                $post->delete();

                flash()->success('Your Post has been Deleted');
        return redirect()->route('home');
        }
}
