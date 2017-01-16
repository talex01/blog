<form method="post">
    <label>
        Title: <br/>
        <input name="title" type="text" />
    </label>
    <br />
    <label for="content">Content:</label> <br/>
    <textarea id="content" name="content" rows="5" cols="20"></textarea>
    <br/>
    <button type="submit">Save</button>
</form>

<?php
$db_path = "sqlite:db.sqlite";
$db = new PDO($db_path);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $db->beginTransaction();
    if(!empty($_POST))
    {
        if(isset($_POST['title']) && isset($_POST['content']))
        {
            extract($_POST);
            $title = htmlentities($title, ENT_QUOTES);
            $pubdate = date('F d, Y')." at ".date('g:i A');
            $sql = "INSERT INTO post(title, content, published_date) values ('$title', '$content', '$pubdate')";
//            echo "insert query: $sql<br/>";
            $count = $db->exec($sql);
            //throw new PDOException("Unknown exception");
        }
    }
    $db->commit();

    // Запросы с ответом (SELECT, SHOW DATABASES, SHOW TABLES)
    if(empty($_GET)) {
        //$sql = "SELECT * FROM post ORDER BY published_date DESC";
        $st = $db->prepare("SELECT * FROM post ORDER BY published_date DESC");
        $st->execute();
    } else { // filter
        extract($_GET); //$filter = $_GET['filter'];
        //$sql = "SELECT * FROM post WHERE title like '%$filter%'";
        // Подготовленные запросы
        $st = $db->prepare("SELECT * FROM post WHERE title like :filter");
        $st->execute(['filter'=>"%$filter%"]);
    }
//    echo "<pre>";
//    echo "sql:" . $st->queryString;
//    echo "</pre>";

    //foreach ($db->query($sql) as $row) {
    foreach ($st->fetchAll() as $row) {
//        echo "<pre>";
//        print_r($row);
//        echo "</pre>";
        echo "<article>";
        echo "<header>";
        echo "<h3>{$row['title']}</h3>";
        echo "</header>";
        echo "<div>{$row['content']}</div>";
        echo "<footer>";
        echo "<span style='font-size: 12px'>Published at: {$row['published_date']}</span>";
        echo "</footer>";
        echo "</article>";
    }

// Транзакции

} catch (PDOException $ex) {
    $db->rollBack();
    // Обработка ошибок
    echo "<p style='color:red'>";
    echo $ex->getMessage();
    echo "</p>";
}