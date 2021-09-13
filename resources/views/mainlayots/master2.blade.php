@include('mainlayots.head')

        <main class="container">
            @include('layouts.navigation')
            @yield('content')
            {{-- @include('mainlayots.Pagefooter') --}}
        </main>
 @include('mainlayots.footer')
