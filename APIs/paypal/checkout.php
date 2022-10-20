
<html>

<!-- PAYPAL BUTTONS UI -->
<body>
    <main>
        <div id="paypal-button-container" class="center"></div>
    </main>
    
    <!-- TEMPORARY TEST AMOUNT -->
    <?php $amount = 49.99; ?>

    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AaczlnqfZSZ82MiiV6ZxPSXTemBTcPw2wALkHxhnbPcS6TuZP1SmdpcimsGNyLSmbT_VPDRFfQHd-qRS&currency=USD&intent=capture&enable-funding=venmo" data_source="integrationbuilder"></script> -->
    <script src="https://www.paypal.com/sdk/js?client-id={clientID}" data_source="integrationbuilder"></script>
    <script>
        const paypalButtonsComponent = paypal.Buttons({
            // optional styling for buttons
            // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
            style: {
                color: "gold",
                shape: "pill",
                layout: "vertical"
            },

            // set up the transaction
            createOrder: (data, actions) => {
                // pass in any options from the v2 orders create call:
                // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                const createOrderPayload = {
                    purchase_units: [{
                        amount: { 
                            value: <?php echo $amount;?>
                        }
                    }]
                };


                return actions.order.create(createOrderPayload);
            },

            // finalize the transaction
            onApprove: (data, actions) => {
                const captureOrderHandler = (details) => {
                    const payerName = details.payer.name.given_name;
                    console.log('Transaction completed');
                    window.location.replace("") // input success feedback page here
                };

                return actions.order.capture().then(captureOrderHandler);
            },

            // handle unrecoverable errors
            onError: (err) => {
                console.error('An error prevented the buyer from checking out with PayPal');
            }
        });

        paypalButtonsComponent
            .render("#paypal-button-container")
            .catch((err) => {
                console.error('PayPal Buttons failed to render');
            });
    </script>
</body>

</html>