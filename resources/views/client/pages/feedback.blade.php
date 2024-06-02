@extends('client.master')

@section('feedback')

<div class="feedback-container">
    <div class="sekre">
        <iframe id="gmap_canvas"
                src="https://maps.google.com/maps?q=perguruan%20tinggi%20indonesia%20mandiri&t=&z=10&ie=UTF8&iwloc=&output=embed"
                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>

    <div class="feed">
        <h1>Feedback</h1>
        <p>Kirim masukan anda tentang website ini agar menjadi lebih baik</p>
        <form action="#" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="btn-submit">Send Feedback</button>
        </form>
    </div>
</div>

@endsection
