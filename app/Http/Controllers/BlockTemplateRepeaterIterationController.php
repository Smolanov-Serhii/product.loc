<?php

namespace App\Http\Controllers;

use App\Models\BlockTemplateRepeaterIteration;
use Illuminate\Http\Request;

class BlockTemplateRepeaterIterationController extends Controller
{

//    TODO make invokable
    /**
     * Remove the specified resource from storage.
     *
     * @param BlockTemplateRepeaterIteration $iteration
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlockTemplateRepeaterIteration $iteration)
    {
        if($iteration->delete()){
            return response()->json([
                'status' => true,
                'id' => $iteration->id,
                'toasts' => [
                    'title' => 'Удалено',
                    'body' => '',
                    'class' => 'bg-warning'
                ],
            ]);
        }
    }
}
