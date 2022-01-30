<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>pdf to txt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .container{
            height: 100%;
            width: 100%;
            background-image: url("pics/oo.jfif");
            opacity: 0.7;
            background-position: center;
            background-size: cover;
            padding-left: 5%;
            padding-right: 5%;
            box-sizing: border-box;
            position: relative;
        }

        header {
            position: fixed;
            right: 0;
            left: 0;
            top: 0;
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        h1 {
            text-align: center;
            font-size: 80px;
            color: white;
            float: center;
        }

        h2 {
            color: black;
            text-align: center;
        }

        h3 {
            text-align: center ;
            font-size: 30px
        }

        p {
            margin: 10px;
            padding: 10px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        img {
            float: left;
        }

        nav {
            position: fixed;
            left: 0;
            bottom: 0;
            float: left;
            width: 30%;
            height: 70%;
            background: #ccc;
        }

        article {
            position: fixed;
            right: 0;
            bottom: 0;
            float: right;
            width: 70%;
            background-color: #f1f1f1;
            height: 70%;
        }

        .rectangle {
            width: 90%;
            height: 50%;
            border: 10px solid rgb(126, 157, 243);
            float: right;
            margin: 90px 35px 90px 35px;
            background:lightsteelblue;
            text-align: center;
            font-size: 50px;
        }

        input[type=submit] {
            margin: 0px 450px 0px 50x;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            font-size: 28px;
            padding: 20px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
        }

        input[type=submit] span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        input[type=submit] span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        input[type=submit]:hover span {
            padding-right: 25px;
        }

        input[type=submit]:hover span:after {
            opacity: 1;
            right: 0;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(0, 0, 0);
            color: white;
            text-align: center;
        }

        .message{
            font-size: 50%;
            color: red;
        }
    </style>

</head>

<body class="container">
<header>
    <ul>
        <li><img src="pics/exchange.png"></li>
        <li><h1>PDF to Txt Converter</h1></li>
    </ul>
</header>

<section>
    <nav>
        <h2>INSTRUCTIONS</h2>
        <br>
        <p>1. Upload the .pdf file.</p>
        <p>2. Click 'Convert' to convert .pdf file to .txt file. </p>
        <p>3. Wait for it to load. </p>
        <p>4. Click 'Download file' once ready. </p>

    </nav>

    <article>

        <div class="rectangle">

            <h3>Upload a PDF file</h3>

            <form method="POST" action="UploadDownload.php" enctype="multipart/form-data">
            <div class="choose">
                    <input type="file"  name="uploadedFile"/>
            </div>
                <p><p>

                <input type="submit" name="uploadBtn" value="Convert" />
            </form>
            <div class="message">
            <?php
            if (isset($_SESSION['message']) && $_SESSION['message'])
            {
                printf('<b>%s</b>', $_SESSION['message']);
                unset($_SESSION['message']);
            }
            ?>
            </div>

        </div>

    </article>
</section>

<footer>

    <p>@ Brought to you by The Sunflower team</p>
</footer>


</body>

</html>