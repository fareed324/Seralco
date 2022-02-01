
@extends('layouts.master')

@section('title', 'Merchant')

@section('content')

                     <div class="span4">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <!-- BEGIN GRID SAMPLE PORTLET-->
                        <div class="widget orange">
                            <div class="widget-title">
                                <h4><i class="icon-reorder"></i> All Merchants</h4>
                                        <span class="tools">
                                        <a class="icon-chevron-down" href="javascript:;"></a>
                                        <a class="icon-remove" href="javascript:;"></a>
                                        </span>
                            </div>
                            <div class="widget-body">
                                <code> class="span6" </code>
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
                                <code> class="span6" </code>
                            </div>
                        </div>
                        <!-- END GRID PORTLET-->
                    </div>


                    <div class="span11">
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
                                     <tr class="">
                                         <td><a href="#" title="Status" data-toggle="tooltip"> <span class="fa fa-pencil"></span> </a></td>
                                         <td>Alfred Jondi Rose</td>
                                         <td>1234</td>
                                         <td>1234</td>
                                         <td>1234</td>
                                         <td>1234</td>
                                         <td class="center">super user</td>
                                         <td><a class="edit" href="javascript:;">Edit</a></td>
                                         <td><a class="delete" href="javascript:;">Delete</a></td>
                                     </tr>
                                     
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
                     <!-- END EXAMPLE TABLE widget-->
@endsection
