<!doctype html>
<html>
    @include('blocks.head')
    
    <body>
        @include('blocks.header')
        
        <main>
            @yield('content')
        </main>
            
        @include('blocks.footer')
    </body>
</html>