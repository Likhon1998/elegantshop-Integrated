@extends('layouts.app')

@section('title', 'Contact Us - Elegant Shop')

{{-- No @section('styles') needed as all specific CSS is in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            {{-- Contact Information Cards --}}
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="contact-card glass-card text-center">
                        <div class="contact-icon mx-auto"><i class="fas fa-map-marker-alt"></i></div>
                        <h5>Our Address</h5>
                        <p>123 Fashion Street, New York, NY 10001</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-card glass-card text-center">
                        <div class="contact-icon mx-auto"><i class="fas fa-envelope-open-text"></i></div>
                        <h5>Email Us</h5>
                        <p><a href="mailto:info@elegantshop.com">info@elegantshop.com</a></p>
                        <p><a href="mailto:support@elegantshop.com">support@elegantshop.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact-card glass-card text-center">
                        <div class="contact-icon mx-auto"><i class="fas fa-phone-alt"></i></div>
                        <h5>Call Us</h5>
                        <p><a href="tel:+12345678900">+1 234 567 8900</a></p>
                        <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                {{-- Contact Form --}}
                <div class="col-lg-7">
                    <div class="contact-form-wrapper glass-card">
                        <h3>Send Us a Message</h3>
                        <form id="contactForm" method="POST" action="{{ url('contact/submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contactName" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="contactName" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="contactEmail" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" id="contactEmail" name="email" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="contactSubject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="contactSubject" name="subject" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="contactMessage" class="form-label">Message</label>
                                    <textarea class="form-control" id="contactMessage" name="message" rows="6" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane me-2"></i>Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                {{-- Map Embed --}}
                <div class="col-lg-5">
                    <div class="map-wrapper">
                        {{-- Note: The original URL is generic. Replace with a specific Google Maps iframe URL or API. --}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.606277749826!2d-73.98785368459384!3d40.74881737932791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9a46b5a9b%3A0x6c6e766c39a37e8!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1678886976721!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    @parent
    <script>
        // Contact form submission simulation (kept for frontend behavior matching original HTML)
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real Laravel app, you would use AJAX to submit the form data to the URL('contact/submit') route.
            alert('Message sent successfully! (Simulation)');
            
            // After successful submission (or simulation), reset the form:
            this.reset();
        });
        
        // Note: The Scroll to Top script is assumed to be in the master layout (app.blade.php) or main.js.
    </script>
@endsection