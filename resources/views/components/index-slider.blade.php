<div class="gallery__popup visibilited">
  <div class="gallery__popup--cross">
    @include('assets.icons.cross')
  </div>
  <div class="gallery__popup--wrap">
    <div class="main__section--title"></div>
    <div class="gallery__popup--inner">
      <div class="gallery__popup--slides gallery__slide--action"></div>
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

<div class="overlay-wrapper"></div>
