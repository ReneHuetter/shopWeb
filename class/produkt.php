<?php
require_once __DIR__ .'/dbClass.php';

class Product extends Database {

    public function loadAllProducts() {
        $stmt = $this->conn()->prepare("SELECT * FROM produkt");
        $stmt->execute();
        while($result = $stmt->fetch()) {
            echo '<div class="product">
                    <div class= "p_img"><img src="/img/'.$result['img'].'"/></div>
                    <div class= "p_name">'.$result['pname'].'"/></div>
                    <div class= "p_descripton">'.$result['desrcipton'].'"/></div>
                    <div class= "p_price">'.$result['price'].'"/></div>
                    <from action=""method="post">
                        <input type="text" name="anzahl" placeholder="Anzahl">
                        <input type="hidden" name="productid" value="'.$result['id'].'" />
                        <button type="submit" name="addbtn">hinzufügen</button>
                    </from>
            </div>';
        }
    }

    public function addProduct ($name, $price, $img, $desrcipton) {
        $stmt = $this->conn()->prepare("INSERT INTO produkt (pname, price, desrcipton, img) VALUES (?,?,?,?)");
        $stmt->execute([$name, $price, $desrcipton, $img]);
        echo 'Product inserted successfully';
        return;
    }

    public function removeProduct ($productId) {
        $stmt = $this->conn()->prepare("DELETE FROM produkt WHERE id = ?");
        $stmt->execute([$productId]);
        return;
    }

}
?>