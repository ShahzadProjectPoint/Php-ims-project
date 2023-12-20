<?php
session_start();
$max = 0;

if (isset($_SESSION['cart'])) {
    $max = count($_SESSION['cart']);
}

for ($i = 0; $i < $max; $i++) {
    if (isset($_SESSION['cart'][$i])) {
        $item = $_SESSION['cart'][$i];

        $company_name = "";
        $product_name = "";
        $unit = "";
        $packing_size = "";
        $qty = "";

        foreach ($item as $key => $val) {
            switch ($key) {
                case "company_name":
                    $company_name = $val;
                    break;
                case "product_name":
                    $product_name = $val;
                    break;
                case "unit":
                    $unit = $val;
                    break;
                case "packing_size":
                    $packing_size = $val;
                    break;
                case "qty":
                    $qty = $val;
                    break;
            }
        }

        echo $company_name . " " . $product_name . " " . $unit . " " . $packing_size . " " . $qty;
        echo "<br>";
    }
}
?>
