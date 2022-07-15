<?php

namespace App\Http\Controllers;

use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateStatusLanguageRequest;
use App\Models\Language;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Repositories\LanguageRepository;

class LanguageController extends Controller
{
    private LanguageRepository $languageRepository;

    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $languages = Language::all();

        return view('admin.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $language = new Language;

        return view('admin.language.create', compact('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLanguageRequest $request
     * @return RedirectResponse
     */
    public function store(StoreLanguageRequest $request): RedirectResponse
    {
        $this->languageRepository->create($request->all());

        return redirect()
            ->route('admin.language.index');
    }

    /**
     * Update status a created resource in storage.
     *
     * @param UpdateStatusLanguageRequest $request
     * @param Language $language
     * @return JsonResponse
     */
    public function updateStatus(UpdateStatusLanguageRequest $request, Language $language): JsonResponse
    {
        $language->update($request->all());

        return response()->json([
            'message' => "{$language->iso} {$language->enabled}"
        ]);
    }

//
//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Language  $language
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Language $language)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Language  $language
//     * @return \Illuminate\Http\Response
//     */
    public function edit(Language $language)
    {
        return view('admin.language.update', compact('language'));
    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Language  $language
//     * @return \Illuminate\Http\Response
//     */
    public function update(StoreLanguageRequest $request, Language $language)
    {
        $this->languageRepository->update($language, $request->all());

        return redirect('admin/language');
    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Language  $language
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Language $language)
//    {
//        //
//    }
}
