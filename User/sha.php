<html>
    <head>
        <title>JS Checkout Demo</title>
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
    </head>
    <body>
        <div id="paytm-checkoutjs"></div>
        <script type="application/javascript" crossorigin="anonymous" src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/dummyExampleMIDIdentifier.js" onload="onScriptLoad();"></script>
        <script>
            function onScriptLoad(){
                if(window.Paytm && window.Paytm.CheckoutJS){
                    window.Paytm.CheckoutJS.onLoad(function excecuteAfterCompleteLoad() {
                        // initialze configuration using init method 
                        window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                            // after successfully updating configuration, invoke JS Checkout
                            window.Paytm.CheckoutJS.invoke();
                        }).catch(function onError(error){
                            console.log("error => ",error);
                        });
                    });
                }  
            }   
        </script>
    </body>
</html>