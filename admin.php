<html>
<head>
    <title>BLOG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>
<body>

<div class="container-fluid">
    <form method="post" enctype="multipart/form-data">
        <label>
            Title: <br/>
            <input name="title" type="text"/>
        </label>
        <p>
            <label>
                Upload image: <br/>
                <input name="img" type="file"/>
            </label>
        </p>
        <label>Content: <br/>
            <textarea id="content" name="content" rows="5" cols="20"></textarea>
        </label>
        <br/>
        <button type="submit">Save</button>
    </form>


    <div class="container-fluid">
        <ul id="navigation" class="nav nav-pills nav-stacked col-lg-2"></ul>
        <div id="navigation_content" class="tab-content col-lg-10"></div>
    </div>

    <?php
    $db_path = "sqlite:db.sqlite";
    //$db_path = "sqlite:/home/watcher/PhpstormProjects/blog/db.sqlite";
    $db = new PDO($db_path);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!empty($_FILES)) {
        if ($_FILES['img']['error'] > 0) {
            switch ($_FILES['img']['error']) {
                case 1:
                    echo 'Размер файла слишком большой';
                    break;
                case 2:
                    echo 'Размер файла слишком большой';
                    break;
                case 3:
                    echo 'Загружена только часть файла';
                    break;
                case 4:
                    echo 'Файл не загружен';
                    break;
            }
        } else {
            if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
                //$fname = $_FILES['img']['name'];
                $source = $_FILES['img']['tmp_name'];
                preg_match('/php\w*/', $source, $matches); //оставляем временные имена файлов (для случая, когда имя загружаемого файла совпадает с уже имеющимся)
                $fname = $matches[0];
                $dest = "img" . "/$matches[0]";
                move_uploaded_file($source, $dest);
            }
        }
    }

    try {
        $db->beginTransaction();
        if (!empty($_POST)) {
            if ($_POST['title'] != "") {
                extract($_POST);
//                echo "<pre>";
//                var_dump($_POST);
//                echo "</pre>";
                $title = htmlentities($title, ENT_QUOTES);
                $pubdate = date('F d, Y') . " at " . date('g:i:s A');
                if (isset($source)) {
                    $sql = "INSERT INTO post(title, content, published_date, image_src) values ('$title', '$content', '$pubdate', '$dest')";
                } else {
                    $sql = "INSERT INTO post(title, content, published_date) values ('$title', '$content', '$pubdate')";
                }

//            echo "insert query: $sql<br/>";
                $count = $db->exec($sql);
                //throw new PDOException("Unknown exception");
            }
        }
        $db->commit();

        if (empty($_GET)) {
            //$sql = "SELECT * FROM post ORDER BY published_date DESC";
            $st = $db->prepare("SELECT * FROM post ORDER BY published_date DESC");
            $st->execute();
        } else {
            extract($_GET);
            $st = $db->prepare("SELECT * FROM post WHERE title LIKE :filter");
            $st->execute(['filter' => "%$filter%"]);
        }
//    echo "<pre>";
//    echo "sql:" . $st->queryString;
//    echo "</pre>";
        foreach ($st->fetchAll() as $row) {
            ?>
            <script>
                var newLi = document.createElement('li');
                newLi.innerHTML = "<a data-toggle='tab' href='#post<?php echo $row['id']; ?>'><?php echo $row['published_date']; ?></a>";
                navigation.appendChild(newLi);

                var newContent = document.createElement('div');
                newContent.setAttribute('id', 'post<?php echo $row['id']; ?>');
                newContent.setAttribute('class', "tab-pane fade")
                newContent.innerHTML = "<?php
                    echo "<article><header><h3>{$row['title']}</h3></header>";
                    if ($row['image_src'] != "") {
                        echo "<img src='" . $row['image_src'] . "' width=200px/>";
                    }
                    echo "<p>" . htmlentities($row['content'], ENT_QUOTES) . "</p>";
                    echo "<footer><span style='font-size: 12px'>Published at: {$row['published_date']}</span></footer></article>";
                    ?>";
                navigation_content.appendChild(newContent);
            </script>
            <?php
//            echo "<li>";
//            echo "<article>";
//            echo "<header>";
//            echo "<h3>{$row['title']}</h3>";
//            if ($row['image_src'] != "") {
//                echo "<img src='" . $row['image_src'] . "' width=200px/>";
//            }
//            echo "</header>";
//            echo "<div>{$row['content']}</div>";
//            echo "<footer>";
//            echo "<span style='font-size: 12px'>Published at: {$row['published_date']}</span>";
//            echo "</footer>";
//            echo "</article>";
        }
    } catch (PDOException $ex) {
        $db->rollBack();
        // Обработка ошибок
        echo "<p style='color:red'>";
        echo $ex->getMessage();
        echo "</p>";
    }
    ?>
</div>
</body>
</html>
