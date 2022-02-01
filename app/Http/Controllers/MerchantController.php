<?php

namespace App\Http\Controllers;

use App\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');

    }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchants = Merchant::all();
        return view('merchant.index', compact('merchants'));
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
        $validatedData = $request->validate([
            'firstname' => 'required|max:15|string',
            'lastname' => 'required|max:15|string',
            'profileimage' => 'required|max:255',
            'company' => 'required|max:100|string',
            'address' => 'required|max:255',
            'city' => 'required|max:30|string',
            'country' => 'required|max:30|string',
            'phone' => 'required|max:20',
            'url' => 'required|max:255',
            'catagory' => 'required|max:20|string',
            'status' => 'required|max:10',
            'date' => 'required|max:30',
            'fax' => 'required|max:30',
            'type' => 'required|max:20',
            'randNo' => 'required|max:100',
            'pgmapproval' => 'required|max:15',
            'currency' => 'required|max:100',
            'state' => 'required|max:100',
            'zip' => 'required|max:100',
            'taxId' => 'required|max:20',
            'orderId' => 'required|max:20',
            'saleAmt' => 'required|max:255',
            'isInvoice' => 'required|max:10',
            'invoiceStatus' => 'required|max:20',
            'headercode' => 'required|max:255',
            'footercode' => 'required|max:255',
            
        ]);


        $merchant=new Merchant;
        $merchant->firstname=$request->firstname;
        $merchant->lastname=$request->lastname;
        $merchant->profileimage=$request->profileimage;
        $merchant->company=$request->company;
        $merchant->address=$request->address;
        $merchant->city=$request->city;
        $merchant->country=$request->country;
        $merchant->phone=$request->phone;
        $merchant->url=$request->url;
        $merchant->catagory=$request->catagory;
        $merchant->status=$request->status;
        $merchant->date=$request->date;
        $merchant->fax=$request->fax;
        $merchant->type=$request->type;
        $merchant->randNo=$request->randNo;
        $merchant->pgmapproval=$request->pgmapproval;
        $merchant->currency=$request->currency;
        $merchant->state=$request->state;
        $merchant->zip=$request->zip;
        $merchant->taxId=$request->taxId;
        $merchant->orderId=$request->orderId;
        $merchant->saleAmt=$request->saleAmt;
        $merchant->isInvoice=$request->isInvoice;
        $merchant->invoiceStatus=$request->invoiceStatus;
        $merchant->headercode=$request->headercode;
        $merchant->footercode=$request->footercode;
        $merchant->save();
        return redirect()->route('merchant.index')
                        ->with('success','Merchant created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant, $id)
    {
        $merchant=Merchant::find($id);
        return view('merchant.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant, $id)
    {
        $merchant=Merchant::find($id);
        return view('merchant.edit', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merchant $merchant, $id)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|max:15|string',
            'lastname' => 'required|max:15|string',
            'profileimage' => 'required|max:255',
            'company' => 'required|max:100|string',
            'address' => 'required|max:255',
            'city' => 'required|max:30|string',
            'country' => 'required|max:30|string',
            'phone' => 'required|max:20',
            'url' => 'required|max:255',
            'catagory' => 'required|max:20|string',
            'status' => 'required|max:10',
            'date' => 'required|max:30',
            'fax' => 'required|max:30',
            'type' => 'required|max:20',
            'randNo' => 'required|max:100',
            'pgmapproval' => 'required|max:15',
            'currency' => 'required|max:100',
            'state' => 'required|max:100',
            'zip' => 'required|max:100',
            'taxId' => 'required|max:20',
            'orderId' => 'required|max:20',
            'saleAmt' => 'required|max:255',
            'isInvoice' => 'required|max:10',
            'invoiceStatus' => 'required|max:20',
            'headercode' => 'required|max:255',
            'footercode' => 'required|max:255',
            
        ]);


        $merchant=Merchant::find($id);
        $merchant->firstname=$request->firstname;
        $merchant->lastname=$request->lastname;
        $merchant->profileimage=$request->profileimage;
        $merchant->company=$request->company;
        $merchant->address=$request->address;
        $merchant->city=$request->city;
        $merchant->country=$request->country;
        $merchant->phone=$request->phone;
        $merchant->url=$request->url;
        $merchant->catagory=$request->catagory;
        $merchant->status=$request->status;
        $merchant->date=$request->date;
        $merchant->fax=$request->fax;
        $merchant->type=$request->type;
        $merchant->randNo=$request->randNo;
        $merchant->pgmapproval=$request->pgmapproval;
        $merchant->currency=$request->currency;
        $merchant->state=$request->state;
        $merchant->zip=$request->zip;
        $merchant->taxId=$request->taxId;
        $merchant->orderId=$request->orderId;
        $merchant->saleAmt=$request->saleAmt;
        $merchant->isInvoice=$request->isInvoice;
        $merchant->invoiceStatus=$request->invoiceStatus;
        $merchant->headercode=$request->headercode;
        $merchant->footercode=$request->footercode;
        $merchant->update();
        return redirect()->route('merchant.index')
                        ->with('success','Merchant Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant,$id)
    {
        $toDelete = Merchant::find($id);
        $toDelete->delete();
        return redirect()->route('merchant.index')->with('success', 'Merchant deleted!');
    }
}
