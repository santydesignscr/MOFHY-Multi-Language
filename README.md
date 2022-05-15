## MOFHY Lite
MOFHY is a free MyOwnFreeHost Client Area for account management, ticket support system and a free ssl service. It has easy to use features much like the WHMCS Digit UI interface. 

![AppVeyor](https://img.shields.io/badge/Licence-MIT-lightgrey)
![AppVeyor](https://img.shields.io/badge/Version-v1.0.5-lightgrey)
![AppVeyor](https://img.shields.io/badge/Build-passed-lightgreen)
![AppVeyor](https://img.shields.io/badge/Dependencies-php-lightgrey)
![AppVeyor](https://img.shields.io/badge/Dependencies-mysql-lightgrey)
![AppVeyor](https://img.shields.io/badge/Interface-Digit-lightgrey)
![AppVeyor](https://img.shields.io/badge/Development-Discontinued-lightgrey) 

## Table of Content 
- [Features](#features)
- [Requirements](#requirements) 
- [Installation](#installation)
- [Dependencies](#dependencies)
- [Contributer](#contributer)
- [Copyright](#copyright)

## Features
MOFHY features are listed below:
- Sign up / Login 
- Password Reset Functionality
- eMail Validation / Verification 
- Account Management 
- Account Settings 
- GoGetSSL Api Integration 
- Cancell SSL
- MOFH Api Integration 
- Ticket Support System 
- Custom Template System 
- Knowledgebase System
- Admin Settings
- Visitors Log
- Day/Night Mode
- Standalone Setup 
- SMTP Support 
- Extra Tools For Clients
  - WHOIS Lookup
  - DNS Lookup
  - CSR Generator
  - CSR Decoder
  - CSS Beautifier
  - CSS Minifier
  - Domain Checker
  - PHP Obfuscator
  - XML to JSON Converter

## Requirements
Your server need to met minimal requirements to run MOFHY:
- PHP v5.6 or above.
- MySQL v5.2 or above.
- OpenSSL v1.1 or above. 

## Installation 
Installation of MOFHY is much eaiser then you think!
- Download the ```Fresh.Install.zip``` file. 
- Extract the .zip file to the root folder of your domain. 
- Create an empty database for the project
- Open your browser and type ```http://yourdomain.com/``` an installation page will be appear. 
- After clicking "install" you have to fill out your database details and click on validate to connect to the database. 
- Fill out the clientarea name, clientarea URL:```http://example.com/```, and clientarea email. Then click next. 
- Register an admin account for free. 
- Rename or remove the "installation" directory form src directory. (This is super important!)
- Access the admin panel at ```http://example.com/admin/```. 
- Set callback url to ```http://example.com/callback/Callback.php``` in the MOFH Reseller panel (panel.myownfreehostnet).
- Set up the API in "API Settings" in the admin area (```http://example.com/admin/```).
- Set up the Domain Extensions (Free subdomains) in the admin panel (```http://example.com/admin/```).
- All done!

## Patch Existing MOFHY Lite Installation
- Download the ```Patch.to.Update.from.MOFHY.Lite.zip``` file. 
- Extract the .zip file to the root folder of your domain. 
- Open your browser and type ```http://yourdomain.com/``` an update page will be appear. 
- Click "Update" and the DB Will be updated
- Access the admin panel at ```http://example.com/admin/``` and review that the settings are correct. 
- All done!

## Extra Setup Steps
- Create Knowledgebase articles for your webhost (```http://example.com/admin/```).

## Dependencies
The following libraries are required to run MOFHY:
- phpmailer
- mofh-client
- guzzlehttp
- composer
- user info
- gogetssl

## SMTP
Here are some widely used SMTP services. They have a free plan with some limitations though, most importantly they are compatible with MOFHY.
- [Mailgun](https://www.mailgun.com/)
- [Sendinblue](https://sendinblue.com/)
- [SendClean](https://sendclean.com/)
- [Mailjet](https://mailjet.com/)
- [Yandex 360](https://360.yandex.com)
- [SendGrid](https://sendgrid.com/free/)
- [SendPulse](https://sendpulse.com/features/smtp)
- [ServersSMTP](https://serversmtp.com/get-free-emails/)

## Contributer
The core is created by [Mahtab Hassan](https://github.com/mahtab2003)
And the Multi Lang System and translations by [Santy Designs](https://santydesigns.com).

## Copyright
Code ©️ Copyright 2022 MOFHY Lite. Code released under the MIT license.
ty Designs](https://santydesigns.com) with the contributions of @ImLoadingUuU and @OverdueWeevil2.

## Copyright
Code ©️ Copyright 2021 MOFHY Lite. Code released under the MIT license.
