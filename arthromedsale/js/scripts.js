$(document).ready(function() {
	
	/* scroll */
	
	$("a[href^='#']").click(function(){
		var _href = $(this).attr("href");
		$("html, body").animate({scrollTop: $(_href).offset().top+"px"});
		return false;
	});

	/* timer */

	now = new Date();

    var time = (24-now.getHours())*3600;

    $(".timer").attr("data-timer", time);
    $(".timer").TimeCircles({
        "animation": "smooth",
        "bg_width": 0.001,
        "fg_width": 0.02,
        "circle_bg_color": "#e2e2e2",
        "time": {
            "Days": {
                "show": false
            },
            "Hours": {
                "text": "ore",
                "color": "#394a54",
                "show": true
            },
            "Minutes": {
                "text": "minuti",
                "color": "#394a54",
                "show": true
            },
            "Seconds": {
                "text": "secondi",
                "color": "#394a54",
                "show": true
            }
        }
    });

	/* sliders */

	$(".owl-carousel").owlCarousel({
		items: 1,
		loop: true,
		smartSpeed: 300,
		mouseDrag: false,
		pullDrag: false,
		dots: false,
		nav: true,
		navText: ""
	});

	/* validate form */

	$(".order_form").submit(function(){
		if ($(this).find("input[name='name']").val() == "" && $(this).find("input[name='phone']").val() == "") {
			alert("Введите Ваши имя и телефон");
			$(this).find("input[name='name']").focus();
			return false;
		}
		else if ($(this).find("input[name='name']").val() == "") {
			alert("Введите Ваше имя");
			$(this).find("input[name='name']").focus();
			return false;
		}
		else if ($(this).find("input[name='phone']").val() == "") {
			alert("Введите Ваш телефон");
			$(this).find("input[name='phone']").focus();
			return false;
		}
		return true;
	});
});

$(function(){
    $('a[href^="#"]').click(function (){
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
        return false;
    });

    $(".slider-rev").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $(".arrow-left1"),
        nextArrow: $(".arrow-right1")
    });

    $(".slider-top").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: $(".arrow-left"),
        nextArrow: $(".arrow-right")
    });
});