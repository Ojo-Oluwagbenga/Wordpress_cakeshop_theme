<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300&display=swap" rel="stylesheet">
    <title>Cake Shop</title>

    <?php wp_head();?>

    <style>
        body, *{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        .head{
            display : flex;
            justify-content: space-between;
            box-shadow: 0px 0px 10px -1px grey
        }
        .head .logo{
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
            justify-content: center;     
            font-weight: bold;           
        }
        .head .nav{
            display: flex;
            margin: 10px 0px;
        }
        .head .nav :nth-child(n){
            padding: 0px 5px;
            margin: 0px 5px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            flex-direction: column;
            transition: all 0.3s ease;
        }    
        .head .nav :nth-child(n):hover{ 
            margin-bottom: 10px;
        }       
    </style>
</head>
<body <?php body_class();?>>
