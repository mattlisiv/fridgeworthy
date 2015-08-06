<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>FridgeWorthy | {{$pageTitle}}</title>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <script  type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>



    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


</head>



<body>
<div class="container">
<div class ="row" style="margin-top:4em">
    <div class="col-md-6 col-xs-8">
        <a href="{{action('HomeController@index')}}"><img src="/images/fwlogo-nav.png" alt="FridgeWorthy"></a>
    </div>
</div>

@yield('content')
</div>

</body>
<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
</html>