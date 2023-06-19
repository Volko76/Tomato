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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            <a href="">
                <div id="top-nav-header-container">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="./assets/images/logo.png">
                    </div>
                    <div id="top-nav-logo-label">
                        tomato
                    </div>
                </div>
            </a>
        </div> 
        
        <div id="filters-container">
            <input class="filter-field" id="location-filter" value="Ma position">
            <select onchange="load_annonces()" class="filter-field" name="categorieIndex" id="store-filter">
            </select>
        </div>
    </nav>

    <div id="main-container">
      
    </div>
    
    
  </body>
</html>
