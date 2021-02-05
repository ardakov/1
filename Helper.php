<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author Владелец
 */
class Helper {
    public static function printSelectOptions($key) {
        if ($options) {
foreach ($options as $option) { ?>
<option value="<?=$option['id'];?>" <?=($key ==
$option['id'])?'selected':'';?>><?=$option['value'];?></o
ption>
<?php }
}
    }
    static function functionName($count,$current,$size) {
        $numPages=ceil($count/$size);
$href = $_SERVER['PHP_SELF'].'?page=';
echo '<ul class="pagination ">';
for ($i = 1; $i<=$numPages; $i++) {
if ($current == $i) {
echo ' <li class="paginate_button active"><a
href="'.$href.$i.'" data-dt-idx="'.$i.'"
tabindex="0">'.$i.'</a></li>';
} else {
echo ' <li class="paginate_button"><a
href="'.$href.$i.'" data-dt-idx="'.$i.'"
tabindex="0">'.$i.'</a></li>';
}
}
echo '</ul>';
    }
}
