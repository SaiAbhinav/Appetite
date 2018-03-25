<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\User;
use App\Card;
use App\Cardwallet;
use App\Accountwallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        
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
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
        $wallet = Wallet::find($wallet->id);
        $cards = Card::where('user_id', Auth::user()->id)->get();
        $cardwallets = Cardwallet::where('wallet_id', $wallet->id)->get();
        $accountwallets = Accountwallet::where('wallet_id', $wallet->id)->get();

        return view('wallets.show', ['wallet' => $wallet, 'cards' => $cards, 'cardwallets' => $cardwallets, 'accountwallets' => $accountwallets]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //      from new card  
        $amount = $request->input('amount');
        $value = (double)$amount;

        $wallet = Wallet::find($wallet->id);
        $oldamount = $wallet->wallet_balance;

        $newamount = $amount + $oldamount;

        $walletAmountUpdate = Wallet::where('id', $wallet->id)->update([
            'wallet_balance' => $newamount
        ]);

        $cardno = str_replace(' ', '', $request->input('card_no'));

        if($walletAmountUpdate) {
            $addRecord = Cardwallet::create([
                'wallet_id' => $wallet->id,
                'card_no' => $cardno,
                'amount_added' => $amount
            ]);
        }

        if($request->input('check') == "check") {
            $saveCard = Card::updateOrCreate([
                'user_id' => Auth::user()->id,
                'card_name' => $request->input('card_name'),
                'card_no' => $cardno,
                'valid_thru_month' => $request->input('valid_thru_month'),
                'valid_thru_year' => $request->input('valid_thru_year'),
                'card_pin' => $request->input('card_pin')
            ]); 

            if($saveCard && $walletAmountUpdate) {
                return redirect()->route('wallets.show', ['wallet' => $wallet->id])->with('success', 'Amount has successfully added to the wallet and Card has been saved !');
            }else {
                return back()->withInput()->with('error','Error ! Please try again !');
            }
        }       

        if($walletAmountUpdate) {        
            return redirect()->route('wallets.show', ['wallet' => $wallet->id])->with('success', 'Amount has successfully added to the wallet !');           
        }else {
            return back()->withInput()->with('error','Error ! Please try again !');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }

    public function updatefromsavedcard(Request $request) {         

        $amount = $request->input('savedcard_amount');
        $value = (double)$amount;

        $wallet = Wallet::where('id', $request->input('wallet_id'))->first();
        $oldamount = $wallet->wallet_balance;

        $card = Card::where('card_no', $request->input('savedcard_no'))->first();        

        if($card->card_pin == $request->input('savedcard_pin')) {
            $newamount = $amount + $oldamount;

            $walletAmountUpdate = Wallet::where('id', $request->input('wallet_id'))->update([
                'wallet_balance' => $newamount
            ]);
    
            if($walletAmountUpdate) {
                $addRecord = Cardwallet::create([
                    'wallet_id' => $request->input('wallet_id'),
                    'card_no' => $request->input('savedcard_no'),
                    'amount_added' => $amount
                ]);
            }
    
            if($addRecord) {
                return redirect()->route('wallets.show', ['wallet' => $wallet->id])->with('success', 'Amount has successfully added to the wallet !'); 
            }

        }else {
            return back()->withInput()->with('error', 'Error ! Check the CVV and try again !');
        }
    }

    public function updatefromaccount(Request $request) {

        $amount = $request->input('acc_to_wallet_amount1');
        $value = (double)$amount;

        $wallet = Wallet::where('id', $request->input('accwallet_id'))->first();
        $oldamount = $wallet->wallet_balance;
        $newamount = $amount + $oldamount;

        $walletAmountUpdate = Wallet::where('id', $request->input('accwallet_id'))->update([
            'wallet_balance' => $newamount
        ]);
    
        if($walletAmountUpdate) {
            $addRecord = Accountwallet::create([
                'wallet_id' => $request->input('accwallet_id'),
                'bank_name' => $request->input('bank_name1'),
                'user_acc_name' => $request->input('internet_acc_name'),
                'amount_added' => $amount
            ]);
        }
    
        if($addRecord) {
            return redirect()->route('wallets.show', ['wallet' => $wallet->id])->with('success', 'Amount has successfully added to the wallet !'); 
        }else {
            return back()->withInput()->with('error', 'Error ! Please try again !');
        }      
    }

    public function clearacchistory(Request $request) {
        $findRecord = Accountwallet::where('wallet_id', $request->input('clear_acc_wallet_id'))->delete();

        if($findRecord) {
            return back()->with('success', 'Account to Wallet transaction history has been successfully deleted');
        }else {
            return back()->with('error', 'Error ! Please try again !');
        }
    }

    public function clearcardhistory(Request $request) {
        $findRecord = Cardwallet::where('wallet_id', $request->input('clear_card_wallet_id'))->delete();

        if($findRecord) {
            return back()->with('success', 'Card to Wallet transaction history has been successfully deleted');
        }else {
            return back()->with('error', 'Error ! Please try again !');
        }
    }
}
