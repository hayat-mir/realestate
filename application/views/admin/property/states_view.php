<select name="state" class="form-control" id="state">
	<option value="" selected="selected">Select State</option>
	<?php
	if (!empty($states)) {
		foreach ($states as $state) {
	?>
			<option value="<?php echo $state['state_id']; ?>"><?php echo $state['state_name']; ?></option>
	<?php
		}
	}
	?>
</select>