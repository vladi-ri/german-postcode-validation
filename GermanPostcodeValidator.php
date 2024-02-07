<?php

    /**
     * GermanPostcodeValidator
     * 
     * @package    GermanPostcodeValidator
     * @version    1.0
     * @author     Vladislav Riemer <riemer-vladi@web.de>
     */
    class GermanPostcodeValidator {
        /**
         * Valid length of postcode
         * max length = 5
         * there are some special 4 digit postcodes available
         * 
         * @var int $_MAX_LENGTH
         * @access private
         */
        private int $_MAX_LENGTH = 5;

        /**
         * Regex for german postal code
         * 
         * @var string $_REGEX
         * @access private
         */
        private string $_REGEX      = "/(?!01000|99999)(0[1-9]\d{3}|[1-9]\d{4})/i";

        /**
         * Get REGEX from object
         * 
         * @access protected
         * @return string
         */
        protected function getRegex() : string {
            return $this->_REGEX;
        }

        /**
         * Set REGEX for object
         * 
         * @access public
         * @return string
         */
        public function setRegex(string $regex) : void {
            $this->_REGEX = $regex;
        }

        /**
         * Get postal code from object
         * 
         * @access public
         * @return string
         */
        public function getPostalCode() : string {
            return $this->_POSTAL_CODE;
        }

        /**
         * Set postal code for object
         * 
         * @access public
         * @return string
         */
        public function setPostalCode(string $postalCode) : void {
            $this->_POSTAL_CODE = $postalCode;
        }

        /**
         * Validate single postal code
         * 
         * @access public
         * @return string
         */
        public function validateSinglePostalCode(string $postalCode) : string|false {
            return preg_match($this->getRegex(), $postalCode);
        }

        /**
         * Validate postal code array
         * 
         * @access public
         * @return array
         */
        public function validatePostalCodeArray(string $postalCodeFromInput) : array|false {
            // convert string from input field into array
            $postalCodeArray = explode(',', $postalCodeFromInput);

            // generate new array with second value for each entry that shows validation status of postal code
            $validatedArray  = [];

            foreach ($postalCodeArray as $postalCode) {
                $isValid = $this->validateSinglePostalCode($postalCode);

                array_push($validatedArray, [
                    'postal_code' => $postalCode,
                    'is_valid'    => $isValid
                ]);
            }

            return $validatedArray;
        }
    };