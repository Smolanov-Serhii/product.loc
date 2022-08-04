<?php
$contents = $block->mappedByKey();
?>
<div id="popup-faq">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="heading center" data-aos-once="true" data-aos="fade-up">
                    <h2>{{  $contents['title']['value'] ?? '' }}</h2>
                </div>
                <div class="eleven_block">
                    <div class="img">
                        <img src="{{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}}">
                    </div>
                    <div class="asks">
                        @foreach($block->localeIterations as $iteration)
                            @php
                                $properties = $iteration->mappedByKey();
                            @endphp
                            <div class="item @if($loop->iteration == 1){{'active'}}@endif " data-aos-once="true"
                                 data-aos="fade-in">
                                <div class="num">
                                    {{$loop->iteration}}
                                </div>
                                <div class="question">
                                    {{ $properties['question']['value'] ?? ''}}
                                </div>
                                <div class="answer">
                                    {!! $properties['answer']['value'] ?? ''!!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>