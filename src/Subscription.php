<?php
namespace BrightSpeed;

class Subscription extends BaseTransaction {

    private $_initPayment;
    private $_billingDateStart;
    private $_billingDateEnd;
    private $_billingPeriod;
    private $_cancellationPolicy;

    /**
     * @return mixed
     */
    public function getInitPayment()
    {
        return $this->_initPayment;
    }

    /**
     * @param mixed $initPayment
     */
    public function setInitPayment($initPayment)
    {
        $this->_initPayment = $initPayment;
    }

    /**
     * @return mixed
     */
    public function getBillingDateStart()
    {
        return $this->_billingDateStart;
    }

    /**
     * @param mixed $billingDateStart
     */
    public function setBillingDateStart($billingDateStart)
    {
        $this->_billingDateStart = $billingDateStart;
    }

    /**
     * @return mixed
     */
    public function getBillingDateEnd()
    {
        return $this->_billingDateEnd;
    }

    /**
     * @param mixed $billingDateEnd
     */
    public function setBillingDateEnd($billingDateEnd)
    {
        $this->_billingDateEnd = $billingDateEnd;
    }

    /**
     * @return mixed
     */
    public function getBillingPeriod()
    {
        return $this->_billingPeriod;
    }

    /**
     * @param mixed $billingPeriod
     */
    public function setBillingPeriod($billingPeriod)
    {
        $this->_billingPeriod = $billingPeriod;
    }

    /**
     * @return mixed
     */
    public function getCancellationPolicy()
    {
        return $this->_cancellationPolicy;
    }

    /**
     * @param mixed $billingPeriod
     */
    public function setCancellationPolicy($cancellationPolicy)
    {
        $this->_cancellationPolicy = $cancellationPolicy;
    }

    /**
     * @return array
     */
    public function getCreateParameters(){
        $basicFields = $this->getBasicParameters();
        $fields = [
            'INITPAYMENT'       => $this->getInitPayment(),
            'BILLINGDATE'       => $this->getBillingDateStart(),
            'BILLINGDATEEND'    => $this->getBillingDateEnd(),
//            'BILLINGPERIOD'     => $this->getBillingPeriod(),
//            'CANCELLATIONPOLICY'=> $this->getCancellationPolicy()
        ];

        $fields = array_merge($fields, $basicFields);

        return $fields;
    }

}