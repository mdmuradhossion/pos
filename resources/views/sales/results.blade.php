                            
<form action="{{url('/saleAddToCart')}}" method="post">
    @csrf 
    <table class="table table-striped table-bordered zero-configuration">
        
        <tbody>
            @foreach($query as $view)
            <tr>
                
                <td>
                    <?php if($view->image != NULL){
                    echo '<img src="/Uplodes/product/'.$view->image.'" width="60" class="img-radius">';
                    }else{ 
                    echo '<img src="/Uplodes/product/noimage.jpg" width="60" class="img-radius">';
                     } ?>                               
                 </td>

                 <td>{{$view->name}} <input type="hidden" class="form-control" name="name" value="{{$view->name}}"></td>
                <td><input type="number" class="form-control" name="qty" value="1"></td>
                <td>{{$view->selling_price}} <input type="hidden" class="form-control" name="price" value="{{$view->selling_price}}"> <input type="hidden" class="form-control" name="productId" value="{{$view->prod_id}}"></td>
                <td><button type="submit" class="btn btn-primary">Add to cart</button></td>
            </tr>@endforeach  
        </tbody>
    </table>
</form>