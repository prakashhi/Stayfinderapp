<?php
session_start();
include '../Process/cnn.php';
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/carddata.css">
    <title>Hotel information</title>
</head>


<body>
    <a href=""></a>

    <?php
    include '../Process/cnn.php';

    $id = $_GET['id'];


    $dv = mysqli_query($cnn, "Select * from room_list where Room_id = '$id' ");

    $line = mysqli_num_rows($dv);
    $d = mysqli_fetch_array($dv);
    if($line == 0)
    {
        header("location:../index.php");
    }


    $ddata  = mysqli_query($cnn,"select * from discount_list where Room_id ='$id' ");
    if(mysqli_num_rows($ddata) == 0)
    {
        $price =  $d['Price'];
    }
    else{
        $discount  = mysqli_fetch_array($ddata);
        $price = $d['Price'] - (($d['Price']*$discount['Percentage']))/100;

    }




    
    

    $hid = $d['Hotel_id'];
    $imgurl1 = $d['Room_img1'];
    $imgurl2 = $d['Room_img2'];
    $imgurl3 = $d['Room_img3'];

    $hdata = mysqli_query($cnn, "Select * from  m_register where Hotel_id = '$hid' ");

    $hd = mysqli_fetch_array($hdata);


    echo "<div class='hotel-container'>
<div class='hotel-card'>
    <div class='hotel-image'>

    <div class='slider-container'>
        <div class='slider'>
            <div class='slide'>
                <img loading='lazy' src='../Hotel_img/$imgurl1'>
            </div>
            <div class='slide'>
                <img loading='lazy' src='../Hotel_img/$imgurl2'>
            </div>
            <div class='slide'>
                <img loading='lazy' src='../Hotel_img/$imgurl3'>
            </div>
        </div>
        <div class='navigation-dots'></div>
    </div>
        <div class='price-tag'>From " . $price . " ₹ /night</div>
    </div>
    
    <div class='hotel-content'>
        <span class='hotel-type'>" . $d['Room_type'] . "</span>
        <h1 class='hotel-name'>" . $hd['Hotel_Name'] . "</h1>
        
        <div class='info-item'>
            <i class='fas fa-map-marker-alt'></i>
            <p>" . $hd['Hotel_Address'] . "</p>
        </div>
      
        <div class='amenities'>
            <div class='amenity-item'>
                <i class='fas fa-wifi'></i>
                <span>Free WiFi</span>
            </div>
            <div class='amenity-item'>
                <i class='fas fa-dumbbell'></i>
                <span>Gym</span>
            </div>
        </div>

        <div class='capacity-box'>
            <div class='capacity-item'>
                <span>ID</span>
                <span>" . $id . "</span>
            </div>
            <div class='capacity-item'>
                <span>Guests</span>
                <span>" . $d['Room_capacity'] . "</span>
            </div>
            <div class='capacity-item'>
                <span>Type</span>
                <span>" . $d['AC / NOAC'] . "</span>
            </div>
        </div>";

 
        $hid = $hd['Hotel_id'];

        echo "<a style='text-decoration:none;' class='book-button' href='./payment.php?id=$id&&hid=$hid'>
            <i class='fas fa-concierge-bell'></i>
            Reserve Now
        </a>
    </div>
</div>
</div>";


    ?>

    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        let currentIndex = 0;

        // Auto-advance every 5 seconds
        const intervalTime = 5000;
        let sliderInterval = setInterval(nextSlide, intervalTime);

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateSlider();
        }

        function updateSlider() {
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
            updateDots();
        }

        // Optional navigation dots
        function createDots() {
            const dotsContainer = document.querySelector('.navigation-dots');
            slides.forEach((_, index) => {
                const dot = document.createElement('div');
                dot.classList.add('dot');
                if (index === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    currentIndex = index;
                    updateSlider();
                    resetInterval();
                });
                dotsContainer.appendChild(dot);
            });
        }

        function updateDots() {
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentIndex);
            });
        }

        function resetInterval() {
            clearInterval(sliderInterval);
            sliderInterval = setInterval(nextSlide, intervalTime);
        }

        // Initialize dots
        createDots();
    </script>

</body>

</html>