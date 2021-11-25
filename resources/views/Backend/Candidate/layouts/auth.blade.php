<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('Backend/Candidate/partials/head')
    <body>
        <div class="wrapper">
            @include('Backend/Candidate/partials/navsidebar')
            <div id="body" class="active">

                @include('Backend/Candidate/partials/navdropdown')
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- footer section --}}
         @include('Backend/Candidate/partials/footer')
         {{-- js section --}}
         @include('Backend/Candidate/partials/script')
         {{-- inline js section --}}
         @yield('jsblock')
    </body>
</html>
