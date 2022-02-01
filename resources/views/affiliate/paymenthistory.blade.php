
@extends('layouts.masterClone')

@section('title', 'Affiliate Payment History')

@section('content')
 <h4>Payment History</h4>
                                    @if(session()->has('message'))
                                      <div class="alert alert-danger">
                                             {{ session()->get('message') }} No data
                                             </div>
                                             @endif
<div class='row-fluid'> 
          <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget green">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Statistics For Custom Period</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                    
                                 <form action="{{route('Affiliate.paymentHistoryByDate',1)}}" method="POST" class="form-horizontal">
                                  @csrf
                                
                                 <div class="control-group">
                                    <label class="control-label">From Date</label>
                                    <div class="controls">
                                        <input type="date" name='From' placeholder="From" class="input-medium" />
                                        <span class="help-inline">Some hint here</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">To Date</label>
                                    <div class="controls">
                                        <input type="date" name='To' placeholder="To" class="input-medium" />
                                        <span class="help-inline">Some hint here</span>
                                    </div>
                                </div>
                             
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <button type='submit' class="btn btn-success" >View</button>
                                           
                                    </div>
                                </div>
                                
                                   </form>
                                 </div>
                                 
                                
                                 
                             </div>
                         </div>
                     </div>
</div>
            </div>

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
                                       <th>Date of Payment</th>
                                       <th>Transaction</th>
                                       <th>Amount</th>
                                       
                                       
                                   </thead>
                                   <tbody>
                                   @if(session()->has('message'))
                                   <tr>
                                         <td>   <div class="alert alert-danger">
                                             {{ session()->get('message') }} No data
                                             </div></td>
                                        
                                  </tr>
                                         
                                     @else
                                       @foreach($data as $datas)
                                       <tr>
                                          
                                           <td>{{$affiliate[0]->affiliate_firstname}} {{$affiliate[0]->affiliate_lastname}}</td>
                                           <td>	{{$datas->date}}</td>
                                           <td>{{$datas->transaction_type}}</td>
                                           <td>{{$datas->transaction_amttobepaid + $datas->transaction_admin_amount }}</td>
                                       </tr>
                                       @endforeach
                                      
                                       
                                 @endif

                                   </tbody>
                                   <tfoot>
                                       
                                       <th>Affiliate</th>
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
            <div class='row-fluid'> 
          <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Account Details ( Withdrawn / Deposited )</h4>
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
                                       <th>Merchant</th>
                                       
                                       <th>Date of Payment</th>
                                       <th>Transaction</th>
                                       <th>Amount</th>
                                   </thead>
                                   <tbody>
                                   @if(session()->has('message'))
                                     <tr>
                                         <td>   <div class="alert alert-danger">
                                             {{ session()->get('message') }} No data
                                             </div></td>
                                        
                                        </tr>      
                                         
                                     @else
                                   @foreach($merchants as $merchant)
                                       <tr>
                                          
                                           <td>{{$merchant->merchant_firstname}} {{$merchant->merchant_lastname}}</td></td>
                                           <td>	{{$merchant->DATE}}</td>
                                           <td>{{$merchant->adjust_action}}</td>
                                           <td>£ {{$merchant->adjust_amount }}</td>
                                       </tr>
                                       @endforeach
                                      @endif 
                                   </tbody>
                                   <tfoot>
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
@endsection
