@extends('layouts.app')

@section('content')
  <div class="container p-5 container-minus-nav d-flex flex-column align-items-center justify-content-center">

    <div class="container">
      @if (session('success'))
        <div class="alert alert-success mt-3">
          {{ session('success') }}
          <li>redirecting to the dashboard in 5 seconds</li>
        </div>
        {{ header('refresh:5;url=/admin/apartments') }}
      @elseif (session('error'))
        <div class="alert alert-danger mt-3">
          {{ session('error') }}
        </div>
      @endif


    </div>

    <div class="spinner-border mb-5 d-none text-primary" role="status" id="spinner">
      <span class="visually-hidden">Loading...</span>
    </div>

    <div class="mx-auto">
      <form method="POST" id="payment-form"
        action="{{ route('admin.sponsors.checkout', ['price' => $type->price, $apartment_id]) }}">

        @csrf
        <h1 class="text-center">Packet: <span>{{ $type->name }}</span></h1>
        <section class="mt-6 mb-3">

          <div>
            <div id="bt-dropin"></div>
          </div>
        </section>

        <input id="nonce" name="payment_method_nonce" type="hidden" />
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary" id="button" type="submit"><span>PAY {{ $type->price }}€</span></button>
        </div>
      </form>
      <script>
        // Ottieni il riferimento all'elemento spinner
        var spinner = document.getElementById("spinner");
        var payment = document.getElementById("payment-form");

        // Ottieni il riferimento all'elemento bottone
        var button = document.getElementById("button");

        // Aggiungi un listener per il click sul bottone
        button.addEventListener("click", function() {
          // Rimuovi la classe visually-hidden dall'elemento spinner
          spinner.classList.remove("d-none");
          payment.classList.add("d-none");
          
        });
      </script>


    </div>

  </div>
@endsection

@push('script')
  <script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>
  <script>
    let form = document.querySelector('#payment-form');
    let client_token = "{{ $token }}";
    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
    }, function(createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        let button = document.querySelector('button');
        button.disabled = true;
        instance.requestPaymentMethod(function(err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            return;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  </script>
@endpush
