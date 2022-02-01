<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Affiliate;

class AffiliateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=10 ; $i++){
          
            $array = ['approved', 'waiting','suspend','empty','NP'];
            $IsInv = ['Yes', 'No',];
            $pgm = ['manual', 'automatic',];
            $stat=['active', 'inactive'];
    
            $random = Arr::random($array);
            $affiliate= new Affiliate;
            $affiliate->affiliate_firstname='John';
            $affiliate->affiliate_lastname='Wick';
            $affiliate->affilate_profileimage='john.jpg';
            $affiliate->affiliate_company='Drag';
            $affiliate->affiliate_address='sdfsdf';
            $affiliate->affiliate_city='ulceby';
            $affiliate->affiliate_country='United Kingdom';
            $affiliate->affiliate_phone='07590124488';
            $affiliate->affiliate_url='honeyluvnuts.co.uk';
            $affiliate->affiliate_category='Finance & Legal';
            // $affiliate->affiliate_status= Arr::random($array);
            $affiliate->affiliate_date='2020-03-28';
            $affiliate->affiliate_fax='adr';
            $affiliate->affiliate_timezone='01:12:56';
            $affiliate->affiliate_secretkey='M_14pR5gG0rM4rR';
            // $affiliate->affiliate_pgmapproval=Arr::random($pgm);
            $affiliate->affiliate_currency='Euro';
            $affiliate->affiliate_state='adr';
            $affiliate->affiliate_zipcode='dn39 6uq';
            $affiliate->affiliate_taxId='12321321';
            // $affiliate->affiliate_orderId='{orderid}';
            // $affiliate->affiliate_saleAmt='{amount}';
            // $affiliate->affiliate_isInvoice=Arr::random($IsInv);
            // $affiliate->affiliate_status=Arr::random($stat);
            // $affiliate->affiliate_headercode='NULL';
            // $affiliate->affiliate_footercode='NULL';
            $affiliate->save();
             }
    }
}
