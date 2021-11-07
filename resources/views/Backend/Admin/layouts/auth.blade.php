  <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('Backend/Admin/partials/head')
    <body>
        <div class="wrapper">
            @include('Backend/Admin/partials/navsidebar')
            <div id="body" class="active">

                @include('Backend/Admin/partials/navdropdown')
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- footer section --}}
         @include('Backend/Admin/partials/footer')
         {{-- js section --}}
         @include('Backend/Admin/partials/script')
         {{-- inline js section --}}
         @yield('jsblock')
    </body>
    </html>
