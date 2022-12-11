

class Product {
    static #number = 0
    #id = -1
    #name
    #pic
    #description
    #price
    n = 0;
    static #products = new Map()


    store() {
        let json_string = JSON.stringify(this.getData());
        Product.#products.push(json_string);
        localStorage.setItem('products', Product.#products);
        Product.updateCart()
    }

    static find(id){
        return Product.#products.get(id);
    }

    constructor(obj = null) {
        if (obj != null) {
            Product.#number++

            this.#id = obj.id
            this.n = Product.#number
            this.#name = obj.name
            this.#pic = obj.pic_path
            this.#price = obj.price
            this.#description = obj.description
            Product.#products.set(obj.id , this)
        }

        

    }

    getData(key = null) {
        if (key == null) {
            return {
                id : this.#id,
                number: this.n,
                name: this.#name,
                pic: this.#pic,
                description: this.#description,
                price: this.#price
            }
        }
    }

    getId() {
        return this.#id;
    }
    static getNumber(){
        return Product.#number;
    }
    /**
     * make dome function to make an emelent from product information
     * @returns NULL if there is no information, dom element as a string otherwise
     */
    makeDom(obj = null) {
    if (this.#id == -1) {
        alert("can not use what you want")
        return null;
    }

    if (obj != null) {
        return `
    <div class="border w-100 p-1 d-flex" style="height: 3.5rem;">
        <div class="w-100 h-100 d-flex justify-content-start align-items-center">
            <span class="fw-bold px-2 ">
                ${this.n}
            </span>
            <span class="d-block h-100 rounded border mx-2" style="min-width: 3.5rem;">
                <img src="${this.#pic}" alt="" class="w-100 h-100">
            </span>
            <span class="overflow-hidden text-center px-2 small fw-bold" style="white-space: nowrap;max-width:200px;text-overflow:ellipsis">
                ${this.#name}
            </span>
            <span class="mx-2 small fw-bold">
                ${this.#price}
            </span>
            <span class="mx-2 overflow-hidden text-center px-1 small d-block" style="max-width:400px;white-space:nowrap;text-overflow:ellipsis">
                ${this.#description}
            </span>
            <button type="button" class="btn btn-danger text-light mx-2 delete" id="${this.#id}">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
        `
    }

    return `
    <div class="border w-100 p-1 d-flex" style="height: 3.5rem;">
        <div class="w-100 h-100 d-flex justify-content-start align-items-center">
            <span class="fw-bold px-2 ">
                ${obj.number}
            </span>
            <span class="d-block h-100 rounded border mx-2" style="min-width: 3.5rem;">
                <img src="${this.#pic}" alt="" class="w-100 h-100">
            </span>
            <span class="overflow-hidden text-center px-2 small fw-bold" style="white-space: nowrap;max-width:200px;text-overflow:ellipsis">
                ${obj.name}
            </span>
            <span class="mx-2 small fw-bold">
                ${obj.price}
            </span>
            <span class="mx-2 overflow-hidden text-center px-1 small d-block" style="max-width:400px;white-space:nowrap;text-overflow:ellipsis">
                ${obj.description}
            </span>
            <button type="button" class="btn btn-danger text-light mx-2 delete"  id="${obj.id}">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
        `
}
}




class Cart{
    #cart = $("#cartBody")
    #products = []
    constructor(data = null){
        if(data != null){
            this.#products = data.split('|');
            for(let i = 0 ; i < this.#products.length ; i++){
                new Product( JSON.parse( this.#products[i] ) )
            }
            console.log(this.#products)
        }
        this.updateCart();
    }


    addProduct(product){
        let product_string = JSON.stringify(product.getData())
        this.#products.push(product_string);
        console.log(this.#products)
        this.updateCart()
    }

    removeFromCart(id){
        Product.number--;
        for(let i in this.#products){
            let pr = JSON.parse(this.#products[ Number(i) ])
            if(pr.id == id){
                this.#products.splice(i , 1);
                break;
            }
        }

        console.log(this.#products)

        this.updateCart()
    }

    updateCart() {
        $("#cartCount").attr('count' , this.#products.length)
        if (this.#products.length == 0) {
            $(this.#cart).html(`
            <div class ="w-100 px-2 py-4 border">
                <p class="fw-bold text-danger">
                    no product chosed
                </p>
            </div>
            `)
        } else {

            var str = ""

            for(let i = 0 ; i < this.#products.length ; i++){
                str = str + this.#products[i] + (i == this.#products.length - 1 ? '' : '|')
            }

            localStorage.setItem('products' , str)
            $(this.#cart).html("");
            this.#products.forEach(product => {
                let product_json = JSON.parse(product)
                let product_object = Product.find(product_json.id)
                console.log(product_json.id , product_json ,  product_object)
                $(this.#cart).html( $(this.#cart).html() + product_object.makeDom(product_object.getData()) )

                var f = this;

                $(".delete").click(function(){
                    let id = Number($(this).attr('id'))
                    f.removeFromCart(id)
                })
            })

        }
    }
}

export { Product , Cart }

/*class Cart{
    #products
    constructor(domElement){
        this.#container = domElement
    }


    addItem(Product)
}*/