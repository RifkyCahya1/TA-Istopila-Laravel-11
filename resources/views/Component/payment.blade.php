@extends('main')
@section('content')
<div class="container-fluid">
  <button id="pay-button">Bayar Sekarang!</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
  var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      window.snap.pay('{{$snapToken}}');
  });
</script>

@endsection