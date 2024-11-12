<form method="POST" action="{{ route('nfe.store') }}">
    @csrf
    <!-- Campos para informações da nota fiscal -->
    <button type="submit">Emitir NF-e</button>
</form>
