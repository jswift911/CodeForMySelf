<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Управление слайдером
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active">Управление слайдером</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <a href="<?=ADMIN;?>/slider/add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i> Добавить слайд</a>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Подпись</th>
                                <th>Ссылка</th>
                                <th class="text-center">Изображение</th>
                                <th class="text-center">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($slider as $item): ?>
                                <tr>
                                    <td><?=$item['id'];?></td>
                                    <td><?=$item['text'];?></td>
                                    <td class="text-justify"><?=$item['href'];?></td>
                                    <td class="text-center"><?=$item['img'] ? $item['img'] : 'Нет изображения';?></td>
                                    <td class="text-center"><a href="<?=ADMIN;?>/slider/edit?id=<?=$item['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a class="delete" href="<?=ADMIN;?>/slider/delete?id=<?=$item['id'];?>"><i class="fa fa-fw fa-close text-danger"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p>(<?=count($slider);?> слайдов из <?=$count;?>)</p>
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