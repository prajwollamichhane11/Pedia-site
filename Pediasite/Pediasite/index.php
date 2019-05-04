
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
    a:hover {
	    color: white;
	    }
	a:link{
		font-color:red;
	}
	  .carousel-inner img {
      width: 100%;
      height: 100%;
  }

	</style>
	<title>
	</title>
</head>
<body style="background-color:lavender;">
	<?php include("navbar.php");?>
<br>
<br>
<br>
	<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/car4.png"  style="width:100%; height:500px;">
    </div>
    <div class="carousel-item">
      <center>
      <img src="img/download.png" style="width:100%; height:500px;">
    </center>
    </div>
    <div class="carousel-item">
      <img src="img/car1.png" style="width:100%; height:500px;">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

	<div class="container">

                    <h1>Introduction</h1><br>
                    <h2>Basic</h2>
                    <p>Caring for your sick baby is among the biggest responsibilities any
                     new parent faces. Here, you'll find information on some of the most
                      common (and uncommon) health problems your baby is likely to
                      encounter including: Acid Reflux, Allergies, Asthma, Autism,
                       Colds, Constipation, Cough, Flu, Ear Infection, Eczema, Diarrhea,
                        Fever, Teething, Rashes, Sunburn, and more.
                        </p>
                    <p>
                        A baby's body and brain develop at an astounding rate in the first
                         year of live. Your tiny newborn quickly morphs into a curious,
                         active little human eager to explore the world. And before you
                         know it, your baby is a toddler.
                    </p>

                        <h3> Baby Health articles </h3>
<p>When a new baby arrives you suddenly have so many new tasks. Parenting is a big role –
 huge in fact – imagine the job description were you to write one! One of the tasks on your
  new list is bathing the baby. This article by Yvette Barton looks at both the pragmatics
   of bathing a baby as well as safety considerations.
</p>

<h3>Cord Care in Newborns</h3>
<p>"Umbilical cords are amazing. From the moment it forms and until it is cut,
 the umbilical cord supplies a baby with the oxygen and nutrients it requires for survival.
 The umbilical cord is comprised of one vein and two arteries enclosed in a sticky
  substance called Wharton’s Jelly." This article by Yvette Barton gives all the relevant
   information regarding Cord Care in Newborns.
</p>

<h3>Protect Your Baby's Hips When Swaddling</h3>
<p>"Many parents find that swaddling can provide comfort to fussy babies, reduce crying,
and develop more settled sleep patterns. While parents and babies may enjoy these benefits
 from swaddling, care must be taken to swaddle properly to ensure the baby’s health and
 safety." This article by the International Hip Dysplasia Institute provides a step by
 step guide on how to wrap your baby.
</p>
<p></p>

       </div>
   </div>
</body>
     <div class="container-fluid">
      <div class="row" style="background-color:#999966;">
      <?php include("footer.php");?>
    </div>
    </div>
</body>
</html>