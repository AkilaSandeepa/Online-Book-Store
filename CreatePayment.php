<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .form-group label {
            width: 30%;
            text-align: right;
            margin-right: 10px;
        }

        .form-group input {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
        }

        input[type="submit"],
        #clacelBtn {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        #clacelBtn:hover {
            background-color: #0056b3;
        }

        #clacelBtn {
            margin-left: 20px;
        }

        .error {
            color: red;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <h2>Create Payment</h2>
    <form action="process_payment.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
            <span id="nameError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email">
            <span id="emailError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone">
            <span id="phoneError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity">
            <span id="quantityError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="name_on_card">Name On Card:</label>
            <input type="text" id="name_on_card" name="name_on_card">
            <span id="nameOnCardError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number">
            <span id="cardNumberError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration Date:</label>
            <input type="text" id="expiration_date" name="expiration_date">
            <span id="expirationDateError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv">
            <span id="cvvError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="book_price">Book Price:</label>
            <input type="number" id="book_price" name="book_price">
            <span id="bookPriceError" class="error"></span>
        </div>
        <div class="form-group">
            <label for="service_charge">Service Charge:</label>
            <input type="number" id="service_charge" name="service_charge">
            <span id="serviceChargeError" class="error"></span>
        </div>
       
        <input type="submit" value="Save" style="margin-left:90%;">
    </form><br>
    <button id="clacelBtn" style="margin-left: 90%;" onclick="redirectToReadPayments()" >Cancel</button>

    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var quantity = document.getElementById("quantity").value;
            var nameOnCard = document.getElementById("name_on_card").value;
            var cardNumber = document.getElementById("card_number").value;
            var expirationDate = document.getElementById("expiration_date").value;
            var cvv = document.getElementById("cvv").value;
            var bookPrice = document.getElementById("book_price").value;
            var serviceCharge = document.getElementById("service_charge").value;

            var nameRegex = /^[a-zA-Z\s]*$/;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var phoneRegex = /^[0-9]+$/;
            var cardNumberRegex = /^[0-9]+$/;
            var expirationDateRegex = /^[0-9\/]+$/;
            var cvvRegex = /^[0-9]+$/;

            var isValid = true;
            document.getElementById("nameError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";
            document.getElementById("phoneError").innerHTML = "";
            document.getElementById("quantityError").innerHTML = "";
            document.getElementById("nameOnCardError").innerHTML = "";
            document.getElementById("cardNumberError").innerHTML = "";
            document.getElementById("expirationDateError").innerHTML = "";
            document.getElementById("cvvError").innerHTML = "";
            document.getElementById("bookPriceError").innerHTML = "";
            document.getElementById("serviceChargeError").innerHTML = "";

            if (!nameRegex.test(name)) {
                document.getElementById("nameError").innerHTML = "Name cannot contain special characters or numbers";
                isValid = false;
            }

            if (!emailRegex.test(email)) {
                document.getElementById("emailError").innerHTML = "Invalid email format";
                isValid = false;
            }

            if (!phoneRegex.test(phone)) {
                document.getElementById("phoneError").innerHTML = "Phone number can only contain numbers";
                isValid = false;
            }

            if (quantity <= 0) {
                document.getElementById("quantityError").innerHTML = "Quantity must be greater than 0";
                isValid = false;
            }

            if (!nameRegex.test(nameOnCard)) {
                document.getElementById("nameOnCardError").innerHTML = "Name on card cannot contain special characters or numbers";
                isValid = false;
            }

            if (!cardNumberRegex.test(cardNumber)) {
                document.getElementById("cardNumberError").innerHTML = "Card number can only contain numbers";
                isValid = false;
            }

            if (!expirationDateRegex.test(expirationDate)) {
                document.getElementById("expirationDateError").innerHTML = "Invalid expiration date format";
                isValid = false;
            }

            if (!cvvRegex.test(cvv)) {
                document.getElementById("cvvError").innerHTML = "CVV can only contain numbers";
                isValid = false;
            }

            if (bookPrice <= 0) {
                document.getElementById("bookPriceError").innerHTML = "Book price must be greater than 0";
                isValid = false;
            }

            if (serviceCharge <= 0) {
                document.getElementById("serviceChargeError").innerHTML = "Service charge must be greater than 0";
                isValid = false;
            }

            return isValid;
        }

        function redirectToReadPayments() {
            window.location.href = "ReadPayments.php";
        }
    </script>
</body>
</html>
