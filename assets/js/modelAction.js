$(document).ready(function () {
	// Add Model method
	$("#addModelFrom").submit(function (e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#errorShow").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandId = $("#brandSelect").val();
		var modelName = $("#inputAddModel").val();
		if (brandId == -1) {
			$("#errorShow").html("Please Select Brand ");
		} else if (modelName.match(/^[a-zA-Z0-9]+$/)) {
			console.log(brandId + " " + modelName);
			$.ajax({
				type: "POST",
				url: actionUrl,
				data: form.serialize(), // serializes the form's elements.
				success: function (data) {
					if (data == 1) {
						$("#addModelModal").hide({
							done: function () {
								alert("Model has been added successfully");
								location.href = "Model";
							},
						});
					} else {
						$("#errorShow").html(data);
					} // show response from the php script.
				},
			});
		} else {
			$("#errorShow").html("Model Name Must be alphanumeric characters");
		}
	});

	//

	//updatemodal Form post

	//update brand data modal
	var updateModal = document.getElementById("updateModal");
	if (updateModal != null) {
		updateModal.addEventListener("show.bs.modal", function (event) {
			// Button that triggered the modal
			var button = event.relatedTarget;
			// Extract info from data-bs-* attributes
			var modelName = button.getAttribute("data-ModelName");
			var brandId = button.getAttribute("data-brandId");
			var ModelId = button.getAttribute("data-ModelId");
			console.log(modelName + " /" + brandId + "/" + ModelId);

			$('#brandSelect option[value="' + brandId + '"]').attr(
				"selected",
				"selected"
			);
			$("#inputUpdateModel").val(modelName);
			$("#modelID").val(ModelId);
		});
	}
});
