<div class="container">

	<section class="property_search_wrap" id="searchSection">
		<form method="post" action="<?php echo base_url('index.php/front/search_data') ?>">
		<details>
		<summary class="search_heading"><i class="fa-solid fa-magnifying-glass mr-1"></i>Click to Search Property</summary>
		<div class="mt-2">
		<input type="text" id="keyword" name="keyword" placeholder="Search:City,Sale,Rent,Type" class="inputs">
        <input type="number" name="price" placeholder="Max Price" class="inputs" min="1000000">

			<input type="text" name="bedroom" placeholder="No. of Bedrooms" class="inputs">
        
			<ul>
				<select name="status">
					<option value="" disabled selected hidden>Status</option>
					<?php
					foreach ($status  as $key => $value) {	?>
						<option value="<?php echo $value->status_id; ?>"><?php echo $value->status_name; ?></option>
					<?php } ?>
				</select>

				<select name="type">
					<option value="" disabled selected hidden>Type</option>
					<?php foreach ($type as $key => $value) { ?>
						<option value="<?php echo $value->type_id; ?>"><?php echo $value->type_name; ?></option>
					<?php	} ?>
				</select>

				<select name="label">
					<option value="" disabled selected hidden>Label</option>
					<?php foreach ($label as $key => $value) { ?>
						<option value="<?php echo $value->label_id; ?>"><?php echo $value->label_name; ?></option>
					<?php	} ?>
				</select>
			</ul>
			<button type="submit"><i class="fa-solid fa-magnifying-glass mr-1"></i>Search</button>
			</div>
			</details>
		</form>
	</section>
	
</div>