<?php

declare(strict_types=1);


class AccountBank
{

    /** @var string */
    private $_holder;

    /** @var int */
    private $_balance;

    /** @var int */
    private $_interestRate;

    /** @var string */
    private $_currency;

    /**
     * Default constructor
     */
    public function __construct(string $newHolder, int $newBalance, int $newRate, string $newCurrency)
    {
        $this->set_holder($newHolder);
        $this->set_balance($newBalance);
        $this->set_interestRate($newRate);
        $this->set_currency($newCurrency);
    }

    /**
     * @param int $amount
     */
    public function credit(int $amount)
    {
        $this->_balance += $amount;
    }

    /**
     * @param int $amount
     */
    public function debit(int $amount)
    {
        $this->_balance -= $amount;
    }

    public function get_holder() {
        return $this->_holder;
    }
    public function set_holder(string $newHolder) {
        $this->_holder = $newHolder;
    }

    public function get_balance() {
        return $this->_balance;
    }
    public function set_balance(int $newBalance) {
        $this->_balance = $newBalance;
    }

    public function get_interestRate() {
        return $this->_interestRate;
    }
    public function set_interestRate(int $newRate) {
        $this->_interestRate = $newRate;
    }

    public function get_currency() {
        return $this->_currency;
    }
    public function set_currency(string $newCurrency) {
        $this->_currency = $newCurrency;
    }
}
