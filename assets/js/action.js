$(document).ready(function () {
	// Add brand method
	$("#addBrandFrom").submit(function (e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#errorShow").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandName = $("#inputAddBrand").val();

		if (brandName.match(/^[a-zA-Z0-9]+$/)) {
			$.ajax({
				type: "POST",
				url: actionUrl,
				data: form.serialize(), // serializes the form's elements.
				success: function (data) {
					if (data == 1) {
						alert("Brand has been added successfully");
						location.href = "Brand";
					} else {
						$("#errorShow").html(data);
					} // show response from the php script.
				},
			});
		} else {
			$("#errorShow").html("Brand Name Must be alphanumeric characters");
		}
	});

	// update brand method
	$("#updateBrandFrom").submit(function (e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#errorShowUpdaet").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandName = $("#inputUpdateBrand").val();

		if (brandName.match(/^[a-zA-Z0-9]+$/)) {
			// $.ajax({
			// 	type: "POST",
			// 	url: actionUrl,
			// 	data: form.serialize(), // serializes the form's elements.
			// 	success: function (data) {
			// 		if (data == 1) {
			// 			alert("Brand has been added successfully");
			// 			location.href = "Brand";
			// 		} else {
			// 			$("#errorShowUpdaet").html(data);
			// 		} // show response from the php script.
			// 	},
			// });
		} else {
			$("#errorShowUpdaet").html("Brand Name Must be alphanumeric characters");
		}
	});

	//update brand data modal
	var updateBrandModelInput = document.getElementById("updateModal");
	if (updateBrandModelInput != null) {
		updateBrandModelInput.addEventListener("show.bs.modal", function (event) {
			// Button that triggered the modal
			var button = event.relatedTarget;
			// Extract info from data-bs-* attributes
			var name = button.getAttribute("data-brandName");
			$("#inputUpdateBrand").val(name);
		});
	}
});
