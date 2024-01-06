<!doctype html>
<html lang="en">
{{--head--}}
@include('panel.layouts.head')

    <body class="g-sidenav-show bg-gray-200">

    {{--aside--}}
    @include('panel.layouts.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        {{--nav--}}
        @include('panel.layouts.nav')

        <div class="container-fluid py-4">
            {{--content--}}
            @yield('content')

            {{--footer--}}
            @include('panel.layouts.footer')
        </div>

    </main>

    {{--script--}}
    @include('panel.layouts.script')

    {{--js--}}
    @yield('js')

    </body>
</html>
