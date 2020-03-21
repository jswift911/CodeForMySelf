<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование слайда №<?=$slider->id;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/slider">Управление слайдером</a></li>
        <li class="active">Слайд №<?=$slider->id;?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/slider/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="text">Подпись</label>
                            <input type="text" name="text" class="form-control" id="text" placeholder="Подпись" value="<?=h($slider->text);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="href">Ссылка</label>
                            <input type="text" name="href" class="form-control" id="href" placeholder="Ссылка" value="<?=h($slider->href);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <div class="box box-danger box-solid file-upload">
                                    <div class="box-header">
                                        <h3 class="box-title">Изображение слайда</h3>
                                    </div>
                                    <div class="box-body">
                                        <div id="single" class="btn btn-success" data-url="slider/add-image" data-name="single">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 1600х650</small></p>
                                        <div class="single">
                                            <img src="/images/<?=$slider->img;?>" alt="" style="max-height: 124px;">
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$slider->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->