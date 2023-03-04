{{-- <form id="payment-form" method="post" action="{{ route('payment.store') }}">
  {{ csrf_field() }}
  <div class="form-group">
      <label for="amount">Amount</label>
      <input type="text" id="amount" name="amount" class="form-control" value="10.00">
  </div>
  <div id="dropin-container"></div>
  <button class="btn btn-primary" type="submit">Pay</button>
</form>

<script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
<script>
  var form = document.querySelector('#payment-form');
  var client_token = "{{ $token }}";

  braintree.dropin.create({
      authorization: client_token,
      container: '#dropin-container'
  }, function (createErr, instance) {
      form.addEventListener('submit', function (event) {
          event.preventDefault();

          instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                  console.log('Error', err);
                  return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
          });
      });
  });
</script> --}}
