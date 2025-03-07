<?php
include '../Process/cnn.php';
session_start();
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}

$r_dg = $_GET['id'];

$df = mysqli_query($cnn, "select * from booking_list where Room_id = '$r_dg' ");

$li = mysqli_num_rows($df);
if ($li == 1) {
    header("location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/payment.css">
    <script src="https://js.stripe.com/v3/"></script>
    <title>Payment</title>
</head>

<body>

    <div class="form-container">
        <h2>Payment</h2>
        <form id="payment-form">
            <div id="error-message" style="color:red;"></div>
            <?php echo "<span style='display:none;'>Room_id : <b id='r_id' >" . $_GET['id'] . "</b></span><br>" ?>
            <?php echo "<span style='display:none;'>Hotel_id : <b id='h_id'>" . $_GET['hid'] . "</b></span>" ?>

            <div class="form-group">
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="amount">Family Member</label>
                <input type="number" id="Member" name="amount" value="1" max="6" required>
            </div>

            <div class="form-group">
                <label for="amount">Check-in Date</label>
                <input type="Date" id="check-in" name="check-in" required min="<?= date('Y-m-d', strtotime('+1 day')); ?>">
            </div>
            <div class="form-group">
                <label for="amount">Check-out Date</label>
                <input type="Date" id="check-out" name="check-out" onchange="funchange();" required min="<?= date('Y-m-d', strtotime('+1 day')); ?>">
            </div>

            <div class="form-group" id="card-element">
                <!-- Stripe's Card Element will be inserted here -->
            </div>

            <div>
                <?php
                $rdata  = mysqli_query($cnn,"select * from room_list where Room_id ='$r_dg' ");
                $rfetchdata = mysqli_fetch_array($rdata);

                $ddata  = mysqli_query($cnn, "select * from discount_list where Room_id ='$r_dg' ");
                if (mysqli_num_rows($ddata) == 0) {
                    $price =  $rfetchdata['Price'];
                } else {
                    $discount  = mysqli_fetch_array($ddata);
                    $price = $rfetchdata['Price'] - (($rfetchdata['Price'] * $discount['Percentage'])) / 100;
                }

                echo "Price : <b id='price'>" . $price . "</b>₹";

                ?>
                <?php echo "<h3 id='day'></h3>"; ?>
            </div>


            <input id="btns" type="submit" value="Pay Now">


        </form>
    </div>





    <script>
        function funchange() {

            let out = document.getElementById("check-out").value;
            let in1 = document.getElementById("check-in").value;


            let diffrence = new Date(out).getTime() - new Date(in1).getTime();
            let diff_day = diffrence / (1000 * 3600 * 24);

            document.getElementById("day").innerHTML = diff_day + " Day";

            let p = parseInt(document.getElementById("price").innerHTML);

            let total = p * diff_day;
            if (total <= 0) {
                document.getElementById("btns").style.display = "none";
                document.getElementById('error-message').innerHTML = "Invalid Dates.";
            } else if (diff_day > 30) {
                document.getElementById("btns").style.display = "none";
                document.getElementById('error-message').innerHTML = "The maximum duration for a hotel stay is 30 days.";

            } else {
                document.getElementById("price").innerHTML = total;
            }

        }





        var stripe = Stripe('pk_test_51QmtyvE3buiaQKWqUDUQ7t0X4fSZcATX7vwuUG3IKE5aOKTyBcaqeQUGUufz3YtfnTyYatzgi8DhOPS63OCSTQos00mblviQLp'); // Replace with your Stripe Publishable Key
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', async (event) => {
            event.preventDefault();

            const submitButton = document.querySelector('input[type="submit"]');
            submitButton.value = "Processing...";
            submitButton.disabled = true; // Disable the button while processing

            const {
                token,
                error
            } = await stripe.createToken(card);
            if (error) {
                document.getElementById('error-message').textContent = error.message;
                submitButton.value = "Pay Now";
                submitButton.disabled = false;
            } else {
                // Collect the form data
                var fullName = document.getElementById('full-name').value;
                var email = document.getElementById('email').value;
                var check_in = document.getElementById('check-in').value;
                var check_out = document.getElementById('check-out').value;
                var Member = document.getElementById('Member').value;
                var p1 = parseInt(document.getElementById("price").innerHTML);
                var r_id = document.getElementById("r_id").innerHTML;
                var h_id = document.getElementById("h_id").innerHTML;


                fetch('charge.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            token: token.id,
                            fullName: fullName,
                            email: email,
                            Member: Member,
                            check_in: check_in,
                            check_out: check_out,
                            p1: p1,
                            r_id: r_id,
                            h_id: h_id
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = "./paymentsucess.php"; // Redirect to success page
                        } else {
                            document.getElementById('error-message').textContent = data.message; // Show any errors
                            submitButton.value = "Pay Now";
                            submitButton.disabled = false;
                        }
                    });


            }
        });
    </script>

</body>
</html>