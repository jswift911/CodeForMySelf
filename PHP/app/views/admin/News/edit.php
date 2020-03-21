<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование категории <?=$news->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/news">Список категорий</a></li>
        <li class="active"><?=$news->title;?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/news/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Заголовок новости</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Наименование категории" value="<?=h($news->title);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="text">Текст новости</label>
                            <textarea rows="8" name="text" class="form-control" id="text" placeholder="Текст новости"><?=h($news->text);?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$news->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->