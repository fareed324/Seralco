<?php use Illuminate\Support\Facades\DB;


?>
@extends('layouts.masterClone')

@section('title', 'Affiliate Transactions')

@section('content')
 <h4>Payment History</h4>
<div class='row-fluid'> 
          <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget green">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Transactins</h4>
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
                                      
                                       <th>Type</th>
                                       <th>Merchant</th></th>
                                       <th>Affiliate</th>
                                       <th>Comission</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       
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
                                          
                                           <td>{{$datas->transaction_type}}</td>
                                           <td>{{$datas->merchant_company}}</td>
                                           <td>{{$affiliate[0]->affiliate_company}}</td>
                                           <td>£ {{$datas->transaction_amttobepaid}}</td>
                                           <td>{{$datas->DATE}}</td>
                                           <td>{{$datas->transaction_status}}</td>
                                       </tr>
                                       @endforeach
                                       @endif
                                   </tbody>
                                   <tfoot>
                                       
                                        <th>Type</th>
                                       <th>Affiliate</th></th>
                                       <th>Affiliate</th>
                                       <th>Comission</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                   </tfoot>
                                </table>
                                 </div>
                                 
                                
                                 
                             </div>
                         </div>
                     </div>
</div>
            </div>

           
@endsection
