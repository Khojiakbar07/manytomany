<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

    $post = Post::create(['name'=>'My post PHP']);

    $tag1 = Tag::find(1);

    foreach($post->tags as $tag1){
        echo $tag1;
    }

    $video = Video::create(['name'=>'video.mov']);

    $tag2 = Tag::find(2);

    foreach($video->tags as $tag2){
        echo $tag2;
    }
});

Route::get('/read', function () {

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){
        echo $tag;
    }
});

Route::get('/update', function () {

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        return $tag->whereName('PHP')->update(['name'=>'Update PHP']);

    }

});