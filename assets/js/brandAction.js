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
						$("#exampleModal").hide({
							done: function () {
								location.href = "Brand";
							},
						});
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
		e.stopImmediatePropagation();
		$("#errorShowUpdaet").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandName = $("#inputUpdateBrand").val();
		var brandId = $("#brandID").val();

		if (brandName.match(/^[a-zA-Z0-9]+$/)) {
			//console.log(brandName + " " + brandId);
			$.ajax({
				type: "POST",
				url: actionUrl,
				data: form.serialize(), // serializes the form's elements.
				success: function (data) {
					console.log(data);
					if (data == 1) {
						alert("Brand has been updated successfully");
						$("#updateModal").hide({
							done: function () {
								location.href = "Brand";
							},
						});
					} else {
						$("#errorShowUpdaet").html(data);
					} // show response from the php script.
				},
			});
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
			var id = button.getAttribute("data-brandId");
			$("#inputUpdateBrand").val(name);
			$("#brandID").val(id);
		});
	}

	//Delete brand
	var DeleteModal = document.getElementById("DeleteModal");
	if (DeleteModal != null) {
		DeleteModal.addEventListener("show.bs.modal", function (event) {
			// Button that triggered the modal
			var button = event.relatedTarget;
			// Extract info from data-bs-* attributes
			var id = button.getAttribute("data-brandId");
			var url = "Brand/deleteBrand?id=" + id;
			$("#deleteBtn").attr("href", url);
		});
	}
});
