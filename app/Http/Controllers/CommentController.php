<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View | Factory
     */
    public function index(): ?View
    {
        $comments = (new Comment)->firstLevel()->get();

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Comment $comment
     * @return JsonResponse
     */
    public function create(Comment $comment): JsonResponse
    {
        return response()->json([
            'form' => view('client.includes.comments.form', ['commentable' => $comment])->render(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(StoreCommentRequest $request): JsonResponse
    {
        $data = $request->all();

//        $rules = (new StoreCommentRequest())->rules();

//        $validator = Validator::make($data, $rules);

        try {
            $commentable = (new $data['commentable_type'])::find($data['commentable_id']);

            $target_id = class_basename($commentable) . "_{$commentable->id}";

//            if ($validator->fails()) {
//
//                return response()->json([
//                    'errors' => $validator->errors(),
//                    'target_id' => $target_id,
//                    'status' => false,
//                ]);
//            } else {


                $commentable->commentAsUser(auth()->user(), $data['comment']);

                return response()->json([
                    'status' => true,
                    'target_id' => $target_id,
                    'message' => 'Ваш комментарий ожидает можерации'
                ]);
//            }
        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'target_id' => $target_id,
            ]);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Comment $comment
     * @param Request $request
     * @return JsonResponse
     */
    public function moderate(Comment $comment, Request $request): JsonResponse
    {
        $comment->update([
            'is_approved' => request('is_approved'),
        ]);

        return response()->json([
            'message' => "comment '{$comment->comment}' status {$request->get('is_approved')}"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy(Comment $comment): ?RedirectResponse
    {
        if ($comment->delete()) {
            return redirect()->route('admin.comment.index');
        }
        return back();
    }
}
