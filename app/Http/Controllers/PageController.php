<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Models\Language;
use App\Models\ModelSeo;
use App\Models\ModuleItem;
use App\Models\Page;
use App\Repositories\PageRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
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
        $pages = $this->pageRepository->tree();
        $languages = Language::enabled()->get();
        $model = new Page;
        $aliases = ModelSeo::all()->pluck('alias')->toArray();

        return view('admin.pages.create', compact('pages', 'languages', 'model', 'aliases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @return RedirectResponse
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
     * @param string $alias
     * @return View
     */
//    public function show(Request $request)
    public function show(): View
    {

//        $model = ModelSeo::where('alias', $alias)->first()
//        TODO get item by module item attribute name value instead any value in props list
        $module_item = ModuleItem::whereHas('props', function (Builder $query) {
            $query->where('value', request()->getHttpHost());
        })
            ->with(['seo', 'addition'])
            ->first();

        if($module_item) {
//        $module_item = $model->seoable;
            $page = new Page;
            $page->seo = $module_item->seo;
//        TODO FUCK!!!!!
            return view("client.module_items.landings.item", compact('module_item', 'page'));
        }

        $page = $this->pageRepository->getByAlias(request()->alias);
//        dd($page);

        if ($page->auth_only && !auth()->user()) {
            echo 403;
            die;
//            return abort(403);
        }

        return view('client.page.content', compact('page'));
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
        $pages = $this->pageRepository->tree();

        $languages = Language::enabled()->get();
        $aliases = ModelSeo::where('alias', '!=', optional($page->seo)->alias)->pluck('alias')->toArray();

        return view('admin.pages.update', compact('model', 'pages', 'languages', 'aliases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePageRequest $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(StorePageRequest $request, Page $page): RedirectResponse
    {

        $this->pageRepository->update($page, [
            'page' => $request->except('additions', 'seo'),
            'additions' => request('additions'),
            'seo' => request('seo')
        ]);

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
