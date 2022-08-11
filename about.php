<style>
    
.about__wrapper h3 {
	border-bottom: 1px solid #95d5b2;
	width: 100%;
	/* margin: 0 auto;
	text-align: center; */
	margin: 2rem 0 2rem 0;
	padding-bottom: 1rem;
	font-weight: 700;
}

.about__list {
	display: flex;
	gap: 2rem;
}

.about__wrapper ul li {
	margin-bottom: 2rem;
}

</style>
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/CourierBD/assets/bootstrap/css/bootstrap.min.css'">
    <link rel="stylesheet" href='/CourierBD/assets/font-awesome/css/font-awesome.min.css'>

    <title>CourierBD</title>
    <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
</head>

<body style="background:lightgoldenrodyellow ;">
    
    <?php include 'include/header.php' ?>
    <div class="container my-5">
      
      <div class="about__wrapper">
          <h3>About us</h3>
          <ul>
              <li>
                  <strong>1. CourierBD</strong>is a household name to all in Bangladesh for having been the pioneer of Courier and Parcel Services in this country. From the Corporate Clients to the average person all the persons have been availing the services of <strong>CourierBD.</strong>
              </li>
              <li>
                  <strong>2.</strong> It is reliable and the label is a trustworthy name to all who have taken, taking and will take the services of this Company. 
	              The many years of service to the mass and to the corporates have made it the service for all to take.
              </li>
              <li>
                  <strong>3.</strong> We balance all the clients in a democratic manner and therefore there is no bias and that has itself encouraged repeat clients with similar wants for services.
              </li>

              <li>
                  4.</strong> Single point of contact for the many services. It is catering to multiple services from a one point and that also includes its own logistics fleet.
              </li>
              <li>
                  <strong>5.</strong> We balance all the clients in a democratic manner and therefore there is no bias and that has itself encouraged repeat clients with similar wants for services.
              </li>
              <li>
                  <strong>6. </strong>Due to its presence in every remote pocket throughout this country many have found it to be very convenient to send and receive with ease and harmony and this has tempted all to use <strong>CourierBD</strong> against many competitors who are in the similar trade.
              </li>
          </ul>
         <h3>
             Why to chose us?
         </h3>
         <ul class="about__list">
             <li>
                 <strong>1.</strong> Running Service 
             </li>
             <li>
                 <strong>2.</strong> No Hidden Cost 
             </li>
             <li>
                 <strong>3.</strong> Logistics Service
             </li>
             <li>
                 <strong>4.</strong> Emergency Services on Demand
             </li>
             <li>
                 <strong>5.</strong> Free Estimates
             </li>
         </ul>
	    <h3>Our Activities & Future Plan</h3>
        <article>
            As <strong>CourierBD</strong> is very active it does diversify approach to cater to the mass in more ways than one. At the same time it does consider options whereby which it is able to address requirements of the people and to provide more options for them to avail down the road. 
        In so doing it is able to actually come up with services that only it and a handful of companies may be able to provide. 
        With destination roadmaps set, the team of <strong>CourierBD</strong> is able to set targets, milestones and are thus able to obtain achievements which are quite unique. 
        However in the end of the day it is the people who benefit most from this. Their blessings are a reward to <strong>CourierBD.</strong>
        Our main focus is to be actually provide flexibility in last mile coverage in more ways than one both in urban as well as in rural Bangladesh. 
        For obtaining these achievements whatever is required will be accordingly done with the consent of the Management and the delegated teams will be given targets.
        </article>
      </div>

    </div>
    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>
	  

</html>