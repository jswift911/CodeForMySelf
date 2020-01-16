<?php get_header('main') ;?>

<?php
$lau_cat = get_category(5);
if ($lau_cat):
$posts = get_posts(array(
    'numberposts' => 4,
    'category' => 5,
));
//esla_debug($posts);
?>

<!-- About -->
<section class="page-section">
    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-md-push-4">
                <div class="col-md-12">
                    <?php if (get_field('section_header', $lau_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                        <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $lau_cat) ;?></span><br/><?php the_field('section_header', $lau_cat) ;?></h2>
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
                <?php if (get_field('section_img', $lau_cat)):;?>
                    <img class="img-responsive" src="<?= get_field('section_img', $lau_cat);?>" alt="" />
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
                <?php if (get_field('section_header', $fea_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                    <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $fea_cat) ;?></span><br/><?php the_field('section_header', $fea_cat) ;?></h2>
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




<?php
$left_spot_cat = get_category(7);
if ($left_spot_cat):
$posts = get_posts(array(
    'numberposts' => 1,
    'category' => 7,
));
?>
<!-- Full Spotlight left-->
<section class="page-section-no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="container col-md-6">
                <div class="row">
                    <div class="col-md-7 col-md-offset-4 spotlight-container">
                        <?php if (get_field('section_header', $left_spot_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                            <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $left_spot_cat) ;?></span><br/><?php the_field('section_header', $left_spot_cat) ;?></h2>
                        <?php endif;?>
                        <hr class="title-underline" />
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
                        <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                            <?= $item['content'];?>
                        <?php endforeach; ?>
                        <?php if (get_field('section_btn', $left_spot_cat)):
                            $link = get_field('section_btn', $left_spot_cat);
                            ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-primary"><?php echo esc_html($link['title']); ?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 spotlight-img-cont" <?php echo esla_get_background('section_img', $left_spot_cat);?>></div>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $left_spot_cat ?>

<?php
$right_spot_cat = get_category(8);
if ($right_spot_cat):
$posts = get_posts(array(
    'numberposts' => 1,
    'category' => 8,
));
?>
<!-- Full Spotlight right-->
<section class="page-section-no-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="container col-md-6 col-md-push-6">
                <div class="row">
                    <div class="col-md-7 col-md-offset-1 spotlight-container">
                        <?php if (get_field('section_header', $right_spot_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                            <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $right_spot_cat) ;?></span><br/><?php the_field('section_header', $right_spot_cat) ;?></h2>
                        <?php endif;?>
                        <hr class="title-underline" />
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
                        <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                            <?= $item['content'];?>
                        <?php endforeach; ?>
                        <?php if (get_field('section_btn', $right_spot_cat)):
                            $link = get_field('section_btn', $right_spot_cat);
                            ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-primary"><?php echo esc_html($link['title']); ?></a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6 spotlight-img-cont" <?php echo esla_get_background('section_img', $right_spot_cat);?>></div>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $tight_spot_cat ?>



<?php
$serv_cat = get_category(9);
if ($serv_cat):
$posts = get_posts(array(
    'numberposts' => 5,
    'category' => 9,
));
?>
<!-- Our Services -->
<section class="page-section ">
    <div class="container ">
        <div class="row">
            <div class="col-md-4">
                <?php if (get_field('section_header', $serv_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                    <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $serv_cat) ;?></span><br/><?php the_field('section_header', $serv_cat) ;?></h2>
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
            <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                    <div class="col-md-4 ">
                        <?= $item['content'];?>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $services ?>


<?php
$clients_cat = get_category(10);
if ($clients_cat):
$posts = get_posts(array(
    'numberposts' => 1,
    'category' => 10,
));
//esla_debug($posts);
?>
<!-- Our Clients -->
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-push-8">
                <?php if (get_field('section_header', $clients_cat)):; //если поля ищем в рубрике, то после запятой прописываем переменную с рубрикой?>
                    <h2 class="title-section"><span class="title-regular"><?php the_field('section_span', $clients_cat) ;?></span><br/><?php the_field('section_header', $clients_cat) ;?></h2>
                <?php endif;?>
                <hr class="title-underline" />
                <p>
                    <?= $clients_cat->description ;?>
                </p>
            </div>
            <div class="col-md-8 col-md-pull-4 text-center">
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
                <div class="col-md-12">
                    <div class="row">
                        <?php foreach (array_reverse($data) as $k => $item) :; // вывод массива с конца в начало, иначе как в bluerex посты будут с конца идти?>
                            <?= $item['content']; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
        </div>
    </div>
    <?php wp_reset_postdata(); unset($data, $posts);?>
</section>
<?php endif; // if $clients ?>

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



