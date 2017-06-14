<?php
namespace BrightSpeed;

class BaseTransaction {

    private $_source;
    private $_lastName;
    private $_firstName;
    private $_middleInitial;
    private $_companyOr2ndName;
    private $_address;
    private $_city;
    private $_state;
    private $_zipCode;
    private $_phoneNumber;
    private $_email;
    private $_otherPhoneNumber;
    private $_employeeNumber;
    private $_abaNumber;
    private $_bankName;
    private $_bankAddress;
    private $_bankCity;
    private $_bankState;
    private $_bankZipCode;
    private $_bankPhone;
    private $_bankFax;
    private $_accountNumber;
    private $_amount;
    private $_transitNum;
    private $_checkAge;
    private $_customField1;
    private $_customField2;
    private $_customField3;
    private $_customField4;
    private $_customField5;
    private $_customField6;
    private $_postBackUrl;
    private $_status;

    private $_subscriptionId;
    private $_transactionType;
    private $_description;

    private $_testMode;
    private $_additionalInformation;

    public function __construct()
    {
        $this->_testMode = false;
        $this->_checkAge = "NO";
    }

    /**
     * @return mixed
     */
    public function getAbaNumber()
    {
        return $this->_abaNumber;
    }

    /**
     * @param mixed $abaNumber
     */
    public function setAbaNumber($abaNumber)
    {
        $this->_abaNumber = $abaNumber;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->_accountNumber;
    }

    /**
     * @param mixed $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->_accountNumber = $accountNumber;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->_amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->_amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getBankAddress()
    {
        return $this->_bankAddress;
    }

    /**
     * @param mixed $bankAddress
     */
    public function setBankAddress($bankAddress)
    {
        $this->_bankAddress = $bankAddress;
    }

    /**
     * @return mixed
     */
    public function getBankCity()
    {
        return $this->_bankCity;
    }

    /**
     * @param mixed $bankCity
     */
    public function setBankCity($bankCity)
    {
        $this->_bankCity = $bankCity;
    }

    /**
     * @return mixed
     */
    public function getBankFax()
    {
        return $this->_bankFax;
    }

    /**
     * @param mixed $bankFax
     */
    public function setBankFax($bankFax)
    {
        $this->_bankFax = $bankFax;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->_bankName;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName)
    {
        $this->_bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getBankPhone()
    {
        return $this->_bankPhone;
    }

    /**
     * @param mixed $bankPhone
     */
    public function setBankPhone($bankPhone)
    {
        $this->_bankPhone = $bankPhone;
    }

    /**
     * @return mixed
     */
    public function getBankState()
    {
        return $this->_bankState;
    }

    /**
     * @param mixed $bankState
     */
    public function setBankState($bankState)
    {
        $this->_bankState = $bankState;
    }

    /**
     * @return mixed
     */
    public function getBankZipCode()
    {
        return $this->_bankZipCode;
    }

    /**
     * @param mixed $bankZipCode
     */
    public function setBankZipCode($bankZipCode)
    {
        $this->_bankZipCode = $bankZipCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return mixed
     */
    public function getCompanyOr2ndName()
    {
        return $this->_companyOr2ndName;
    }

    /**
     * @param mixed $companyOr2ndName
     */
    public function setCompanyOr2ndName($companyOr2ndName)
    {
        $this->_companyOr2ndName = $companyOr2ndName;
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
     * @return mixed
     */
    public function getCustomField1()
    {
        return $this->_customField1;
    }

    /**
     * @param mixed $customField1
     */
    public function setCustomField1($customField1)
    {
        $this->_customField1 = $customField1;
    }

    /**
     * @return mixed
     */
    public function getCustomField2()
    {
        return $this->_customField2;
    }

    /**
     * @param mixed $customField2
     */
    public function setCustomField2($customField2)
    {
        $this->_customField2 = $customField2;
    }

    /**
     * @return mixed
     */
    public function getCustomField3()
    {
        return $this->_customField3;
    }

    /**
     * @param mixed $customField3
     */
    public function setCustomField3($customField3)
    {
        $this->_customField3 = $customField3;
    }

    /**
     * @return mixed
     */
    public function getCustomField4()
    {
        return $this->_customField4;
    }

    /**
     * @param mixed $customField4
     */
    public function setCustomField4($customField4)
    {
        $this->_customField4 = $customField4;
    }

    /**
     * @return mixed
     */
    public function getCustomField5()
    {
        return $this->_customField5;
    }

    /**
     * @param mixed $customField5
     */
    public function setCustomField5($customField5)
    {
        $this->_customField5 = $customField5;
    }

    /**
     * @return mixed
     */
    public function getCustomField6()
    {
        return $this->_customField6;
    }

    /**
     * @param mixed $customField6
     */
    public function setCustomField6($customField6)
    {
        $this->_customField6 = $customField6;
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
    public function getCheckAge()
    {
        return $this->_checkAge;
    }

    /**
     * @param mixed $checkAge
     */
    public function setCheckAge($checkAge)
    {
        $this->_checkAge = $checkAge;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmployeeNumber()
    {
        return $this->_employeeNumber;
    }

    /**
     * @param mixed $employeeNumber
     */
    public function setEmployeeNumber($employeeNumber)
    {
        $this->_employeeNumber = $employeeNumber;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->_firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->_lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getMiddleInitial()
    {
        return $this->_middleInitial;
    }

    /**
     * @param mixed $middleInitial
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->_middleInitial = $middleInitial;
    }

    /**
     * @return mixed
     */
    public function getOtherPhoneNumber()
    {
        return $this->_otherPhoneNumber;
    }

    /**
     * @param mixed $otherPhoneNumber
     */
    public function setOtherPhoneNumber($otherPhoneNumber)
    {
        $this->_otherPhoneNumber = $otherPhoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->_phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->_phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPostBackUrl()
    {
        return $this->_postBackUrl;
    }

    /**
     * @param mixed $postBackUrl
     */
    public function setPostBackUrl($postBackUrl)
    {
        $this->_postBackUrl = $postBackUrl;
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
    public function getSource()
    {
        return $this->_source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->_source = $source;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
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
    public function getSubscriptionId()
    {
        return $this->_subscriptionId;
    }

    /**
     * @param mixed $subscriptionId
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->_subscriptionId = $subscriptionId;
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
    public function getTransactionType()
    {
        return $this->_transactionType;
    }

    /**
     * @param mixed $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->_transactionType = $transactionType;
    }

    /**
     * @return mixed
     */
    public function getTransitNum()
    {
        return $this->_transitNum;
    }

    /**
     * @param mixed $transitNum
     */
    public function setTransitNum($transitNum)
    {
        $this->_transitNum = $transitNum;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->_zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->_zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getTestMode()
    {
        return $this->_testMode;
    }

    /**
     * @param bool $testMode
     */
    public function setTestMode($testMode)
    {
        $this->_testMode = $testMode;
    }

    protected function _addTestMode($fields){
        if ($this->_testMode){
            $fields['TESTMODE'] = 1;
        } else {
            $fields['TESTMODE'] = 2;
        }
        return $fields;
    }

    /**
     * @return mixed
     */
    public function getAdditionalInformation()
    {
        return $this->_additionalInformation;
    }

    /**
     * @param array $additionalInformation
     * @throws Exception
     */
    public function setAdditionalInformation($additionalInformation = [])
    {
        if (!is_array($additionalInformation)){
            throw new \Exception('Argument must be an array.');
        }
        $this->_additionalInformation = $additionalInformation;
    }

    /**
     * @param array $fields
     * @return array
     */
    protected function _addAdditionalInformation($fields)
    {
        $addInfo = $this->_additionalInformation;
        if (count($addInfo) > 0) {
            $keyFields = array_keys($fields);
            foreach ($keyFields as $field) {
                if( array_key_exists($field, $addInfo) ) unset( $addInfo[$field] );
                foreach ($addInfo as $keyAddInfo => $value) {
                    if (strtolower($keyAddInfo) == strtolower($field)) unset( $addInfo[$keyAddInfo] );
                }
            }
            $fields = array_merge($fields, $addInfo);
        }
        return $fields;
    }

    public function getBasicParameters(){
        $fields = [
            'SOURCE'            => $this->getSource(),
            'LASTNAME'          => $this->getLastName(),
            'FIRSTNAME'         => $this->getFirstName(),
            'MIDDLEINITIAL'     => $this->getMiddleInitial(),
            'COMPANYOR2NDNAME'  => $this->getCompanyOr2ndName(),
            'ADDRESS'           => $this->getAddress(),
            'CITY'              => $this->getCity(),
            'STATE'             => $this->getState(),
            'ZIPCODE'           => $this->getZipCode(),
            'PHONENUMBER'       => $this->getPhoneNumber(),
            'EMAIL'             => $this->getEmail(),
            'OTHERPHONENUMBER'  => $this->getOtherPhoneNumber(),
            'EMPLOYEENUMBER'    => $this->getEmployeeNumber(),
            'ABANUMBER'         => $this->getAbaNumber(),
            'BANKNAME'          => $this->getBankName(),
            'BANKADDRESS'       => $this->getBankAddress(),
            'BANKCITY'          => $this->getBankCity(),
            'BANKSTATE'         => $this->getBankState(),
            'BANKZIPCODE'       => $this->getBankZipCode(),
            'BANKPHONE'         => $this->getBankPhone(),
            'BANKFAX'           => $this->getBankFax(),
            'ACCOUNTNUMBER'     => $this->getAccountNumber(),
            'AMOUNT'            => $this->getAmount(),
            'TRANSITNUM'        => $this->getTransitNum(),
            'CHECKAGE'          => $this->getCheckAge(),
            'CUSTOMFIELD1'      => $this->getCustomField1(),
            'CUSTOMFIELD2'      => $this->getCustomField2(),
            'CUSTOMFIELD3'      => $this->getCustomField3(),
            'CUSTOMFIELD4'      => $this->getCustomField4(),
            'CUSTOMFIELD5'      => $this->getCustomField5(),
            'CUSTOMFIELD6'      => $this->getCustomField6(),
            'POSTBACKURL'       => $this->getPostBackUrl()
        ];

        $fields = $this->_addAdditionalInformation($fields);
        $fields = $this->_addTestMode($fields);

        return $fields;
    }


}