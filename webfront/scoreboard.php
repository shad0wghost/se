<html xmlns="http://www.w3.org/1999/xhtml">
<!--
          (__)        vv    vv
          (oo)        ||----||  *
   /-------\/         ||     | /
  / |     ||         /\-------/
 *  ||----||        (oo)
    ^^    ^^        (  )

 American Cow   Australian Cow
-->
<head>
    <!--jQuery library -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <style>
        body{
            background-color:black;
            color:white;
            text-align:center;
            font-family: Verdana, sans-serif;
        }
        .heading{
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 25px;
        }
        #wrapper {
            margin-bottom: 50px;
        }
        #wrapper,#wrapper2 {
            margin-left: auto;
            margin-right: auto;
            width: 900px;
        }
        #console {
            height: 400px;
            width: 800px;
            background: #242424;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            text-align: left;
            font-family: "Courier New", Courier, monospace;
            font-size: 10pt;
        }
        .row{
            height: 30px;
            width: 100%;
        }

        .block{
            display: block;
            float: left;
            width: 24.8%;
            height: 100%;
            margin-right: 1px;
            margin-bottom: 1px;
            background: gray;
        }
        .block_center{
            line-height: 25px;
        }


        .up {
            background: #006500;
        }
        .down {
            background: #ca0000;
        }

        .clearfix:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }

        .clearfix {
            display: inline-block;
        }

        html[xmlns] .clearfix {
            display: block;
        }

        * html .clearfix {
            height: 1%;
        }

    </style>
    <title>Scoring Engine</title>

    <script>
        $(document).ready(function() {
            $('#wrapper').load('refresh.php');
            var refreshId = setInterval(function() {
                $('#wrapper').load('refresh.php');
            }, 10000);
            $.ajaxSetup({ cache: false });
        });

        $(function(){
            $("#score").click(function(){
                $('#console').load('../controller.php');
            });
        });
    </script>

</head>
<body>
<div id="wrapper"></div>
<div id="wrapper2">
    <div>
        <input type="button" id="score" value="Score!" />
    </div>
</div>

<div id="console"></div>

</body>
</html>
