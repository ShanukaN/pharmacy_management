$(document).ready(function(){
	

    addNewRow();
    $("#add").click(function(){
        addNewRow();
    })

    function addNewRow(){
        $.ajax({
            url :"sell_process.php",
            method : "POST",
            data : {getNewOrderItem:1},
            success : function(data){
                $("#invoice_item").append(data);
                var n =0;
                $(".number").each(function(){
                    $(this).html(++n);
                })

            }
        })
    }

    $("#remove").click(function(){
        $("#invoice_item").children("tr:last").remove();
        calculate(0,0);
        
    })
    
    $("#invoice_item").delegate(".id","change",function(){
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        
        $.ajax({
            url : "sell_process.php",
            method : "POST",
            dataType : "json",
            data : {getPriceAndQty:1,id:pid},
            success : function(data){
                tr.find(".tqty").val(data["qty"]);
				tr.find(".item_name").val(data["item_name"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["price"]);
				tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
                calculate(0,0);
            }

        })
    })

    $("#invoice_item").delegate(".qty","keyup",function(){
        var qty =$(this);
        var tr = $(this).parent().parent();
        if(isNaN(qty.val())){
            alert("Pleace enter a valid quantity");
            qty.val(1);
        }
        else
        {
            if((qty.val() -0 )> (tr.find(".tqty").val()-0)){
                alert("Sorry ! This much of quantity is not available");
                qty.val(1);
            }
            else{
                tr.find(".amt").html(qty.val() * tr.find(".price").val());
                calculate(0,0);
            }
        }

    })

    function calculate(dis,paid){
        var sub_total =0;
        var net_total = 0;
        var discount = dis;
        var paid_amt = paid;
        var due = 0;
        $(".amt").each(function(){
            sub_total = sub_total + ($(this).html() * 1);
        })
        net_total = sub_total - discount;
        due = net_total - paid_amt;
        $("#sub_total").val(sub_total);
        $("#discount").val(discount);
        $("#net_total").val(net_total);
        //$("#paid")
        $("#due").val(due);
    }

    $("#discount").keyup(function(){
        var discount = $(this).val();
        calculate(discount,0);
    })
    
    $("#paid").keyup(function(){
        var paid = $(this).val();
        var discount = $("#discount").val();
        calculate(discount,paid);
    })

    //Order Process//

    $("#order_form").click(function(){

        var invoice = $("#get_order_data").serialize();
		if ($("#cust_name").val() === "") {
			alert("Plaese enter customer name");
		}else if($("#paid").val() === ""){
			alert("Plaese eneter paid amount");
		}else{
            $.ajax({
                url : "sell_process.php",
                method : "POST",
                data : $("#get_order_data").serialize(),
                success : function(data){


                    if (data<0){
                        alert(data);
                    }else{
                        $("#get_order_data").trigger("reset");

                        if(confirm("Do you want to print bill?")){
                            window.location.href = "includes/print_invoice.php?invoice_no="+data+"&"+invoice;
                        }
                    }
  
                }
            });
        }
       
    });

}); 