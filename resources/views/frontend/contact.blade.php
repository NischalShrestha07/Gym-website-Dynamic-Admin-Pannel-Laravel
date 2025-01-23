@extends('frontend.layouts.main')
@section('main-container')

<style>
    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        max-width: 300px;
        color: white;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.5s ease;
    }

    .custom-alert.show {
        opacity: 1;
        transform: translateX(0);
    }

    .custom-alert.fade-out {
        opacity: 0;
        transform: translateX(100%);
    }

    .custom-close {
        font-size: 1.2rem;
        color: white;
        cursor: pointer;
    }

    .alert-success {
        background-color: #28a745;
    }

    .alert-danger {
        background-color: #dc3545;
    }
</style>

<section class="contact_section">


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 px-0">
                <div class="img-box">
                    <img src="{{ asset($contactimage) }}" alt="">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="form_container pr-0 pr-lg-5 mr-0 mr-lg-2">
                    <div>
                        @if (session('success'))
                        <div id="successAlert" class="alert alert-success custom-alert show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <span class="custom-close" onclick="closeAlert('successAlert')">&times;</span>
                        </div>
                        @endif

                        @if (session('error'))
                        <div id="errorAlert" class="alert alert-danger custom-alert show" role="alert">
                            <strong>Success!</strong> {{ session('error') }}
                            <span class="custom-close" onclick="closeAlert('errorAlert')">&times;</span>
                        </div>
                        @endif
                    </div>
                    <div class="heading_container">

                        <h2>Contact Us</h2>
                    </div>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div>
                            <input type="text" name="name" placeholder="Name" required />
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="text" name="phoneno" placeholder="Phone Number" required />
                        </div>
                        <div>
                            <input type="text" class="message-box" name="message" placeholder="Message" />
                        </div>
                        <div class="d-flex">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Automatically hide alerts after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.custom-alert.show');
            alerts.forEach(alert => {
                alert.classList.remove('show');
                alert.classList.add('fade-out');
                // Remove the alert from the DOM after fade-out completes
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    });

    function closeAlert(alertId) {
        const alertElement = document.getElementById(alertId);
        if (alertElement) {
            alertElement.classList.remove('show');
            alertElement.classList.add('fade-out');
            setTimeout(() => alertElement.remove(), 500);
        }
    }
</script>

@endsection