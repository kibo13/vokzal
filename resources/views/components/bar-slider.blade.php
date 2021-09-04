<div class="gallery__popup visibilited center-popup">
  <div class="gallery__popup--cross">
    @include('assets.icons.close')
  </div>
  <div class="gallery__popup--wrap">
    <div class="main__section--title"></div>
    <!-- /.bars -->
    <div class="gallery__popup--inner">
      <div class="gallery__popup--slides">
      @foreach ($bars as $bar)
        <div class="popup__slider--block" data-tab="{{ $bar->name_en }}">
        @foreach ($bar->galleries as $gallery)
          <div class="vip__slide"><img src="{{ asset('images/' . $gallery->image) }}" alt=""></div>
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
