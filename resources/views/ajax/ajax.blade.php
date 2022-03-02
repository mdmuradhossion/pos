<script type="text/javascript">
	
    $(document).ready(function () {
        $('#select-state').selectize({
            sortField: 'text'
        });
    });




	//sub category search (start)	
	$('#cat_id').on('change', function() {
        $id = $(this).val();
        $.ajax({
        	type: 'get',
        	url: '{{URL::to('/subcategorysearch')}}',
        	data: {'id':$id},
        	success:function(data){        		
        		$('#subCat').html(data);
        	} 
        });
        // alert("Ok");
    });
    //sub category search (end)




    //sale vat calculet (sart)
    function salevat(){
        var vattotal;
        var vatprice;
        var value = $("#vat").val();
        var totalprice = $('#grandtotal').val();
        if (value != 0) {
            vattotal = (totalprice * value) / 100;
            vatprice = +totalprice+vattotal;            
        }
        $("#total").val(vatprice); 
        $("#totalDue").val(vatprice);         
    }
    $(document).on( 'input', '.vat', function(){ salevat(); } );    
    //sale vat calculet (end)







    //purchase Total Due calculet (start)
    function purchaseTotalDue(){
        var dueTotal ;
        var totalPrice = $('#total').val();
        var totalPay = $("#totalPay").val();
        
        dueTotal = totalPrice - totalPay;
        $("#totalDue").val(dueTotal);  
        // $("#totalAmountDue").val(sub);      
    }
    $(document).on( 'input', '.totalPay', function(){ purchaseTotalDue(); } );    
	//purchase Total Due calculet (end)






    //suppliers ledger search (start)
    $('.supp_id').on('change', function() {
        $id = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('/suppliLedgSearch')}}',
            data: {'id':$id},
            success:function(data){             
                $('#suppLedg').html(data);
            } 
        });
    });
    //suppliers ledger search (end)







    //customer ledger search (start)
    $('.cus_id').on('change', function() {
        $id = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('/customerLedgSearch')}}',
            data: {'id':$id},
            success:function(data){             
                $('#custLedg').html(data);
            } 
        });
        // alert($id);
    });
    //customer ledger search (end)







    //Account holder ledger search (start)
    $('.acch_id').on('change', function() {
        $id = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('/accountholderLedgSearch')}}',
            data: {'id':$id},
            success:function(data){             
                $('#accoundLedg').html(data);
            } 
        });
        // alert($id);
    });
    //Account holder ledger search (end)





    // product search (sale)keypress
    $('#keyword').on('input', function() {
        $keyword = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('/productSearch')}}',
            data: {'keyword':$keyword},
            success:function(data){             
                $('#result').html(data);
            } 
        });
    });
    // product search (end)



    // sale customer validate (start)
    $('#customarValid').on('change', function() {
        var butn = '<button type="submit" class="btn btn-outline-info">Sales</button>';
        var value = $(this).val();
        if (value != 0) { $('#reg').html(butn).fadeIn();}else{ $('#reg').html('<div class="alert alert-danger">Please Select Customer!</div>');
        } 
    });

    $('#customerName').on('input', function() {
        var butn = '<button type="submit" class="btn btn-outline-info">Sales</button>';
        var value = $(this).val();
        var due = $('#totalDue').val(); 

        if (due == 0) {$('#reg').html(butn).fadeIn();}else{ $('#reg').html('<div class="alert alert-danger">Please clear Due & Input Customer Name!</div>');
            $('#customerName').val('');
        }
        if (value == 0) { $('#reg').html('<div class="alert alert-danger">Please Input Customer Name!</div>');

        }
    });
    // sale customer validate (end)

</script>