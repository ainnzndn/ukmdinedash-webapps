<?php
if(!empty($_GET["action"])) 
{
$productId = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';
$quantity = isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '';

switch($_GET["action"])
 {
	case "add":
		if(!empty($quantity)) {
			$stmt = $db->prepare("
        SELECT i.*, s.stall_name, c.college_name 
        FROM ukmdinedash_items i 
        INNER JOIN ukmdinedash_stalls s ON i.stall_id = s.stall_id 
        INNER JOIN ukmdinedash_colleges c ON i.college_id = c.college_id 
        WHERE i.itm_id = ?
    ");
    $stmt->bind_param('i', $productId);
    $stmt->execute();
    $productDetails = $stmt->get_result()->fetch_object();
    $itemArray = array(
        $productDetails->itm_id => array(
            'title' => $productDetails->title,
            'itm_id' => $productDetails->itm_id,
            'quantity' => $quantity,
            'price' => $productDetails->price,
			'stall_id' => $productDetails->stall_id,
            'stall_name' => $productDetails->stall_name,
            'college_name' => $productDetails->college_name,
									)
								);					
								if(!empty($_SESSION["cart_item"])) 
					{
						if(in_array($productDetails->itm_id,array_keys($_SESSION["cart_item"]))) 
						{
							foreach($_SESSION["cart_item"] as $k => $v) 
							{
								if($productDetails->itm_id == $k) 
								{
									if(empty($_SESSION["cart_item"][$k]["quantity"])) 
									{
									$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $quantity;
								}
							}
						}
						else 
						{
								$_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
						}
					} 
					else 
					{
						$_SESSION["cart_item"] = $itemArray;
					}
			}
			break;
			
	case "remove":
		if(!empty($_SESSION["cart_item"]))
			{
				foreach($_SESSION["cart_item"] as $k => $v) 
				{
					if($productId == $v['itm_id'])
						unset($_SESSION["cart_item"][$k]);
				}
			}
			break;
			
	case "empty":
			unset($_SESSION["cart_item"]);
			break;
			
	case "check":
			header("location:checkout.php");
			break;
	}
}



?>