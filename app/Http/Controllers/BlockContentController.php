<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\BlockContent;
use App\Services\ContentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlockContentController extends Controller
{

    private $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Block $block
     * @return JsonResponse
     */
    public function edit(Block $block): JsonResponse
    {
        $u_id = rand(2e9, 2e12);
        return response()->json([
            'status' => true,
            'form' => view('admin.content.includes.update_form', compact('block', 'u_id'))->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Block $block
     * @return JsonResponse
     */
    public function update(Request $request, Block $block): JsonResponse
    {

        $data = $request->all();

        $this->contentService->update($data, $block);

        return response()->json([
            'status' => true,
            'toasts' => [
                'title' => '+',
                'body' => '',
                'class' => 'bg-primary'
            ],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse|null
     */
    public function destroy(Request $request): ?JsonResponse
    {
        dd('TODO FIX');
        $data = $request->all();
        BlockContent::findOrFail($data['content_id'])->delete();

        return response()->json(['status' => 'ok']);
    }
}
