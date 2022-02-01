
@extends('layouts.masterClone')

@section('title', 'Affiliate')

@section('content')

<!-- Included File - Affiliates -->
@include('affiliate.approve')
@include('affiliate.SetCommission')
@include('affiliate.Viewprofile')
@include('affiliate.adjustmoney')
@include('affiliate.remove')
@include('affiliate.Reject')
@include('affiliate.changepassword')

    <!-- Affiliate - Body -->
                <div class='row-fluid'>
                <div class="span4">
                        <!-- BEGIN GRID SAMPLE PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> All Affiliate (0)</h4>
                                        <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                        </span>
                            </div>
                            <div class="widget-body">
                            <ul class="unstyled icons">
                            <li><i class="icon-refresh"></i>  Pending (0)</li>
                            <li><i class="icon-check-sign"></i>  Approved (0)</li>
                            <li><i class="icon-remove-circle"></i>  Not Paid (0)</li>
                            <li><i class="icon-spinner"></i>  Waiting (0)</li>
                            <li><i class="icon-meh"></i>  Money Empty (0)</li>
                            <li><i class="icon-ban-circle"></i>  Suspended (0)</li>
                            
                        </ul>
                            </div>
                        </div>
                        <!-- END GRID PORTLET-->
                    </div>

                       <div class="span8">
                        <!-- BEGIN GRID SAMPLE PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> Help</h4>
                                        <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                        </span>
                            </div>
                            <div class="widget-body">
                            <ul class="unstyled icons">
                            <li><i class="icon-refresh"></i>  Affiliate has pending transactions </li>
                            <li><i class="icon-check-sign"></i>  Affiliate is approved to publish advertising links </li>
                            <li><i class="icon-remove-circle"></i>  Affiliate has registered, but doesn't complete the payment process </li>
                            <li><i class="icon-spinner"></i>  Affiliate is waiting for approval to publish advertising links </li>
                            <li><i class="icon-meh"></i>  Affiliate has no money in his account </li>
                            <li><i class="icon-ban-circle"></i>  Affiliate is blocked. Can't login </li>
                            
                        </ul>
                            </div>
                        </div>
                        <!-- END GRID PORTLET-->
                    </div>
</div>
<div class='row-fluid'>

 <!-- BEGIN EXAMPLE TABLE widget-->
 <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Affiliate</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                         </div>
                         <div class="widget-body">
                             <div>
                                 <div class="clearfix">
                                     <div class="btn-group">
                                         <button id="editable-sample_new" class="btn green">
                                             Add New <i class="icon-plus"></i>
                                         </button>
                                     </div>
                                     <div class="btn-group pull-right">
                                         <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                         </button>
                                         <ul class="dropdown-menu pull-right">
                                             <li><a href="#">Print</a></li>
                                             <li><a href="#">Save as PDF</a></li>
                                             <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                     </div>
                                 </div>
                                 <div class="space15"></div>
                                 @if( session()->has('success')) 
                             
                                 <div class="alert alert-block alert-success fade in">
                              <button data-dismiss="alert" class="close" type="button">×</button>
                              <p>
                              {{ session()->get('success')}}                              </p>
                               </div>
                                
                              
                                @endif
                                @if( session()->has('danger')) 
                                <div class="alert alert-block alert-danger fade in">
                              <button data-dismiss="alert" class="close" type="button">×</button>
                              <p>
                              {{ session()->get('danger')}}                              </p>
                               </div>
                                @endif

                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th>Status</th>
                                         <th>Affiliate</th>
                                         <th>Registered</th>
                                         <th>Pending</th>
                                         <th>Balance</th>
                                         <th>Action</th>
                                         <th>Notes</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($affiliates as $affiliate)
                                         
                                     <tr class="">
                                        <td class="hidden-phone">
                                     @if($affiliate->affiliate_status=='suspend')
                                         <span class="label label-inverse">Suspended</span>
                                         @elseif($affiliate->affiliate_status=='approved')
                                         <span class="label label-success">Approved</span>
                                         @elseif($affiliate->affiliate_status=='waiting')
                                         <span class="label label-warning">Waiting</span>
                                         @elseif($affiliate->affiliate_status=='empty')
                                         <span class="label label-secondary">Empty</span>
                                         @elseif($affiliate->affiliate_status=='NP')
                                         <span class="label label-danger">Not Paid</span>
                                         @endif
                                         </td>
                                         <!-- <td>{{$affiliate->affiliate_firstname}}</td> -->
                                         <td><a href="#affModelprofile{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal"> {{$affiliate->affiliate_firstname }} {{$affiliate->affiliate_lastname }}</a></td>
                                         <td>{{$affiliate->affiliate_date}}</td>
                                         <td>{{$affiliate->affiliate_group}}</td>
                                         <td>{{$affiliate->affiliate_currency}}</td>
                                        <td> 
                                         <!-- <td class="center">{{$affiliate->affiliate_firstname}}</td> -->
                                         <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-info btn-small dropdown-toggle">Select Action <span class="caret"></span></button>
                                             <ul class="dropdown-menu">

                                                    
                                         @if($affiliate->affiliate_status!="approved")
                                           <li><a href="#affModel{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Approve</a></li>
                                           <li><a href="#RejectAffiliate{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Reject</a></li>
                                           @endif
                                           @if($affiliate->affiliate_status=="approved")  
                                           <li><a href="{{route('Affiliate.suspend', $affiliate->affiliate_id)}}">Suspend</a></li>
                                           @endif
                                           <!-- <li><a href="{{route('Affiliate.removeAffiliateForm', $affiliate->affiliate_id)}}">Remove</a></li> -->
                                           <li><a href="#DeleteAffiliate{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Remove</a></li>
                                           <!-- <li><a href="{{route('Affiliate.changePasswordForm',$affiliate->affiliate_id)}}">Change Password</a></li> -->
                                           <li><a href="#changePasswordAffiliate{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Change Password</a></li>
                                           <!-- <li><a href="{{route('Affiliate.show' , $affiliate->affiliate_id)}}">View Profile</a></li> -->
                                           <li><a href="#affModelprofile{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">View Profile</a></li>
                                           <li><a href="{{route('Affiliate.paymentHistoryForm',$affiliate->affiliate_id)}}">Payment History</a></li>
                                           <li><a href="{{route('Affiliate.transactionForm', $affiliate->affiliate_id)}}">Transaction</a></li>
                                           <li><a href="#affModelprofile{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">View Profile</a></li>
                                           <li><a href="#affModeladjsmoney{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Adjust Money</a></li>

                                           <!-- <li><a href="{{route('Affiliate.adjustMoneyForm', $affiliate->affiliate_id)}}">Adjust Money</a></li> -->
                                           <!-- <li><a href="{{route('Affiliate.Setcommission')}}">Set Commission Group</a></li> -->
                                           <li><a href="#affModelset{{$affiliate->affiliate_id}}" role="button"  data-toggle="modal">Set Commission Group</a></li>
                                                </ul>
                                                </div>
                                            </td>
                                         <!-- <td><a class="edit" href="javascript:;">Edit</a></td> -->
                                         <!-- <td><a class="delete" href="javascript:;">Delete</a></td> -->
                                         <td><a class=" btn-link" href="javascript:;">Login</a></td>
                                     </tr>
                                     @endforeach
                                     
                                     </tbody>
                                     <tfoot>
                                     <tr>
                                         <th>Status</th>
                                         <th>Affiliate</th>
                                         <th>Registered</th>
                                         <th>Pending</th>
                                         <th>Balance</th>
                                         <th>Action</th>
                                         <th>Notes</th>
                                     </tr>
                                     </tfoot>
                                 </table>
                             </div>
                         </div>
                     </div>
</div>



@section('script')
<script>

    </script>
@endsection


@endsection