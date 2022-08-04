<?php
$contents = $block->mappedByKey();
?>
<div id="seven_block">
    <div class="background_8">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="heading center" data-aos-once="true"
                         data-aos="fade-up">
                        <h2><span class="text_color">{{ $contents['title1']['value'] ?? '' }}</span><br>
                            {{ $contents['title2']['value'] ?? '' }}<br>
                            <strong>{{ $contents['title3']['value'] ?? '' }}</strong>
                        </h2>
                    </div>
                    <div class="seven_block">
                        <div class="left">
                            @foreach($block->localeIterations as $iteration)
                                @php
                                    $properties = $iteration->mappedByKey();
                                @endphp
                                @if($loop->index <= ($loop->count)/2 - 1)
                                <div class="item" data-aos-once="true"
                                     data-aos="fade-right">
                                    <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? ''}}" alt="{{ $properties['title']['value'] ?? ''}}">
                                    <p><strong>{{ $properties['title']['value'] ?? ''}}</strong></p>
                                    <p>{!!  $properties['exerpt']['value'] ?? '' !!}</p>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="center" data-aos-once="true" data-aos="fade-in">
                            <div class="img">
                                <img src="{{  url('/') . '/uploads/contents/' . $contents['img']['value'] ?? ''}}" alt="{{ $contents['title1']['value'] ?? ''}}">
                            </div>
                            <div class="text">
                                {!!  $contents['center']['value'] ?? '' !!}
                            </div>
                        </div>
                        <div class="right">
                            @foreach($block->localeIterations as $iteration)
                                @php
                                    $properties = $iteration->mappedByKey();
                                @endphp
                                @if($loop->index > ($loop->count)/2 - 1)
                                    <div class="item" data-aos-once="true"
                                         data-aos="fade-right">
                                        <img src="{{  url('/') . '/uploads/contents/' . $properties['icon']['value'] ?? ''}}" alt="{{ $properties['title']['value'] ?? ''}}">
                                        <p><strong>{{ $properties['title']['value'] ?? ''}}</strong></p>
                                        <p>{!!  $properties['exerpt']['value'] ?? '' !!}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>