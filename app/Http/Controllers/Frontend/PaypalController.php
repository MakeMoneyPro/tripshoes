<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paypalpayment;
use App\Repositories\Eloquent\BookingRepositoryEloquent;
use Auth;
use App\Models\Booking;
use App\Models\Promo;
use URL;
use Session;
use Redirect;
use Stripe\Stripe;
use Stripe\Charge;

class PaypalController extends Controller
{
	private $_apiContext;
	public function __construct(BookingRepositoryEloquent $bookinfo){
		 $this->_apiContext = Paypalpayment::apiContext(config('paypal_payment.Account.ClientId'), config('paypal_payment.Account.ClientSecret'));
        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'Http.ConnectionTimeOut' => 30,
            'Http.Retry' => 1,
            'Service.EndPoint' => 'https://api.sandbox.paypal.com',
            'Log.LogEnabled' => true,
            'Log.FileName' => __DIR__.'/../PayPal.log',
            'Log.LogLevel' => 'FINE'
        ));
        $this->bookinfo = $bookinfo;
	}
    public function postPayment(Request $request){
        /*$expire_month = $request->get('expire_month');
        $expire_year = $request->get('expire_year');
        $code = $request->get('code');
        $name_card = $request->get('name_card');
        $credit_card = $request->get('credit_card');*/
        

        $currency = 'USD';
        $subtotal = 0;
        $tax = 0;
        $bookings = Booking::join('tbl_tour_information','tbl_tour_information.id', '=', 'tbl_booking.tour_information_id')
                        ->join('tbl_ticket', 'tbl_ticket.id', '=', 'tbl_booking.ticket_id')
                        ->where('tbl_booking.status', 0)
                        ->where('tbl_booking.user_id', Auth::user()->id)
                        ->select('tbl_tour_information.name', 'tbl_booking.number_ticket', 'tbl_ticket.surcharge', 'tbl_tour_information.price', 'tbl_booking.promo_id')
                        ->get();
        if(count($bookings) > 0){
            foreach($bookings as $book){
                $subtotal += $book->price * $book->number_ticket;
                if($book->promo_id){
                    $promo = Promo::find($book->promo_id);
                    if($promo){
                        $subtotal -= $book->price * $promo->discount/100;
                    }
                }
                $tax += $book->surcharge * $book->number_ticket;
            }
            $total = $subtotal + $tax;
            /*$card = Paypalpayment::creditCard();
            $card->setType("visa")
                ->setNumber($credit_card)
                ->setExpireMonth($expire_month)
                ->setExpireYear($expire_year)
                ->setCvv2($code)
                ->setFirstName(Auth::user()->first_name)
                ->setLastName(Auth::user()->last_name);*/

            /*$addr= Paypalpayment::address();
            $addr->setLine1("3909 Witmer Road");
            $addr->setLine2("Niagara Falls");
            $addr->setCity("Niagara Falls");
            $addr->setState("NY");
            $addr->setPostalCode("14305");
            $addr->setCountryCode("US");
            $addr->setPhone("716-298-1822");

            // ### CreditCard
            $card = Paypalpayment::creditCard();
            $card->setType("visa")
                ->setNumber("4758411877817150")
                ->setExpireMonth("05")
                ->setExpireYear("2019")
                ->setCvv2("456")
                ->setFirstName("Joe")
                ->setLastName("Shopper");*/

            /*$fi = Paypalpayment::fundingInstrument();
            $fi->setCreditCard($card);*/
            if($request->get('radio') == 'paypal'){
                $payer = Paypalpayment::payer();
                $payer->setPaymentMethod("paypal");

                $items = array();
            
                $key = 0;
                foreach($bookings as $book){
                    $key = $key + 1;
                    $item = "item{$key}";
                    $$item = Paypalpayment::item();
                    $$item->setName('Ground Coffee 40 oz')
                        ->setCurrency($currency)
                        ->setQuantity($book->number_ticket)
                        ->setTax($book->surcharge)
                        ->setPrice($book->price);
                    if($book->promo_id){
                        //nếu có promo thì trừ bỏ 
                        $promo = Promo::find($book->promo_id);
                        if($promo){
                            $itemtemp = "itemtemp{$key}";
                            $$itemtemp = Paypalpayment::item();
                            $$itemtemp->setName('Ground Coffee 40 oz')
                                ->setCurrency($currency)
                                ->setQuantity(1)
                                ->setPrice(-$book->price*$promo->discount/100);
                            array_push($items, $$item, $$itemtemp);
                        }
                    }else{
                        array_push($items, $$item);
                    }
                    
                    
                }
                

                //->setFundingInstruments(array($fi));

               /*for($i=1; $i<=2; $i++){
                    $item = "item{$i}";
                    $$item = Paypalpayment::item();
                    $$item->setName('Ground Coffee 40 oz')
                        ->setCurrency($currency)
                        ->setQuantity(3)
                        ->setPrice(3);
                    array_push($items, $$item);
                    //$items[] = $$item;
                }*/
                

                /*$item1 = Paypalpayment::item();
                $item1->setName('Ground Coffee 40 oz')
                        ->setCurrency($currency)
                        ->setQuantity(1)
                        ->setTax(1)
                        ->setPrice(2);

                $item2 = Paypalpayment::item();
                $item2->setName('Ground Coffee 40 oz')
                        ->setCurrency($currency)
                        ->setQuantity(1)
                        ->setPrice(2);
                
                $item3 = Paypalpayment::item();
                $item3->setName('Ground Coffee 40 oz')
                        ->setCurrency($currency)
                        ->setQuantity(1)
                        ->setPrice(-0.25);*/

                $itemList = Paypalpayment::itemList();
                $itemList->setItems($items);
                //var_dump(array($item1, $item2));

                $details = Paypalpayment::details();
                $details->setTax($tax)
                        //total of items prices
                        ->setSubtotal($subtotal);

                //Payment Amount
                $amount = Paypalpayment::amount();
                $amount->setCurrency("USD")
                        // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
                        ->setTotal($total)
                        ->setDetails($details);

                // ### Transaction
                // A transaction defines the contract of a
                // payment - what is the payment for and who
                // is fulfilling it. Transaction is created with
                // a `Payee` and `Amount` types

                $transaction = Paypalpayment::transaction();
                $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription("Payment description")
                    ->setInvoiceNumber(uniqid());

                // ### Payment
                // A Payment Resource; create one using
                // the above types and intent as 'sale'


                $redirect_urls = Paypalpayment::redirectUrls();
                $redirect_urls->setReturnUrl(URL::route('payment.status'))->setCancelurl(URL::route('payment.status'));

                $payment = Paypalpayment::payment();

                $payment->setIntent("sale")
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                try {
                    // ### Create Payment
                    // Create a payment by posting to the APIService
                    // using a valid ApiContext
                    // The return object contains the status;
                    $payment->create($this->_apiContext);
                }catch(\PPConnectionException $ex){
                    if (\Config::get('app.debug')) {
                        echo "Exception: " . $ex->getMessage() . PHP_EOL;
                        $err_data = json_decode($ex->getData(), true);
                        exit;
                    }else{
                        die('Some error occur, sorry for inconvenient');
                    }
                }

                foreach($payment->getLinks() as $link) {
                    if($link->getRel() == 'approval_url') {
                        $redirect_url = $link->getHref();
                        break;
                    }
                }

                Session::put('paypal_payment_id', $payment->getId());
                if(isset($redirect_url)) {
                    return Redirect::away($redirect_url);
                }
                return redirect('/')
                    ->with('error', 'Unknown error occurred');
            }else if($request->get('radio') == 'credit_card'){
                //credit card
                Stripe::setApiKey("sk_test_0nxBbDwrf0vOHUDK6R63AUWl");
                try{
                    Charge::create(array(
                          "amount" => $total,
                          "currency" => "usd",
                          "source" => $request->input('stripeToken'), // obtained with Stripe.js
                          "description" => "Charge for tripshoes"
                    ));
                }catch(\Exception $e){
                    return redirect('/trip3')->with(['error'=>$e->getMessage()]);
                }
                
                return redirect('/')->with(['success', 'Successfully purchased']);
            }
        }
        
        return redirect('/');
        
    }

    public function getPaymentStatus(){
        $payment_id = \Session::get('paypal_payment_id');

        \Session::forget('paypal_payment_id');

        $payerId = \Input::get('PayerID');
        $token = \Input::get('token');

        if (empty($payerId) || empty($token)) {
            return redirect('/')
                ->with('message', 'Payment failed');
        }

        $payment = Paypalpayment::getById($payment_id, $this->_apiContext);
        $execution = Paypalpayment::PaymentExecution();

        $execution->setPayerId(Input::get('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        //echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

        if ($result->getState() == 'approved') { // payment made
            return redirect('/')
                ->with('success', 'Payment success');
        }
        return redirect('/')
            ->with('error', 'Payment failed');
    }
}
