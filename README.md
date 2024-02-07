# German Postcode Validation
Validator for postal code(s) in Germany

## Cloning & Installing Repository
- Clone repository
    ```
    git clone https://github.com/vladi-ri/german-postcode-validation.git
    ```

## Usage
### 1. Generate object of GermanPostcodeValidator ...
#### 1.1 with single example postal code
    <?php $validator = new GermanPostcodeValidator("99085"); ?>
#### 1.2 with multiple example postal codes as array
    <?php $validator = new GermanPostcodeValidator(["99085", "07545"]); ?>
### 2. Test single postal code
    <?php
        $postCode = "12345";
        echo $validator->validateSinglePostalCode($postCode);
    ?>

## Release Notes
### Current Release
#### v1.0
- Validation of example postal code, that can be validated by submitting the form.

### Future Releases
