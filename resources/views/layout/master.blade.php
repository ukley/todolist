<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lista de Tarefas</title>

    <!-- CORE CSS-->
    <link href="{{asset('assets/materialize.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/style.css')}}" type="text/css" rel="stylesheet">


    <link href="{{asset('/assets/materialicons.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="{{asset('assets/style.css')}}" rel="stylesheet" />



</head>
<body style="background:  #f2f2f2">

    <div class="container" style="background: #FFFFFF">
        <div class="title m-b-md">
            @yield('content')
        </div>
    </div>
</body>


<script type="text/javascript" src="{{asset('/assets/Scripts/jquery-3.2.1.min.js')}}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{asset('/assets/Scripts/materialize.min.js')}}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{asset('/assets/Scripts/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/Scripts/componet_init.js.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

@yield('script')



</html>
