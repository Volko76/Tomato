<?php
  session_start();
  if( !isset($_SESSION["email"]) ){
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

<!doctype html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../assets/images/favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styleReduction.css">
    <link rel="stylesheet" href="style.css">
    <title>Tomato</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <nav id="top-nav">
        <div id="top-nav-header-container-i">
            
            <div id="top-nav-header-container">
               <a href="/">
                    <div id="top-nav-logo-container">
                        <img id="top-nav-logo" src="../assets/images/logo.svg">
                    </div>
                </a>
                <div class="button" id="deconnect" onclick="deconnect()"><i class="fa fa-share-square-o"></i> Se déconnecter</div>
            </div>
            
        </div> 
    </nav>

    <div id="main-container">
      <div id="page-container">
        <div>
            <h1>Mon compte</h1>
            
        </div>
        <div class="button" id="edit-account-infos" onclick="editAccount()"><i class="fa fa-edit"></i> Modifier les informations de mon commerce</div>

        <h1>Mes réductions</h1>
        <div id="reductions-container">
        </div>


        <div class="button" id="create-new-reduction" onclick="createReduction()">+ Créer une nouvelle réduction</div>
      </div>
    </div>    
  </body>

  <script>
    function createReduction(){
        window.location.href = './new_reduction.php';
    }

    function editAccount(){
        window.location.href = './edit_account.php';
    }

    function deconnect(){
        window.location.href = './logout.php';
    }
  </script>




<script>


function load_annonces(){
    $.ajax({
        url: 'getAnnonces.php',
        method: 'GET',
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
    ads.forEach(add_ad);
    
}

function show_reduction(id){
  window.location.href = './edit.php?id=' + id;
}

</script>


<script>
load_annonces();
</script>





</html>


<style>


.button{
  font-weight:800;
  padding:10px;
  padding-left:40px;
  padding-right:40px;
  border-radius:10px;
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
}


#edit-account-infos{
  border:1px solid rgb(0, 179, 255);
  color:rgb(0, 179, 255);
  flex:1;
}


#edit-account-infos:hover{
  border: 1px solid rgb(0, 152, 218);
  color:rgb(0, 152, 218);
}


#deconnect{
  color:rgb(120, 120,120);
  width:fit-content;
  display:inline;
}


#deconnect:hover{
  color:rgb(100, 100,100);
}
    #create-new-reduction{
      background-color:#029f1a;
      padding:10px;
      padding-left:20px;
      color:white;
      border-radius:10px;
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
      font-weight:800;
    }

    #create-new-reduction:hover{
      background-color:#029418;
    }

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
