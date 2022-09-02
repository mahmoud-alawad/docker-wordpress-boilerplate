<footer class="content-info py-6 bg-primary text-white">
   <div class="container">
    footer

    <div>
        {!! wp_nav_menu([
            'theme_location' => 'footer_navigation',
            'menu_class' => 'pt-6',
            'echo' => false,
            'add_li_classes' => 'py-2 font-medium text-md uppercase',
        ]) !!}
    </div>
   </div>
</footer>
