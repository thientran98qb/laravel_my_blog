<html>
<head>
<title> @yield('title') </title>
<!-- Material Design fonts -->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Rob
oto:300,400,500,700">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Ma
terial+Icons">
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3
.3.7/css/bootstrap.min.css">
<!-- Bootstrap Material Design -->
</head>
<body>
    <style>
         .list-group {
            margin:auto;
            float:left;
            padding-top:20px;
            margin-right: 20px;
        }
            .lead {
            margin:auto;
            left:0;
            right:0;
            padding-top:10%;
        }
            
    </style>
@include('layouts.navbar')
@yield('content')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.list-group-item').on('click',function(e){
        e.preventDefault();
        $('.list-group-item').removeClass('active');
        $(this).addClass('active');
    });
});
</script>
</body>
</html>