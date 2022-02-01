
@extends('layouts.masterClone')

@section('title', 'Payments')

@section('content')

<div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN TAB PORTLET-->
                    <div class="widget widget-tabs purple">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Payments</h4>
                        </div>
                        <div class="widget-body">
                            <div class="tabbable ">
                            
                                <ul class="nav nav-tabs">
                                    
                                <li><a href="#widget_tab1" data-toggle="tab">Invoice</a></li>   
                                <li><a href="#widget_tab2" data-toggle="tab">Reverse Recurring Sale </a></li>
                                <li><a href="#widget_tab3" data-toggle="tab">Reverse Sale</a></li>
                                <li><a href="#widget_tab4" data-toggle="tab"> Merchant Requests</a></li>
                                <li><a href="#widget_tab5" data-toggle="tab">Affiliate Requests</a></li>
                                   
                                    
                                    <!-- <li class="active"><a href="#widget_tab1" data-toggle="tab">Tab 1</a></li> -->
                                </ul>
                                
                                <div class="tab-content">
                                    <div class="tab-pane active" id="widget_tab1">
                                    <div class="widget-body">

                             <div>
                                 <div class="clearfix">
                                    <h3 style="color:green; text-algn:center; font-family:cambria; font-weight:bold;"> <u>CHOOSE BILLING PERIOD</u> </h3>
                                 <form action="#" method="GET" class="form-horizontal">
                              
                                @csrf
                                 <div class="control-group">
                                    <label class="control-label">From Date</label>
                                    <div class="controls">
                                        <input type="date" name='From' placeholder="From" class="input-medium" />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">To Date</label>
                                    <div class="controls">
                                        <input type="date" name='To' placeholder="To" class="input-medium" />
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <h4 style="color:green;font-family:cambria; font-weight:bold;"> <u> CHOOSE TYPE </u></h4>
                                <div class="control-group">
                                    <label class="control-label">Choose Type</label>
                                    <div class="controls">
                                        <select name='action'class="input-medium" >
                                        <option value="all">All</option>
                                            <option value="paid">Only Paid</option>
                                            <option value="unpaid">Only Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">  
                                        <button type='submit' class="btn btn-success" >Submit</button>
                                           
                                    </div>
                                </div>
                                
                                   </form>
                                 </div>
                                 
                             </div>
                         
                             @include("payment.invoice");
                         
                         </div>
                                       
                                    </div>
                                    <div class="tab-pane" id="widget_tab2">
                                    <p style="color:red; text-align:center">
                                           <!-- No Reverse of Record 2 -->
                                        </p>
                                        @include("payment.ReverseRecurringSale");
                                    </div>
                                    <div class="tab-pane" id="widget_tab3">
                                    <p style="color:red; text-align:center">
                                           <!-- No Reverse of Record 3 -->
                                        </p>
                                        @include("payment.ReverseSale");
                                    </div>
                                    <div class="tab-pane" id="widget_tab4">
                                    <p style="color:red; text-align:center">
                                           <!-- No Reverse of Record 4 -->
                                        </p>
                                        @include("payment.merchantReq")
                                    </div>
                                    <div class="tab-pane" id="widget_tab5">
                                    <p style="color:red; text-align:center">
                                           <!-- No Reverse of Record 5 -->
                                        </p>
                                        @include("payment.affiliateReq")
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TAB PORTLET-->
                </div>
              
     
         </div>
@endsection