<div class="row">
	<div class="col-md-3 col-lg-2">
		<div class="form-group">
		    <a href="<?=PATH?>addtask" class="btn btn-lg btn-primary">Добавить запись</a>
		</div>
	</div>
	<div class="col-md-9 col-lg-10">
		<ul class="nav navbar-nav">
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Сортировка <span class="caret"></span></a>
              <ul class="dropdown-menu">
              	<?php if($order) : ?>
              	<?php foreach($order as $key => $item) : ?>
              	<li class="<?=$order_get==$key ? 'active' : ''?>"><a href="<?=PATH?>?order=<?=$key;?>"><?=$item['0'];?></a></li>
              	<?php endforeach;?>
              	<?php endif;?>
              </ul>
            </li>
		</ul>
	</div>
</div>
<?php if($get_tasks) : ?>
<div class="row">
	<?php foreach($get_tasks as $item) : ?>
	<div class="col-sm-6 col-md-4">
		<div class="thumbnail">
      <div class="baseimg">
      	<a href="<?=PATH.'task/'.$item['id'];?>"><img src="<?php echo $item['image'] == 'http://via.placeholder.com/320x240?text=No+Image' ? $item['image'] : PATH.'userfiles/'.$item['image'];?>" class="img-responsive" alt="<?=$item['title'];?>"></a>
      </div>
      <div class="caption">
        <h3><?=$item['title'];?></h3>
        <p>Статус: 
        	<?php if($item['status']) : ?>
        	<span class="label label-success">Выполнено</span>
        	<?php else : ?>
        	<span class="label label-warning">В процессе</span>
        	<?php endif;?>
        </p>
        <p>Имя: <?=$item['name'];?></p>
        <p>Email: <a href="mailto:<?=$item['email'];?>"><?=$item['email'];?></a></p>
        <p><a href="<?=PATH.'task/'.$item['id'];?>" class="btn btn-primary" role="button"><?php echo isset($_SESSION['admin']) ? 'Редактировать' : 'Подробнее';?></a></p>
      </div>
    </div>
	</div>
	<?php endforeach;?>
</div>
<?php else : ?>
	<div class="alert alert-info" role="alert">В данный момент задач нет. Добавьте первую задачу.</div>
  <?php endif;?>
  <?php if($pages_count != 1) : ?>
<nav aria-label="Page navigation">
<ul class="pagination">
  <?php pagination($page,$pages_count)?>
</ul>
</nav>
<?php endif;?>