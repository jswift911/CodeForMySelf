<?php get_header('main') ;?>

<?php
$lau_cat = get_category(5);
if ($lau_cat):
$posts = get_posts(array(
    'numberposts' => 4,
    'category' => 5,
));
//esla_debug(the_field('section_header',$lau_cat));
?>

<!-- About -->
<section class="page-section">
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-push-4">
                <div class="col-md-12">
                    <?php if (get_field('section_header', $lau_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                        <h2 class="title-section"><span class="title-regular"><?php the_field('lau_span', $lau_cat) ;?></span><br/><?php the_field('lau_header', $lau_cat) ;?></h2>
                    <?php endif;?>
                    <hr class="title-underline" />
                </div>
                <?php
                $data = [];
                $i = 0;
                foreach ($posts as $post) :
                    setup_postdata($post);
                    $data[$i]['post_name'] = $post->post_name;
                    $data[$i]['url'] = get_the_permalink();
                    $data[$i]['content'] = get_the_content('');
                    ;?>
                    <?php $i++; endforeach; ?>
                <div class="row">
                        <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                            <div class="col-md-6 ">
                                <?= $item['content'];?>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-4 col-md-pull-8 ">
                <?php if (get_field('lau_img', $lau_cat)):;?>
                    <img class="img-responsive" src="<?= get_field('lau_img', $lau_cat);?>" alt="" />
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $lau_cat ?>




<?php
$fea_cat = get_category(6);
if ($fea_cat):
$posts = get_posts(array(
    'numberposts' => 8,
    'category' => 6,
));
?>
<!-- Features -->
<section class="page-section section-grey">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                <?php if (get_field('fea_header', $fea_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                    <h2 class="title-section"><span class="title-regular"><?php the_field('fea_span', $fea_cat) ;?></span><br/><?php the_field('fea_header', $fea_cat) ;?></h2>
                <?php endif;?>
                <hr class="title-underline " />
                <?php
                $data = [];
                $i = 0;
                foreach ($posts as $post) :
                    setup_postdata($post);
                    $data[$i]['post_name'] = $post->post_name;
                    $data[$i]['url'] = get_the_permalink();
                    $data[$i]['content'] = get_the_content('');
                    ;?>
                    <?php $i++; endforeach; ?>
                <div class="row">
                        <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                            <div class="col-sm-3 ">
                                <div class="feature-box">
                                <?= $item['content'];?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $fea_cat ?>




<!-- Full Spotlight left-->
<section class="page-section-no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="container col-md-6">
                <div class="row">
                    <div class="col-md-7 col-md-offset-4 spotlight-container">
                        <h2 class="title-section"><span class="title-regular">FULL LEFT</span><br/>SPOTLIGHT</h2>
                        <hr class="title-underline" />
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        </p>
                        <a href="#" class="btn btn-primary">More Information</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 spotlight-img-cont" style="background-image: url(http://placehold.it/651x431); "> </div>
        </div>
    </div>
</section>





<!-- Full Spotlight right-->
<section class="page-section-no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="container col-md-6 col-md-push-6">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1 spotlight-container">
                        <h2 class="title-section"><span class="title-regular">FULL RIGHT</span><br/>SPOTLIGHT</h2>
                        <hr class="title-underline" />
                        <p>
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
                        </p>
                        <a href="#" class="btn btn-primary">More Information</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6 spotlight-img-cont" style="background-image: url(http://placehold.it/647x431); "> </div>
        </div>
    </div>
</section>





<!-- Our Services -->
<section class="page-section ">
    <div class="container ">
        <div class="row">
            <div class="col-md-4">
                <h2 class="title-section"><span class="title-regular">OUR</span><br/>SERVICES</h2>
                <hr class="title-underline" />
            </div>
            <div class="col-md-4 ">
                <div class="col-xs-2 box-icon">
                    <div class="fa fa-desktop"></div>
                </div>
                <div class="col-xs-10">
                    <h4>WEBDESGIN</h4>
                    <h5>Lorem Ipsum Dolor</h5>
                </div>
                <div class="col-md-12">
                    <p>
                        Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                    </p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="col-xs-2 box-icon">
                    <div class="fa fa-clipboard"></div>
                </div>
                <div class="col-xs-10">
                    <h4>TEMPLATES</h4>
                    <h5>Lorem Ipsum Dolor</h5>
                </div>
                <div class="col-md-12">
                    <p>
                        Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ">
                <div class="col-xs-2 box-icon">
                    <div class="fa fa-camera"></div>
                </div>
                <div class="col-xs-10">
                    <h4>PHOTOGRAPHY</h4>
                    <h5>Lorem Ipsum Dolor</h5>
                </div>
                <div class="col-md-12">
                    <p>
                        Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                    </p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="col-xs-2 box-icon">
                    <div class="fa fa-pencil"></div>
                </div>
                <div class="col-xs-10">
                    <h4>GRAPHICS</h4>
                    <h5>Lorem Ipsum Dolor</h5>
                </div>
                <div class="col-xs-12">
                    <p>
                        Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                    </p>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="col-xs-2 box-icon">
                    <div class="fa fa-bullseye"></div>
                </div>
                <div class="col-xs-10">
                    <h4>BRANDING</h4>
                    <h5>Lorem Ipsum Dolor</h5>
                </div>
                <div class="col-md-12">
                    <p>
                        Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Clients -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-push-8">
                <h2 class="title-section"><span class="title-regular">OUR</span><br/>CLIENTS</h2>
                <hr class="title-underline" />
                <p>
                    Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                </p>
            </div>
            <div class="col-md-8 col-md-pull-4 text-center">
                <div class="row">
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                    <div class="col-md-4">
                        <img src="http://placehold.it/168x168" alt="" class="client-logo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us -->
<section class="page-section-no-padding">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6 col-md-push-6">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6 contact-container">
                            <h2 class="title-section"><span class="title-regular">CONTACT</span><br/>US</h2>
                            <hr class="title-underline" />
                            <p>
                                Maecenas luctus nisi in sem fermentum blat. In nec elit solliudin, elementum, dictum pur quam volutpat suscipit antena.
                            </p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="usr" placeholder="NAME">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" placeholder="EMAIL">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" id="message" placeholder="MESSAGE"></textarea>
                            </div>
                            <button type="button" class="btn btn-default">SEND <i class="fa fa-envelope"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6 padding-0 ">
                <div id="map" class="img-responsive map-style"></div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>



