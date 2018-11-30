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

	//$('#image_saver').serialize()

    $("#save_image_btn").click(function(event){
        event.preventDefault();
    	let name = document.getElementById("name").value;
    	let price = document.getElementById("price").value;
    	let content = document.getElementById("content").value;
    	let implication = document.getElementById("implication").value;
    	let img = document.getElementById("image_file").value.split("\\");
    	let imag= img[img.length-1];
        //console.log(imag +" "+price);
        $.ajax({
            url : "main_action.php",
            method : "POST",
            data : {name:name,price:price,content:content,implication:implication,image:imag},
            success : function(data){
                $("#get_msg").html(data);
                document.getElementById("name").value="";
                document.getElementById("price").value="";
                document.getElementById("content").value="";
                document.getElementById("implication").value="";
                document.getElementById("image_file").value="";
            }

        })

    })




    product();

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
		let username = $("#username").val();
		let pass = $("#password").val();
		$.ajax({
			url 	: "login_action.php",
			method 	: "POST",
			data 	: {userLogin:1,userName:username,userPassword:pass},
			success : function(data){
				if(data == "hello"){
					window.location.href = "user.php";
				//}else if(data == "admin"){
                   // window.location.href = "admin.php";
				}
				else{
					$("#login_msg").html(data);
				}    
				
			}
				
		})
	})



    $("body").delegate("#send_review","click",function(event){
        event.preventDefault();
        //alert("hello");
        let p_Id = $("#txt_review").attr('p_id');
        let message=document.getElementById("txt_review").value;
		//alert(message);
        $.ajax({
            url 	: "action.php",
            method 	: "POST",
            data 	: {send_review:1,proId:p_Id,message:message},
            success : function(data){
                $("#review_msg").html(data);
                if(data){
                    document.getElementById("txt_review").value="";
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

