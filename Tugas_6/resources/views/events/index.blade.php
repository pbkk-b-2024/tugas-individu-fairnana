<!-- @extends('app', [
'title' => 'Dashboard - Events',
])

@section('content')
@include('sweetalert::alert')

<div id="app">
    <event-list :initial-events='@json($events)'></event-list>
</div>

@endsection

@push('scripts')
<script>
    window.initialEvents = @json($events);
</script>
@endpush -->