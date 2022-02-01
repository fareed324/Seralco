
<fieldset>
    <legend>
        <strong style="font-family:Cambria; font-size:26px; color:grey;">Invoices History</strong>
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
                                       <th>Invoice Id</th>
                                       <th>Invoice Merchant Id</th>
                                       <th>Invoice Date</th>
                                       <th>Invoice Amount</th>
                                       <th>Invoice Paid Status</th>
                                       
                                       
                                   </thead>
                                   <tbody>
                                  
                                       @foreach($datas as $data)
                                       <tr>
                                          
                                           <td>2</td>
                                           <td>{{$merchants[0]->merchant_id}}</td>
                                           <td>{{$data->transaction_dateofpayment}}</td>
                                           <td>£{{$data->transaction_reverseamount }} </td>
                                           <td>{{$data->transaction_type}}</td>
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

