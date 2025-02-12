

/* Please ❤ this if you like it! */

function style(view)
{
    var stylo = 'background:#00539c;color:white;';
    if(view == 1)
    {
        stylo = '';
    }
    return stylo;
}

function notifications(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var type = $("#type").val();
    var auth = '';
    
    if(type == 'USER')
    {
        auth = 'customer_id';
    }
    else if(type == 'BUSINESS')
    {
        auth = 'business_id';
    }
    
    if(auth == 'customer_id' || auth == 'business_id' ){
        
        $.ajax({
        url:'/getNoti',
        type:"POST",
        dataType:"json",
        data:{auth:auth},
        success:function(res)
        {
            $(".notify").children().remove();
            $.each(res.noti,function(){
                $(".notify").append(`
                    <a class="dropdown-item viewNoti" href="/view_all_notification" style="white-space: normal !important; ${style(this.view)}">
                        <input type="hidden" value="${this.id}" class="notiId" />
                        <span>${this.req_price.get_customer.first_name} ${this.req_price.get_customer.last_name} send a Request</span>
                        <br />
                        <span style="opacity:0.7;">${this.created_at}</span>
                    </a>
                `);
            })
            $(".notify").append(`
                <br>
                <p class="text-center">
                    <a href="/view_all_notification" style="color:#00539c;">Show all Notifications</a>
                </p>
            `);
            if(res.count > 0)
            {
                $(".bellicon").append(`
                    <span class="rounded-circle bg-white px-2 position-absolute" style="color: #00539c;font-size: 15px;top: -15px;left: 15px;">${res.count}</span>
                `);
            }
            $('.viewNoti').click(function(){
                var notiId = $(this).children('.notiId').val();
                $.ajax({
                    url:"/viewNoti",
                    type:"POST",
                    dataType:"json",
                    data:{notiId:notiId},
                    success:function(data)
                    {
                        notifications();
                    }
                });
            })
        }
        });
    }
}

notifications();
setInterval(function(){
    notifications();
},(1000 * 60));

(function($) { 
    "use strict";

// 	$(function() {
// 		var header = $(".start-style");
// 		$(window).scroll(function() {
// 			var scroll = $(window).scrollTop();

// 			if (scroll >= 500) {
// 				header.removeClass('start-style').addClass("scroll-on");
// 			} else {
// 				header.removeClass("scroll-on").addClass('start-style');
// 			}
// 		});
// 	});

	//Animation

	$(document).ready(function() {
		$('body.hero-anime').removeClass('hero-anime');
	});

	$(document).ready(function(){
    $(".dm *,.dm").mouseenter(function(){
      $(".dm").addClass('show');
    });
    $(".dm *,.dm").mouseleave(function(){
        $(".dm").removeClass('show');
    });
});
	//Menu On Hover

// 	$('body').on('mouseenter mouseleave','.nav-item',function(e){
// 			if ($(window).width() > 750) {
// 				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
// 				setTimeout(function(){
// 				_d[_d.is(':hover')?'addClass':'removeClass']('show');
// 				},1);
// 			}
// 	});

	//Switch light/dark

	$("#switch").on('click', function () {
		if ($("body").hasClass("dark")) {
			$("body").removeClass("dark");
			$("#switch").removeClass("switched");
		}
		else {
			$("body").addClass("dark");
			$("#switch").addClass("switched");
		}
	});

  })(jQuery);

//
//   $(document).ready(function(){
//     $("#sticker").sticky({topSpacing:0});
//   });

var rowslength = 5;
size_timelinediv = $("#timeline t").length;
var x = 3; //number of cards to be displayed
if (rowslength < 4) {
    $("#loadMoreprodDiv").hide();

  }
  if (x == 3) {
    //alert(rowslength)
    $("#showlessprodDiv").hide();

  }
  $("#timeline t:lt(" + x + ")").show();
  $("#loadMoreprodDiv").click(function () {
    x = (x + 5 <= size_timelinediv) ? x + 5 : size_timelinediv;
    $("#timeline t:lt(" + x + ")").show();
    $("#showlessprodDiv").show();

    if (x == size_timelinediv) {
      $("#loadMoreprodDiv").hide();
    }
  });
  $("#showlessprodDiv").click(function () {
    x = (x - 5 <= 3) ? 3 : x - 5;
    $("#timeline t").not(":lt(" + x + ")").hide();
    $("#loadMoreprodDiv").show();
    $("#showlessprodDiv").show();

    if (x == 3) {
      $("#showlessprodDiv").hide();

    }
  });




$(document).ready(function() {
	$('#show-hidden-menu').click(function() {
	  $('.hidden-menu').slideToggle("slow");
	});



    $('.comments-section').click(function(e) {
        e.preventDefault();
        $(this).siblings('form').toggleClass("d-none");
    })
  });



const ratingStars = [...document.getElementsByClassName("rating__star")];
const ratingResult = document.querySelector(".rating__result");


printRatingResult(ratingResult);

function executeRating(stars, result) {
   const starClassActive = "rating__star fas fa-star";
   const starClassUnactive = "rating__star far fa-star";
   const starsLength = stars.length;
   let i;
   stars.map((star) => {
      star.onclick = () => {
         i = stars.indexOf(star);

         if (star.className.indexOf(starClassUnactive) !== -1) {
            printRatingResult(result, i + 1);
            for (i; i >= 0; --i) stars[i].className = starClassActive;
         } else {
            printRatingResult(result, i);
            for (i; i < starsLength; ++i) stars[i].className = starClassUnactive;
			rating.textContent = `${0}/5`;
         }
      };
   });
}

function printRatingResult(result, num = 0) {
   result = `${num}/5`;
   $('.rateStar').val(num);
}

executeRating(ratingStars, ratingResult);