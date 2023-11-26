<?php
// echo "<pre>";
// print_r($images);
// echo "</pre>";
?>
<!-- ******************** Card Slider Content ************************ -->
<div class="container" id="propertysalesid">
   <div class="sales-heading-wrap mt-4">
      <div class="sale-heading">
         <h2> PROPERTIES FOR SALE </h2>
         <p> Explore the hot properties on Sale </p>
      </div>
   </div>
   <!-- Card -->
   <div class="card-wrap slider">
      <?php if (!empty($property_sale)) {
         foreach ($property_sale as $index => $property) {
      ?>
            <div class="card p-1 property-grid-item">
               <div class="card-image-and-tags">
                  <?php
                  foreach ($images as $img) {
                     if ($img['img_p_id'] == $property->p_id) { ?>
                        <a href="<?php echo base_url()?>index.php/front/property_details?id=<?php echo $property->p_id ?>">
                        <img class="card-img-top" src="<?php echo base_url() . $img['img_file_path'] ?>" alt="Card image cap" loading="lazy" />
                     </a>
                  <?php break;
                     }
                  } ?>
                  <div class="property-tags">
                     <?php $fmt = new NumberFormatter('en_IN', NumberFormatter::CURRENCY); ?>
                     <span class="price-tag"><?php echo $fmt->formatCurrency($property->p_price, "INR"); ?></span>
                     <span class="type-tag"><?php echo $property->type_name ?></span>
                     <span class="status-tag" style="background-color:#EB5353;"> <?php echo $property->status_name ?></span>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="card-title"><?php echo $property->p_title ?></h5>
                  <address class="item-address"><?php echo $property->p_address . ", " . $property->state_name . ", " . $property->city_name . ", " . $property->country_name . ", " . $property->p_postal_code; ?></address>
                  <ul class="item-amenities item-amenities-with-icons">
                     <li> <span class="icon-and-number">
                           <span class="no_of_amenities"><?php echo $property->p_bedrooms ?></span>
                           <i class="fa-solid fa-bed 2x"></i> </span>
                        <p class="amenities-name">Bedrooms</p>
                     </li>
                     <li class="middle-item"> <span class="icon-and-number">
                           <span class="no_of_amenities"><?php echo $property->p_bathrooms ?></span>
                           <i class="fa-solid fa-shower"></i> </span>
                        <p class="amenities-name">Bathrooms</p>
                     </li>
                     <li> <span class="icon-and-number">
                           <span class="no_of_amenities"><?php echo $property->p_area ?></span>
                           <i class="fa-solid fa-chart-area"></i></span>
                        <p class="amenities-name"><?php echo $property->p_area_unit ?></p>
                     </li>
                  </ul>
               </div>
            </div>
      <?php
         }
      } ?>

      <!-- End Card -->
   </div>

</div> <!-- ******************** Card Slider End ********************* -->