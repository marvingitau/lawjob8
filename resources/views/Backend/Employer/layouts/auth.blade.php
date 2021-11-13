<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('Backend/Employer/partials/head')
    <body>
        <div class="wrapper">
            @include('Backend/Employer/partials/navsidebar')
            <div id="body" class="active">

                @include('Backend/Employer/partials/navdropdown')
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- footer section --}}
         @include('Backend/Employer/partials/footer')
         {{-- js section --}}
         @include('Backend/Employer/partials/script')
         {{-- inline js section --}}
         @yield('jsblock')
    </body>
</html>
