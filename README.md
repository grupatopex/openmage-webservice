# Gtx_Webservice

Sample OpenMage plugin for GTX webservice authorization.

## Configuration

For NTLM authentication setup go to System -> Configuration -> Grupa Topex -> Webservice

## Usage

```php
Mage::getModel('gtx_webservice/file')->download($fileUrl, $filePathForSave);
```