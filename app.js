$(document).ready(function() {

	$("#electronic").on('change', function() {
		//alert("it changes");
		var electronicId = $(this).val();
		
		if (electronicId) {
			$.ajax({
				type: 'POST',
				url: 'process.php',
				data: {
					"electronicId": electronicId
				},
				success: function(html) {
					$('#wattsNumber').html(html);
				}
			});
		} else {
			$('#wattsNumber').html('<option value="">Select Electronics First</option>');
		}
	});
});