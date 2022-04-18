<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\post; // model create db quires 
use App\Models\user;
use  App\Http\Requests\storePostRequest;

use function GuzzleHttp\Promise\all;

class PostsController extends Controller{
    public function index (){
        //return all data in data base 
         $allposts=post::paginate(10);
        return view('posts.index',[
            'allposts'=>$allposts,
        ]);

    }
    public function create(){
        $users=user::all();
        return view('posts.create',[
            'users'=>$users,
        ]);

    }
    //action responsible for storing data that comes from form //
    public function store(storePostRequest $request){
        $data=request()->all();
        post::create([
            'title'=>$data['title'],
            'Description'=>$data['Description'],
            'user_id' => $data['user_id'],
            'posted_by'=>$data['user_id']
        ]);
       //redirect to /posts
       return to_route('posts.index');
    }
    public function show($post){
        $dbpost=post::find($post);
       // dd($dbpost);
        $userf=$dbpost->posted_by;
          $userEmail=user::find($userf)->email ?? null;
          $userName=user::find($userf)->name ?? null ;
        return view('posts.show',[
            'postview'=>$dbpost,
            'userEmail'=>$userEmail ?? null,
            'userName'=>$userName ?? null
        ]);
    } 
    public function edit($post){
        $spost=post::findOrFail($post);
        $users=user::all();
        return view('posts.edit',['post'=>$spost,
        'users'=>$users,
    ]);
    }
    public function update($post){
        $data=request()->all();
        $singlepost=post::findOrFail($post);
            $singlepost->update([
                'title'=>$data['title'],
                'description'=>$data['description']
            ]);
        return to_route('posts.index');
    }
    public function destroy($post){
       $spost=post::find($post);
       $spost->delete();
       return to_route('posts.index');
    }
}
?>