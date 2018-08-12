<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Welcome') - YN Q&A - Ask, and get direct answers</title>
    @include('layouts.cdn.css')
</head>
<body class="bg-dark">
    @include('layouts.partials.header')
    <div id="wrapper" class="container bg-white rounded-top">
        <div id="editItemModalPlace"></div>
        <div class="row">
            @include('layouts.partials.error-handler')
            @include('layouts.partials.notification-handler')
        </div>
        <div class="page px-2 py-4">
            @include('layouts.partials.actionbar')
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <h2>
                        @yield('title')
                    </h2>
                    <hr>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
   @include('layouts.cdn.js')
    <script>
        detectmob();
        function detectmob() {
            if(window.innerWidth <= 800 && window.innerHeight <= 600) {
                $('[data-toggle="popover"]').popover("hide");
            } else {
                $('[data-toggle="popover"]').popover()
            }
        }
    </script>
    @if(auth()->user())
        <script>
            function getEditModal(item) {
                    axios.get('/questions/edit/'+item).then(function(response) {
                        $("#editItemModalPlace").innerHTML = '';
                        $("#editItemModalPlace").prepend(response.data);
                        $("#editItemModal").modal();
                    });
            }
        </script>
    @endif
    @yield('additional_scripts')
</body>
</html>