<?php
// echo "<pre>";
// print_r($slider_properties);
// echo "</pre>";
?>
<!-- ********************** Property Slider Start *************************** -->
<div class="carousel-slider-wrap">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <?php
    $count = 0;
    if (!empty($slider_properties)) {
      foreach ($slider_properties as $sl_prop => $slider_p) {
        if ($count == 0) {
    ?>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <!-- Single Slider Item -->
              <?php
              foreach ($images as $img) {
                if ($img['img_p_id'] == $slider_p->p_id) { ?>
                  <img class="card-img-top" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="Card image cap">
              <?php break;
                }
              } ?>
              <div class="carousel-caption d-md-block">
                <h5><?php echo $slider_p->p_title ?></h5>
                <marquee width="100%" behavior="scroll" direction="up" scrollamount="1" height="40px"><?php echo $slider_p->p_content ?></marquee>
              </div>
              <div class="property-slider-item">
                <div class="name-and-price">
                  <h2 class="item-title">
                    <?php echo $slider_p->p_title ?>
                  </h2>
                  <div class="item-price-wrap">
                    <span class="item-price">
                    <?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); ?>
                    <?php echo $fmt->formatCurrency($slider_p->p_price, "INR"); ?></span>
                  </div>
                </div>
                <address class="item-address">
                  <?php echo  $slider_p->p_address . ", " . $slider_p->state_name . ", " .  $slider_p->city_name . ", " .  $slider_p->country_name . ", " .  $slider_p->p_postal_code; ?>
                </address>
                <ul class="item-amenities">
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_bedrooms ?></span><i class="fa-solid fa-bed"></i> </li>
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_bathrooms ?></span><i class="fa-solid fa-shower"></i> </li>
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_area ?></span><i class="fa-solid fa-chart-area"></i> Sqft</li>
                </ul>
                <span class="p-type"><?php echo $slider_p->type_name ?></span>
                <a class="btn btn-primary btn-item" href="<?php echo base_url()?>index.php/front/property_details?id=<?php echo $slider_p->p_id ?>">Details</a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          <?php
          $count++;
        } else { ?>
            <div class="carousel-item">
              <?php
              foreach ($images as $img) {
                if ($img['img_p_id'] == $slider_p->p_id) { ?>
                  <img class="card-img-top" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="Card image cap">
              <?php break;
                }
              } ?>
              <div class="carousel-caption d-md-block">
                <h5><?php echo $slider_p->p_title ?></h5>
                <marquee width="100%" behavior="scroll" direction="up" scrollamount="1" height="40px"><?php echo $slider_p->p_content ?></marquee>
              </div>
              <div class="property-slider-item">
                <div class="name-and-price">
                  <h2 class="item-title">
                    <?php echo $slider_p->p_title ?>
                  </h2>
                  <div class="item-price-wrap">
                    <span class="item-price">
                    <?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); ?>
                    <?php echo $fmt->formatCurrency($slider_p->p_price, "INR"); ?> </span>
                  </div>
                </div>
                <address class="item-address">
                  <?php echo  $slider_p->p_address . ", " . $slider_p->state_name . ", " .  $slider_p->city_name . ", " .  $slider_p->country_name . ", " .  $slider_p->p_postal_code; ?>
                </address>
                <ul class="item-amenities">
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_bedrooms ?></span><i class="fa-solid fa-bed"></i> </li>
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_bathrooms ?></span><i class="fa-solid fa-shower"></i> </li>
                  <li class="item-amenities-with-icons"><span class="no_of_amenities"><?php echo $slider_p->p_area ?></span><i class="fa-solid fa-chart-area"></i> Sqft</li>
                </ul>
                <span class="p-type"><?php echo $slider_p->type_name ?></span>
                <a class="btn btn-primary btn-item" href="<?php echo base_url()?>index.php/front/property_details?id=<?php echo $slider_p->p_id ?>">Details</a>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      <?php
        }
      }
    }
      ?>
      <!-- End Single Slider Item-->


          </div>
  </div>
</div>

<!-- *********************** Property Slider End ******************************** -->