<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="CSS/homepage.css">
</head>


<body>
    <div class="content">


        <nav>
            <div class="log">
                <img src="Images/Stay Finder-logos.jpeg" alt="" width="40px" style="border-radius: 10px;">
                <p>Stay Finder</p>
            </div>
            <div class="m">
                <ul>
                    <li>Home</li>
                    <?php
                    session_start();
                    if (isset($_SESSION['name'])) {
                        echo  "<li>" . $_SESSION['name'] . "</li>";
                        echo  "<a href='Process/logout.php'><li>Log out</li></a>";
                    } else {
                        echo "<a href='login.php'><li>Log in</li></a>";
                    }
                    ?>

                    <li>About us</li>
                </ul>
            </div>
        </nav>


        <div class="o">
        <div class="wrapper">
 
  <div class="cards">
    <div class="card">
      <div class="card__img">
          <picture>
            <source media="(max-width: 320px)" 
                    srcset="https://images.unsplash.com/photo-1530629013299-6cb10d168419?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">

            <source media="(min-width: 538px)" 
                    srcset="https://images.unsplash.com/photo-1530629013299-6cb10d168419?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=1500">

            <img src="https://images.unsplash.com/photo-1530629013299-6cb10d168419?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=1500">
          </picture>
      </div>
      <div class="card__details">
        <h3 for="cozyroom">Cozying Room</h3>
        <div class="address">St.lorem ipsum des</div>
        <div class="price">
          <div class="star">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
          </div>
          <div class="price__l">
            <span class="price__label">IDR 1500K /</span>
            <span class="measure__label">night</span>
          </div>
        </div>
        <button>Detail</button>
      </div>
      <span class="credit-img">image by: unsplash.com/@jazzband</span>
    </div>

    <div class="card">
      <div class="card__img">
          <picture>
            <source media="(max-width: 400px)" 
                    srcset="https://images.unsplash.com/photo-1507038772120-7fff76f79d79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">

            <source media="(min-width: 481px)" 
                    srcset="https://images.unsplash.com/photo-1507038772120-7fff76f79d79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=80">


            <img src="https://images.unsplash.com/photo-1507038772120-7fff76f79d79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">
          </picture>
      </div>
      <div class="card__details">
        <h3 for="tomato">House sweet</h3>
        <div class="address">Gandaria</div>
        <div class="price"> 
          <div class="star">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
          </div>
          <div class="price__l">
            <span class="price__label">IDR 950K /</span>
            <span class="measure__label">night</span>
          </div>
        </div>
        <button>Detail</button>
      </div>
      <span class="credit-img">image by: unsplash.com/@antocave</span>
    </div>

    <div class="card">
        <div class="card__img">
            <picture>
              <source media="(max-width: 400px)" 
                      srcset="https://images.unsplash.com/photo-1541123356219-284ebe98ae3b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">
  
              <source media="(min-width: 481px)" 
                      srcset="https://images.unsplash.com/photo-1541123356219-284ebe98ae3b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=100">
  
              <img src="https://images.unsplash.com/photo-1541123356219-284ebe98ae3b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">
            </picture>
        </div>
        <div class="card__details">
          <h3 for="cozyroom">Makau Homestay</h3>
          <div class="address">Cipete</div>
          
          <div class="price">
            <div class="star">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            </div>
            <div class="price__l">
              <span class="price__label">IDR 2500K /</span>
              <span class="measure__label">night</span>
            </div>
          </div>
          <button>Detail</button>
        </div>
        <span class="credit-img">image by: unsplash.com/@sidekix</span>
    </div>

    <div class="card">
        <div class="card__img">
            <picture>
              <source media="(max-width: 320px)" 
                      srcset="https://images.unsplash.com/photo-1545022388-9e6d95c77174?ixlib=rb-1.2.1&auto=format&fit=crop&w=335&h=200&q=80">
  
              <source media="(max-width: 500px)" 
                      srcset="https://images.unsplash.com/photo-1545022388-9e6d95c77174?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&h=200&q=100">
  
              <img src="https://images.unsplash.com/photo-1545022388-9e6d95c77174?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=200&q=80">
            </picture>
        </div>
        <div class="card__details">
          <h3 for="cozyroom">Bogor Cozy Homestay</h3>
          <div class="address">Bogor</div>
          
          <div class="price">
            <div class="star">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            </div>
            <div class="price__l">
              <span class="price__label">IDR 2500K /</span>
              <span class="measure__label">night</span>
            </div>
          </div>
          <button>Detail</button>
        </div>
        <span class="credit-img">image by: unsplash.com/@josesorianophoto</span>
    </div>

    <div class="card">
        <div class="card__img">
            <picture>
              <source media="(max-width: 320px)" 
                      srcset="https://images.unsplash.com/photo-1540518614846-7eded433c457?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">
  
              <source media="(max-width: 500px)" 
                      srcset="https://images.unsplash.com/photo-1540518614846-7eded433c457?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=100">
  
              <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=400&h=200&q=80">
            </picture>
        </div>
        <div class="card__details">
          <h3 for="cozyroom">Tribeca BedMy</h3>
          <div class="address">Jakarta</div>
          
          <div class="price">
            <div class="star">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            </div>
            <div class="price__l">
              <span class="price__label">IDR 750K /</span>
              <span class="measure__label">night</span>
            </div>
          </div>
          <button>Detail</button>
        </div>
        <span class="credit-img">image by: unsplash.com/@chastityco</span>
    </div>

    <div class="card">
        <div class="card__img">
            <picture>
              <source media="(max-width: 320px)" 
                      srcset="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=335&h=200&q=80">
  
              <source media="(max-width: 500px)" 
                      srcset="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=100">
  
              <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&h=200&q=80">
            </picture>
        </div>
        <div class="card__details">
          <h3 for="cozyroom">Les't Carrot</h3>
          <div class="address">Bandung</div>
          
          <div class="price">
            <div class="star">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
              <img src="https://image.flaticon.com/icons/svg/291/291205.svg" alt="">
            </div>
            <div class="price__l">
              <span class="price__label">IDR 1750K /</span>
              <span class="measure__label">night</span>
            </div>
          </div>
          <button>Detail</button>
        </div>
        <span class="credit-img">image by: unsplash.com/@ialicantemediterraneanhomes</span>
    </div>


  </div>
</div>

        </div>

    </div>
</body>

</html>