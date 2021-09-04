<div class="map-footer__section section delivery-footer">
  <div class="container-md semi__custom--container">
    @include('assets.map.yandex')
    <footer class="footer">
      <div class="footer__inner d-flex justify-content-between">
        <ul class="footer__nav d-flex">
          <ul>
            <li><a href="{{ route('about') }}">{{ getCategoryTitle('about') }}</a></li>
            <li><a href="{{ route('continents') }}">{{ getCategoryTitle('continents') }}</a></li>
            <li><a href="{{ route('studios') }}">{{ getCategoryTitle('studios') }}</a></li>
            <li><a href="{{ route('bars') }}">{{ getCategoryTitle('bars') }}</a></li>
            <li><a href="{{ route('vips') }}">{{ getCategoryTitle('vips') }}</a></li>
          </ul>
          <ul>
            <li><a href="{{ route('children') }}">{{ getCategoryTitle('children') }}</a></li>
            <li><a href="{{ route('deliveries') }}">{{ getCategoryTitle('deliveries') }}</a></li>
            <li><a href="{{ route('teams') }}">{{ getCategoryTitle('teams') }}</a></li>
            <li><a href="{{ route('home') }}">{{ __('main.galleries') }}</a></li>
            <li><a href="{{ route('contacts') }}">{{ getCategoryTitle('contacts') }}</a></li>
          </ul>
        </ul>
        <a class="footer__logo" href="{{ route('home') }}">
          <img src="{{ asset('icons/logo.svg') }}" alt="" />
        </a>
        <div class="footer__contacts">
          <ul>
            <li>
              <a href="#">
                @include('assets.icons.location')
                <span>
                  @if(getCurrentLang() === 'ru')
                  {{ getContact()->address_ru }}
                  @elseif(getCurrentLang() === 'en')
                  {{ getContact()->address_en }}
                  @else
                  {{ getContact()->address_kk }}
                  @endif
                </span></a
              >
            </li>
            <li>
              <a href="tel:{{ getContact()->phone }}">
                @include('assets.icons.phone')
                <span>{{ getContact()->phone }}</span>
              </a>
            </li>
            <li>
              <a href="mailto:{{ getContact()->email }}">
                @include('assets.icons.mail')
                <span>{{ getContact()->email }}</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="footer__rights">
        {{ __('main.app') }} <?php echo date('Y'); ?> © {{ __('main.rights') }}
      </div>
    </footer>
  </div>
</div>
