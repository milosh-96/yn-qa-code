<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{mix('css/style.css')}}">
    <title>@yield('title','Welcome') - YN Q&A - Ask, and get direct answers</title>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
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