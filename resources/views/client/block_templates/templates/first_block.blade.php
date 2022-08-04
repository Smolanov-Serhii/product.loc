<?php
$contents = $block->mappedByKey();
?>

        <div id="first_block" class="background_1" style="background-image: url({{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}})">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="first_block">
                        <div data-aos-once="true" data-aos="fade-right" class="h1">
                            <h1 style="margin-bottom: 0px;"><span
                                        class="text_color">{{ $contents['title']['value'] ?? '' }}</span></h1>
                            @php $properties = []; @endphp
                            @foreach($block->localeIterations as $iteration)
                                @php array_push($properties, $iteration->mappedByKey()['desc']['value']??''); @endphp
                            @endforeach
                            <h2><span id="dynamic" style="color:#ca0bbb;" data-set="{{implode(',', $properties)}}"></span></h2>
                            {!!  $contents['desc']['value'] ?? '' !!}
                            @if($contents['banner']['value'])
{{--                                <img src="{{  url('/') . '/uploads/contents/' . $contents['banner']['value'] ?? ''}}">--}}
                            @endif
                            <div class="down">
                                <button class="btn" data-src="#popup-call" data-fancybox="">
                                    <span>{{ $contents['button']['value'] ?? '' }}</span>
                                </button>
                                {!!  $contents['exerpt']['value'] ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


