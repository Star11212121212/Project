<?php
    include "../_scripts/db.php";
    /**
     * @var $db mysqli
     */
    session_start();
    $admin_auth = $_SESSION["admin_auth"] ?? false;
    $products = $db->query("SELECT p.*, c.Name as Cat_name FROM products p LEFT JOIN categories c on c.Id = p.Category_id")->fetch_all(MYSQLI_ASSOC);
    $orders = $db->query("SELECT * FROM orders");
    $categories = $db->query("SELECT * FROM categories")->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Velvet | Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" href="../images/tild3933-3337-4237-b338-623034613532__group_142.svg" type="image/x-icon"/>
</head>
<body>

<?php if (!$admin_auth): ?>
<div class="login">
    <form action="../_scripts/admin_login.php" method="post">
        <label>
            <input type="text" name="login" placeholder="Логин">
        </label>
        <label>
            <input type="password" name="password" placeholder="Пароль">
        </label>
        <button>Войти</button>
    </form>
</div>
<?php else: ?>
<header>
    <div class="tabs_navigation">
        <button class="tab_name">Товары</button>
        <button class="tab_name">Заказы</button>
        <a href="../_scripts/admin_logout.php">
            <button>Выход</button>
        </a>
    </div>
</header>
<div class="tabs">
    <div class="tab">
        <h2>Товары <button id="show_add_product">+</button></h2>
        <div class="products">
        <?php
            foreach ($products as $product):
                $images = json_decode($product["Images"], true);
        ?>
        <div class="product">
            <p class="name"><?= $product["Name"] ?></p>
            <p class="price"><?= $product["Price"] ?></p>
            <p class="category"><?= $product["Cat_name"] ?></p>
            <p><?= $product["Is_new"]? "Новинка": "" ?></p>
            <div class="images">
                <img src="../images/<?= $images[0] ?? "" ?>" alt="">
                <img src="../images/<?= $images[1] ?? "" ?>" alt="">
            </div>
            <button class="show_edit_product" data-id="<?= $product["Id"] ?>" data-is-new="<?= $product["Is_new"] ?>" data-cat-id="<?= $product["Category_id"] ?>">Изменить</button>
            <button class="show_delete_product" data-id="<?= $product["Id"] ?>">Удалить</button>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="tab">
        <h2>Заказы</h2>
        <div class="orders">
            <?php
                foreach ($orders as $order):
                    $products = $db->query("SELECT p.*, order_info.Count FROM order_info LEFT JOIN velvet.products p on p.Id = order_info.Product_id WHERE Order_id = {$order["Id"]}")->fetch_all(MYSQLI_ASSOC);
            ?>
                <div class="order">
                    <p class="name">Имя: <?= $order["Name"] ?></p>
                    <p class="phone">Телефон: <?= $order["Phone"] ?></p>
                    <p class="date">Дата: <?= $order["Date"] ?></p>
                    <?php foreach ($products as $product): ?>
                    <div class="product">
                        <p><?= $product["Name"] ?>, <?= $product["Count"] ?> шт</p>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<dialog id="dialog_add_product">
    <div class="container">
        <form action="../_scripts/add_product.php" method="post" enctype="multipart/form-data">
            <label>
                <input type="text" name="name" placeholder="Имя" required>
            </label>
            <label>
                <input type="number" name="price" placeholder="Цена" required>
            </label>
            <label>
                <select name="category" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category["Id"] ?>"><?= $category["Name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="checkbox">
                <span>Новинка</span>
                <input type="checkbox" name="is_new">
            </label>
            <label>
                <input type="file" name="image_1" required>
            </label>
            <label>
                <input type="file" name="image_2">
            </label>
            <div class="row">
                <button>Добавить</button>
                <button class="close_dialog">Отменить</button>
            </div>
        </form>
    </div>
</dialog>

<dialog id="dialog_edit_product">
    <div class="container">
        <form action="../_scripts/edit_product.php" method="post">
            <input type="hidden" name="id">
            <label>
                <input type="text" name="name" placeholder="Имя" required>
            </label>
            <label>
                <input type="number" name="price" placeholder="Цена" required>
            </label>
            <label>
                <select name="category" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category["Id"] ?>"><?= $category["Name"] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="checkbox">
                <span>Новинка</span>
                <input type="checkbox" name="is_new">
            </label>
            <div class="row">
                <button>Изменить</button>
                <button class="close_dialog">Отменить</button>
            </div>
        </form>
    </div>
</dialog>

<dialog id="dialog_delete_product">
    <div class="container">
        <form action="../_scripts/delete_product.php" method="post">
            <input type="hidden" name="id">
            <p></p>
            <div class="row">
                <button>Удалить</button>
                <button class="close_dialog">Отменить</button>
            </div>
        </form>
    </div>
</dialog>
<?php endif; ?>

<script src="../js/jquery-1.10.2.min.js"></script>
<script src="admin.js"></script>
<script src="../js/css_update.js"></script>
</body>
</html>
