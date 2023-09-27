<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Centered Div</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #FCE09B, #B5CB99, #186F65, #B2533E);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            margin: 0;
        }
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
        
            50% {
                background-position: 100% 50%;
            }
        
            100% {
                background-position: 0% 50%;
            }
        }

        .center {
            text-align: center; /* Optional, for centering content horizontally */
            padding: 20px; /* Optional, adjust as needed */
        }
        *{
            color: #00308F;
            font-family: Arial, Helvetica, sans-serif;
        }
        span{
            padding: 20px;
        }
        img{
            padding:10px;
        }

    </style>
</head>
<body>
    <div class="d-flex flex-column justify-content-center w-100 h-100">
    <div class="center">
        <h1>-WELCOME TO GUDANG-</h1>
        <img src="<?php echo $logo ?>" alt="logo" height="150px" width="550px"><br>
        <a href="/login" class="btn btn-warning btn-lg shadow"><span>START</span></a>
    </div>
</div>
</body>
</html>
