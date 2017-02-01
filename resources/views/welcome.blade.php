<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Code Canada</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #e2e2e2;
                color: #666666;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                // color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            a:link, a:active, a:visited {
                color: #666666;
            }

            a:hover {
                color: #303030;
            }
        </style>
    </head>
    <body class="landing">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img src="{!! asset('img/code-canada-icon.png') !!}" class="center-block img-responsive">
                <h1 class="title m-b-md">
                    Code Canada
                </h1>

                <div class="links">
                    <a href="{{ url('/invite') }}">Join Our Slack Team</a>
                </div>
            </div>
        </div>
    </body>
</html>
