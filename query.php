<?php
require_once('config.php');

// Если передан id категории-родителя, то выводятся дочерние записи 
if (isset($_POST['buttonAj_val'])) {
    $output = '';
    $parent_id = $_POST['buttonAj_val'];
    $child = getChildeCategory($db, $parent_id);

    // Если у категории-родителя есть потомки
    if ($child!=NULL) {
        $output = '
        <div class="mt-4">Детишки категории: </div>';
        foreach ($child as $ch)
            $output .= '
            <button class="btn btn-light me-2 mt-4 val_cat" value="' . $ch['id_category'] . '" id="val">' . $ch['cat_name'] . '</button>
        ';
        echo $output;
    }
    // Нет потомков
    else{
        $output = '<div class="alert alert-success mt-5"> Найденные книги в категории... <div>';
        echo $output;
    }
}

// Функция для получения первого уровня дерева
function getCategory($db)
{
    $query = $db->prepare("SELECT * FROM category WHERE cat_parent IS NULL");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}

// Дочерние элементы выбранной категории
function getChildeCategory($db, $id)
{
    $query = $db->prepare("SELECT * FROM category WHERE cat_parent = $id");
    $query->execute();
    $result = $query->fetchAll();
    return $result;
}
