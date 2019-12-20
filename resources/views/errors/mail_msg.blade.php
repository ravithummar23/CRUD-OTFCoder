<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Verify Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body style="margin: 0px; font-family: 'Roboto', sans-serif;">
    <header style="background: #303A47; padding: 5px; text-align: center;color: white;">
        <div>
            <h1>{{ config('app.name', 'BriefCase') }}</h1>
        </div>
    </header>
    <br>
                                            
                                            
    <div class="responsive-width" style="margin:auto;">
        <div style="text-align:center; ">
                <img src="{{asset('public/default/decline.png')}}" alt="decline image" title="Something went wrong." width="80" height="80"> 
              <h1 style="margin-bottom:0px"><b>Oops. Something went wrong!</b></h1> 
            <br>
        </div>
    </div>
    <br>

        <script src="{{ URL::to('public/assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
        <script src="{{ URL::to('public/assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

    <footer style="background: #303A47; padding: 10px; margin-top: 20px;color: #fff">
        <div>
            <p style="text-align: center; ">© {{\Carbon\carbon::now()->format('Y')}} <a href="{{URL::to('/')}}" style="color: white;">{{ config('app.name', 'BriefCase') }}</a>. All rights reserved by {{ config('app.name', 'BriefCase') }}.</p>
        </div>
    </footer>
    
</body>
</html>