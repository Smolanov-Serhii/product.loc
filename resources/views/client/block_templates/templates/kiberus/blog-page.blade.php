@php
    $module = \App\Models\Module::where('name', 'blog')->first();
    $items = $module->items;
@endphp
<section class="category blog">
    <div class="category__container main-container">
        <div class="category__header">
            <div class="category__tags">

            </div>
            <form class="category__search" action="" method="get">
                <input name="category-search-text" id="category-search-text" type="text" placeholder="Поиск">
                <button class="send-button green-button">Найти</button>
                <button class="clear-button green-button">Очистить</button>
            </form>
        </div>
        <div class="category__result">
            <div class="blog__container">
                @foreach($items as $item)
                    @php
                        $properties = $item->props->mapWithKeys(function ($prop) {
                                        return [$prop->type->key => $prop->value];
                                        });
                    @endphp
                    <div class="blog-item">
                        <div class="blog-item__header">
                            <div class="blog-item__img">
                                <img src="{{ url('/uploads/module_items') }}/{{$properties['postthumbnail']}}" alt="{{ $properties['postname'] }}">
                            </div>
                            <div class="blog-item__pers">
                                <img src="{{ url('/uploads/module_items') }}/{{$properties['authorimg']}}" alt="{{ $properties['authorname'] }}">
                            </div>
                        </div>
                        <div class="blog-item__content">
                            <h3 class="blog-item__title">
                                <a href="{{ route('client.blog.item', ['alias' => $item->seo->alias]) }}">{{ $properties['postname'] }}</a>
                            </h3>
                            <div class="blog-item__author">
                                <strong>Автор: </strong><span>{{ $properties['authorname'] }}</span>
                            </div>
                            <div class="blog-item__excerpt">
                                {!! $properties['itemexerpt'] !!}
                            </div>
                        </div>
                        <div class="blog-item__tags">
                            <div class="blog-item__tag">
                                CERTIFICATE OF COMPLETION OFFERED
                            </div>
                            <div class="blog-item__tag">
                                COURSE
                            </div>
                            <div class="blog-item__tag">
                                INTERMEDIATE
                            </div>
                            <div class="blog-item__tag">
                                BEGINNER
                            </div>
                            <div class="blog-item__tag">
                                PRACTICE TEST
                            </div>
                        </div>
                        <div class="blog-item__footer">
                            <div class="blog-item__date">
                                21.09.2021
                            </div>
                            <a href="{{ route('client.blog.item', ['alias' => $item->seo->alias]) }}" class="blog-item__lnk green-button">
                                Подробнее
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination" style="margin-right: 40px">
                <a href="#">Начало</a>
                <ul class="pagination__wrapper">
                    <li><a href="#" class="current">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><span>...</span></li>
                    <li><a href="#">25</a></li>
                </ul>
                <a href="#">Конец</a>
            </div>
        </div>
        <aside class="category__aside">
            <div class="category__group">
                <h4 class="category__group-title">
                    Категории блога
                </h4>
                <label class="category__group-item" data-category="category-1">
                    <input type="checkbox" class="category__group-input">
                    <span>Certificate of completion offered</span>
                </label>
                <label class="category__group-item" data-category="category-2">
                    <input type="checkbox" class="category__group-input">
                    <span>Intermediate</span>
                </label>
                <label class="category__group-item" data-category="category-3">
                    <input type="checkbox" class="category__group-input">
                    <span>Beginner</span>
                </label>
                <label class="category__group-item" data-category="category-4">
                    <input type="checkbox" class="category__group-input">
                    <span>1 ceu/cpe hours available</span>
                </label>
                <label class="category__group-item" data-category="category-5">
                    <input type="checkbox" class="category__group-input">
                    <span>Course</span>
                </label>
                <label class="category__group-item" data-category="category-6">
                    <input type="checkbox" class="category__group-input">
                    <span>Popular</span>
                </label>
                <label class="category__group-item" data-category="category-7">
                    <input type="checkbox" class="category__group-input">
                    <span>Practice test</span>
                </label>
                <label class="category__group-item" data-category="category-8">
                    <input type="checkbox" class="category__group-input">
                    <span>1 ceu/cpe hours</span>
                </label>
                <label class="category__group-item" data-category="category-1">
                    <input type="checkbox" class="category__group-input">
                    <span>Certificate of completion</span>
                </label>
                <label class="category__group-item" data-category="category-1">
                    <input type="checkbox" class="category__group-input">
                    <span>Intermediate</span>
                </label>
                <label class="category__group-item" data-category="category-1">
                    <input type="checkbox" class="category__group-input">
                    <span>Beginner</span>
                </label>
                <label class="category__group-item" data-category="category-1">
                    <input type="checkbox" class="category__group-input">
                    <span>1 ceu/cpe hours available</span>
                </label>
            </div>
        </aside>
    </div>
</section>
