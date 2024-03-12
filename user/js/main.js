$(document).ready(function(){
    cat();
    product();
    function cat(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {category:1},
            success : function(data){
                $("#get_category").html(data);
            }
        })
    }

    function product(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {getProduct:1},
            success : function(data){
                $("#get_product").html(data);
            }
        })
    }


    $("body").delegate(".category","click",function(event){
        event.preventDefault();
        var cname =$(this).attr('cname');
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_selected_category:1,cat_name:cname},
            success : function(data){
                $("#get_product").html(data);
            }
        })
    })

    $("#search_btn").click(function(){
        var keyword = $("#search").val();
        if(keyword !=""){
            $.ajax({
                url : "action.php",
                method : "POST",
                data : {search:1,item_name:keyword},
                success : function(data){
                    $("#get_product").html(data);
                }
            })
        }

    })

    $("#signup_btn").click(function(event){
        event.preventDefault();
        $.ajax({
            url : "register.php",
            method : "POST",
            data : $("form").serialize(),
            success : function(data){
                $("#si_msg").html(data);
            }
        })
    })
    cart_count();
    $("body").delegate("#product","click",function(event){ 
        event.preventDefault();
        var p_id = $(this).attr('pid');
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {addProduct:1,proId:p_id},
            success : function(data){
                $("#product_msg").html(data);
                cart_count();
            }
        })
    })

    $("body").delegate("#view","click",function(event) {
        event.preventDefault();
        var p_id = $(this).attr('pid');
        $.ajax({
            url :"action.php",
            method : "POST",
            data : {viewproduct:1,proId:p_id},
            success : function(data) {
                $("#get_product").html(data);
            }
        })
    })

    $("#back","click",function(event) {
        event.preventDefault();
        $.ajax({
            url :"profile.php",
            method : "POST",
            
            
        })
    })

    $("#back2","click",function(event) {
        event.preventDefault();
        $.ajax({
            url :"product.php",
            method : "POST",
            
            
        })
    })

    cart_add();
    function cart_add() {
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_cart_product:1},
            success : function(data){
                $("#cart_product").html(data);
            }
        })

    };
    function cart_count() {
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {cart_count:1},
            success : function(data){
                $(".badge").html(data);
            }
        })
    }

    $("#cart_add").click(function(event){
        event.preventDefault();
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {get_cart_product:1},
            success : function(data){
                $("#cart_product").html(data);
            }
        })
    })
    cart_checkout();
    function cart_checkout(){
        $.ajax({
            url : "action.php",
            method : "POST",
            data : {cart_checkout:1},
            success : function(data){
                $("#cart_checkout").html(data);
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
    $("body").delegate(".remove","click",function(event){
        event.preventDefault();
        var pid = $(this).attr("remove_id"); 
        $.ajax({
            url : "action.php",
            method : "post",
            data : {removefromcart:1,removeid:pid},
            success : function(data){
                $("#cart_msg").html(data);
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
            url : "action.php",
            method : "post",
            data : {updateproduct:1,updateID:pid,qty:qty,price:price,total:total},
            success : function(data){
                $("#cart_msg").html(data);
                cart_checkout();
            }
        })
    })
    page();
    function page() {
        $.ajax({
            url: "action.php",
            method:"POST",
            data:{page:1},
            success: function (data){
                $("#pageno").html(data);
            }
        })
    }
    $("body").delegate("#page","click",function() {
        var pn=$(this).attr("page");
        $.ajax({
            url: "action.php",
            method:"POST",
            data:{getProduct:1,setpage:1,pageNumber:pn},
            success: function (data){
                $("#get_product").html(data);
            }
        })
    })

})  