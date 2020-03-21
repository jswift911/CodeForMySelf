<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <?php if ($slider): ;?>
                <?php foreach ($slider as $item):;?>
            <li>
                <a href="<?=$item->href ? PATH . $item->href : '#';?>"><img src="images/<?= $item->img ;?>" alt="<?= $item->id ;?>"/></a>
                <?php if ($item->text): ;?>
                    <p><?= $item->text ;?></p>
                <?php endif;?>
            </li>
                <?php endforeach;?>
            <?php endif;?>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--Slider-Starts-Here-->
<!--End-slider-script-->
<!--about-starts-->
<?php if ($brands): ;?>
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php foreach ($brands as $brand):;?>
            <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="images/<?= $brand->img ;?>" alt=""/>
                    <figcaption>
                        <h2><?= $brand->title ;?></h2>
                        <p><?= $brand->description ;?></p>
                    </figcaption>
                </figure>
            </div>
            <?php endforeach;?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif;?>
<!--about-end-->
<!--product-starts-->
<?php if($hits) :;?>
<?php $curr = \ishop\App::$app->getProperty('currency');?>
<div class="product">
    <div class="container">
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($hits as $hit):;?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="product/<?= $hit->alias ;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?= $hit->img ;?>" alt="" /></a>
                        <div class="product-bottom">
                            <h3><a href="product/<?= $hit->alias ;?>"><?= $hit->title ;?></a></h3>
                            <p>Explore Now</p>
                            <h4>
                                <a class="add-to-cart-link" data-id="<?= $hit->id;?>" href="cat/add?id=<?= $hit->id;?>"><i></i></a> <span class=" item_price"><?=$curr['symbol_left'];?><?= $hit->price * $curr['value'];?><?=$curr['symbol_right'];?></span>
                                <?php if ($hit->old_price) :;?>
                                    <small><del><?=$curr['symbol_left'];?><?= $hit->old_price * $curr['value'];?><?=$curr['symbol_right'];?></del></small>
                                <?php endif;?>
                            </h4>
                        </div>
                        <?php if ($hit->old_price) :;?>
                        <div class="srch">
                            <?php $discount =  100-(($hit->price * 100)/$hit->old_price); // Расчет и вывод скидки?>
                            <span><?= round($discount, 1);?> %</span>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<!--product-end-->
<!--news-start-->
<?php if($news) :;?>
<div class="news">
    <div class="news__block col-md-10">
        <?php foreach ($news as $new):;?>
        <div class="news__element card col-md-4">
            <!--            <img src="..." class="card-img-top" alt="...">-->
            <div class="card-body">
                <h3 class="card-title"><?= $new->title ?></h3>
                <p class="card-text text-justify"><?= mb_strimwidth($new->text, 0 ,250, ' ...') ;?></p>
                <?php $date = new DateTime($new->date);?>
                <p><b>Дата создания:  </b><i><?=$date->format('d F Y H:i:s');?></i></p>
                <p class="text-justify"><b>Количество просмотров: </b><?=$new->views;?></p>
                <a href="news/<?=$new->id;?>" class="btn btn-primary">Читать...</a>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php endif;?>
<!--news-end-->