<html>
<head>
    <title>BLOG ADMIN</title>
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
    <button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#add_post">Add New Post</button>
    <div id="add_post" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title" style="text-align: center;">Add post</h3>
                </div>
                <div class="modal-body">
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
                            <textarea id="content" name="content" rows="5" cols="60"></textarea>
                        </label>
                        <br/>
                        <button type="submit">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <p>Previous posts:</p>

    <!--    <div class="container-fluid">-->
    <ul id="navigation" class="nav nav-pills nav-stacked col-lg-2"></ul>
    <div id="navigation_content" class="tab-content col-lg-10"></div>
    <!--    </div>-->

    <?php
    date_default_timezone_set("Europe/Helsinki");
//    $db_path = "sqlite:db.sqlite";
    $db = new PDO('mysql:host=localhost;dbname=blog', 'blog', 'blog');
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
//                    echo 'Файл не загружен';
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
                $title = htmlentities($title, ENT_QUOTES);
                $pubdate = time();
                if (isset($source)) {
                    $sql = "INSERT INTO post(title, content, published_date, image_src) values ('$title', '$content', '$pubdate', '$dest')";
                } else {
                    $sql = "INSERT INTO post(title, content, published_date) values ('$title', '$content', '$pubdate')";
                }
                $db->exec($sql);
            }
        }
        $db->commit();

        $st = $db->prepare("SELECT * FROM post ORDER BY published_date DESC");
        $st->execute();

        foreach ($st->fetchAll() as $row) {
            ?>
            <script>
                var newLi = document.createElement('li');
                <?php $published_str = date('F d, Y', $row['published_date']) . " at " . date('g:i:s A', $row['published_date']); ?>
                newLi.innerHTML = "<a data-toggle='tab' href='#post<?php echo $row['id']; ?>'><?php echo $published_str; ?><br><?php echo $row['title']; ?></a>";
                navigation.appendChild(newLi);

                var newContent = document.createElement('div');
                newContent.setAttribute('id', 'post<?php echo $row['id']; ?>');
                newContent.setAttribute('class', "tab-pane fade");
                newContent.innerHTML = "<?php
                    echo "<article><header><h3>{$row['title']}</h3></header>";
                    if ($row['image_src'] != "" && $row['image_src'] != NULL) {
                        echo "<img src='" . $row['image_src'] . "' width=200px/>";
                    }
                    $c = str_replace(array("\r\n", "\r", "\n"), "<br/>", htmlspecialchars($row['content'], ENT_QUOTES));
                    echo "<p>" . $c . "</p>";
                    echo "<footer><span style='font-size: 12px'>Published at: {$published_str}</span></footer></article>";
                    ?>";
                navigation_content.appendChild(newContent);
            </script>
            <?php
        }
    } catch (PDOException $ex) {
        $db->rollBack();
        echo "<p style='color:red'>";
        echo $ex->getMessage();
        echo "</p>";
    }
    ?>
</div>
</body>
</html>
