<div id="locale-toggler" class="header__lang">
  <span class="active__lang" data-locale="{{ getCurrentLang() }}">
    @if(getCurrentLang() == 'kk') kz @else {{ getCurrentLang() }} @endif
  </span>
  <ul id="lang-list" class="header__lang-list d-none">
    @foreach (getArrayLang() as $lang)
      @if(getCurrentLang() !== $lang)
      <li>
        <a
          class="bk-lang"
          data-locale="{{ $lang }}">
          @if($lang == 'kk') kz @else {{ $lang }} @endif
        </a>
      </li>
      @endif
    @endforeach
  </ul>
  @include('assets.icons.arrow-locale')
</div>
