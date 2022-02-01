<?php

namespace App\Http\Controllers;

use App\Affiliate;
use Illuminate\Http\Request;
use App\Login;
use Illuminate\Support\Facades\DB;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $affiliates = DB::table('partners_affiliate')->get();
        // ->orderByRaw('affiliate_id DESC')

       
        $affiliateGroups = DB::table('partners_affiliategroup')
        ->get();

        $loginData = DB::table('partners_login')
        ->  where(['login_flag'=>'a'])->get();
        
        $datas = DB::table('affiliate_pay')->get();
        
        // return $datas;
        return view('affiliate.index', compact('affiliateGroups','affiliates', 'loginData','datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function show(Affiliate $affiliate,$id)
    {
        $affiliate=Affiliate::find($id);
        return view('affiliate.show', compact('affiliate'));
    }

    public function Reject(Affiliate $affiliate,$id)
    {
        $affiliate=Affiliate::find($id);
        return view('affiliate.Reject', compact('affiliate'));
    }
    public function Remove(Affiliate $affiliate,$id)
    {
        $affiliate=Affiliate::find($id);
        return view('affiliate.Remove', compact('affiliate'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */


    public function changePasswordForm($id)
    {
       
        $loginData = Login::
                where(['login_id'=> $id , 'login_flag'=>'a'])->get();
        return view('affiliate.changepassword',compact('loginData'));
        // return $loginData;
        // echo dd($loginData);
        
    }
    public function changePassword(Request $request, Login $login , $id){

        $validatedData = $request->validate([
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data=Login::
        where(['login_id'=> $id , 'login_flag'=>'a'])
        ->limit(1)
        ->update(array('login_password'=>$request->password));
       
        return redirect()->route('Affiliate.index');
    }

    // Adjust Money
    public function adjustMoneyForm ($id){
        $data = DB::table('affiliate_pay')->
        where(['pay_affiliateid'=> $id])->first();
   
        return view('affiliate.adjustmoney',['data'=>$data]);

    }
    public function adjustMoney(Request $request, $id){

        $validatedData = $request->validate([
            
            'pay_amount' => ['required'],
            'old_pay_amount' => ['required'],
        ]);
        $data = DB::table('affiliate_pay')->
        where(['pay_affiliateid'=> $id])->first();
        if($request->action=='add'){
          $data->pay_amount=$data->pay_amount + (int)$request->pay_amount;
          DB::table('affiliate_pay')
        ->where(['pay_affiliateid'=> $id])
        ->limit(1)
        ->update(array('pay_amount'=>$data->pay_amount));
          return redirect()->route('Affiliate.index');
        }
        if($request->action=='deduct'){
            $validatedData = $request->validate([
            
                'pay_amount' => ['required', 'lte:old_pay_amount'],
                'old_pay_amount' => ['required'],
            ]);
            
            $data->pay_amount=$data->pay_amount - (int)$request->pay_amount;
            DB::table('affiliate_pay')
        ->where(['pay_affiliateid'=> $id])
        ->limit(1)
        ->update(array('pay_amount'=>$data->pay_amount));
            return redirect()->route('Affiliate.index');
        }


    }
    // payment History

    public function paymentHistoryForm ($id){
        
        $data = DB::
            select("select *,date_format(transaction_dateofpayment,'%d/%M/%y') as date 
            from partners_transaction,partners_joinpgm where transaction_joinpgmid=joinpgm_id 
            and joinpgm_merchantid='$id' and transaction_dateofpayment <> '0000-00-00'  and 
            transaction_status <> 'pending' ORDER BY transaction_dateofpayment DESC
            "
            );
        $merchants = DB::
            select("select *,date_format(adjust_date,'%d/%M/%Y') AS DATE
             from partners_adjustment,partners_merchant where merchant_id=adjust_memberid 
             and adjust_flag like 'm' and adjust_memberid='$id' order by adjust_date desc
            "
            );
            if($data){
            $ID=$data[0]->joinpgm_affiliateid;
            $affiliate = DB::table('partners_affiliate')
            ->where(['affiliate_id'=> $ID])->get();
            return view('affiliate.paymenthistory',compact('data', 'merchants' ,'affiliate'));
        // dd($data);
             }
            else{
                return view('affiliate.paymenthistory',compact('data', 'merchants'));
                }
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
            
            if($data){
                $ID=$data[0]->joinpgm_affiliateid;

             $affiliate = DB::table('partners_affiliate')
            ->where(['affiliate_id'=> $ID])->get();
                return view('affiliate.paymenthistory',compact('data', 'merchants' ,'affiliate'));
            }
            else{
            
                return view('affiliate.paymenthistory',compact('data', 'merchants'))->with('message', 'No Data to Show');
            }
   
        
        // dd($data);

    }

    // Transaction

    public function transactionForm ($id){
        
        $data = DB::
             select("SELECT *, date_format(transaction_dateoftransaction,'%d, %m %Y') AS DATE 
             FROM partners_transaction AS t, partners_joinpgm AS j,  partners_merchant as a where merchant_id='$id'
            AND t.transaction_joinpgmid = j.joinpgm_id AND j.joinpgm_merchantid=a.merchant_id
             "
             );
             $ID=$data[0]->joinpgm_affiliateid;
           
             if($data){
                $ID=$data[0]->joinpgm_affiliateid;

             $affiliate = DB::table('partners_affiliate')
             ->where(['affiliate_id'=> $ID])->get();
       
         return view('affiliate.transaction',['data'=>$data , 'affiliate'=>$affiliate]);
        
        }
        else{
        
            return view('affiliate.transaction',compact('data', 'affiliate'))->with('message', 'No Data to Show');
        }

     }

     public function approveIt(Request $request)
     {
        // echo "Your desired ID is :".$request->consAff."Mafe: ".$request->group; 
 
        $check=DB::table('partners_affiliate')
        ->where(['affiliate_id'=> $request->consAff])
        ->limit(1)
        ->update(array('affiliate_status'=>'approved', 'affiliate_parentid'=>'0'));
 
        if($check){
         return redirect()->route('Affiliate.index')
         ->with('message', 'Affiliate Account Approved and Tier Commission Group Assigned');
     }
     else{
         return redirect()->route('Affiliate.index')
         ->with('message', 'Affiliate Account Approved and Tier Commission Group Not Assigned');
          }
     }

     public function setcommission(Request $request ,$id)
     {
        $checkRecord=DB::table('partners_affiliate')
        ->where([
            'affiliate_id'=> $request->consAff,
            'affiliate_group'=>$request->groupId,
        ])
        ->exists(1);
        
         if(!$checkRecord){
    $check=DB::table('partners_affiliate')
    ->where(['affiliate_id'=> $request->consAff])
    ->limit(1)
    ->update(array('affiliate_group'=>$request->groupId));
    if($check){
        return redirect()->route('Affiliate.index')
        ->with('success', 'Tier Commission Group Assigned to Affiliate');
    }
    else{
        // return $request;
        return redirect()->route('Affiliate.index')
        ->with('danger', 'Error : Tier Commission Group Not Assigned to Affiliate');
    }

          }
          else{
            // return $request;
            return redirect()->route('Affiliate.index')
            ->with('danger', 'Tier Commission Group Already Assigned to Affiliate');
        }
    
       

        
        
    
     }
 


    // echo "Your desired ID is :".$request->consAff."Mafe: ".$request->group;
    //  public function approve($id)
    //  {
    //     $check=DB::table('partners_affiliate')
    //     ->where(['affiliate_id'=> $id])
    //     ->limit(1)
    //     ->update(array('affiliate_status'=>'approved'));

    //     if($check){
    //         return redirect()->route('Affiliate.index')
    //         ->with('message', 'Affiliate Account Approved and Tier Commission Group Assigned');
    //     }
    //     else{
    //         return redirect()->route('Affiliate.index')
    //         ->with('message', 'Affiliate Account Approved and Tier Commission Group Not Assigned');
    //     }
    //  }
    
     public function suspend($id)
     {
        $check=DB::table('partners_affiliate')
        ->where(['affiliate_id'=> $id])
        ->limit(1)
        ->update(array('affiliate_status'=>'suspend'));

        if($check){
            return redirect()->route('Affiliate.index');
            // ->with('message', 'Suspended');
        }
        else{
            return redirect()->route('Affiliate.index')
            ->with('message', 'Error in Suspended');
        }
     }

     
     public function removeAffiliateForm($id)
     {
         return view('Affiliate.remove',compact('id'));
     }
     public function removeAffiliate($id)
     {
         DB::table('partners_affiliate')->where('affiliate_id', '=', $id)->delete();
         DB::table('partners_login')->where('login_id', '=', $id)->delete();
         DB::table('affiliate_pay')->where('pay_affiliateid', '=', $id)->delete();
         DB::table('partners_adjustment')->where('adjust_memberid', '=', $id)->delete();
         DB::table('partners_fee')->where('adjust_memberid', '=', $id)->delete();
         
 
         return redirect()->route('Affiliate.index')->with('message','Affiliate Removed Permanently');
     }


    public function edit(Affiliate $affiliate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Affiliate $affiliate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Affiliate $affiliate,$id)
    {
        $toDelete = DB::table('partners_affiliate')->where('affiliate_id',$id)->delete(); 
        return redirect()->route('Affiliate.index')->with('success', 'Affiliate Deleted!');
    }
  
}
