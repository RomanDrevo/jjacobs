$(".accordeon dd").hide().prev().click(function() {
	$(this).parents(".accordeon").find("dd").not(this).slideUp().prev().removeClass("active");
	$(this).next().not(":visible").slideDown().prev().addClass("active");
});

$(document).ready(function() {


	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 40
	});

	var eqElement = ".element"
	$(window).load(function(){equalheight(eqElement);}).resize(function(){equalheight(eqElement);});

	var austDay = new Date($(".countdown").attr("date-time"));
	$(".countdown").countdown({until: austDay, format: 'yowdHMS'});

	$(".fancybox").fancybox();

	$(".top_mnu").navigation();

    $('.img_content img').click(function(){
        $('#name').focus();
    });

    $("#phone").intlTelInput({
        initialCountry: "auto",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/9.0.9/js/utils.js",
        separateDialCode: true,
        geoIpLookup: function(callback) {
            jQuery.post("get-user-ip.php", {valid: 1}, function(data) {
                callback(data);
            });
        }
    });


	$(".block").waypoint(function(direction) {
		if (direction === "down") {
			$(".class").addClass("active");
		} else if (direction === "up") {
			$(".class").removeClass("deactive");
		};
	}, {offset: 100});


	$("a.scroll").click(function() {
		$.scrollTo($(".div"), 800, {
			offset: -90
		});
	});

	var elem = window.location.hash;
	if(elem) {
		$.scrollTo(elem, 800, {
			offset: -90
		});
	};


	function carousel_1() {
		var owl = $(".carousel");
		owl.owlCarousel({
			items : 1,
			loop : true,
			autoHeight : false,
			autoPlay : 3000,
			dots : true
		});
		$(".next_button").click(function() {
			owl.trigger("owl.next");
		});
		$(".prev_button").click(function() {
			owl.trigger("owl.prev");
		});
	};
	carousel_1();

	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});


	$("#reg-form").submit(function() {

		var
			name = $(this).find("input[name=name]").val(),
			lname = $(this).find("input[name=lastName]").val(),
			email = $(this).find("input[name=email]").val(),
			phone = $("#phone").intlTelInput("getNumber");

            var $element = $('input[type="tel"]');

            if (!$element.intlTelInput("isValidNumber")) {

                alert('Invalid Phone Number!');
                return false;
            }

			var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

			if( !name || name.length < 1){
				alert("Please fill in your name");
				return false;
			}

			if (email == '' || !re.test(email)){
				 alert('Please enter a valid email address.');
				 return false;
			}

			if (phone == ''){
				 alert('Please enter a valid phone numbers.');
				 return false;
			}

			$.ajax({
				type: "POST",
				url: "register/index.php",
				data: $("form").serialize()
			}).done(function(data) {
				if(data != "OK"){
                    alert("Somethign went wrong, please try again!");
				}else{
                    window.location = "/thank-you.html";
				}
				
			});
			return false;
		});

});

(function($, document, window, viewport) {
	function resizeWindow() {

};
$(document).ready(function() {
	resizeWindow();
});
$(window).bind("resize", function() {
	viewport.changed(function(){
		resizeWindow();
	});
});
})(jQuery, document, window, ResponsiveBootstrapToolkit);
