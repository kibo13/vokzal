<div id="locale-toggler" class="header__lang">
  <span class="active__lang">{{ getCurrentLang() }}</span>
  <ul id="lang-list" class="header__lang-list d-none">
    @foreach (getArrayLang() as $lang)
      @if(getCurrentLang() !== $lang)
      <li>
        <a href="{{ route('locale', $lang) }}">
          {{ $lang }}
        </a>
      </li>
      @endif
    @endforeach
  </ul>
  @include('assets.icons.arrow-locale')
</div>
