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
            <a href="..">
                <div id="top-nav-header-container">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="../assets/images/logo.svg">
                    </div>
                </div>
            </a>
        </div> 
        
        <div id="filters-container">
            <input class="filter-field" id="location-filter" value="Ma position">
            <select onchange="load_annonces()" class="filter-field" name="categorieIndex" id="store-filter">
                <option value="all" id='0'>Tous</option>
                        <?php
                        include("connexion.php");
                        $query = $pdo->prepare("SELECT * FROM categories ORDER BY id");
                        $query->execute();
                        while ($categorie = $query->fetch()) {
                        echo "<option value='".$categorie['id']."' id='".$categorie['id']."'>".$categorie['name']."</option>";
                        }
                    ?>
            </select>
        </div>
    </nav>

    <div id="main-container">
      <div id="reductions-container">
      </div>
    </div>


    <script>


      function load_annonces(){
          $.ajax({
              url: 'getAnnonces.php',
              method: 'GET',
              data: {category: document.getElementById("store-filter").value},
              success: function(data) {
                  add_ads(data);
              }
          });
      }

      function add_ad(ad){
            if (!ad["adDiscount"]){
            $('#reductions-container').append(
            `
                <div class="reduction-item" onclick="show_reduction(${ad["adId"]})" data-id='${ad["adId"]}'>
                    <div class="reduction-item-image" style='background-image: url("./export.php?id=${ad["adImageId"]}")'>
                    </div>
                    <div style="padding-top:15px;" class="reduction-item-infos">
                        

                        <div class="reduction-item-body">
                            <div class="reduction-item-title">
                                ${ad["title"]}
                            </div>
                            <div class="reduction-item-description">
                                ${ad["description"]}
                            </div>
                        </div>
                        
                        <div class="reduction-item-footer-container">
                            <div class="reduction-item-footer">
                                <div class="reduction-meta-footer-container">
                                    <div class="reduction-meta-footer-image-container">
                                        <img src="../assets/images/storefront_icon.png" class="reduction-meta-footer-image">
                                    </div>
                                    ${ad["shop"]}
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
                </div>`
          )
            }
            else{
                $('#reductions-container').append(
            `
                <div class="reduction-item" onclick="show_reduction(${ad["adId"]})" data-id='${ad["adId"]}'>
                    <div class="reduction-item-image" style='background-image: url("./export.php?id=${ad["adImageId"]}")'>
                    </div>
                    <div class="reduction-item-infos">
                        <div class="reduction-item-head">
                            <div class="reduction-item-discount-container">
                                <div class="reduction-item-discount">
                                    ${ad["adDiscount"]}
                                </div>
                            </div>
                        </div>

                        <div class="reduction-item-body">
                            <div class="reduction-item-title">
                                ${ad["title"]}
                            </div>
                            <div class="reduction-item-description">
                                ${ad["description"]}
                            </div>
                        </div>
                        
                        <div class="reduction-item-footer-container">
                            <div class="reduction-item-footer">
                                <div class="reduction-meta-footer-container">
                                    <div class="reduction-meta-footer-image-container">
                                        <img src="../assets/images/storefront_icon.png" class="reduction-meta-footer-image">
                                    </div>
                                    ${ad["shop"]}
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
                </div>`
          )
            }
      }

      function add_ads(ads){
          document.getElementById("reductions-container").innerHTML = ""; 
          if (ads.length==0){
            $('#reductions-container').append(`<div style="text-align:center;padding-top:40px;"><img src="/assets/images/not_found.svg" style="width:100px;height:100px;display:inline;"><h2>Oops ! Il semblerait qu'aucune réduction n'existe ici.</h2></div>`);
          }
          else{
            ads.forEach(add_ad);
          }
          
      }

      function show_reduction(id){
        window.location.href = './view.php?id=' + id;
      }

    </script>



    <script>
      load_annonces();

      

    </script>
    
    
  </body>
</html>
