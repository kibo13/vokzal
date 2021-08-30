<div class="gallery__popup visibilited center-popup">
  <div class="gallery__popup--cross">
    @include('assets.icons.close')
  </div>
  <div class="gallery__popup--wrap">
    <div class="main__section--title"></div>
    <!-- /.cabins -->
    <div class="gallery__popup--text mb-4">
      @foreach ($vips as $vip)
      <p class="popup__text" data-tab="{{ $vip->name_en }}">
        @if(getCurrentLang() === 'ru')
          {{ $vip->desc_ru }}
        @elseif(getCurrentLang() === 'en')
          {{ $vip->desc_en }}
        @else
          {{ $vip->desc_kk }}
        @endif
      </p>
      @endforeach
    </div>
    <!-- /.photos -->
    <div class="gallery__popup--inner">
      <div class="gallery__popup--slides">
      @foreach ($vips as $vip)
        <div class="popup__slider--block" data-tab="{{ $vip->name_en }}">
        @foreach ($vip->photos as $photo)
          <div class="vip__slide"><img src="{{ asset('images/' . $photo->image) }}" alt=""></div>
        @endforeach
        </div>
      @endforeach
      </div>
      <!-- /.arrows -->
      <div class="gallery__popup--navigation">
        <div class="slider__button slider__button--left">
          @include('assets.icons.arrow-left')
        </div>
        <div class="slider__button slider__button--right active-arrow">
          @include('assets.icons.arrow-right')
        </div>
      </div>
    </div>
  </div>
</div>
