<?php
$contents = $block->mappedByKey();
?>
<div id="nine_block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="info__info info__info_3 comment comment2" id="comm1" style="display: block;">
                    <div class="comment2__wrapper">
                        <div class="comment2__box comment2__box_1 active">
                            <div class="heading center" data-aos-once="true" style="margin: 10px 0 5px;">
                                {!!  $contents['title']['value'] ?? '' !!}
                            </div>
                            @foreach($block->localeIterations as $iteration)
                                @if($loop->iteration <= 6 )
                                @php
                                    $properties = $iteration->mappedByKey();
                                @endphp
                                <div class="comment__item">
                                    <div class="comment__head flex">
                                        <div class="comment__name flex">
                                            <img src="{{  url('/') . '/uploads/contents/' . $properties['avatar']['value'] ?? ''}}" alt="viber" alt="{{ $properties['title']['value'] ?? ''}}"
                                                 style="width: 30px; height: 30px; position: inherit; margin-right: 10px; top: 1px; background-size: 100% 100%;margin-bottom: 15px;">
                                            <span2>{{ $properties['name']['value'] ?? ''}}</span2>
                                            <div class="comment__rating flex">
                                                <div class="comment__star active"></div>
                                                <div class="comment__star active"></div>
                                                <div class="comment__star active"></div>
                                                <div class="comment__star active"></div>
                                                <div class="comment__star active"></div>
                                            </div>
                                        </div>
                                        <span2 class="comment__date">{{ $properties['date']['value'] ?? ''}}</span2>
                                    </div>
                                    <div class="comment__text">
                                        <p>{{ $properties['rev']['value'] ?? ''}}</p>
                                        @if($properties['answer']['value'])
                                            <div class="comment__answ">
                                                <h4 class="comment__answname">{{  $contents['tech']['value'] ?? '' }}</h4>
                                                <p>{{ $properties['answer']['value'] ?? ''}} </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="comment2__box comment2__box_2">
                            <div class="heading center" data-aos-once="true" style="margin: 10px 0 5px;">
                                {!!  $contents['title']['value'] ?? '' !!}
                            </div>
                            @foreach($block->localeIterations as $iteration)
                                @if($loop->iteration > 6 )
                                    @php
                                        $properties = $iteration->mappedByKey();
                                    @endphp
                                    <div class="comment__item">
                                        <div class="comment__head flex">
                                            <div class="comment__name flex">
                                                <img src="{{  url('/') . '/uploads/contents/' . $properties['avatar']['value'] ?? ''}}" alt="viber" alt="{{ $properties['title']['value'] ?? ''}}"
                                                     style="width: 30px; height: 30px; position: inherit; margin-right: 10px; top: 1px; background-size: 100% 100%;margin-bottom: 15px;">
                                                <span2>{{ $properties['name']['value'] ?? ''}}</span2>
                                                <div class="comment__rating flex">
                                                    <div class="comment__star active"></div>
                                                    <div class="comment__star active"></div>
                                                    <div class="comment__star active"></div>
                                                    <div class="comment__star active"></div>
                                                    <div class="comment__star active"></div>
                                                </div>
                                            </div>
                                            <span2 class="comment__date">{{ $properties['date']['value'] ?? ''}}</span2>
                                        </div>
                                        <div class="comment__text">
                                            <p>{{ $properties['rev']['value'] ?? ''}}</p>
                                            @if($properties['answer']['value'])
                                                <div class="comment__answ">
                                                    <h4 class="comment__answname">{{  $contents['tech']['value'] ?? '' }}</h4>
                                                    <p>{{ $properties['answer']['value'] ?? ''}} </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <button class="comment__show">
                        <img src="{{ url('/img/templates/reviewes/views.svg') }}" style="width: 15px;margin-bottom: 6px;" alt="Отзыв">
                        <span>Читать все отзывы</span>
                    </button>

                    <div class="wrap-link-mob">
                        <button class="btn_otziv_mob" data-src="#popup-otziv" data-fancybox="">
                            <img src="{{ url('/img/templates/reviewes/55.svg') }}" style="width: 13px;margin-bottom: 4px;" alt="Отзыв">
                            <span>Оставить отзыв</span>
                        </button>
                    </div>

                    <div class="pagination flex" id="menu_scrol">
                        <a class="pagination__item active" data-id="1" href="https://copylsd.su/#1">1</a>
                        <a class="pagination__item" data-id="2" href="https://copylsd.su/#2">2</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>