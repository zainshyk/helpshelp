// JS
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  var x = document.getElementsByClassName("step");
  x[n].style.display = "block";
  
  // Hide submit button on all steps except the last one
  if (n < x.length - 1) {
    document.getElementById("submitBtn").style.display = "none";
  } else {
    document.getElementById("submitBtn").style.display = "inline";
  }
  
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == x.length - 1) {
    document.getElementById("nextBtn").style.display = "none"; // Hide next button on last step
  } else {
    document.getElementById("nextBtn").style.display = "inline";
  }
  
  fixStepIndicator(n);
}

function nextPrev(n) {
  var x = document.getElementsByClassName("step");
  
  if (n == 1 && currentTab === 0 && !validateFirstStep()) return false;

  x[currentTab].style.display = "none";
  
  currentTab = currentTab + n;
  
  if (currentTab >= x.length) {
    document.getElementById("signUpForm").submit();
    return false;
  }
  
  showTab(currentTab);
}

function validateFirstStep() {
  var y, i, valid = true;
  y = document.getElementsByClassName("step")[0].getElementsByTagName("input");
  
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  
  if (valid) {
    document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  var i, x = document.getElementsByClassName("stepIndicator");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  x[n].className += " active";
}



// Location
function getLocation() {
  if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(showPosition);
  }
}
function showPosition(position) {
  document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
  document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
}
function showAlert() {
  alert("Are you Sure to Share your Location?");
}

// Map

function getLocationAndShowMap() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showMap(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;
    const mapUrl = `https://www.google.com/maps?q=${latitude},${longitude}&hl=es&z=14&output=embed`;

    // Insert latitude and longitude into hidden input fields
    document.querySelector('input[name="latitude"]').value = latitude;
    document.querySelector('input[name="longitude"]').value = longitude;

    // Show the map container
    document.getElementById("mapContainer").style.display = "block";

    // Set the iframe src to the dynamic mapUrl
    document.getElementById("mapFrame").src = mapUrl;

    // Scroll to the map container
    document.getElementById("mapContainer").scrollIntoView({
        behavior: "smooth",
        block: "start"
    });
}




$(document).ready(function(){
	
  var preloadbg = document.createElement("img");
  preloadbg.src = "https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/timeline1.png";
  
	$("#searchfield").focus(function(){
		if($(this).val() == "Search contacts..."){
			$(this).val("");
		}
	});
	$("#searchfield").focusout(function(){
		if($(this).val() == ""){
			$(this).val("Search contacts...");
			
		}
	});
	
	$("#sendmessage input").focus(function(){
		if($(this).val() == "Send message..."){
			$(this).val("");
		}
	});
	$("#sendmessage input").focusout(function(){
		if($(this).val() == ""){
			$(this).val("Send message...");
			
		}
	});
		
	
	$(".friend").each(function(){		
		$(this).click(function(){
			var childOffset = $(this).offset();
			var parentOffset = $(this).parent().parent().offset();
			var childTop = childOffset.top - parentOffset.top;
			var clone = $(this).find('img').eq(0).clone();
			var top = childTop+12+"px";
			
			$(clone).css({'top': top}).addClass("floatingImg").appendTo("#chatbox");									
			
			setTimeout(function(){$("#profile p").addClass("animate");$("#profile").addClass("animate");}, 100);
			setTimeout(function(){
				$("#chat-messages").addClass("animate");
				$('.cx, .cy').addClass('s1');
				setTimeout(function(){$('.cx, .cy').addClass('s2');}, 100);
				setTimeout(function(){$('.cx, .cy').addClass('s3');}, 200);			
			}, 150);														
			
			$('.floatingImg').animate({
				'width': "50px",
				'left':'30px',
				'top':'20px'
			}, 200);
			
			var name = $(this).find("p strong").html();
			var email = $(this).find("p span").html();														
			$("#profile p").html(name);
			$("#profile span").html(email);			
			
			$(".message").not(".right").find("img").attr("src", $(clone).attr("src"));									
			$('#friendslist').fadeOut();
			$('#chatview').fadeIn();
		
			
			$('#close').unbind("click").click(function(){				
				$("#chat-messages, #profile, #profile p").removeClass("animate");
				$('.cx, .cy').removeClass("s1 s2 s3");
				$('.floatingImg').animate({
					'width': "40px",
					'top':top,
					'left': '12px'
				}, 200, function(){$('.floatingImg').remove()});				
				
				setTimeout(function(){
					$('#chatview').fadeOut();
					$('#friendslist').fadeIn();				
				}, 50);
			});
			
		});
	});			
});
