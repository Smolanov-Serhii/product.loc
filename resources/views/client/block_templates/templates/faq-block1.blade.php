<section class="faq-block1">
    <div class="faq-block1__container">
        @foreach($block->localeIterations as $iteration)
            @php
                $properties = $iteration->mappedByKey();
            @endphp
            <div class="faq-block1__item">
                <div class="faq-block1__item-header">
                    {{ $properties['header']['value'] ?? '' }}
                    <svg width="23" height="9" viewBox="0 0 23 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.3555 0.227218C22.2849 0.089761 22.1132 0 21.9228 0H20.057C19.9377 0 19.8229 0.0353476 19.7364 0.099293L11.1946 6.37653L2.65284 0.099293C2.5663 0.0353476 2.45151 0 2.33217 0H0.466384C0.275988 0 0.104264 0.089761 0.0336411 0.227218C-0.0374187 0.364336 0.0063104 0.521231 0.143882 0.623341L10.8721 8.58402C11.0525 8.71761 11.3367 8.71761 11.5171 8.58402L22.2453 0.623341C22.3829 0.521231 22.4266 0.364336 22.3555 0.227218Z" fill="#181818"/>
                    </svg>
                </div>
                <div class="faq-block1__item-content" style="display: none">
                    {!! $properties['content']['value'] ?? '' !!}
                </div>
            </div>
        @endforeach
    </div>
</section>