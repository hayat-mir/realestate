<select name="city" class="form-control" id="city">
    <option value="" selected="selected">Select City</option>
    <?php
    if (!empty($cities)) {
        foreach ($cities as $city) {
    ?>
            <option value="<?php echo $city['city_id']; ?>"><?php echo $city['city_name']; ?></option>
    <?php
        }
    }
    ?>
</select>