<?php

    if($_SERVER["REQUEST_METHOD"] =="POST")
    {
        $dbname="ProjectPlacement";
        $servername = "localhost";
        $port = "8889";
        $username= "root";
        $password= "root";

        try
        {
            $conn = new PDO("mysql:host=$servername;port=$port; dbname=$dbname;", $username,$password);
            $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        catch(PDOException $e)                                   //PHPDataObject - An object that allows us to connect to the database
        {                                                       //PDOException is a type that has been created with properties and methods i.e getMessage()
            echo "Connection failed ".$e -> getMessage();        //Built in function to provide a message of what went wrong
        }

        if($conn)
        {
            echo "success";

            $title= $_POST["title"];
            $user= $_POST["user"];
            $content= $_POST["content"];
            $date= date("Y-m-d");
            $sql="INSERT INTO logEntries(title,user,content,date) VALUES('$title','$user','$content','$date')";
            $conn -> exec($sql);

        }

    }

    else
    {
        ?>

        <html>
        <head>
            <meta charset="UTF-8">
            <title>Help</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/mdb.min.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Pavanam" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        </head>
        <body>



            <nav id=entryId class="navbar navbar-dark navbar-fixed-top scrolling-navbar">
                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
                    <i class="fa fa-bars"></i></button>

                <div class="container">


                    <div class="collapse navbar-toggleable-xs" id="collapseEx">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logs.html">Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Entries.php">Entry</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="help.html">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="java.html">Demo</a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav nav-flex-icons">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/ISArcLimited/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://twitter.com/isarclimited"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li class="nav-item" id="isarcLogo">
                                <a class="nav-link" href="http://www.isarc.co.uk"> <img src="isarcwhite.png" width="30" height="28" ></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </nav>

            <div id="entryJumbo" style="margin-top: 71px;" class="jumbotron">
                <div class="container">
                    <h1 style="color:white">Welcome to the Logs Page!</h1>
                    <p style="color:white">This is the Log Entry page which has a form to enter the logs into a mySql database.</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                </div>
            </div>



        <div class="col-xs-12 col-md-12">
            <h3>This is an Entry form from which you can save logs using AJAX, PHP and Javascript to send the form to a mySql database.</h3>
            <br>
        </div>

        <div style="width:800px; margin-left: auto; margin-right: auto">
        <form id="logForm" method="post" onsubmit="sendForm(this)">

            <br>
            <label style="font-size:20px;" for="title">Title</label>
            <input name="title" id="title" type="text"/>
            <br>
            <br>
            <label style="font-size:20px;" for="user">User</label>
            <input id="user" name="user" type="text"/>
            <br>
            <br>
            <label style="font-size:20px;" for="content">Content</label><br>
            <textarea id="areaText" name="content" id="content" type="text"></textarea>
            <br><br>

            <input type="submit" value="Create Log"/>
        </form>
        </div>



        </body>
        </html>


        <script type="text/javascript">
            function sendForm(form)
            {
                event.preventDefault();
                var title=document.getElementById('title').value;
                var user= document.getElementById('user').value;
                var content=document.getElementById('content').value;

                var Xhttp= new XMLHttpRequest();
                Xhttp.onreadystatechange= function()

                {
                    if(this.readyState==4 && this.status==200) //4 = ready and 200 is successful (http codes)
                    {
                        console.log(this.responseText);
                    }
                };

                Xhttp.open('POST',window.location.pathname.split("/").pop(),true);
                Xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                Xhttp.send("title= "+ title + "&user= " + user + "&content= " + content);



            }
        </script>

        <?php
    }
?>





