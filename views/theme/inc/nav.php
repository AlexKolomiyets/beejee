    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=PATH?>">Приложение-задачник</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?=PATH?>">Главная</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(!isset($_SESSION['admin'])) : ?>
            <li><a href="<?=PATH?>login">Вход</a></li>
          <?php else : ?>
            <li><a href="<?=PATH?>logout">Выход</a></li>
          <?php endif;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>