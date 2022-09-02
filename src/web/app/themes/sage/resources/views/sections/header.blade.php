<header class="bg-primary text-white fixed top-0 w-full " x-data="{menuOpen: false}">
  <div class="container flex justify-between items-center">
    <a class="w-1/12 h-full flex items-center justify-center" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>
  
    @if (has_nav_menu('primary_navigation'))
    <div data-role="nav-toggle" class="w-8 h-full hover:cursor-pointer z-50" @click="menuOpen = !menuOpen">
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
    class="absolute top-0 right-0 z-40 w-screen max-w-[80%] h-screen bg-primary">
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
         'menu_class' => 'mt-10 ml-6', 
         'echo' => false,
         'add_li_classes' => 'py-2 font-bold text-2xl uppercase'
         ]) !!}
      </nav>
    </div>
    @endif
  </div>
</header>
