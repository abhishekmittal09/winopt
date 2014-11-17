var parametricRequestProcessForm = "./fiveZoneFiles/parametric.php?unique_counter=";

function s4() {
	return Math.floor((1 + Math.random()) * 0x10000)
	.toString(16)
	.substring(1);
};

function guid() {
	return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
	s4() + '-' + s4() + s4() + s4();
}

var unique_counter=guid();

$("#parametricform").submit(function(event){
	var unique_counter=guid();
	var address=parametricRequestProcessForm+unique_counter;
	$(this).attr("action", address);
});
