$(document).ready(function()
{
	$("#submit").click(function()
	{
		var fullNAme = $("#fullName").val();
		var user_name = $("#user_name").val();
		var pass = $("#pass").val();
		var re_pass = $("#re_pass").val();
		var add = $("#add").val();
		var city = $("#city").val();
		var contact = $("#contact").val();
		var state = $("#state").val();
		var male = $("#male").is(":checked");
		var female = $("#female").is(":checked");

		var check = true;

		if (fullNAme=="") 
		{
			check = false;
			$("#fullName_msg").html("Enter your full name");
		} 
		else 
		{
			$("#fullName_msg").html("");
		}

		if (user_name=="") 
		{
			check = false;
			$("#user_name_msg").html("Enter your user name");
		} 
		else 
		{
			var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(reg.test(user_name) == false)
			{
				check = false;
				check = false;
				$("#user_name_msg").html("Enter valid Email id");
			}
			else
			{
				$("#user_name_msg").html("");
			}
		}

		if (pass=="") 
		{
			check = false;
			$("#pass_msg").html("Enter your password");
		} 
		else 
		{
			$("#pass_msg").html("");
		}

		if (re_pass=="") 
		{
			check = false;
			$("#re_pass_msg").html("Enter your re_password");
		} 
		else 
		{
			if (pass !=re_pass) 
			{
				check = false;
				$("#re_pass_msg").html("Password does not same");
			} 
			else 
			{
				$("#re_pass_msg").html("");
			}
		}

		if (add=="") 
		{
			check = false;
			$("#add_msg").html("Enter your address");
		} 
		else 
		{
			$("#add_msg").html("");
		}

		if (city=="Select City") 
		{
			check = false;
			$("#city_msg").html("Enter your city");
		} 
		else 
		{
			$("#city_msg").html("");
		}

		if (state=="Select State") 
		{
			check = false;
			$("#state_msg").html("Enter your state");
		} 
		else 
		{
			$("#state_msg").html("");
		}

		if (male==false && female==false) 
		{
			check = false;
			$("#gender_msg").html("Enter your gender");
		} 
		else 
		{
			$("#gender_msg").html("");
		}

		if(contact == "") 
		{
			check = false;
			$("#contact_msg").html("Enter your contact number");
		} 
		else 
		{
			if(isNaN(contact)) 
			{
				check = false;

				$("#contact_msg").html("Enter only numbers");
			} 

			else 
			{
				if(contact.length != 10) 
				{
					check = false;
					$("#contact_msg").html("Enter your 10 digit contact number");
				} 
				else 
				{
					$("#contact_msg").html("");
				}
			}
		}
		return check;
	});


// state to city coding

$("#state").change(function()
{
	var cityId = $(this).val();

	$("#city").html("<option value='-1'>Select city</option>");
	$.ajax({
		url : 'getCity.php',
		type:'post',
		data : {cityId:cityId},
		success: function(res){
			$("#divLoading").removeClass('show');
			$("#city").append(res);
		}
	})
});
})