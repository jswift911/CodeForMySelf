<!--Для разметки родительского пункта меню, вместо этого используем public/megamenu/megamenu.js-->
<?php //$parent = isset($category['childs']); ?>
<li>
    <a href="category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>