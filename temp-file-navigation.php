
<style>
.nav-button-container{
  padding: 4px;
  margin-bottom: 5px;
}
button:hover{
  cursor: pointer;

}
button{
  border: none;
  border-radius: 12px;
  box-shadow: 3px 3px 9px grey;
  background-color: white;
}
.temp-container{
  display: grid;
  grid-template-columns: auto auto auto;
  gap: 10px;
  justify-content: center;
}
</style>

<div class="temp-container">
<div class="nav-button-container">
    <a href="catalog.php">
      <button> Catalog</button>
    </a>
</div>

<div class="nav-button-container">
    <a href="index.php">
      <button> Homepage</button>
    </a>
</div>

<div class="nav-button-container">
    <a href="product-page.php">
      <button> Product</button>
    </a>
</div>

<div class="nav-button-container">
    <a href="cart.php">
      <button> Cart</button>
    </a>
</div>

<div class="nav-button-container">
    <a href="checkout.php">
      <button> Checkout</button>
    </a>
</div>
</div>