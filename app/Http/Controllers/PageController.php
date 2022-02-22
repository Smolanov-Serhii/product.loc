<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Language;
use App\Models\ModelAddition;
use App\Models\ModelSeo;
use App\Models\Page;
use App\Models\PageProperty;
use App\Repositories\PageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\View\View;

class PageController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $pages = $this->pageRepository->tree();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $pages = Page::all();
        $languages = Language::enabled()->get();
        $model = new Page;
        $aliases = ModelAddition::all()->pluck('alias')->toArray();

        return view('admin.pages.create', compact('pages', 'languages', 'model', 'aliases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePageRequest $request): RedirectResponse
    {
        $this->pageRepository->create([
            'page' => $request->except('additions', 'seo'),
            'additions' => request('additions'),
            'seo' => request('seo')
        ]);

        return redirect('admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * //     * @param \App\Models\Page $pages
     *
     * @return View
     */
//    public function show(Request $request)
    public function show($alias = 'main')
    {
        $model = ModelSeo::where('alias', $alias)
                ->first()
            ??
            ModelSeo::where('alias', '404')
                ->first();;

        if ($model->seoable->auth_only && !auth()->user()) {
            echo 403;
            die;
//            return abort(403);
        }

        return view('client.page.content', compact('model'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $page Page
     * @return View
     */
    public function edit(Page $page): View
    {
        $model = $page;
        $pages = Page::all();
        $languages = Language::enabled()->get();
        $aliases = ModelSeo::where('alias', '!=', optional($page->seo)->alias)->pluck('alias')->toArray();

        return view('admin.pages.update', compact('model', 'pages', 'languages', 'aliases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePageRequest $request
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePageRequest $request, Page $page)
    {
        $data = $request->all();

        $page->update($data);

        foreach ($data['additions'] as $lang => $addition) {
            if (
                $request->hasFile("additions.$lang.thumbnail")
                && $request->file("additions.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("additions.$lang.thumbnail")->store('additions');
                $path_ar = explode('/', $imageURL);
                $addition['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/additions/') . $addition['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/additions/') . '/thumbs/' . $addition['thumbnail']);
            }

            if (isset($data['additions'][$lang])) {
                $lang_id = Language::where('iso', $lang)->first()->id;

                $model_addition = $page->addition($lang_id);
                if ($model_addition) {

                    $model_addition->update($addition);
                } else {
                    $addition['lang_id'] = $lang_id;
                    ModelAddition::create($addition);
                }
            }
        }
//dd($data['seo']);
        foreach ($data['seo'] as $lang => $seo) {
            if (
                $request->hasFile("seo.$lang.thumbnail")
                && $request->file("seo.$lang.thumbnail")->isValid()
            ) {
                $imageURL = request()->file("seo.$lang.thumbnail")->store('seo');
                $path_ar = explode('/', $imageURL);
                $seo['thumbnail'] = end($path_ar);
                Image::make(public_path('uploads/seo/') . $seo['thumbnail'])
                    ->resize(320, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('uploads/seo/') . 'thumbs/' . $seo['thumbnail']);

//            Remove old images
//                    Storage::delete('seo/'. $seo->thumbnail);
//                    Storage::delete('seo/thumbs/'. $seo->thumbnail);

            }

            if (isset($data['seo'][$lang])) {
                $lang_id = Language::where('iso', $lang)->first()->id;

                $model_seo = $page->seo($lang_id);
//                    if($model_seo) {
                $model_seo->update($seo);
//                    } else {
//                        $seo['lang_id'] = $lang_id;
//                        dd(Model_seo::create($seo));
//                    }
            }
        }

        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Page $page)
    {
        if ($page->delete()) {
            return redirect()->route('admin.pages.list');
        }
        return back();
    }
}
