
@extends('layouts.masterClone')

@section('title', 'Merchant')

@section('content')
<div class='row-fluid'> 
                     <div class="span6">
                        <!-- BEGIN GRID SAMPLE PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> All Merchants (0)</h4>
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

                       <div class="span6">
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
                            <li><i class="icon-refresh"></i>  Merchant has pending transactions </li>
                            <li><i class="icon-check-sign"></i>  Merchant is approved to publish advertising links </li>
                            <li><i class="icon-remove-circle"></i>  Merchant has registered, but doesn't complete the payment process </li>
                            <li><i class="icon-spinner"></i>  Merchant is waiting for approval to publish advertising links </li>
                            <li><i class="icon-meh"></i>  Merchant has no money in his account </li>
                            <li><i class="icon-ban-circle"></i>  Merchant is blocked. Can't login </li>
                            
                        </ul>
                            </div>
                        </div>
                        <!-- END GRID PORTLET-->
                    </div>
</div>

         <div class='row-fluid'>


                    <div class="span12">
                     <!-- BEGIN EXAMPLE TABLE widget-->
                     <div class="widget red">
                         <div class="widget-title">
                             <h4><i class="icon-reorder"></i> Merchants</h4>
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
                                 <a id='Action' href='/'>Ok</a>
                                 <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                     <thead>
                                     <tr>
                                         <th>Status</th>
                                         <th>Merchant</th>
                                         <th>CRM</th>
                                         <th>PGM Approvel</th>
                                         <th>Registered</th>
                                         <th>Pending</th>
                                         <th>Balance</th>
                                         <th>Action</th>
                                         <th>Notes</th>
                                     </tr>
                                     </thead>
                                     <tbody>
                                         @foreach ($merchants as $merchant)
                                     <tr class="">
                                         <td><li> <i class="fa fa-pencil"></i> </li></td>
                                         <td>{{$merchant->merchant_firstname}}</td>
                                         <td><a href='#'>CRM</a></td>
                                         <td>{{$merchant->merchant_firstname}}</td>
                                         <td>{{$merchant->merchant_pgmapprovel}}</td>
                                         <td></td>
                                         <td class="center">{{$merchant->merchant_firstname}}</td>
                                         <td>
                                             <select class="text-sm Actions input-small m-wrap" tabindex="1">
                                            <option >Select Action</option>
                                            <option value="{{Route('Merchant.index')}}">Adjust Money</option>
                                            <option value="Category 3">Paymeny History</option>
                                            <option value="Category 4">Transaction</option>
                                            <option value="Category 4">Approve</option>
                                            <option value="Category 4">Remove</option>
                                            <option value="Category 4">Change Password</option>
                                            <option value="Category 4">View Profile</option>
                                            <option value="Category 4">Change PGM Approvel</option>
                                            <option value="Category 4">Avtivate Invoice Status</option>
                                        </select>
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
                                         <th>Merchant</th>
                                         <th>CRM</th>
                                         <th>PGM Approvel</th>
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
                     <!-- END EXAMPLE TABLE widget-->
                     
@endsection
@section('script')
@parent
@endsection