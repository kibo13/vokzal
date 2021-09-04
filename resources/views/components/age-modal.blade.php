<div id="age-modal" class="gallery__popup visibilited center-popup">
  <div class="gallery__popup--cross">
    @include('assets.icons.close')
  </div>

  <div class="gallery__popup--wrap" style="padding-bottom: 30px;">
    <div class="bk-age">
      <div class="bk-age__text">
        {!! getMessage() !!}
      </div>
      <div class="bk-age__group">
        <button class="bk-age__button age-accept">{{ __('main.yep') }}</button>
        <button class="bk-age__button age-decline">{{ __('main.nope') }}</button>
      </div>
    </div>
  </div>
</div>
