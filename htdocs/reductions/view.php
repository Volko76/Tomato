<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-8M77ZFQ6BF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8M77ZFQ6BF');
</script>


<?php
if (isset($_GET['id'])){
  $id = $_GET['id'];
  include("connexion.php");

  $query = $pdo->prepare("SELECT * FROM messages JOIN stores ON stores.store_id = messages.store_id WHERE message_id = ?;");
  $query->bindValue(1,$id,PDO::PARAM_INT);
  $query->execute();

  if ($query->rowCount() == 0){
    exit();
  }

  $result = $query->fetch();
}

?>


<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/favicon.svg">
    <link rel="stylesheet" href="style2.css">
    <title>Tomato</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            <a href="..">
                <div id="top-nav-header-container">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="../assets/images/logo.svg">
                    </div>
                </div>
            </a>
        </div> 
        
        <div id="filters-container">
            
        </div>
    </nav>
    
    <div id="background" style="background-image: url('./export.php?id=<?php echo $result['image_id']; ?>')">
      <div id="main-container">
        <div id="reductions-container">
      
          <div id="header-container">
            <img id="get-back-button" src="../assets/images/arrow_back.png" onclick="history.back()">
            <div id="annonce-infos">
              <div id="annonce-title"><?php echo $result['title']; ?></div>
              <?php
              if (!is_null($result['discount_amount'])){
              ?>

                <div class="reduction-item-discount-container">
                  <div class="reduction-item-discount">
                      <?php echo $result['discount_amount']; ?>
                  </div>
                </div>
              <?php
              }
              ?>
              <div class="reduction-item-footer">
                <div class="reduction-meta-footer-container">
                    <div class="reduction-meta-footer-image-container">
                        <img src="../assets/images/storefront_icon.png" class="reduction-meta-footer-image">
                    </div>
                    <?php echo $result['name']; ?>
                </div>
                <div class="reduction-meta-footer-container">
                    <div class="reduction-meta-footer-image-container">
                        <img src="../assets/images/location_icon.png" class="reduction-meta-footer-image">
                    </div>
                    Bordeaux
                </div>
                
              </div>
            </div>
          </div>
          <p><?php echo $result['contenu']; ?></p>

        </div>
      </div>  
    </div>  
  </body>
</html>
