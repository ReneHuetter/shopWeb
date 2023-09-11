<?php
require_once __DIR__ . '/dbClass.php';

class Cart extends Database {

    public function loadCart() {
        $stmt = $this->connect()->prepare("SELECT * FROM cart INNER JOIN produkt ON cart.product_id = produkt.id");
        $stmt->execute();
        while ($result = $stmt->fetch()) {
            echo '<div>
                <div>Produtkname:'." ". $result['pnmae'].'</div>
                <div>Produtnummer:'." ". $result['product_id'].'</div>
                <div>Kunde:'." ". $result['user_id'].'</div>
                <div>Anzahal:'." ". $result['anzahl'].'</div>
                <div>Date:'." ". $result['created'].'</div>
                <div>Preis:'." ". $result['anzahl'] * $result['price'].'</div>
                <form method="post">
                    <input type="hidden" name="productid" value="'.$result['product_id'] .'">
                    <button type="submit" name="deletebtn">Löschen</button>
                </form>
            </div>';
        }
    }

    public function addtoCart ($productid, $userid, $anzahl) {
        $stmt = $this->connect()->prepare("INSERT INTO cart (product_id, user_id, anzahl) VALUES (?,?,?)");
        $stmt->execute([$productid,$userid,$anzahl]);
        return;
    }

    public function removoCart ($productid) {
        $stmt = $this->connect()->prepare("DELETE FROM cart WHERE product_id = ?");
        $stmt->execute([$productid]);
        echo 'Delete from cart successfully';
        header("Refresh:3; url='cart.php?'");
        return;
    }
}
?>