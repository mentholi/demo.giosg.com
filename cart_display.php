<?php 
ob_start();
?>

<div class="giosg_data" style="display:none">
  <div class="giosg_shoppingcart">
<?php 
//Print all the items in the shopping cart
$total_price = 0;
foreach ($_SESSION['SHOPPING_CART'] as $itemNumber => $item) {
$total_price = $total_price + ($item['price'] * $item['qty']);
?>
    <div class="giosg_product_row">
      <span class="giosg_product_name"><?php echo $item['name']; ?></span>
      <span class="giosg_product_price"><?php echo $item['price']; ?></span>
      <span class="giosg_product_amount"><?php echo $item['qty']; ?></span>
    </div>  
<?php
}
?>
    <div class="giosg_total_sum"><?php echo $total_price; ?></div>
<?php if (isset($_GET['done'])) { ?>
    <div class="giosg_payment_success"></div>
<?php 
} 
?>
  </div>
</div>

<?php $_SESSION['SHOPPING_CART_HTML'] = ob_get_flush(); ?>
