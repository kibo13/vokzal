<header class="header">
  <div class="container-md">
    <div class="row">
      <div class="col-12 d-flex justify-content-lg-between justify-content-sm-end header__wrapper">
        <div class="header__elements--left d-flex">
          <div class="header__location">
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
              </span>
            </a>
          </div>
          <div class="header__phone">
            <a href="tel:{{ getContact()->phone }}">
              @include('assets.icons.phone')
              <span>{{ getContact()->phone }}</span>
            </a>
          </div>
        </div>
        <div class="header__logo">
          <a class="header__logo--wrapper" href="{{ route('home') }}">
            <div class="logo__image">
              <img src="{{ asset('icons/logo.svg') }}" alt="Vokzal" />
            </div>
          </a>
        </div>
        <div class="header__elements--right">
          <a href="https://www.instagram.com/vokzal.gastrobar/" class="header__insta" target="_blank">
            @include('assets.icons.insta')
          </a>
          @include('components.localization')
          <a class="header__cart" href="{{ route('carts') }}">
            @include('assets.icons.basket-white')
          </a>
          <div class="hamburger__wrapper">
            <div class="hamburger hamburger--spin">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
