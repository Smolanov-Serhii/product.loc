@php
    /**
    * @var $block \App\Models\Block
     */
    $contents = $block->mappedByKey();
@endphp
<section class="they-say main-container">
{{--    @include('client.includes.image', ['image' => $contents['img']])--}}
    <h2 class="they-say__title section-title">
        Что говорят наши клиенты
    </h2>
    <div class="they-say__desc">
        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
    </div>
    <div class="they-say__border">
        <div class="they-say__text">
            Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.
            Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
            В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов,
            используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил
            без заметных изменений пять веков, но и перешагнул в электронный дизайн.
        </div>
        <div class="they-say__icon">
            <img src="{{ url('/') }}/img/admin/1x1.png" data-src="{{ url('/') }}/img/templates/they-say/icon.svg" alt="">
            <div class="they-say__content">
                <div class="name">
                    Лидерик Лефевр
                </div>
                <div class="work">
                    Консультант по безопаности нападений, Акерва
                </div>
            </div>
        </div>
    </div>
</section>