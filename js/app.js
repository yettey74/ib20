// variables
const cartBtn = document.querySelector(".cart-btn");
const closeCartBtn = document.querySelector(".close-cart");
const clearCartBtn = document.querySelector(".clear-cart");
const cartDOM = document.querySelector(".cart");
const cartOverlay = document.querySelector(".cart-overlay");
const cartItems = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total");
const cartPromo = document.querySelector(".cart-promo");
const cartContent = document.querySelector(".cart-content");
const productsDOM = document.querySelector(".products-center");
let cart = [];
let buttonsDOM = [];
let buttonsDOMmild = [];
let buttonsDOMmedium = [];
let buttonsDOMhot= [];
let buttonsDOMsmall = [];
let buttonsDOMlarge = [];
//syntactical sugar of writing constructor function

// products
class Products {
  async getProducts() {
    // always returns promise so we can add .then
    // we can use await until promised is settled and return result
    try 
    {
      let result = await fetch("products.json");
      let data = await result.json();
      let products = data.items;

      products = products.map(item => {
      const { title, price, product_description, size, spice } = item.fields;
      const { id, pid, cid } = item.sys;
      const product_image = item.fields.image.fields.file.product_image;
      return { id, pid, cid, title, price, product_description, size, spice, product_image };
      });

      return products;
      
    } catch (error) {
      console.log(error);
    }
  }
}

// ui
class UI {
  displayProducts(products) {
    let result = "";
    products.forEach(product => {
      result += `
   <!-- single product -->
        <article class="product">
          <div class="img-container">
            <img
              src="${product.product_image}"
              alt="product-alt"
              title="product-title"
              class="product-img"
              width="25px"
              height="25px"
            />`;

            if( product.size == '1' ){

              result += `
              <button class="small-btn" data-id=${product.pid}small>
                Small
              </button>
              <button class="large-btn" data-id=${product.pid}large>                
                Large
              </button>`;

            } 
            
            if( product.spice == '1' ) {

              result += `
              <button class="mild-btn" data-id=${product.id}mild>
              Mild
              </button>
              <button class="medium-btn" data-id=${product.id}medium>
                Medium
              </button>
              <button class="hot-btn" data-id=${product.id}hot>
                Hot
              </button>`;

            } 
            
            if( product.spice == '0' && product.size == '0'){

              result += `              
              <button class="bag-btn" data-id=${product.id}>
                <i class="fas fa-shopping-cart"></i>
                Add to Order
              </button>`;
            }

            result += `</div>
            <h3>${product.title}</h3>
            <h4>$ ${product.price}</h4>
        </article>
        <!-- end of single product -->
   `;
    });
    productsDOM.innerHTML = result;
  }  
     
  getBagButtons() {
    let buttons = [...document.querySelectorAll(".bag-btn")];
    buttonsDOM = buttons;
    buttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      }
	  
      button.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;
        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }
  
  getMildButtons() {
    let mildbuttons = [...document.querySelectorAll(".mild-btn")];
    buttonsDOMmild = mildbuttons;    
    mildbuttons.forEach(mildbutton => {
      let id = mildbutton.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        mildbutton.innerText = "In Cart";
        mildbutton.disabled = true;
      }
	  
      mildbutton.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;
        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }
  
  getMediumButtons() {
    let mediumbuttons = [...document.querySelectorAll(".medium-btn")];
    buttonsDOMmedium = mediumbuttons;
    mediumbuttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      }
	  
      button.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;
        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }
  
    getHotButtons() {
    let hotbuttons = [...document.querySelectorAll(".hot-btn")];
    buttonsDOMhot = hotbuttons;
    hotbuttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      }
	  
      button.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;
        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }

  getSmallButtons() {
    let smallbuttons = [...document.querySelectorAll(".small-btn")];
    buttonsDOMsmall = smallbuttons;
    smallbuttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      }
	  
      button.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;
        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }
  
  getLargeButtons() {
    let largebuttons = [...document.querySelectorAll(".large-btn")];
    buttonsDOMlarge = largebuttons;
    largebuttons.forEach(button => {
      let id = button.dataset.id;
      let inCart = cart.find(item => item.id === id);

      if (inCart) {
        button.innerText = "In Cart";
        button.disabled = true;
      }
	  
      button.addEventListener("click", event => {
        // disable button
        event.target.innerText = "In Cart";
        event.target.disabled = true;

        // add to cart
        let cartItem = { ...Storage.getProduct(id), amount: 1 };
        cart = [...cart, cartItem];
        Storage.saveCart(cart);
        
        // add to DOM
        this.setCartValues(cart);
        this.addCartItem(cartItem);
        this.showCart();
      });
    });
  }
  
  setCartValues(cart) {
    let tempTotal = 0;
    let itemsTotal = 0;
    cart.map(item => {
		tempTotal += (item.price * item.amount);
      /*tempTotal += (item.price * item.amount)-((item.price * item.amount) * .1);*/
      itemsTotal += item.amount;
    });
    cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
    cartItems.innerText = itemsTotal;
	localStorage.setItem("totalPrice", tempTotal);
  } 
  
  addCartItem(item) {

    const div = document.createElement("div");
    div.classList.add("cart-item");
    div.innerHTML = `<!-- cart item -->
            <!-- item image -->
            <img src=${item.product_image} alt=${item.title} title=${item.title}/>
            <!-- item info -->
            <div>
              <h4>${item.title}</h4>
              <h5>$${item.price}</h5>
              <span class="remove-item" data-id=${item.id}>remove</span>
            </div>
            <!-- item functionality -->
            <div>
                <i class="fas fa-chevron-up" data-id=${item.id}></i>
              <p class="item-amount">
                ${item.amount}
              </p>
                <i class="fas fa-chevron-down" data-id=${item.id}></i>
            </div>
          <!-- cart item -->
    `;
    cartContent.appendChild(div);

  }

  showCart() {

    cartOverlay.classList.add("transparentBcg");
    cartDOM.classList.add("showCart");

  }


  setupAPP() {

    cart = Storage.getCart();
    this.setCartValues(cart);
    this.populateCart(cart);
    cartBtn.addEventListener("click", this.showCart);
    closeCartBtn.addEventListener("click", this.hideCart);

  }


  populateCart(cart) {

    cart.forEach(item => this.addCartItem(item));

  }


  hideCart() {

    cartOverlay.classList.remove("transparentBcg");
    cartDOM.classList.remove("showCart");

  }

  cartLogic() {

    clearCartBtn.addEventListener("click", () => {

      this.clearCart();

    });

    cartContent.addEventListener("click", event => {

      if (event.target.classList.contains("remove-item")) {

        let removeItem = event.target;
        let id = removeItem.dataset.id;
        cartContent.removeChild(removeItem.parentElement.parentElement);

        // remove item
        this.removeItem(id);

      } else if (event.target.classList.contains("fa-chevron-up")) {

        let addAmount = event.target;
        let id = addAmount.dataset.id;
        let tempItem = cart.find(item => item.id === id);
        tempItem.amount = tempItem.amount + 1;
        Storage.saveCart(cart);
        this.setCartValues(cart);
        addAmount.nextElementSibling.innerText = tempItem.amount;

      } else if (event.target.classList.contains("fa-chevron-down")) {

        let lowerAmount = event.target;
        let id = lowerAmount.dataset.id;
        let tempItem = cart.find(item => item.id === id);
        tempItem.amount = tempItem.amount - 1;

        if (tempItem.amount > 0)
        {
          Storage.saveCart(cart);
          this.setCartValues(cart);
          lowerAmount.previousElementSibling.innerText = tempItem.amount;

        } else {

          cartContent.removeChild(lowerAmount.parentElement.parentElement);
          this.removeItem(id);
          
        }
      }
    });
  }


  clearCart() {

    console.log(this);
    let cartItems = cart.map(item => item.id);
    cartItems.forEach(id => this.removeItem(id));

    while (cartContent.children.length > 0) {
      cartContent.removeChild(cartContent.children[0]);
    }

    this.hideCart();

  }


  removeItem(id) {

    console.log(this);
    cart = cart.filter(item => item.id !== id);
    this.setCartValues(cart);
    Storage.saveCart(cart);

    let button = this.getSingleButton(id);
    button.disabled = false;
    button.innerHTML = `<i class="fas fa-shopping-cart"></i>Add to Cart`;

    let mildbutton = this.getMildButton(id);
    mildbutton.disabled = false;
    mildbutton.innerHTML = `<i class="fas fa-shopping-cart"></i>Mild`;

    let mediumbutton = this.getMediumButton(id);
    mediumbutton.disabled = false;
    mediumbutton.innerHTML = `<i class="fas fa-shopping-cart"></i>Medium`;

    let hotbutton = this.getHotButton(id);
    hotbutton.disabled = false;
    hotbutton.innerHTML = `<i class="fas fa-shopping-cart"></i>Hot`;

    let smallbutton = this.getSmallButton(id);
    smallbutton.disabled = false;
    smallbutton.innerHTML = `<i class="fas fa-shopping-cart"></i>Small`;

    let largebutton = this.getLargeButton(id);
    largebutton.disabled = false;
    largebutton.innerHTML = `<i class="fas fa-shopping-cart"></i>Large`;

  }


  getSingleButton(id) {
    return buttonsDOM.find(button => button.dataset.id === id);
  }

  getMildButton(id) {
    return buttonsDOMmild.find(mildbutton => mildbutton.dataset.id === id);
  }

  getMediumButton(id) {
    return buttonsDOMmedium.find(mediumbutton => mediumbutton.dataset.id === id);
  }

  getHotButton(id) {
    return buttonsDOMhot.find(hotbutton => hotbutton.dataset.id === id);
  }

  getSmallButton(id) {
    return buttonsDOMsmall.find(smallbutton => smallbutton.dataset.id === id);
  }

  getLargeButton(id) {
    return buttonsDOMlarge.find(largebutton => largebutton.dataset.id === id);
  }
}

class Storage {

  static saveProducts(products) {
    localStorage.setItem("products", JSON.stringify(products));
  }

  static getProduct(id) {
    let products = JSON.parse(localStorage.getItem("products"));
    return products.find(product => product.id === id);
  }

  static saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
  }

  static getCart() {
    return localStorage.getItem("cart")
      ? JSON.parse(localStorage.getItem("cart"))
      : [];
  } 

}

document.addEventListener("DOMContentLoaded", () => {
  const ui = new UI();
  const products = new Products();
  ui.setupAPP();

  // get all products
  products
    .getProducts()
    .then(products => {
      //ui.displayProducts(products);
      Storage.saveProducts(products);
    })
    .then(() => {
      ui.getBagButtons();
      ui.getSmallButtons();
      ui.getLargeButtons();
      ui.getMildButtons();
      ui.getMediumButtons();
      ui.getHotButtons();
      ui.cartLogic();	  
    });
});