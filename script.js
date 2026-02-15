let allProducts = [];

fetch('https://fakestoreapi.com/products')
  .then(res => res.json())
  .then(data => {
    allProducts = data;
    himnakanNkarneriMas(data);
  });



function himnakanNkarneriMas(products) {

  let renderProduct = document.querySelector(".himnakanNkarneriMas");

  renderProduct.innerHTML = "";
  // console.log(allProducts);

  products.forEach((element) => {
    let html = `
      <div class="nkarneriDiver">
        <img src="${element.image}" alt="picture" class="himnakanPicturNer">

        <p class="text14 text15">${element.title}</p>
        <p class="text14 text17">${element.price}$
          <span class="gniKoxiBary">${element.category}</span>
        </p>

        <button class="orange-botton2" onclick="handleAddProduct(${element.id})">
          <p class="text11">add to card</p>
        </button>
      </div>`;
    renderProduct.innerHTML += html;
  });
}


let select1 = document.querySelector("#select2");

select1.addEventListener("change", (e) => {
  let value = e.target.value;
  if (value === "all") {
    himnakanNkarneriMas(allProducts);
  } else {
    let filtered = allProducts.filter(elem => elem.category === value);
    himnakanNkarneriMas(filtered);
  }
});




let minInput = document.querySelector("#minInput");
let maxInput = document.querySelector("#maxInput");
function productsMinMax() {
  let min = (minInput.value) || 0;
  let max = (maxInput.value) || 9007199254740991;

  let filtered = allProducts.filter(product => {
    return product.price >= min && product.price <= max;
  });
  himnakanNkarneriMas(filtered);
}

minInput.addEventListener("input", productsMinMax);
maxInput.addEventListener("input", productsMinMax);




let select2 = document.querySelector("#select2");
select3.addEventListener("change", (e) => {
  let value = e.target.value;
  if (value === "a-z") {
    let sorted = [...allProducts].sort((a, b) => a.title.localeCompare(b.title));
    himnakanNkarneriMas(sorted);
  }
  else if (value === "z-a") {
    let sorted = [...allProducts].sort((a, b) => b.title.localeCompare(a.title));
    himnakanNkarneriMas(sorted);
  }
  else if (value === "min-max") {
    let sorted = [...allProducts].sort((a, b) => a.price - b.price);
    himnakanNkarneriMas(sorted);
  }
  else if (value === "max-min") {
    let sorted = [...allProducts].sort((a, b) => b.price - a.price);
    himnakanNkarneriMas(sorted);
  }
});

var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".swiper-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});


function handleAddProduct(id) {
  let product = allProducts.find(element => element.id == id)
  let localData = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

  if (localData.some(elem => elem.id === id)) {
    localData.forEach(elem => {
      if (elem.id === product.id) {
        elem.count = elem.count ? elem.count + 2 : 1
        console.log();

      }
    });
  } else {
    localData.push(product)
  }



  localStorage.setItem('cart', JSON.stringify(localData))
}