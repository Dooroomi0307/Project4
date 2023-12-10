<!DOCTYPE html>
<html>
    <head>
        <title>Staff page</title>
        <link rel="stylesheet" href="../style/style.css">
    </head>
    <body>
    <?php include './nav.php'?>
    <body id="staff">
  
  <section class="swiper mySwiper">

<div class="swiper-wrapper">


<div class="card swiper-slide">
  <div class="card-image">
      <img src="./resources/goldfinger.jpg" alt="card image">
  </div>

  <div class="card-content">
      <span class="card-title">Realtor</span>
      <span class="card-name"> Goldfinger </span>
      <p class="card-text">No potential client, Goldfinger does not expect you to die during your process of buying your first house. He hopes to do whatever possible to help you!</p>
    
  </div>
</div>
<div class="card swiper-slide">
  <div class="card-image">
      <img src="./resources/blofeld.jpg" alt="card image">
  </div>

  <div class="card-content">
      <span class="card-title">Realtor</span>
      <span class="card-name"> Blofeld</span>
      <p class="card-text">You only buy your first house once and Blofeld, our most notorious Realtor will do what he can to ensure your experience is a memorable one!</p>
     
  </div>
</div>
<div class="card swiper-slide">
  <div class="card-image">
      <img src="./resources/chiffre.jpg" alt="card image">
  </div>

  <div class="card-content">
      <span class="card-title">Realtor</span>
      <span class="card-name"> Chiffre </span>
      <p class="card-text">Chiffre, most famous for his lookalike in Casino Royale, is a go-getter when it comes to finding the right house for you.</p>
    
  </div>
</div>
<div class="card swiper-slide">
  <div class="card-image">
      <img src="./resources/general.jpg" alt="card image">
  </div>

  <div class="card-content">
      <span class="card-title">Realtor</span>
      <span class="card-name"> General Ourumov</span>
      <p class="card-text">Our General is sure to provide you with an amazing service as he has a Goldeneye when it comes to details to get you into the right house!</p>
     
  </div>
</div>
<div class="card swiper-slide">
  <div class="card-image">
      <img src="./resources/xenia.jpg" alt="card image">
  </div>

  <div class="card-content">
      <span class="card-title">Realtor</span>
      <span class="card-name"> Xenia Onatopp</span>
      <p class="card-text">A fitness enthusiast, Xenia is known for her enthusiastic personality when interacting with her clients, and provides an enjoyable experience throughout!</p>
     
  </div>
</div>

</div>



</div>
</section>
<div id="button">
<form action="../Index/Home.html">
  <input type="submit" value="Return" id="return-home">
</form>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
var swiper = new Swiper(".mySwiper", {
effect: "coverflow",
grabCursor: true,
centeredSlides: true,
slidesPerView: "auto",
coverflowEffect: {
rotate: 0,
stretch: 0,
depth: 300,
modifier: 1,
slideShadows: false,
},
pagination: {
el: ".swiper-pagination",
},
});
</script>
    </body>
</html>