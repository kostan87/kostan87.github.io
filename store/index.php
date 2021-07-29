<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta sname="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://store/css/style.css">
    <!-- font Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Online Store</title>
  </head>
  <body>
  <?php 
  if (isset(($_GET)['lang'])) {
    $json_lang = ($_GET['lang']=='RU') ? file_get_contents('http://store/json/lang_rus.json') : 
    (($_GET['lang']=='EN') ? file_get_contents('http://store/json/lang_eng.json') :
    file_get_contents('http://store/json/lang_eng.json'));
  } else {
    $json_lang = file_get_contents('http://store/json/lang_eng.json');
  }
  $lang = json_decode($json_lang, true); ?>
    <header>
      <div class="title"><a href="http://store?lang=<?= $lang['lang']?>"><?php echo $lang['title']?></a></div>
      <div class="links">
            <div><a href="<?php echo $lang['change_lang']?>"><span><?php echo $lang['lang']?></span></a></div>
            <div><a href="http://store?lang=<?= $lang['lang']?>"><span><?php echo $lang['links1']?></span></a></div>
            <div><a href="http://store/store?lang=<?= $lang['lang']?>/"><span><?php echo $lang['links2']?></span></a></div>
            <div><a href="http://store?lang=<?= $lang['lang']?>"><span><?php echo $lang['links3']?></span></a></div>
            <div><a href="http://store?lang=<?= $lang['lang']?>"><span><img src="img/cart.png" alt=""></span></a></div>
      </div>
    </header>
    <?php 
      $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
      $segments = explode('/', trim($uri, '/'));
      if($uri === '/')
        require 'home.php';
      elseif($uri === '/store')
        require 'store.php';
      else
        require 'error404.php'; ?>
      <?php echo $uri ?>
    <footer>
      <p><?php echo $lang['footer']?></p>
    </footer>
    <script src="http://store/scripts/script.js"></script>
  </body>
</html>
