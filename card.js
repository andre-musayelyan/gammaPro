let basket = document.querySelector("#pictureBasket");
let AddToCardEj = document.querySelector(".AddToCardEj");
let cartProductsDiv = document.querySelector(".cartProducts");
let closse = document.querySelector(".Close")

basket.onclick = function () {
  if (AddToCardEj.style.display === "block") {
    AddToCardEj.style.display = "none";
  } else {
    AddToCardEj.style.display = "block";
  }

  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cartProductsDiv.innerHTML = ""
  cart.forEach(product => {
    cartProductsDiv.innerHTML += `
      <div class="nkarneriDiver2">
        <img src="${product.image}" alt="picture" class="himnakanPicturNer2">

        <p class="text14-2 text15-2">${product.title}</p>
        <p class="text14-2 text17-2">${product.price}$
          <span class="gniKoxiBary2">${product.category}</span>
        </p>
        <div class="minusPlus">
            <p class="plusMinusClass" onclick="changeQuantity('-', ${product.id})" id="minusId">-</p>
            <span class="countProduct">${product.count}</span>
            <p class="plusMinusClass"  onclick="changeQuantity('+', ${product.id})">+</p>
        </div>
      </div>`});
}

closse.onclick = function () {
  if (AddToCardEj.style.display === "block") {
    AddToCardEj.style.display = "none";
  }
}


function changeQuantity(type, id) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  
}