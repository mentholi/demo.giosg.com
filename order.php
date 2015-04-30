<?php 
/*
* Super Simple Shopping Cart
*
* Add products with a "Get" request "add=name&price=XX&qty"
* items storred in a "SESSION" vairable by thier names, qty, and price only
* Remove with a "get" request "renove=xx"
* Empty with a "get" request "empty"
*/

//Start the session
session_start();

//Create 'cart' if it doesn't already exist
if (!isset($_SESSION['SHOPPING_CART'])){ $_SESSION['SHOPPING_CART'] = array(); }


//Add an item only if we have the threee required pices of information: name, price, qty
if (isset($_GET['add']) && isset($_GET['price']) && isset($_GET['qty'])){
	//Adding an Item
	//Store it in a Array
	$ITEM = array(
		//Item name		
		'name' => $_GET['add'], 
		//Item Price
		'price' => $_GET['price'], 
		//Qty wanted of item
		'qty' => $_GET['qty']		
		);

	//Add this item to the shopping cart
	$_SESSION['SHOPPING_CART'][] =  $ITEM;
	//Clear the URL variables
	header('Location: products.php');//. $_SERVER['PHP_SELF']);
}
//Allowing the modification of individual items no longer keeps this a simple shopping cart.
//We only support emptying and removing
else if (isset($_GET['remove'])){
	//Remove the item from the cart
	unset($_SESSION['SHOPPING_CART'][$_GET['remove']]);
	//Re-organize the cart
	//array_unshift ($_SESSION['SHOPPING_CART'], array_shift ($_SESSION['SHOPPING_CART']));
	//Clear the URL variables
	header('Location: cart.php');//' . $_SERVER['PHP_SELF']);

}
else if (isset($_GET['empty'])){
	//Clear Cart by destroying all the data in the session
	session_destroy();
	//Clear the URL variables
	header('Location: products.php');//' . $_SERVER['PHP_SELF']);

}
else if (isset($_GET['purchase'])){
        // pretend that we completed all the steps and made purchase.
	// in reality just empty the cart
        session_destroy();
        // Redirect to thank you page
        header('Location: thanks.php?done');
}
else if (isset($_POST['update'])) {
	//Updates Qty for all items
	foreach ($_POST['items_qty'] as $itemID => $qty) {
		//If the Qty is "0" remove it from the cart
		if ($qty == 0) {
			//Remove it from the cart
			unset($_SESSION['SHOPPING_CART'][$itemID]);
		}
		else if($qty >= 1) {
			//Update to the new Qty
			$_SESSION['SHOPPING_CART'][$itemID]['qty'] = $qty;
		}
	}
	//Clear the POST variables
	header('Location: cart.php');// . $_SERVER['PHP_SELF']);
} 

?>
<?php

if (isset($_POST['submit']) && 
	isset($_POST['email']) && 
	isset($_POST['card_num'])
	)
{		
	//Everything is good, proceed
	sendEmail($_SESSION['SHOPPING_CART_HTML']);
	$result_message = "Thank You.";
}
elseif (isset($_POST['submit'])){
	//Missing Required Information
	$result_message = "You must Provide two email addresses.";
}
?>


<style type="text/css">
<!--
#formArea #orderForm #formColumns {
	width:650px;
	margin:auto;
}
#formArea #orderForm #formColumns #leftColumn {
	float:left;
	width:300px;
}
#orderForm {
	height:500px;
}
#formArea #orderForm #formColumns #rightColumn {
	float:right;
	width:300px;
}
#formArea #orderForm #formColumns th {
	text-align: left;
}
.copyright {
	font-size: 9pt;
}
-->
</style>

<h3>Shopping cart</h3>

<div id="shoppingCartDisplay">
<form action="" method="post" name="shoppingcart">
	<?php 
    //We want to include the shopping cart in the email
    ob_start();
    ?>
    <table width="500" border="0" cellspacing="2" cellpadding="1">
      <tr>
        <th scope="col">&nbsp;</th>
        <th scope="col">Item Name</th>
        <th scope="col">Unit Price</th>
        <th scope="col" style="display:none;">Qty hidden</th>
	<th scope="col">Qty</th>
        <th scope="col">Cost</th>
      </tr>
    
        <?php 
        //Print all the items in the shopping cart
        foreach ($_SESSION['SHOPPING_CART'] as $itemNumber => $item) {
        ?>
        <tr id="item<?php echo $itemNumber; ?>">    
            <td><a href="?remove=<?php echo $itemNumber; ?>">remove</a></td>
            <td class="prod-name"><?php echo $item['name']; ?></td>
            <td class="prod-price"><?php echo $item['price']; ?></td>
            <td class="prod-qty" style="display:none;"><?php echo $item['qty']; ?></td>
	    <td><input name="items_qty[<?php echo $itemNumber; ?>]" type="text" id="item<?php echo $itemNumber; ?>_qty" value="<?php echo $item['qty']; ?>" size="2" maxlength="3" /></td>
            <td><?php echo $item['qty'] * $item['price']; ?></td>        
        </tr>
        <?php
        }
        ?>
    </table>
	<?php $_SESSION['SHOPPING_CART_HTML'] = ob_get_flush(); ?>
    <p>
      <label>
      <input type="submit" name="update" id="update" value="Update Cart" />
      </label>
    </p>
</form>
<p><a href="?empty">Empty Cart</a></p>
<br /><br />
<a href="?purchase"><h3>Purchase order</h3></a>
</div>























<?php include('cart_display.php'); ?>
