<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        dd($this->post());
        $posts = $this->post->paginate(5);
        $postsColection = new PostCollection($posts);

        return $this->sentSuccessResponse($postsColection, 'success', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $dataCreate = $request->all();
        $post = $this->post->create($dataCreate);
        $postResource = new PostResource($post);
        return $this->sentSuccessResponse($postResource, 'success', Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->post->findOrFail($id);
        $postResource = new PostResource($post);
        return $this->sentSuccessResponse($postResource, 'success', Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = $this->post->findOrFail($id);
        $dataUpdate = $request->all();
        $post->update($dataUpdate);
        $postResource = new PostResource($post);
        return $this->sentSuccessResponse($postResource, 'success', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = $this->post->findOrFail($id);
        $post->delete();
        $postResource = new PostResource($post);
        return $this->sentSuccessResponse($postResource, 'deleted', Response::HTTP_OK);
    }
}