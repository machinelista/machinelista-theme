<script>
	var worldjsonDataFile = "https://machinelista.com/wp-content/themes/Used-Machine-SE/js/worldModified.json";

	function findAlpha2ByCountryName(countryName) {
	   var alpha2 = null;
	   var matchingObjects = [];

	   $.ajax({
	      url: worldjsonDataFile,
	      dataType: "json",
	      async: false, // Make the AJAX call synchronous
	      success: function (data) {
	         $.each(data, function (index, obj) {
	            if (obj.en.toLowerCase().includes(countryName.toLowerCase()) || obj.alpha3.toLowerCase().includes(countryName.toLowerCase())) {
	               matchingObjects.push(obj);
	               if (matchingObjects.length > 0) {
	                  alpha2 = obj.alpha2;
	                  return false; // Exit the loop when a match is found
	               }
	            }
	         });
	      },
	   });

	   if (alpha2 !== null) {
	      $(".applyCountryFlag").html('<span class="fi fi-' + alpha2 + ' machineCountryFlag"></span>').removeClass("applyCountryFlag").removeAttr("class");
	   }
	}
</script>