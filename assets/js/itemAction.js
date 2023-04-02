$(document).ready(function () {
	//update model dropdown
	$("#brandSelectItem").on("change", function () {
		var brandId = "brandID_" + this.value;

		$(".modelOption").show();

		$(".modelOption").each(function (el, obj) {
			var clssName = obj.attributes["class"].nodeValue.split(" ");
			if (brandId != clssName[1]) {
				$("." + clssName[1]).hide();
			}
		});

		$("#modelSelect option:first").prop("selected", true).trigger("change");
	});
	//
	// Add Model method
	$("#addItemFrom").submit(function (e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#errorShowitem").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandId = $("#brandSelectItem").val();
		var modelId = $("#modelSelect").val();
		var itemName = $("#inputAddModel").val();
		//	console.log(brandId + " /" + modelId + " /" + itemName);
		if (brandId == -1 || modelId == -1) {
			$("#errorShowitem").html("Please Select Brand and model ");
		} else if (itemName.match(/^[a-zA-Z0-9]+$/)) {
			console.log(brandId + " " + itemName);

			$.ajax({
				type: "POST",
				url: actionUrl,
				data: form.serialize(), // serializes the form's elements.
				success: function (data) {
					if (data == 1) {
						alert("Item has been added successfully");
						$("#addItemModal").hide({
							done: function () {
								location.href = "Item";
							},
						});
					} else {
						$("#errorShowitem").html(data);
					} // show response from the php script.
				},
			});
		} else {
			$("#errorShowitem").html("Model Name Must be alphanumeric characters");
		}
	});

	//

	// updatePOst  method
	$("#updateItemFrom").submit(function (e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.
		$("#errorShowUpdateItem").empty();
		var form = $(this);
		var actionUrl = form.attr("action");
		var brandId = $("#brandSelectUpdate").val();
		var modelId = $("#modelSelectUpdate").val();
		var itemId = $("#itemId").val();
		var itemName = $("#inputUpdateItem").val();
		//	console.log(brandId + " /" + modelId + " /" + itemName);
		if (brandId == -1 || modelId == -1) {
			$("#errorShowUpdateItem").html("Please Select Brand and model ");
		} else if (itemName.match(/^[a-zA-Z0-9]+$/)) {
			$.ajax({
				type: "POST",
				url: actionUrl,
				data: form.serialize(), // serializes the form's elements.
				success: function (data) {
					if (data == 1) {
						alert("Item has been Updated successfully");
						$("#updateModalitem").hide({
							done: function () {
								location.href = "Item";
							},
						});
					} else {
						$("#errorShowUpdateItem").html(data);
					} // show response from the php script.
				},
			});
		} else {
			$("#errorShowUpdateItem").html(
				"Model Name Must be alphanumeric characters"
			);
		}
	});
	//

	//update item data modal
	var updateModalitem = document.getElementById("updateModalitem");
	if (updateModalitem != null) {
		updateModalitem.addEventListener("show.bs.modal", function (event) {
			// Button that triggered the modal
			var button = event.relatedTarget;
			// Extract info from data-bs-* attributes

			var ItemId = button.getAttribute("data-ItemId");
			var itemName = button.getAttribute("data-ItemName");
			var brandId = button.getAttribute("data-brandId");
			var ModelId = button.getAttribute("data-ModelId");
			//console.log(modelName + " /" + brandId + "/ModelId : " + ModelId);

			$('#brandSelectUpdate option[value="' + brandId + '"]').attr(
				"selected",
				"selected"
			);
			$("#brandSelectUpdate").trigger("change");
			$('#modelSelectUpdate option[value="' + ModelId + '"]').attr(
				"selected",
				"selected"
			);

			$("#itemId").val(ItemId);
			$("#inputUpdateItem").val(itemName);
		});
	}

	//update model dropdown
	$("#brandSelectUpdate").on("change", function () {
		var brandId = "brandID_" + this.value;
		$(".modelOption").show();
		$(".modelOption").each(function (el, obj) {
			var clssName = obj.attributes["class"].nodeValue.split(" ");
			if (brandId != clssName[1]) {
				$("." + clssName[1]).hide();
			}
		});

		$("#modelSelectUpdate option:first")
			.prop("selected", true)
			.trigger("change");
	});

	// item update operation goes down here

	//delete item

	//Delete brand
	var DeleteItemModel = document.getElementById("DeleteItemModel");
	if (DeleteItemModel != null) {
		DeleteItemModel.addEventListener("show.bs.modal", function (event) {
			// Button that triggered the modal
			var button = event.relatedTarget;
			// Extract info from data-bs-* attributes
			var id = button.getAttribute("data-ItemId");
			var url = "Item/deleteModel?id=" + id;
			$("#deleteBtnItem").attr("href", url);
		});
	}
});
