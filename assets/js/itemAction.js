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
	});
});
