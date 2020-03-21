<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Главная</a></li>
                <li>Новости</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <h2 class="text-center allNewsTitle">Новости сайта</h2>
                <?php if(!empty($news)): ?>
                    <div class="new-one currentNew">
                        <?php foreach($news as $new): ?>
                            <div class="col-md-4 new-left p-left">
                                <div class="new-main simpleCart_shelfItem">
                                    <div class="new-bottom">
                                        <h3><?=$new->title;?></h3>
                                        <p><?=mb_strimwidth($new->text, 0, 300, ' ...');?></p>
                                        <p class="text-justify"><b>Количество просмотров: </b><?=$new->views;?></p>
                                        <?php $date = new DateTime($new->date);?>
                                        <p><b>Дата создания:  </b><i><?=$date->format('d F Y H:i:s');?></i></p>
                                    </div>
                                    <a href="news/<?=$new->id;?>" class="mask btn btn-primary newsOpen">Читать</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <p>(<?=count($news);?> новостей из <?=$count;?>)</p>
                            <?php if($pagination->countPages > 1): ?>
                                <?=$pagination;?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <h3>В этой категории товаров пока нет...</h3>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--new-end-->