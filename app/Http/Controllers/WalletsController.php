<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\User;
use App\Card;
use App\Cardwallet;
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

        return view('wallets.show', ['wallet' => $wallet, 'cards' => $cards]);

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
        //
        $amount = $request->input('amount');
        $value = (double)$amount;

        $wallet = Wallet::find($wallet->id);
        $oldamount = $wallet->wallet_balance;

        $newamount = $amount + $oldamount;

        $walletAmountUpdate = Wallet::where('id', $wallet->id)->update([
            'wallet_balance' => $newamount
        ]);

        $saveCard = Card::updateOrCreate([
            'user_id' => Auth::user()->id,
            'card_name' => $request->input('card_name'),
            'card_no' => $request->input('card_no'),
            'valid_thru_month' => $request->input('valid_thru_month'),
            'valid_thru_year' => $request->input('valid_thru_year'),
            'card_pin' => $request->input('card_pin')
        ]);

        $addRecord = Cardwallet::create([
            'wallet_id' => $wallet->id,
            'card_id' => $saveCard->id,
            'amount_added' => $amount
        ]);

        if($walletAmountUpdate && $saveCard) {
            return redirect()->route('wallets.show', ['wallet' => $wallet->id]);
        }

        return back()->withInput();
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
}
