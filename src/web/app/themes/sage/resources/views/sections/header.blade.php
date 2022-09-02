@php
$logo = get_field('logo','option')?? [];
@endphp
<header class="bg-primary text-white fixed top-0 w-full " x-data="{menuOpen: false}">
  <div class="container flex justify-between items-center">
    <a class="w-1/12 h-full flex flex-col items-center justify-center py-1 uppercase" href="{{ home_url('/') }}">
      @if($logo?? false)
      <img class="w-full max-h-12 object-cover"src="{{$logo['url']}}" alt="">
      @endif
      {!! $siteName !!}
    </a>
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu([
        'theme_location' => 'primary_navigation',
       'menu_class' => 'hidden lg:flex justify-end my-2', 
       'echo' => false,
       'add_li_classes' => 'px-2 font-bold opacity-75 text-md capitalize hover:opacity-100'
       ]) !!}
    </nav>
    @if (has_nav_menu('primary_navigation'))
    <div data-role="nav-toggle" class="w-8 h-full hover:cursor-pointer z-50 lg:hidden" 
     @click="menuOpen = !menuOpen"
     @keydown.escape.window="menuOpen = false"
     >
      <div class=" text-[2rem] w-full h-full" :class="menuOpen ? 'hidden' : ''"><i class="fa-solid fa-bars"></i></div>
      <span class="icon-close text-[2rem]" :class="menuOpen ? '' : 'hidden'"><i class="fa-solid fa-close"></i></span>
    </div>
    <div x-show="menuOpen" 
    x-cloak
    x-transition:enter="ease-out duration-500"
    x-transition:enter-start="translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="translate-x-full"
    x-transition:leave="ease-out duration-400" 
    @mousedown.outside="menuOpen = false" //TODO click outside

    class="absolute lg:hidden top-0 right-0 z-40 w-screen max-w-[80%] h-screen bg-primary drop-shadow-2xl">
    <div class="px-6 pt-6 uppercase text-3xl">{{_('go to')}}</div>
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
         'menu_class' => 'mt-10 ml-6', 
         'echo' => false,
         'add_li_classes' => 'py-2 font-medium text-2xl uppercase'
         ]) !!}
      </nav>
    </div>
    @endif
  </div>
</header>
