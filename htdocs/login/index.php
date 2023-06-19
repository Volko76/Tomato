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
    <title>Tomato</title>
    <link rel="icon" href="../assets/images/favicon.svg">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            <a href="/">
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
        <h1>Portail commerçants</h1>
        <?php
        if (isset($_GET["logout"])){
          if ($_GET["logout"]=="successful"){
            echo "<p style='color:green'>Vous avez été déconnecté avec succès.</p>";
          }
        }
        ?>
        <p id="error-login" style="display: none;">Email / mot de passe invalide(s)</p>
        <input id="email" type="email" name="email" placeholder="E-mail" autofocus required/>
        <input id="password" type="password" placeholder="Mot de passe" required/>
        <input id="loginButton" type="submit" onclick="loginPress()" value="Se connecter">
        <a href="">Mot de passe oublié ?</a>
      </div>
    </div>    
  </body>
  <script>
    function loginPress(){

      const data = { 
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
        document.getElementById("error-login").style = "display: none;"
        window.location.href = '../profile/';
      }
      else{
        document.getElementById("error-login").style = "color:red; display: block;"
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
