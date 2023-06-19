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
    <link rel="icon" href="/assets/images/favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/styleHome.css">
    <title>Tomato</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            <a href="/">
                <div id="top-nav-header-container">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="/assets/images/logo.svg">
                    </div>
                </div>
            </a>
        </div> 
    </nav>

    <div id="main-container">
      <div id="page-container">
        <h2>Oops ! Tomato s'est égaré parmi toutes ses réductions.</h2>
        <p>Cette page est actuellement inexistante.</p>
        <div id="buttons-container">
          <div class="button" id="stores-button" onclick="goToHome()">
          ← Retourner à la page d'accueil
          </div>
        </div>

      </div>
    </div>    
  </body>
  <script>
    function goToHome(){
      window.location.href = '/';
    }

  </script>
</html>
