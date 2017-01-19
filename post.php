<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/custom.js"></script>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Some Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div id="post" class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1 id="title">Blog Post Title</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="mailto:dd030984tas@gmail.com">Alexey Trushenko</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span><span id="date"></span></p>

            <hr>

            <!-- Preview Image -->
            <img id="img" class="img-responsive" src="" alt="">

            <hr>

            <!-- Post Content -->
            <p id="content" class="lead"></p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4 col-lg-4 sticky-block">

            <!-- Blog Search Well -->
            <div class="well inner">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input id="search" type="text" class="form-control" onkeyup="FindOnPage();"
                           placeholder="min 2 characters">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button" disabled>
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Blog Categories</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled">
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                    accusamus
                    laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; <a href="mailto:dd030984tas@gmail.com">Alexey Trushenko</a> 2017</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->

<?php
date_default_timezone_set("Europe/Helsinki");
$db_path = "sqlite:db.sqlite";
$db = new PDO($db_path);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_GET['id'])) {
    extract($_GET);
    $st = $db->prepare("SELECT * FROM post WHERE id=$id");
//    echo $st->queryString;
    $st->execute();


foreach ($st->fetchAll() as $row) {
//    echo $row['title'];
    $content = str_replace(array("\r\n", "\r", "\n"), "<br/>", htmlspecialchars($row['content'], ENT_QUOTES));
    $published_str = date('F d, Y', $row['published_date']) . " at " . date('g:i:s A', $row['published_date']);
//echo $st['title'];
    ?>
    <script>
        document.getElementById('title').innerHTML = "<?php echo $row['title']; ?>";
        document.getElementById('content').innerHTML = "<?php echo $content; ?>";
        document.getElementById('date').innerHTML = "<?php echo $published_str; ?>";
        document.getElementById('img').setAttribute('src', '<?php echo $row['image_src']; ?>');
    </script>
<?php }} ?>
<script>
    var lastResFind = ""; // последний удачный результат
    var copy_page = ""; // копия страницы в исходном виде

    function TrimStr(s) {
        s = s.replace(/^\s+/g, '');
        return s.replace(/\s+$/g, '');
    }
    function FindOnPage() {//ищет текст на странице
        var obj = window.document.getElementById("search");
        if (obj.value.length > 1) {
            var textToFind;
            if (obj) {
                textToFind = TrimStr(obj.value);//обрезаем пробелы
            }
            if (copy_page.length > 0) {
                document.getElementById("post").innerHTML = copy_page;
            }
            else {
                copy_page = document.getElementById("post").innerHTML;
            }

            document.getElementById("post").innerHTML = document.getElementById("post").innerHTML.replace(eval("/name=" + lastResFind + "/gi"), " ");//стираем предыдущие якори для скрола
            document.getElementById("post").innerHTML = document.getElementById("post").innerHTML.replace(eval("/" + textToFind + "/gi"), "<span style='background:#9d9d9d;'>" + textToFind + "</span>"); //Заменяем найденный текст ссылками с якорем;
            lastResFind = textToFind; // сохраняем фразу для поиска, чтобы в дальнейшем по ней вернуть старый контент
            obj.setAttribute("value", textToFind);
        }
    }
</script>
</body>

</html>
