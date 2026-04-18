<?php
namespace App\PaymentService;

class PaypalAPI{
	protected $transactionId;

    public function __construct($transactionId)
    {
        $this->transactionId = $transactionId;
    }
	public function pay() : array{
		//return "Your Bill paid via paypal";
		return [
			'amount'=>123,
			'transaction'=>$this->transactionId
		];
	}
}