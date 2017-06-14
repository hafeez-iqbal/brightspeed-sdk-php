<?php
namespace BrightSpeed;

class Transaction extends BaseTransaction {

    private $_checkNumber;
    private $_depositDate;
    private $_transactionId;
    private $_status2;
    private $_refundId;
    private $_createdAt;

    /**
     * @return mixed
     */
    public function getCheckNumber()
    {
        return $this->_checkNumber;
    }

    /**
     * @param mixed $checkNumber
     */
    public function setCheckNumber($checkNumber)
    {
        $this->_checkNumber = $checkNumber;
    }

    /**
     * @return mixed
     */
    public function getDepositDate()
    {
        return $this->_depositDate;
    }

    /**
     * @param mixed $depositDate
     */
    public function setDepositDate($depositDate)
    {
        $this->_depositDate = $depositDate;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->_transactionId;
    }

    /**
     * @param mixed $transactionId
     */
    public function setTransactionId($transactionId)
    {
        $this->_transactionId = $transactionId;
    }

    /**
     * @return mixed
     */
    public function getStatus2()
    {
        return $this->_status2;
    }

    /**
     * @param mixed $status2
     */
    public function setStatus2($status2)
    {
        $this->_status2 = $status2;
    }

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->_refundId;
    }

    /**
     * @param mixed $refundId
     */
    public function setRefundId($refundId)
    {
        $this->_refundId = $refundId;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->_createdAt = $createdAt;
    }

    /**
     * @return array
     */
    public function getCreateParameters(){
        $basicFields = $this->getBasicParameters();
        $fields = [
            'CHECKNUMBER'       => $this->getCheckNumber(),
            'DEPOSITDATE'       => $this->getDepositDate(),
        ];

        $fields = array_merge($fields, $basicFields);

        return $fields;
    }

    /**
     * @return array
     */
    public function getRefundParameters(){
        $fields = [
            'amount' => $this->getAmount()
        ];

        $fields = $this->_addTestMode($fields);

        return $fields;
    }

    public function getVoidParameters(){
        $fields = [];

        $fields = $this->_addTestMode($fields);

        return $fields;
    }

    

}