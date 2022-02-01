
<fieldset>
    <legend>
        <center><strong style="font-family:Cambria; font-size:26px; color:grey;">Reverse Sale</strong></center>
    </legend>

 </fieldset>

        @if(session()->has('message'))
    <tr>
        <td>  
            <div class="alert alert-danger">
                 {{ session()->get('message') }} No data Found
            </div>
        </td>
    </tr>     
        @else
            <div class='row-fluid'> 
           
          <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget yellow">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Account Details ( Related To Transaction )</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                <table class='table table-hover table-striped'>
                                   <thead>
                                       <th>Affiliate</th>
                                       <th>Merchant</th>
                                       <th>Date of Payment</th>
                                       <th>Transaction</th>
                                       <th>Amount</th>
                                       
                                       
                                   </thead>
                                   <tbody>
                                  
                                       @foreach($datas as $data)
                                       <tr>
                                          
                                           <td>Andrew Reeve</td>
                                           <td>	Honey Luvnuts</td>
                                           <td>{{$data->transaction_dateofpayment}}</td>
                                           <td>{{$data->transaction_type}}</td>
                                           <td>£{{$data->transaction_reverseamount }}</td>
                                       </tr>
                                       @endforeach

                                   </tbody>
                                   <tfoot>
                                       <th>Affiliate</th>
                                       <th>Merchant</th>
                                       <th>Date of Payment</th>
                                       <th>Transaction</th>
                                       <th>Amount</th>
                                   </tfoot>
                                </table>
                                
                                 </div>
                                    
                             </div>
                         </div>
                     </div>
         </div>
            </div>
        @endif

