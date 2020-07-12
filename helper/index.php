<?php
function textTrundate($str, $limit = 20)
{
    if (strlen($str) <= $limit) {
        return $str;
    }

    return mb_substr($str, 0, $limit - 3, 'UTF-8') . '...';
}
function showCategoriesHor($categories, $parentId = 0)
{
    $childs = array();
    foreach ($categories as $key => $val) {
        if ($val->parent_id == $parentId) {
            $childs[] = $val;
            unset($categories[$key]);
        }
    }
    if ($childs) {
        foreach ($childs as $key => $val) {
            if ($parentId == 0) {
                echo "<div id='par-$val->id'>";
                echo "<div class='card'>";
                echo '<div class="card-header">';
                echo "<a class='card-link' data-toggle='collapse' href='#col-$val->id'>" . $val->title;
                echo '</a>';
            }
            echo "<div id='col-$val->id' class='collapse' data-parent='#par-$val->parent_id'>";
            echo '<div class="card-body">';
            echo '<ul>';
            echo '<li>';
            echo "<a href='$val->id'>" . $val->title;
            showCategoriesHor($categories, $val->id);
            echo '</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
            if ($parentId == 0) {
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }

    }
}

function showCategories($categories, $parentId = 0, $class = '')
{
    $childs = array();
    foreach ($categories as $key => $val) {
        if ($val->parent_id == $parentId) {
            $childs[] = $val;
            unset($categories[$key]);
        }
    }
    if ($childs) {
        echo "<ul class='$class'>";
        foreach ($childs as $key => $val) {
            echo "<li class='position-relative'><a href='category/$val->id/page=0' class='smooth'>" . $val->title;
            showCategories($categories, $val->id, 'w-submenu');
            echo "</li></a>";
        }
        echo "</ul>";
    }
}

function getPrice($price, $sale)
{
    return $sale == 0 ? $price : $price - ($sale * $price) / 100;
}

