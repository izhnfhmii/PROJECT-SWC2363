<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>test</title>
		  <style>
			* {
			  box-sizing: border-box;
			}

			html,
			body {
			  width: 100%;
			  height: 100%;
			  margin: 0;
			  background-image: url('FoodkiesBackground.jpg');
			  font-family: 'Roboto', sans-serif;
			}

			.shopping-cart {
			  width: 750px;
			  height: 1500px;
			  margin: 80px auto;
			  background: #FFFFFF;
			  box-shadow: 1px 2px 3px 0px rgba(0, 0, 0, 0.10);
			  border-radius: 6px;
			  display: flex;
			  flex-direction: column;
			}

			.title {
			  height: 60px;
			  border-bottom: 1px solid #E1E8EE;
			  padding: 20px 30px;
			  color: #5E6977;
			  font-size: 18px;
			  font-weight: 400;
			}

			.item {
			  padding: 20px 20px;
			  height: 120px;
			  display: flex;
			}

			.item:nth-child(12) {
			  border-top: 1px solid #E1E8EE;
			  border-bottom: 1px solid #E1E8EE;
			}

			.buttons {
			  position: relative;
			  padding-top: 30px;
			  margin-right: 60px;
			}

			.delete-btn,
			.like-btn {
			  display: inline-block;
			  cursor: pointer;
			}

			.delete-btn {
			  width: 18px;
			  height: 17px;
			  background: url('delete-icn.svg') no-repeat center;
			}

			.like-btn {
			  position: absolute;
			  top: 9px;
			  left: 15px;
			  background: url('twitter-heart.png');
			  width: 60px;
			  height: 60px;
			  background-size: 2900%;
			  background-repeat: no-repeat;
			}

			.is-active {
			  animation-name: animate;
			  animation-duration: .8s;
			  animation-iteration-count: 1;
			  animation-timing-function: steps(28);
			  animation-fill-mode: forwards;
			}

			@keyframes animate {
			  0% {
				background-position: left;
			  }

			  50% {
				background-position: right;
			  }

			  100% {
				background-position: right;
			  }
			}

			.image {
			  margin-right: 50px;
			}

			.description {
			  padding-top: 10px;
			  margin-right: 60px;
			  width: 115px;
			}

			.description span {
			  display: block;
			  font-size: 14px;
			  color: #43484D;
			  font-weight: 400;
			}

			.description span:first-child {
			  margin-bottom: 5px;
			}

			.description span:last-child {
			  font-weight: 300;
			  margin-top: 8px;
			  color: #86939E;
			}

			/* CSS to style the button */
			.silver-button {
			  background-color: silver;
			  color: white;
			  padding: 10px 20px;
			  border: none;
			  border-radius: 5px;
			  font-size: 16px;
			  cursor: pointer;
			}

			/* Hover effect */
			.silver-button:hover {
			  background-color: black;
			}

			.button1 {
			  width: 250px;
			}
		  </style>
		</head>
		<body>
		<div class="shopping-cart">
		  <!-- Title -->
		  <div class="title">
			Foodkies Purchasing Bag
		  </div>

			<!-- Product #1 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="nasilemak.jpg" alt="" width="90" height="65" />
			</div>

			<div class="description">
			  <span>Nasi Lemak Pak Abdul</span>
			  <span>Malaysian Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM5.00</div>
		  </div>

					
		  <!-- Product #2 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="nasiayampenyet.jpg" alt="" width="90" height="65"/>
			</div>

			<div class="description">
			  <span>Nasi Ayam Penyet Berapi</span>
			  <span>Indonesian Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM10.90</div>
		  </div>

					
		  <!-- Product #3 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="friedchicken.jpg" alt="" width="90" height="64" />
			</div>

			<div class="description">
			  <span>Kepcilicious Fried Chicken</span>
			  <span>Fried Chicken Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>
			  
			  <div class="total-price">RM14.90</div>
		  </div>
			 
					
			  <!-- Product #4 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="chinesefood.jpg" alt="" width="90" height="62"/>
			</div>

			<div class="description">
			  <span>Halal Chicken DimSum</span>
			  <span>Chinese Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM9.90</div>
		  </div>

					
			<!-- Product #5 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="indianfood.jpg" alt="" width="90" height="48"/>
			</div>

			<div class="description">
			  <span>Cheese Naan with Variety Gravy</span>
			  <span>Indian Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM7.90</div>
		  </div>
					
			<!-- Product #6 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="fastfood.jpg" alt="" width="90" height="50"/>
			</div>

			<div class="description">
			  <span>Smoking Prosperity Burger Set</span>
			  <span>Fast Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM17.90</div>
		  </div>
					
			
			<!-- Product #7 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="turkishfood.jpg" alt="" width="90" height="53"/>
			</div>

			<div class="description">
			  <span>Casablanca Chicken Shawarma</span>
			  <span>Turkish Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM11.90</div>
		  </div>
					
				
			<!-- Product #8 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="healthyfood.jpg" alt="" width="90" height="50"/>
			</div>

			<div class="description">
			  <span>Greek Salad with Grilled Chicken and Dressing</span>
			  <span>Healthy Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM12.90</div>
		  </div>
					
				
			<!-- Product #9 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="westernfood.jpg" alt="" width="90" height="55"/>
			</div>

			<div class="description">
			  <span>T-Bone Steak With Wedges</span>
			  <span>Western Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM59.90</div>
		  </div>
					
					
			<!-- Product #10 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="japanesefood.jpg" alt="" width="90" height="60"/>
			</div>

			<div class="description">
			  <span>Variety Sushi Set</span>
			  <span>Japanese Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM16.90</div>
		  </div>
					
				
			<!-- Product #11 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="koreanfood.jpg" alt="" width="95" height="65"/>
			</div>

			<div class="description">
			  <span>Seoul Spicy Tteokbokki</span>
			  <span>Korean Food</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>
			<div class="total-price">RM12.90</div>
		  </div>
					
				
			<!-- Product #12 -->
		  <div class="item">
			<div class="buttons">
			  <span class="delete-btn"></span>
			  <span class="like-btn"></span>
			</div>

			<div class="image">
			  <img src="bubbletea.jpeg" alt="" width="90" height="65"/>
			</div>

			<div class="description">
			  <span>Taiwan Milk Bubble Tea</span>
			  <span>Drinks Baverage</span>
			  <span>Halal</span>
			</div>

			<div class="quantity">
			  <button class="plus-btn" type="button" name="button" onclick="incrementQuantity(this)">
				<img src="plus.svg" alt="" width="15" height="15" />
			  </button>
			  <input type="text" name="name" value="1">
			  <button class="minus-btn" type="button" name="button" onclick="decrementQuantity(this)">
				<img src="minus.svg" alt="" width="15" height="15" />
			  </button>
			</div>

			<div class="total-price">RM8.90</div>
		  </div>
			  
			  <style>
            /* CSS to style the button */
            .silver-button {
              background-color: silver;
              color: white;
              padding: 10px 20px;
              border: none;
              border-radius: 5px;
              font-size: 16px;
              cursor: pointer;
            }
          
            /* Hover effect */
            .silver-button:hover {
              background-color: black;
            }
		
			.button1 {width: 250px;}
          </style>


        <a href = "Foodkies Payment.html">
                <p align = "center"> <button class="silver-button button1">Pay Now</button> </p>
        </a>
			  
			<script>
			function incrementQuantity(button) {
			  var input = button.parentNode.querySelector('input');
			  var currentValue = parseInt(input.value);
			  input.value = currentValue + 1;
			}

			function decrementQuantity(button) {
			  var input = button.parentNode.querySelector('input');
			  var currentValue = parseInt(input.value);
			  if (currentValue > 1) {
				input.value = currentValue - 1;
			  }
			}
			</script>
	
	
<body>
</body>
</html>
