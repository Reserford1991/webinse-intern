function myFunction() {
    var qty_products = document.getElementById('qty_products').value;
    var item_price = document.getElementById('item_price').value;
    var price = qty_products * item_price;
    document.getElementById('subtotal').value = price;
}
