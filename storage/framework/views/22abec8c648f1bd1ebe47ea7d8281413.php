<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('APP_NAME')); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
</head>
<style>
    body{
        background-image: url('https://jobspedia.net/wp-content/uploads/2020/11/film1.jpg');
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }
    .overlay{
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0,0,0,0.7);
        z-index: -1;
    }

    #content{
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
        margin-top: 20%;
    }

    #content h1{
        font-size: 50px;
    }

    #content p{
        font-size: 20px;
    }

    /* a button style is simplifed is only outline */
    #content a{
        display: inline-block;
        padding: 10px 30px;
        border: 1px solid white;
        text-decoration: none;
        color: white;
        margin-top: 20px;
        transition: 0.5s;
    }

    #content a:hover{
        background: white;
        color: black;
    }

    /* animation first load */
    #content h1, #content p, #content a{
        animation: animate 2s ease-in-out;
    }

    @keyframes animate{
        0%{
            opacity: 0;
            transform: translateY(100px);
        }
        100%{
            opacity: 1;
            transform: translateY(0px);
        }
    }

    /* animation for overlay */
    .overlay{
        animation: overlay 2s ease-in-out;
    }

    @keyframes overlay{
        0%{
            opacity: 0;
        }
        100%{
            opacity: 1;
        }
    }

    /* animation for text is from above*/
    #content h1, #content p{
        animation: text 2s ease-in-out;
    }
    
    @keyframes text{
        0%{
            opacity: 0;
            transform: translateY(-100px);
        }
        100%{
            opacity: 1;
            transform: translateY(0px);
        }
    }

</style>
<body>
    <div class="overlay"></div>
    <div id="content">
        <h1 style="text-align: center; color: white;"><?php echo e(env('APP_NAME')); ?></h1>
        <p>Review film kesukaan mu semua ada di sini</p>
        <a href="<?php echo e(route('login')); ?>">Mulai Sekarang!</a>
    </div>
</body>
</html><?php /**PATH /var/www/html/ta-undip/resources/views/welcome.blade.php ENDPATH**/ ?>