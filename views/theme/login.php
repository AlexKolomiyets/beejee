<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <form method="post" action="<?=PATH.'login'?>">
      <div class="form-group required">
        <label for="login">Логин</label>
        <input type="text" name="login" class="form-control" id="login" required placeholder="Введите логин">
      </div>
      <div class="form-group required">
        <label for="password">Пароль</label>
        <input type="password" name="password" class="form-control" id="password" required placeholder="Введите пароль">
      </div>
      <button type="submit" class="btn btn-primary">Вход</button>
    </form>
  </div>
</div>