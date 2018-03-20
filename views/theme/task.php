<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="thumbnail">
      <div class="row">
        <div class="col-md-6">
          <img src="<?php echo $get_task['image'] == 'http://via.placeholder.com/320x240?text=No+Image' ? $get_task['image'] : PATH.'userfiles/'.$get_task['image'];?>" class="img-responsive" alt="<?=$get_task['title'];?>">
        </div>
        <div class="col-md-6">
          <p>Статус: 
            <?php if($get_task['status']) : ?>
            <span class="label label-success">Выполнено</span>
            <?php else : ?>
            <span class="label label-warning">В процессе</span>
            <?php endif;?>
          </p>
          <p>Имя: <?=$get_task['name'];?></p>
          <p>Email: <a href="mailto:<?=$get_task['email'];?>"><?=$get_task['email'];?></a></p>
        </div>
      </div>
      <div class="caption">
        <h3><?=$get_task['title'];?></h3>
        <p><?=$get_task['content'];?></p>
      </div>
  </div>
  </div>
</div>
<?php if(isset($_SESSION['admin'])) : ?>
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="row">
      <div class="col-md-12">
        <form method="post" action="<?=PATH.'task/'.$id;?>">
          <div class="form-group required">
            <label for="content">Описание задачи</label>
            <textarea name="content" name="content" id="content" cols="30" rows="5" class="form-control" required placeholder="Описание задачи"><?=htmlspecialchars($get_task['content']);?></textarea>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="status" <?php if($get_task['status'] == 1) echo 'checked';?> value="1"> Выполнено
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="status" <?php if($get_task['status'] == 0) echo 'checked';?> value="0"> В процессе
            </label>
          </div>
          <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endif;?>