<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <title>FridgeWorthy | {{$pageTitle}}</title>

    <!--JS links-->
    <script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.scrollbox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset("js/bind-delay/bindWithDelay.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/bind-delay/onDelay.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/filter-table/jquery.filtertable.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("js/pagination/jquery.twbsPagination.min.js")}}"></script>

    <!--Bootstrap links-->

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

    <style>
        .filter-table .quick { margin-left: 0.5em; font-size: 0.8em; text-decoration: none; }
        .fitler-table .quick:hover { text-decoration: underline; }
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
    </style> <!-- or put the styling in your stylesheet -->

</head>

<body>

@include('socialmedia.google-tag-manager')

<div class="container">
<div class ="row" style="margin-top:4em">
    <div class="col-md-6 col-xs-8">
        <a href="{{action('HomeController@index')}}"><img src="/images/fwlogo-nav.png" alt="FridgeWorthy"></a>
    </div>
</div>

@yield('content')
</div>
<script type="text/javascript">

   $( document).ready(
            $(function() {
                $( "#datepicker").datepicker();
            }));
</script>
<script type="text/javascript">
    $( document).ready(
            $("#search-table").filterTable()

    );
</script>
<script>
    $('#pagination-demo').twbsPagination({
        totalPages: 35,
        visiblePages: 7,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });
</script>
</body>

</html>