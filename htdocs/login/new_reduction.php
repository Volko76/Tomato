<?php
  session_start();
  if( !isset($_SESSION["email"]) || !isset($_SESSION["id"]) ){
    header("location:../login/");
    exit();
  }
?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8M77ZFQ6BF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8M77ZFQ6BF');
</script>
<?php
  function verifyPhrase($phrase, $bdd){
    $commentaire = $phrase;//Ceci est la phrase à tester

    $req = $bdd->query('SELECT mot FROM filtre');

    $mots = [];
    $rp = [];

    while($m = $req->fetch()){
      array_push($mots, $m['mot']);
      $r = '';
      for ($i=0; $i < strlen($m['mot']); $i++) { 
        $r .= '*';
      }
      array_push($rp, $r);
    }
    
    $commentaire = str_replace($mots, $rp, strtolower($commentaire));
    
    return $commentaire;
  }
  error_log(print_r("Someone has writen something", TRUE)); 
  $bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');  
  if(!empty($_POST['title']) AND !empty($_POST['description'])){
    error_log(print_r("CC", TRUE)); 
    $title = htmlspecialchars($_POST['title']);
    $description = nl2br(htmlspecialchars($_POST['description']));

    //----------------------------------------------------------------
    /* VERIFICATIONS du fait que ca soit ni des gros mots ni du spam
    */
    //Verification que ca soit pas un bot via ReCAPTCHA : 
    $response = $_POST["g-recaptcha-response"];
    /*if ($response) {*/
        echo 'Ok';
      
      $title = verifyPhrase($title, $bdd);
      $description = verifyPhrase($description, $bdd);
    
      //----------------------------------------------------------------

      $req = $bdd->prepare("INSERT INTO images(nom, taille, type, bin) VALUES(?, ?, ?, ?);");
      $req->execute(array($_FILES["image"]["name"], $_FILES["image"]["size"], $_FILES["image"]["type"], file_get_contents($_FILES["image"]["tmp_name"])));

      $last_image_id = $bdd->lastInsertId();

      if($last_image_id == 0){
        $last_image_id = null;
      }

      $insererMessage = $bdd->prepare('INSERT INTO messages(title, contenu, image_id, store_id) VALUES(?, ?, ?, ?);');
      $insererMessage->execute(array($title, $description, $last_image_id, $_SESSION["id"]));
      
      header("Location: ./index.php");
      die();
    /*}else{
      echo "Error : you have been flagged as a bot by ReCaptcha !";
    }*/
  }else{
    echo 'Veuillez compléter les différents champs ...';
  }
  
?>



<script async src="https://www.googletagmanager.com/gtag/js?id=G-8M77ZFQ6BF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8M77ZFQ6BF');
</script>

<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Tomato</title>
    <link rel="icon" href="../assets/images/favicon.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            <a href="..">
                <div id="top-nav-header-container">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="../assets/images/logo.png">
                    </div>
                    <div id="top-nav-logo-label">
                        tomato
                    </div>
                </div>
            </a>
        </div> 
    </nav>

    <div id="main-container">
      <div id="page-container">
        <h1>Créer une réduction</h1>
        
        <form method="POST" action="new_reduction.php" enctype="multipart/form-data" id="demo-form">
                  <input type="text" name="title" maxlength="40" class="pseudo" placeholder="Titre de la réduction" autofocus required>
                  <textarea name="description" placeholder="Description de la réduction" maxlength="2000" class="annonce" required></textarea>
                  
                  <label for="upload" id="custom-upload">
                  <i class="fa fa-camera"></i> Ajouter une photo à l'annonce
                  </label>
                  <input id="upload" name="image" type="file" required/>
                  <!-- CAPTCHA -->
                  
                  <button type="submit" name="valider" class="g-recaptcha" id="validerBtn" 
                      data-sitekey="6LeFFHgmAAAAAPUfWaovT59x9lKkA4wYvsLyjF3H" 
                      data-callback='onSubmit' 
                      data-action='submit'>Publier l'annonce</button>      
          <br>
        </form>
      </div>
    </div>    
  </body>
</html>


<style>
    h1{
        margin-bottom:0;
    }

    input[type="file"] {
        display: none;
    }


    #validerBtn{
      font-weight:800;
      padding:10px;
      padding-left:40px;
      padding-right:40px;
      border-radius:10px;
      margin-top: 20px;
      text-align:center;
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      text-decoration:none;
      transition:0.1s;
      cursor: pointer;
      background-color: #0b80e0;
      color:white;
      width:100%;
      display:block;
      font-family: Loma;
      color:white;
      font-size:18px;
      border:0;
    }
    #validerBtn:hover{
      background-color: #0661c4;
    }

    #custom-upload {
        border: 1px solid #ddd;
        border-radius:8px;
        padding:8px;
        text-align:center;
        display: inline-block;
        cursor: pointer;
        color:white;
        background-color:#029f1a;
        transition: 0.1s;
    }
    #custom-upload:hover{
        background-color:#029418;
    }

    p{
        margin-top:0;
        margin-bottom:20px;
    }
    #loginButton{
        background-color: #0b80e0;
        color: white;
        font-weight: 800;
        cursor:pointer;
        transition:0.1s;
    }
    #loginButton:hover{
        background-color: #0661c4;
    }
    #separator{
        border-top: 1px solid rgb(211, 211, 211);
        margin-left:10%;
        width:80%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    #signUpButton{
        background-color: white;
        color: black;
        display:block;
        width:100%;
        margin-bottom:10px;
        height:45px;
        font-size:20px;
        border-radius: 8px;
        padding: 10px;
        border:0;
        transition:0.1s;
        cursor:pointer;
    }
    #signUpButton:hover{
        background-color: #f5f5f5;
    }
    input{
        display:block;
        width:100%;
        margin-bottom:10px;
        height:45px;
        font-size:20px;
        border-radius: 8px;
        padding: 10px;
        border:0;
        font-family: Loma;
    }
    textarea{
      display:block;
      width:100%;
      margin-bottom:10px;
      font-size:20px;
      border-radius: 8px;
      padding: 10px;
      border:0;
      font-family: Loma;
      max-width:100%;
      height:135px;
      resize:none;
    }
    @media all and (min-width: 1024px){
        
        
        #formContainer{
            width:500px;
            border-radius: 20px;
        }
    }
    @media all and (min-width: 0px) and (max-width: 1024px){
        #formContainer{
            padding:10%;
        }
        
    }
</style>
<script>
function onSubmit(token) {
  document.getElementById("demo-form").submit();
}
</script>
    
    
  </body>
</html>

