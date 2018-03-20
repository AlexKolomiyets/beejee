<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="post" action="<?=PATH.'addtask'?>" enctype="multipart/form-data" class="taskform">
      <div class="form-group required">
        <label for="title">Заголовок задачи</label>
        <input type="text" name="title" class="form-control" id="title" required placeholder="Заголовок">
      </div>
      <div class="form-group required">
        <label for="content">Описание задачи</label>
        <textarea name="content" name="content" id="content" cols="30" rows="5" class="form-control" required placeholder="Описание задачи"></textarea>
      </div>
      <div class="form-group required">
        <label for="name">Имя пользователя</label>
        <input type="text" name="name" class="form-control" id="name" required placeholder="Имя пользователя">
      </div>
      <div class="form-group required">
        <label for="email">Email адрес</label>
        <input type="email" name="email" class="form-control" id="email" required placeholder="Email">
      </div>
      <div class="form-group">
        <label for="image">Изображение</label>
        <input type="file" name="image" id="image" accept="image/jpg, image/JPG, image/JPEG, image/jpeg, image/png, image/gif">
        <p class="help-block">Добавте изображение (320x240)</p>
      </div>
      <!-- <div class="checkbox">
        <label>
          <input type="checkbox" name="statatus"> Выполненно
        </label>
      </div> -->
      <button type="submit" class="btn btn-success">Сохранить</button>
      <button type="button" class="btn btn-default task-preview" data-toggle="modal" data-target="#myModal" disabled>Предварительный просмотр</button>
    </form>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Предварительный просмотр</h4>
      </div>
      <div class="modal-body">
        <div class="thumbnail">
              <div class="row">
                <div class="col-md-6">
                  <div style="width:320px;height:240px;overflow: hidden;">
                    <img src="http://via.placeholder.com/320x240?text=No+Image" class="img-responsive" id="modal-task-image" alt="Первая задача">
                  </div>
                </div>
                <div class="col-md-6">
                  <p>Статус: 
                    <span class="label label-warning">В процессе</span>
                  </p>
                  <p>Имя: <span id="modal-task-name"></span></p>
                  <p>Email: <a href="mailto:Alex@gmail.com" id="modal-task-email">Alex@gmail.com</a></p>
                </div>
              </div>
              <div class="caption">
                <h3 id="modal-task-title">Первая задача</h3>
                <p id="modal-task-content">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).</p>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>