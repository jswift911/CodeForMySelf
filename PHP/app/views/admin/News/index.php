<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список новостей
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Список новостей</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Текст</th>
                                <th>Просмотры</th>
                                <th class="text-center">Дата создания</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($news as $new): ?>
                                <tr>
                                    <td><?=$new['id'];?></td>
                                    <td><?=$new['title'];?></td>
                                    <td class="text-justify"><?=$new['text'];?></td>
                                    <td class="text-center"><?=$new['views'] ? $new['views'] : 0;?></td>
                                    <td class="text-center"><?=$new['date'] ? $new['date'] : '-';?></td>
                                    <td class="text-center"><a href="<?=ADMIN;?>/news/edit?id=<?=$new['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/news/delete?id=<?=$new['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($news);?> новостей из <?=$count;?>)</p>
                        <?php if($pagination->countPages > 1): ?>
                            <?=$pagination;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->