<?php
require_once('query.php');
$category = getCategory($db);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Категории каталога </h1>
        <!-- Первый уровень дерева -->
        <?php foreach ($category as $cat) {
            echo '<button class="btn btn-outline-primary me-2 mt-4 val_cat_level1" value=' . $cat['id_category'] . ' id="val">' . $cat['cat_name'] . '</button>';
        } ?>

        <!-- Дочерние элементы -->
        <div class="categories"></div>
    </div>
</body>

<script>
    let buttonAj = document.querySelectorAll('.val_cat_level1');
    ajax(buttonAj);

    function ajax(buttonAj) {
        for (let i = 0; i < buttonAj.length; i++) {
            buttonAj[i].addEventListener("click", function() {
                $.ajax({
                    type: "POST",
                    url: "query.php",
                    dataType: "html",
                    data: {
                        buttonAj_val: buttonAj[i].value,
                    },
                    success: function(data) {
                        $('.categories').html(data);
                        let buttonAj = document.querySelectorAll('.val_cat');
                        ajax(buttonAj);
                    }
                });
            });
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>