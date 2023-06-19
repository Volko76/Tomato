<?php
  if( !isset($_GET["psswd"])  || $_GET["psswd"]!="sh8s0c4233h8p0fgd9op15uyw"){
    header("HTTP/1.0 404 Not Found");
    include("../404.php");
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

<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../assets/images/favicon.svg">
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
    </nav>

    <div id="main-container">
      <div id="page-container">
        <h1>S'inscrire</h1>
        <p>Donnez plus de visibilité à votre commerce
        <input id="name" type="text" name="name" placeholder="Nom du commerce" autofocus required/>
        <input id="localisation" type="text" name="localisation" placeholder="Adresse" required/>
        <select id="categorie" name="category" class="categorie">

          <?php
            include("connexion.php");
            $query = $pdo->prepare("SELECT * FROM categories ORDER BY id");
            $query->execute();
            while ($categorie = $query->fetch()) {
              echo "<option value='".$categorie['id']."' id='".$categorie['id']."'>".$categorie['name']."</option>";
            }
          ?>

        </select>
        <input id="email" type="email" name="email" placeholder="E-mail" required/>
        <input id="password" type="password" placeholder="Mot de passe" required/>
        <input id="signupButton" type="submit" onclick="signupPress()" value="S'inscrire">
        <div id="separator"></div>
        <button id="loginButton" onclick="loginPress()">Se connecter</button>

      </div>
    </div>    
  </body>
  <script>
    function loginPress(){
      window.location.href = '../login/';
    }

    function signupPress(){
      const data = { 
        name: document.getElementById("name").value,
        localisation: document.getElementById("localisation").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
      };
      
      const params = new URLSearchParams(data);

      fetch('./check.php?'+params.toString(), {
        headers: {
            'Accept': 'application/json'
        }
      })
        .then(response => response.text())
        .then(text => checkLogin(text))
    }

    function checkLogin(text){
      if (text=="true"){
        window.location.href = '../profile/';
      }
    }

    
  </script>
</html>


<style>
    h1{
        margin-bottom:0;
    }
    p{
        margin-top:0;
        margin-bottom:20px;
    }
    #signupButton{
        background-color: #0b80e0;
        color: white;
        font-weight: 800;
        cursor:pointer;
        transition:0.1s;
    }
    #signupButton:hover{
        background-color: #0661c4;
    }
    #separator{
        border-top: 1px solid rgb(211, 211, 211);
        margin-left:10%;
        width:80%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    #loginButton{
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
    #loginButton:hover{
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
    
    
  </body>
</html>
