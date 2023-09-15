<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function All(){
        $data = DB::table('Blogs')->get();
        return view('global',['data' => $data]);
    }

    public function Insert(Request $request) {
        $username = $request->input('username');
        $title = $request->input('title');
        $theme = $request->input('theme');
        $content = $request->input('content');
        $uimage = null; 
        $request-> validate([
            
            'title'=>'required|max:11|min:8|unique:Blogs',
            'theme'=>'required',
            'content'=>'required|min:20'
            ]);
        $userImage = DB::table('users')
            ->where('username', $username)
            ->select('img')
            ->first();
    
        if ($userImage) {
            $uimage = $userImage->img;
        }
    
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move(public_path('img'), $filename); 
    
            DB::table('Blogs')->insert([
                'username' => $username,
                'uimage' => $uimage, 
                'title' => $title,
                'theme' => $theme,
                'content' => $content,
                'img' => $filename,
            ]);
    
            return view('cblog')->with('success', 'Created successfully!');
        } else {
            DB::table('Blogs')->insert([
                'username' => $username,
                'uimage' => $uimage, 
                'title' => $title,
                'theme' => $theme,
                'content' => $content,
                'img' => "alt.png",
            ]);
    
            return view('cblog')->with('success', 'Created successfully!');
        }
    }

    
    
    



    public function searchuser(Request $request)
    {
        $title = $request->input('title');
        $user = session('username');
    
        $results = DB::table('Blogs')
                    ->where('username', '=', $user)
                    ->where('title', 'ILIKE', '%' . $title . '%')
                    ->get();
        if ($results->isEmpty()) {
            return view('vietitle', ['message' => 'No items found']);
        } else 
        {
            return view('vietitle', ['result' => $results]);
            }
       
    }
    


    public function viewucon(){
        $username=session('username');
        $result = DB::table('Blogs')
                ->where('username', '=', $username)

                ->get();
                return view('vie',['result'=>$result]);
    }


    public function search(Request $request)
    {
        $title = $request->input('title');
        $results = DB::table('Blogs')
                    ->where('title', 'ILIKE', '%' . $title . '%')
                    ->get();

                    
        if ($results->isEmpty()) {
            return view('global1', ['message' => 'No items found']);
        } else 
        {
            return view('global1', ['result' => $results]);
        }
       
    }
    public function ed(Request $request)
    {
        
        return view('edit',$request->input());
    }
    public function edit(Request $request)
    {
        $id=$request->input('id');
        $username=session('username');
        $title=$request->input('title');
        $theme=$request->input('theme');
        $content=$request->input('cont');
         DB::table('Blogs')
              ->where('id', '=', $id)
              ->update(['content'=>$content,'title'=>$title,'theme'=>$theme]);
            return redirect('vie');
    }
    public function delete(Request $request)
    {
        $id=$request->input('id'); 
        $deleted = DB::table('Blogs')->where('id', '=', $id)->delete();
            return redirect('vie');
    }


    public function like(Request $request)
{
   
    $post_id = $request->input('post_id');

    
    DB::table('Blogs')->where('id', $post_id)->increment('likes');

    
    return redirect('global');
}
}
