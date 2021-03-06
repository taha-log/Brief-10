<?php
    include('menu.php');
    include('header.php');
    echo '<div class="divstandard">';
    $conn = new mysqli("localhost", "root", "", "vente");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `produit` ORDER BY `produit`.`idProduit` ASC ";
    $result = mysqli_query($conn, $sql);  
         

    if ($result->num_rows > 0) {
        echo '<div class="row">';
        while($row = mysqli_fetch_array($result))  
                {  
                    echo '<div class="col-sm-4 cardProduit">
                    <div class="card">
                    <img src="data:image/jpeg;base64,'.base64_encode($row['imageProduit'] ).'" class="card-img-top" height="300" />  
                    <div class="card-body">
                        <h5 class="card-title">'.$row['nomProduit'].'</h5>
                        <p class="card-text text-right"> Quantité : '.$row['quantiteStock'].'</p>
                        <p class="card-text text-right">'.$row['prix'].' Dh</p>
                        <a href="updateProduit.php?id='.$row["idProduit"].'"><button type="button" name="detailProduit" class="btn btn-light btn-lg">Modifier</button></a>
                        <a href="deleteProduit.php?id='.$row["idProduit"].'"><button type="button" name="DeleteProduit" class="btn btn-light btn-lg">Supprimer</button></a>
                    </div>
                    </div>
                    </div>';  
                }
        echo '</div>
        <a href="addProduit.php"><button type="button" class="btn btn-light btn-lg">Ajouter Produit</button></a>';
        
    }  
    else {
    echo '<p class="text-center font-weight-bolder">Aucun Produit</p>';
    }
    $conn->close();
    echo '</div>';
    include('footer.php');
?>