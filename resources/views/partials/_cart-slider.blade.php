

@auth
<cart-slider :initial_user="'{{ Auth::user()->uuid }}'">
</cart-slider>

@endauth
@guest
<cart-slider :initial_user="'0'" ></cart-slider>
@endguest
