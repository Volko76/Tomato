<?php

    header("Content-Type: application/json");
    $ads = array();

    $ad = array(
        "category" => "",
        "title" => "",
        "shop" => "",
        "description" => "",
        "adId" => 0,
        "adImageId" => 0,
        "adDiscount" => ""
    );
    
    
    if (isset($_GET['category'])){
        $categorie = $_GET['category'];

        $limit = 10;
        $page = 1;

        if (isset($_GET['limit'])){
            if ($_GET['limit']<50){
                $limit = $_GET['limit'];
            }
        }

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }

        include("connexion.php");

        if ($categorie=="all"){
            $query = $pdo->prepare("SELECT * FROM messages JOIN stores ON stores.store_id = messages.store_id ORDER BY message_id ASC LIMIT ? OFFSET ?;");
            $query->bindValue(1,$limit,PDO::PARAM_INT);
            $query->bindValue(2,($page-1)*$limit,PDO::PARAM_INT);
            $query->execute();

        }
        else{
            $query = $pdo->prepare("SELECT * FROM messages JOIN stores ON stores.store_id = messages.store_id WHERE category_id = ? ORDER BY message_id ASC LIMIT ? OFFSET ?;");
            $query->bindValue(1,$categorie,PDO::PARAM_INT);
            $query->bindValue(2,$limit,PDO::PARAM_INT);
            $query->bindValue(3,($page-1)*$limit,PDO::PARAM_INT);
            $query->execute();
        }

        

        while ($adResult = $query->fetch()) {
            $ad['category'] = $adResult['category'];
            $ad['title'] = $adResult['title'];
            $ad['shop'] = $adResult['name'];
            $ad['description'] = $adResult['contenu'];
            $ad['adId'] = $adResult['message_id'];
            $ad['adImageId'] = $adResult['image_id'];
            $ad['adDiscount'] = $adResult['discount_amount'];
            array_push($ads, $ad);
        }
        
        echo json_encode($ads);
        
    }

?>