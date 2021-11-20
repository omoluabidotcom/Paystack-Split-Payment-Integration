# [Paystack Split Payment Integration](https://github.com/omoluabidotcom/Paystack-Split-Payment-Integration)

> Here is Paystack payment gateway API 
> integrated into a web app, to enable
> users pay for services rendered from 
> multiple source in a web app.

# [Quick Start](https://github.com/omoluabidotcom/Paystack-Split-Payment-Integration) 

Import the database into your database, 
replace the secret key with your paystack 
accoount details.  

## [App Info](https://github.com/omoluabidotcom/Paystack-Split-Payment-Integration) 

## [Author](https://github.com/omoluabidotcom) 

[Yahaya Yusuf](https://github.com/omoluabidotcom)

**NB**: The public key and secret key used here are for test mode
they should be protected by using environment variables in a 
production app. The phpdotenv package can be use. Also the webhooks.php
whose function is to get data from payment details and insert into 
database for reference purpose won't work until the payment integration
is tested using a live hosting, because webhook which listen for event 
would not work on localhost.