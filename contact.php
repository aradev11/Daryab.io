<?php
require_once "./components/web/header.php"  ;  
require_once "./components/navbar.php"; 
?>

  <style>
    .bg-contact {
        background-image: url('./assets/svg/contact_us.svg');
        background-position: bottom right;
        background-repeat: no-repeat;
        background-size: 60%;
    }
  </style>

<div class="jumbotron row align-items-center m-0 justify-content-center bg-contact" style="height: 90vh;">
    
    <div class="col-md-9 text-left pl-5">
        

        <!-- Container (Contact Section) -->
        <div class="container bg-grey row">

                <div class="col-sm-6">
                <h1>Contact With Us?</h1>
                <p>Contact us and we'll get back to you within 24 hours.</p><br><br>
                    <p>
                        <span class="glyphicon glyphicon-map-marker">Location: </span> 
                        Kabul, Afghanistan
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-phone">Phone No: </span> 
                        <a href="tel:+93748482555">+93 (0) 748482555</a>
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-envelope">Email Add: </span> 
                        <a href="mailto:eng.ara.devs@gmail.com">eng.ara.devs@gmail.com</a>
                    </p>
                    <span class="col-md-6 text-dark p-0"> 
                        <div class="glyphicon glyphicon-envelope mb-2">FOLLOW MY</div> 
                        <a href="https://facebook.com/alireza.ehaam.mohsini"><i class="fab fa-facebook-f mr-3"></i></a>
                        <a href="https://github.io/Alireza-Ehaam"><i class="fab fa-github mr-3"></i></a>
                        <a href="https://instagram.com/alireza-Mohsini"><i class="fab fa-instagram mr-3"></i></a>
                        <a href="https://youtube.com/Alireza Mohsini"><i class="fab fa-youtube"></i></a>
                    </span>
                </div>
                <div class="col-sm-6">
                    <h5>Share you idea</h5>
                    <p>We are ready to responce as soon as possible!</p>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Send</button>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
</div>



<?php 
require_once "./components/web/footer.php"; 
?>