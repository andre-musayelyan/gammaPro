<?php
// ===============================
// SYSTEM CORE (Fake Backend)
// ===============================

// simple logger
function logMsg($msg) {
    echo "[" . date("H:i:s") . "] " . $msg . PHP_EOL;
}

// fake database
class Database {
    private $data = [];

    public function insert($table, $row) {
        $this->data[$table][] = $row;
        logMsg("Inserted into $table");
    }

    public function all($table) {
        return $this->data[$table] ?? [];
    }

    public function delete($table, $key, $value) {
        if (!isset($this->data[$table])) return;

        $this->data[$table] = array_filter(
            $this->data[$table],
            fn($r) => $r[$key] !== $value
        );
        logMsg("Deleted from $table where $key = $value");
    }
}

// user model
class User {
    public string $id;
    public string $name;
    public string $created;

    public function __construct($name) {
        $this->id = bin2hex(random_bytes(5));
        $this->name = $name;
        $this->created = date("Y-m-d H:i:s");
    }
}












let basket = document.querySelector("#pictureBasket");
let AddToCardEj = document.querySelector(".AddToCardEj");
let cartProductsDiv = document.querySelector(".cartProducts");
let closse = document.querySelector(".Close");

basket.onclick = function () {

  if (AddToCardEj.style.display === "block") {
    AddToCardEj.style.display = "none";
  } else {
    AddToCardEj.style.display = "block";
  }

  closse.onclick = function () {
    AddToCardEj.style.display = "none";
  };

  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  cartProductsDiv.innerHTML = "";

  cart.forEach((product, index) => {
    cartProductsDiv.innerHTML += `
      <div class="nkarneriDiver2">
        <img src="${product.image}" alt="picture" class="himnakanPicturNer2">

        <p class="text14-2 text15-2">${product.title}</p>
        <p class="text14-2 text17-2">${product.price}$
          <span class="gniKoxiBary2">${product.category}</span>
        </p>

        <img src="./picture/delete.png" 
             alt="picture" 
             class="delete1" 
             data-index="${index}">
      </div>`;
  });

  // DELETE EVENT
  let deleteButtons = document.querySelectorAll(".delete1");

  deleteButtons.forEach(btn => {
    btn.onclick = function () {
      let index = this.getAttribute("data-index");

      let cart = JSON.parse(localStorage.getItem("cart")) || [];

      cart.splice(index, 1); // ջնջում ենք զանգվածից

      localStorage.setItem("cart", JSON.stringify(cart)); // պահում ենք նոր զանգվածը

      basket.click(); // թարմացնում ենք քարտը
    };
  });
};







<img src="./picture/delete.png" alt="picture" class="delete1">




































































































































































































































































































































































































// app core
class App {
    private Database $db;
    private bool $running = false;

    public function __construct() {
        $this->db = new Database();
    }

    public function start() {
        $this->running = true;
        logMsg("App started");
    }

    public function stop() {
        $this->running = false;
        logMsg("App stopped");
    }

    public function addUser($name) {
        $user = new User($name);
        $this->db->insert("users", [
            "id" => $user->id,
            "name" => $user->name,
            "created" => $user->created
        ]);
    }

    public function listUsers() {
        $users = $this->db->all("users");
        logMsg("User list:");
        foreach ($users as $u) {
            echo "• {$u['name']} ({$u['id']})" . PHP_EOL;
        }
    }

    public function deleteUser($id) {
        $this->db->delete("users", "id", $id);
    }
}

$app = new App();
$app->start();

$app->addUser("Aram");
$app->addUser("Ani");
$app->addUser("Tigran");

$app->listUsers();

// timer imitation
for ($i = 1; $i <= 5; $i++) {
    logMsg("Loop: $i");
    sleep(1);
}

$app->stop();

function fakeRequest($data) {
    logMsg("Sending request: $data");
    sleep(2);
    return rand(0, 1) ? "Success" : "Failed";
}

$result = fakeRequest("Load data");
logMsg("Result: $result");

// ===============================
// END
// ===============================




// himnakanNkarneriMas(filtered);

// minInput.addEventListener("input", productsMinMax);
// maxInput.addEventListener("input", productsMinMax);

let minInput = document.querySelector("#minInput");
let maxInput = document.querySelector("#maxInput");
function productsMinMax() {
  let min = (minInput.value);
  let max = (maxInput.value);
  let filtered = allProducts.filter(product => {
    return product.price >= min && product.price <= max;
  });
  himnakanNkarneriMas(filtered); }







  let minInput = document.querySelector("#min");
let maxInput = document.querySelector("#max");

function priceFilter() {
  let min = Number(minInput.value) || 0;
  let max = Number(maxInput.value) || 9007199254740991;

  let filtered = allProducts.filter(
    p=> p.price <=max && p.price>=min);

  renderProducts(filtered);
}

minInput.addEventListener("input", priceFilter);
maxInput.addEventListener("input", priceFilter);



let selectSort = document.querySelector("#select3");

selectSort.addEventListener("change", (e) => {
  let value = e.target.value;

  let sortedProducts = [...allProducts];

  if (value === "a-z") {
    sortedProducts.sort((a, b) => a.title.localeCompare(b.title));
  }

  if (value === "z-a") {
    sortedProducts.sort((a, b) => b.title.localeCompare(a.title));
  }

  if (value === "min-max") {
    sortedProducts.sort((a, b) => a.price - b.price);
  }

  if (value === "max-min") {
    sortedProducts.sort((a, b) => b.price - a.price);
  }

  himnakanNkarneriMas(sortedProducts);
});

















html
=
=
><
<button class="orange-botton2" onclick="handleAddProduct(${element.id})">
          <p class="text11">add to card</p>
        </button>











        
        let cartProducts = document.querySelector(".AddToCardEj");

let cart = localStorage.getItem("cart")
  ? JSON.parse(localStorage.getItem("cart"))
  : [];

cart.forEach(product => {
  cartProducts.innerHTML += `
    <div class="nkarneriDiver">
      <img src="${product.image}" class="himnakanPicturNer">
      <p class="text14 text15">${product.title}</p>
        <p class="text14 text17">${product.price}$
          <span class="gniKoxiBary">${product.category}</span>
        </p>
    </div>
  `;
});




















function changeQuantity(type, id) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.forEach(elem=> {
    if(elem.id == id){
      if(type == '+'){
        elem.count += 1
      }else{
        elem.count -= 1
      }
    }
  })

 localStorage.setItem("cart", JSON.stringify(cart))
}



















// DOM էլեմենտներ
let basket = document.querySelector("#pictureBasket");
let AddToCardEj = document.querySelector(".AddToCardEj");
let cartProductsDiv = document.querySelector(".cartProducts");
let closse = document.querySelector(".Close");

// Basket բացել / փակել
basket.onclick = function () {
  AddToCardEj.style.display =
    AddToCardEj.style.display === "block" ? "none" : "block";

  renderCart();
};

// Close կոճակ
closse.onclick = function () {
  AddToCardEj.style.display = "none";
};

// Cart render ֆունկցիա
function renderCart() {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cartProductsDiv.innerHTML = "";

  cart.forEach(product => {
    cartProductsDiv.innerHTML += `
      <div class="nkarneriDiver2">
        <img src="${product.image}" alt="picture" class="himnakanPicturNer2">

        <p class="text14-2 text15-2">${product.title}</p>
        <p class="text14-2 text17-2">${product.price}$
          <span class="gniKoxiBary2">${product.category}</span>
        </p>

        <div class="minusPlus">
          <p class="plusMinusClass" onclick="changeQuantity('-', ${product.id})">-</p>
          <span class="countProduct">${product.count || 1}</span>
          <p class="plusMinusClass" onclick="changeQuantity('+', ${product.id})">+</p>
        </div>
      </div>
    `;
  });
}

// Plus / Minus ֆունկցիա
function changeQuantity(type, id) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  cart.forEach(elem => {
    if (elem.id == id) {
      elem.count = elem.count || 1;

      if (type === '+') {
        elem.count++;
      } else {
        if (elem.count > 1) {
          elem.count--;
        }
      }
    }
  });

  localStorage.setItem("cart", JSON.stringify(cart));

  // առանց refresh թարմացնում ենք UI-ը
  renderCart();
}












































































































  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  cart = cart.filter(product => product.id == id);

  localStorage.setItem("cart", JSON.stringify(cart));

  rendercard(cart);







  <?php
// Ֆայլերի անուններ
$visitsFile = 'visits.txt';
$messagesFile = 'messages.txt';

// 1. Հաշվիչ
if (file_exists($visitsFile)) {
    $visits = (int)file_get_contents($visitsFile);
} else {
    $visits = 0;
}
$visits++;
file_put_contents($visitsFile, $visits);

// 2. Հաղորդագրություններ ավելացնել
if (isset($_POST['message']) && !empty(trim($_POST['message']))) {
    $newMessage = htmlspecialchars($_POST['message']); // անվտանգություն
    $allMessages = file_exists($messagesFile) ? file_get_contents($messagesFile) : '';
    $allMessages .= date("Y-m-d H:i:s") . " — " . $newMessage . "\n";
    file_put_contents($messagesFile, $allMessages);
}

// 3. Կարդում բոլոր հաղորդագրությունները
$messages = file_exists($messagesFile) ? file($messagesFile, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>Շաաատ երկար PHP օրինակ</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f0f0f0; padding: 20px; }
        .counter { margin-bottom: 20px; font-size: 24px; }
        form { margin-bottom: 30px; }
        input { padding: 10px; width: 300px; }
        button { padding: 10px 20px; }
        .messages { background: #fff; padding: 15px; border-radius: 5px; max-width: 500px; }
        .message { padding: 5px 0; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>

<div class="counter">
    Այս էջը այցելվել է <strong><?php echo $visits; ?></strong> անգամ
</div>

<form method="post">
    <input type="text" name="message" placeholder="Մտցիր հաղորդագրություն" required>
    <button type="submit">Ուղարկել</button>
</form>

<div class="messages">
    <h3>Հաղորդագրություններ</h3>
    <?php if (empty($messages)) : ?>
        <p>Մինչ այս հաղորդագրություններ չկան</p>
    <?php else : ?>
        <?php foreach ($messages as $msg) : ?>
            <div class="message"><?php echo $msg; ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
























































  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

/* ================= CART WINDOW ================= */

.AddToCardEj{
    width:70%;
    max-width:900px;
    background:#f3f3f3;
    position:fixed;
    top:90px;
    left:50%;
    transform:translateX(-50%);
    border-radius:15px;
    display:none;
    padding:25px;
    z-index:9999;
    max-height:520px;
    overflow-y:auto;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

/* ================= TITLE ================= */

.cardTitleDiv{
    text-align:center;
    margin-bottom:25px;
}

.CardTitle{
    font-size:32px;
    font-weight:600;
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(45deg,#ff9a3c,#ffcf7d);
    display:inline-block;
    padding:10px 25px;
    border-radius:40px;
}

/* ================= CLOSE ================= */

.Close{
    width:32px;
    position:absolute;
    right:20px;
    top:20px;
    cursor:pointer;
    transition:0.2s;
}

.Close:hover{
    transform:scale(1.1);
}

/* ================= DELETE ALL ================= */

.deleteAllCart{
    width:28px;
    position:absolute;
    left:20px;
    top:20px;
    cursor:pointer;
    transition:0.2s;
}

.deleteAllCart:hover{
    transform:scale(1.1);
}

/* ================= PRODUCT CARD ================= */

.nkarneriDiver2{
    display:flex;
    align-items:center;
    gap:20px;
    background:white;
    border-radius:15px;
    padding:15px;
    margin-bottom:20px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.himnakanPicturNer2{
    width:120px;
    height:120px;
    object-fit:contain;
    border-radius:10px;
    background:#f8f8f8;
}

/* ================= PRODUCT TEXT ================= */

.text15-2{
    font-size:20px;
    font-weight:600;
    width:40%;
}

.text17-2{
    font-size:26px;
    font-weight:bold;
    color:#ff9900;
}

.gniKoxiBary2{
    font-size:15px;
    margin-left:5px;
    color:#555;
}

/* ================= PLUS MINUS ================= */

.minusPlus{
    display:flex;
    align-items:center;
    border:2px solid #333;
    border-radius:8px;
    overflow:hidden;
}

.plusMinusClass{
    width:35px;
    height:35px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    cursor:pointer;
    background:#f2f2f2;
    transition:0.2s;
}

.plusMinusClass:hover{
    background:#ddd;
}

.countProduct{
    width:40px;
    text-align:center;
    font-size:18px;
}

/* ================= REMOVE BUTTON ================= */

.tooltip{
    background:none;
    border:none;
    cursor:pointer;
}

.tooltip svg{
    transition:0.2s;
}

.tooltip:hover svg{
    transform:scale(1.15);
}

/* ================= EMPTY CART ================= */

.CartEmpty{
    text-align:center;
    font-size:28px;
    font-weight:600;
    margin-top:120px;
    color:#555;
}