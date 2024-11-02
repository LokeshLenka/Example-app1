<div>
    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
</div>
<form method="POST" action="{{ route('tokens.store') }}">

    @csrf

    <input type="text" placeholder="Enter Your Token" name="token" required>
    <button type="submit">Submit</button>

</form>
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
