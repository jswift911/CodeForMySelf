<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if (!empty($new)): ?>
                        <div class="col-md-12 currentNew">
                            <h2 class="text-center"><?=$new->title;?></h2>
                            <p class="text-justify"><?=$new->text;?></p>
                            <p class="text-justify"><b>Количество просмотров: </b><?=$new->views;?></p>
                            <?php $date = new DateTime($new->date);?>
                            <p><b>Дата создания:  </b><i><?=$date->format('d F Y H:i:s');?></i></p>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<!--new-end-->