<?php
$contents = $block->mappedByKey();
?>

<div id="first_block" class="video-block" style="background-image: url({{  url('/') . '/uploads/contents/' . $contents['bg']['value'] ?? ''}})">
    <div class="container-fluid">
        <div class="">
            <div class="first_block">
                <div data-aos-once="true" data-aos="fade-right" class="h1 first_block-left">
                    <div class="left-block">
                        <h1 style="margin-bottom: 0px;"><span
                                    class="text_color">{{ $contents['title']['value'] ?? '' }}</span></h1>
                        @php $properties = []; @endphp
                        @foreach($block->localeIterations as $iteration)

                            @php array_push($properties, $iteration->mappedByKey()['desc']['value']??''); @endphp
                        @endforeach
                        <p id="dynamic" style="color:#ca0bbb;" data-set="{{implode(',', $properties)}}"></p>
                        @if ($agent->isMobile())
                            <div class="first_block__video" href="{{ $contents['video']['value'] ?? '' }}">
                                <video width="480" controls poster="{{  url('/') . '/uploads/contents/' . $contents['cover']['value'] ?? ''}}" >
                                    {{--                                <source src="{{  url('/') . '/uploads/contents/' . $contents['mp4-file']['value'] ?? ''}}" type="video/mp4">--}}
                                    {{--                                <source src="{{  url('/') . '/uploads/contents/' . $contents['webm-file']['value'] ?? ''}}" type="video/webm">--}}
                                    <source src="{{  url('/img/templates/video/teriva.webm')}}" type="video/webm">
                                    Your browser doesn't support HTML5 video tag.
                                </video>
                                {{--                            <svg width="111" height="111" viewBox="0 0 111 111" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                {{--                                <circle cx="55.5001" cy="55.5001" r="42.6154" stroke="#FF0000" stroke-width="3"/>--}}
                                {{--                                <circle cx="55.5" cy="55.5" r="55" stroke="#FF0000"/>--}}
                                {{--                                <path d="M39.4865 55.6026C39.4865 49.4236 39.4663 43.2446 39.4865 37.0656C39.5 32.7222 41.8667 31.3304 45.605 33.4819C56.3762 39.6744 67.134 45.8803 77.8918 52.0996C81.5764 54.231 81.5965 57.1289 77.9389 59.2468C67.1206 65.4998 56.2956 71.746 45.4638 77.9721C41.9608 79.9892 39.5134 78.5907 39.4932 74.57C39.4663 68.243 39.4865 61.9228 39.4865 55.6026Z" fill="#FF0000"/>--}}
                                {{--                            </svg>--}}
                            </div>
                        @endif
                        {!!  $contents['desc']['value'] ?? '' !!}
                        @if($contents['banner']['value'])
{{--                            <img src="{{  url('/') . '/uploads/contents/' . $contents['banner']['value'] ?? ''}}">--}}
                        @endif
                    </div>
                    <div class="right-block">
                        @if ($agent->isMobile())
                        @else
                            <div class="first_block__video" href="{{ $contents['video']['value'] ?? '' }}">
                                <video width="480" controls poster="{{  url('/') . '/uploads/contents/' . $contents['cover']['value'] ?? ''}}" >
                                    {{--                                <source src="{{  url('/') . '/uploads/contents/' . $contents['mp4-file']['value'] ?? ''}}" type="video/mp4">--}}
                                    {{--                                <source src="{{  url('/') . '/uploads/contents/' . $contents['webm-file']['value'] ?? ''}}" type="video/webm">--}}
                                    <source src="{{  url('/img/templates/video/teriva.webm')}}" type="video/webm">
                                    Your browser doesn't support HTML5 video tag.
                                </video>
                                {{--                            <svg width="111" height="111" viewBox="0 0 111 111" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                {{--                                <circle cx="55.5001" cy="55.5001" r="42.6154" stroke="#FF0000" stroke-width="3"/>--}}
                                {{--                                <circle cx="55.5" cy="55.5" r="55" stroke="#FF0000"/>--}}
                                {{--                                <path d="M39.4865 55.6026C39.4865 49.4236 39.4663 43.2446 39.4865 37.0656C39.5 32.7222 41.8667 31.3304 45.605 33.4819C56.3762 39.6744 67.134 45.8803 77.8918 52.0996C81.5764 54.231 81.5965 57.1289 77.9389 59.2468C67.1206 65.4998 56.2956 71.746 45.4638 77.9721C41.9608 79.9892 39.5134 78.5907 39.4932 74.57C39.4663 68.243 39.4865 61.9228 39.4865 55.6026Z" fill="#FF0000"/>--}}
                                {{--                            </svg>--}}
                            </div>
                        @endif
                    </div>
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


