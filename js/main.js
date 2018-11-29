$(document).ready(function(){
	window.setTimeout(function () {
		$(".alert").alert('close'); }, 20000);

	let btt=$('.back-to-top');
	$(window).on('scroll',function () {
		let self=$(this),
			height=self.height(),
			top=self.scrollTop();

		if(top > height){
			if(!btt.is(':visible')){
				btt.fadeIn();
			}
		}else {
			btt.fadeOut();
		}
    });
	
	btt.on('click',function (e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0,
		},2000);
    });

    $("#save_image_btn").click(function(event){
        event.preventDefault();
    	let img = document.getElementById("image_file").value.split("\\");
    	let imag= img[img.length-1];
        console.log(imag);

        $.ajax({
            url : "main_action.php",
            method : "POST",
            data : $('#image_saver').serialize(),
            success : function(data){
                $("#get_msg").html(data);
            }

        })

    })


	cat();
	nav_cat();
	brand();
	nav_brand();
    product();

	function cat(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {category:1},
			success : function(data){
				$("#getCategory").html(data);
			}
		})
	}
	
	function nav_cat(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {nav_category:1},
			success : function(data){
				$("#get_nav_Category").html(data);
			}
		})
	}
	
	function brand(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {brand:1},
			success : function(data){
				$("#getBrand").html(data);
			}
		})
	}
	
	function nav_brand(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {nav_brand:1},
			success : function(data){
				$("#get_nav_brand").html(data);
			}
		})
	}

	function product(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {product:1},
			success : function(data){
				$("#get_product").html(data);
			}
		})
	}
    showVideos();
    function showVideos(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {videos:1},
            success : function(data){
                $("#get_vid").html(data);
            }
        })
    }
	//category selection
	
	$("body").delegate(".category","click",function(event){
		event.preventDefault();
		let cid = $(this).attr('cid');
		//alert(cid);
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_selected_cat:1,cat_id:cid},
			success : function(data){
				$("#get_product").html(data);
			}
		})
	})
	
	//brand selection
	$("body").delegate(".brand","click",function(event){
		event.preventDefault();
		let bid = $(this).attr('bid');
		//alert(bid);
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {get_selected_brand:1,brand_id:bid},
			success : function(data){
				$("#get_product").html(data);
			}
		})
	})

	$("#btn_search").click(function(event){
		event.preventDefault();
		var keyword = $("#txt_search").val();
		
		if(keyword !=""){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {search:1,keyword:keyword},
			success : function(data){
				$("#get_product").html(data);
				}
			})
		}
	})
	
	
	$("#signup_btn").click(function(event){
		event.preventDefault();
		$.ajax({
			url : "sign_action.php",
			method : "POST",
			data : $('#signup').serialize(),
			success : function(data){
				$("#get_msg").html(data);
				}
				
			})	
		
	})
	
	
	$("#signin_btn").click(function(event){
		event.preventDefault();
		var username = $("#username").val();
		var pass = $("#password").val();
		$.ajax({
			url 	: "login_action.php",
			method 	: "POST",
			data 	: {userLogin:1,userName:username,userPassword:pass},
			success : function(data){
				if(data == "hello"){
					window.location.href = "user.php";
				}else if(data == "admin"){
                    window.location.href = "admin.php";
				}
				else{
					$("#login_msg").html(data);
				}    
				
			}
				
		})
	})
	
	$("body").delegate("#product","click",function(event){
				event.preventDefault();
				var p_id = $(this).attr('pid');
				
				$.ajax({
					url 	: "action.php",
					method 	: "POST",
					data 	: {addToCart:1,product_id:p_id},
					success : function(data){
						$("#cart_msg").html(data);
						cart_count();
					}	
				})
	})
	
	cart_container();
	function cart_container(){
		$.ajax({
			url 	: "action.php",
			method	: "POST",
			data	: {get_cart_item:1},
			success	: function(data){
				$("#cart_item").html(data);
				
			}
		})
		
	}

	cart_count();
	function cart_count(){
		$.ajax({
			url 	: "action.php",
			method	: "POST",
			data	: {cart_count:1},
			success	: function(data){
				$("#badge").html(data);
			}
		})
	}
	
	$("#cart_container").click(function(event){
		event.preventDefault();
		$.ajax({
			url 	: "action.php",
			method	: "POST",
			data	: {get_cart_item:1},
			success	: function(data){
				$("#cart_item").html(data);
				
			}
		})
	})
	
	cart_checkout();
	function cart_checkout(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {cart_checkout:1},
			success : function(data){
				$("#cart_check").html(data);
			}
		})
	}
	
	$("body").delegate(".qty","keyup",function(){
		var pid = $(this).attr("pid");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = qty * price;
		$("#total-"+pid).val(total);	
	})
	
	$("body").delegate(".delete","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("del_id");
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {del_from_cart:1,delete_id:pid},
			success : function(data){
				$("#del_update_msg").html(data);
				cart_checkout();
			}
		})	
	})
	
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("update_id");
		var qty = $("#qty-"+pid).val();
		var price = $("#price-"+pid).val();
		var total = $("#total-"+pid).val();
		
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {update_cart:1,item_id:pid,qty:qty,price:price,total:total},
			success : function(data){
				$("#del_update_msg").html(data);
				cart_checkout();
			}
		})
		
		
	})
	
	page();
	function page(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {page:1},
			success : function(data){
				$("#pageno").html(data);
			}
		})
	}
	
	$("body").delegate("#page","click",function(event){
		event.preventDefault();
		var page_no = $(this).attr("page");
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {product:1,setPage:1,pageNumber:page_no},
			success : function(data){
				$("#get_product").html(data);
			}
		})
		
	})
	checkout_final();
	function checkout_final(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {checkout_final:1},
			success : function(data){
				//alert('good');
				$("#checkout_final").html(data);
			}
		})
	}
	order_sum();
	function order_sum(){
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {order_sum:1},
			success : function(data){
				$("#order_sum").html(data);
			}
		})
	}
	
	$("#confirm_address_btn").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var mobile = $("#mobile").val();
		var address = $("#address").val();
		var delivery = $("#delivery").val();
		var payment = $("#payment").val();
		
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {confirm_address:1,email:email,mobile:mobile,address:address,delivery:delivery,payment:payment},
			success	: function(data){
				if(data == "ok"){
					window.location.href = "order_summary.php";		
				}else{
					$("#confirm_msg").html(data);
				}
			}
		})
	})
	
	
	$("#confirm_order_btn").click(function(event){
		event.preventDefault();
		
		$.ajax({
			url 	: "action.php",
			method 	: "POST",
			data 	: {confirm_order:1},
			success	: function(data){
				if(data){
					window.location.href = "order_success.php";		
				}else{
					$("#confirm_msg").html(data);
				}
			}
		})
	})
})

