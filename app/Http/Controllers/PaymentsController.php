<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
   // payment History

    public function paymentHistoryForm (){
      $datas = DB::table('partners_transaction')
      // ->join('partners_affiliate', 'partners_transaction.transaction_parentid', '=', 'partners_affiliate.affiliate_id')
      ->join('partners_joinpgm', 'partners_transaction.transaction_joinpgmid', '=', 'partners_joinpgm.joinpgm_id')
      ->select('partners_transaction.*','partners_joinpgm.*', "partners_transaction.transaction_reversedate as date")
      ->get();

 if($datas){
    $merchant_ID= $datas[0]->joinpgm_merchantid;
    $affiliate_ID= $datas[0]->joinpgm_affiliateid;
    $transaction_parent_ID= $datas[0]->transaction_parentid;
    
   $merchants = DB::table('partners_merchant')
   ->where(['merchant_id'=> $merchant_ID])->get();

   // $merchants_invoice = DB::table('partners_invoice')
   // ->where(['merchant_id'=> $merchant_ID])->get();

   $affiliates = DB::table('partners_affiliate')
   ->where(['affiliate_id'=> $transaction_parent_ID])->get();

 }
      return view("payment.index",compact('affiliates','merchants','datas'));
      return compact('affiliates','merchants','datas');
   }
  
  public function paymentHistoryByDate (Request $request,$id){
  

      $data = DB::
          select("select *,date_format(transaction_dateofpayment,'%d/%M/%y') as date 
          from partners_transaction,partners_joinpgm where transaction_joinpgmid=joinpgm_id 
          and joinpgm_merchantid='$id' and transaction_dateofpayment <> '0000-00-00'  and 
          transaction_status <> 'pending' and transaction_dateofpayment between '$request->From' and '$request->To'
          ORDER BY transaction_dateofpayment DESC
          "
          );
      $merchants = DB::
          select("select *,date_format(adjust_date,'%d/%M/%Y') AS DATE
           from partners_adjustment,partners_merchant where merchant_id=adjust_memberid 
           and adjust_flag like 'm' and adjust_memberid='$id' and adjust_date between '$request->From' and '$request->To'
           order by adjust_date desc 
          "
          );
          
         //  if($data){
         //      $ID=$data[0]->joinpgm_affiliateid;

         //   $affiliate = DB::table('partners_affiliate')
         //  ->where(['affiliate_id'=> $ID])->get();
         //      return view('affiliate.paymenthistory',compact('data', 'merchants' ,'affiliate'));
         //  }
         //  else{
          
         //      return view('affiliate.paymenthistory',compact('data', 'merchants'))->with('message', 'No Data to Show');
         //  }
 
      
      dd($users);

  }
  public function RecuringReverseSale(){
   $datas = DB::table('partners_transaction')
      ->join('partners_recur', 'partners_transaction.transaction_joinpgmid', '=', 'recur_transactionid=transaction_id')
      ->join('partners_recurpayments', 'recurpayments_recurid=recur_id ', '=', 'recurpayments_status=reversed')
      ->select('partners_transaction.*','partners_recur.*','partners_recurpayments.*', "partners_transaction.transaction_reversedate as date")
      ->get();
   $check=DB::
         select("select * from partners_transaction T, partners_joinpgm J, partners_recur R, partners_recurpayments P ".
         " where T.transaction_joinpgmid=J.joinpgm_id AND  R.recur_transactionid=T.transaction_id AND ".
         " R.recur_status='Active' AND R.recur_id=P.recurpayments_recurid AND  ".
         " P.recurpayments_status='reverserequest' ");

      if($datas)
      {
         $partner_recur=DB::table('partners_recur')->
         where(['recur_id'=>$recure_id])->get();
         
         $partners_recurpayments=DB::table('partners_recurpayments')->
         where(['recurpayments_id'=>$recurpayments_id])->get();
         
         $affiliates = DB::table('partners_affiliate')
         ->where(['affiliate_id'=> $transaction_parent_ID])->get();
         
         $merchants = DB::table('partners_merchant')
         ->where(['merchant_id'=> $merchant_ID])->get();
      }
      //return view("payment.index",compact("partner_recur","partners_recurpayments"));
      return compact("partner_recur","partners_recurpayments");
  }
  public function ReverseSale(){
     $Sale=DB::table("partners_transaction")
     ->join('','');
  }
}
