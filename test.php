<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>

    <style>

        .test2 {
            text-align: center;
            border: 2px solid green;
            margin-top: 5px;
        }

        .test1 {
            transform: translateX(50%);
        }
        .pos {
            border: 2px solid red;
            position: absolute;
            animation: fadeIn 5s;
            transform: translateX(-50%);
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

    </style>
</head>
<body>
        <div class="test1">
            <div class="pos">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
        </div>
        <div class="test2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
</body>
</html>