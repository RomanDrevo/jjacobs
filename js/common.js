var phoneIsVerified = true;
var smsCount = 0;
var validEmail = false;
$(".accordeon dd").hide().prev().click(function() {
    $(this).parents(".accordeon").find("dd").not(this).slideUp().prev().removeClass("active");
    $(this).next().not(":visible").slideDown().prev().addClass("active");
});

$(document).ready(function() {


    $.stellar({
        horizontalScrolling: false,
        verticalOffset: 40
    });

    var rand = Math.floor(Math.random() * 100);

    $('.dynamic_num').text(6500 + rand);

    setInterval(function(){ 
        var rand = Math.floor(Math.random() * 100);

        $('.dynamic_num').text(6500 + rand);
    }, 2500);

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


    $("#reg-form").submit(function(e) {
        e.preventDefault();
        onSubmit();
        return false;
    });

    $("#email").on('focusin', function(){
        $("#errors_container").hide();
    });

    $("#email").on('focusout', function(){
        if($(this).val() == "")
            return false;


        $.ajax({
            type: "POST",
            url: "register/index.php",
            data: { email_to_verify: $(this).val() }
        }).done(function(data) {
            if(data != "error"){
                validEmail = true;
                $("#errors_container").hide();
            }else{
                $("#errors_container").html("<p class='error'>We could not validate your email.</p>");
                $("#errors_container").show();
            }
        });
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

function onSubmit(){
    $('#submit_btn').prop('disabled', true);
    $("#errors_container").hide();
    var form = $("#reg-form");
    var
        name = $(form).find("input[name=name]").val(),
        lname = $(form).find("input[name=lastName]").val(),
        email = $(form).find("input[name=email]").val(),
        phone = $("#phone").intlTelInput("getNumber"),
        campaignId = $("#campaign_id").val(),
        a_aid = $("#a_aid").val();
                    
    var errors = "";

    if(name == '' || name.length < 2)
        errors += "<p class='error'>Please fill in your full name (at least 2 characters).</p>";

    var $element = $('input[type="tel"]');

    if (!$element.intlTelInput("isValidNumber") || phone == '') 
        errors += "<p class='error'>Invalid Phone Number!.</p>";

    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if( !name || name.length < 1)
        errors += "<p class='error'>Please fill in your name.</p>";

    if (email == '' || !re.test(email))
        errors += "<p class='error'>Please enter a valid email.</p>";

    if(errors != ""){
        $("#errors_container").html(errors);
        $("#errors_container").show();
        $('#submit_btn').prop('disabled', false);
        return false;
    }

    if( !phoneIsVerified){

        if(smsCount > 3){
            swal('Sorry','Too many attempts','error');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "register/index.php",
            data: { phone_to_verify: phone }
        }).done(function(data) {
            if(data == "error"){
                $("#errors_container").html("<p class='error'>Failed to send SMS verification.</p>");
                $("#errors_container").show();
                $('#submit_btn').prop('disabled', false);
                return false;
            }else{
                smsCount++;
                validateSms(data, phone);
            }
        });
        return false;
    }else{
        $.ajax({
            type: "POST",
            url: "register/index.php",
            data: {
                name: name,
                email: email,
                phone: phone,
                campaign_id: campaignId,
                a_aid: a_aid
            }
        }).done(function(data) {

            var response = JSON.parse(data);

            if( !response.success){
                $("#errors_container").html(response.data).show();
                $('#submit_btn').prop('disabled', false);
            }else{
                window.location = "/thank-you.html?email=" + response.data.username + "&password=" + response.data.password;
            }
        });
    }
}


function validateSms(serverCode, phone){
    swal({
      title: 'Please enter the 4 digit verification code we sent to ' + phone,
      input: 'text',
      showCancelButton: true,
      cancelButtonText: "Change the number",
      confirmButtonText: 'Submit',
      showLoaderOnConfirm: true,
      preConfirm: function(text) {
        return new Promise(function(resolve, reject) {
            var code = parseInt(text);
            if(code < 1000 || code > 9999 ){
                reject('Please enter a valid 4 digit code!');
            }else{
                if(code == serverCode){
                    phoneIsVerified = true;
                    onSubmit();
                    resolve();
                }else{
                    reject('Could not be verified, please try again');
                }
            }
        });
      },
      allowOutsideClick: false
    }).then(function(text) {
        return true;
    }, function(dismiss) {
        if (dismiss === 'cancel') {
            $("#phone").focus();
            $('#submit_btn').prop('disabled', false);
        }
    });

    return false;
}