@extends('layouts.appKasir')

@section('title', 'Shift Management')

@section('content')
<div class="container">
    <div class="container mt-4">
        <div class="shift-header">
            <h1>Shift Management</h1>
            <p>Press the start button to start the job and the end button to end the job</p>
            <div class="shift-row">
                <div>
                    <span>Start:</span>
                    <span id="start-time" class="time">--:--</span>
                </div>
                <div class="time-end">
                    <span>End:</span>
                    <span id="end-time" class="time">--:--</span>
                </div>
                <div>
                    <button id="start-btn" class="btn btn-success">Start</button>
                    <button id="end-btn" class="btn btn-danger" disabled>End</button>
                </div>
            </div>
        </div>

        <div id="shift-history">
            <h2>Shift History</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shifts as $shift)
                    <tr>
                        <td>{{ $shift->tanggal }}</td>
                        <td>{{ $shift->waktu_masuk }}</td>
                        <td>{{ $shift->waktu_keluar }}</td>
                        <td><button id="end-btn" class="btn btn-danger" disabled>End</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startBtn = document.getElementById('start-btn');
        const endBtn = document.getElementById('end-btn');
        const startTimeEl = document.getElementById('start-time');
        const endTimeEl = document.getElementById('end-time');

        startBtn.addEventListener('click', () => {
    const now = new Date();
    const formattedTime = now.toTimeString().split(' ')[0]; // Format 'HH:mm:ss'
    const date = now.toISOString().split('T')[0]; // Format 'YYYY-MM-DD'

    startTimeEl.textContent = formattedTime;
    endBtn.disabled = false;
    startBtn.disabled = true;

    // Send start time to the server
    fetch("{{ route('shift.start') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ tanggal: date, waktu_masuk: formattedTime, toko_id: 1, kasir_id: 1 }) // Ganti dengan ID yang sesuai
    });
});

endBtn.addEventListener('click', () => {
    const now = new Date();
    const formattedTime = now.toTimeString().split(' ')[0]; // Format 'HH:mm:ss'
    endTimeEl.textContent = formattedTime;
    endBtn.disabled = true;
    startBtn.disabled = false;

    // Send end time to the server
    fetch("{{ route('shift.end') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ waktu_keluar: formattedTime, toko_id: 1, kasir_id: 1 }) // Ganti dengan ID yang sesuai
    }).then(() => {
        location.reload(); // Reload to update history
    });
});
    });
</script>
@endsection