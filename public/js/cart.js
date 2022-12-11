import { Product , Cart } from './modules/cart.mjs'

    var cart = new Cart(localStorage.getItem('products'))

if(localStorage.getItem("cart_products") != null){
    localStorage.setItem("cart_products" , JSON.stringify(products))
}

console.log(localStorage.getItem('cart_products'))

$(".addToCart").click(function(){
    let json = $(this).attr('data-product')
    json = JSON.parse(json)
    let product = new Product(json);
    cart.addProduct(product)
})


function removeFromCart(elem){
        let id = Number(elem.id)
        alert(5)
        cart.removeFromCart(id)
}