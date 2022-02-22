<?php

namespace App\Repositories;

use App\Models\Page;
use App\Repositories\Lingual\AdditionRepository;
use App\Repositories\Lingual\SeoRepository;
use Illuminate\Support\Facades\DB;

class PageRepository
{
    private $additionRepository;
    private $seoRepository;

    public function __construct(
        AdditionRepository $additionRepository,
        SeoRepository      $seoRepository)
    {
        $this->additionRepository = $additionRepository;
        $this->seoRepository = $seoRepository;
    }

    public function tree()
    {
        return Page::main()
            ->with('childTree')
            ->get();
    }

    /**
     * @param array $input
     * @return Page
     */
    public function create(array $input): ?Page
    {
        $pageInput = $input['page'];
        $seoInput = $input['seo'];
        $additionsInput = $input['additions'];

        DB::transaction(
            function () use ($pageInput, $seoInput, $additionsInput) {
                if ($page = Page::create($pageInput)) {

                    $additionTranslations = $this->additionRepository->getAttributesArrayTranslations($additionsInput);
                    $page->additions()->createMany($additionTranslations);

                    $seoTranslations = $this->seoRepository->getAttributesArrayTranslations($seoInput);
                    $page->seos()->createMany($seoTranslations);

                    return $page;
                }
            });
        return null;
    }
}