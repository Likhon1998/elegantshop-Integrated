@extends('layouts.app')

@section('title', 'Privacy Policy - Elegant Shop')

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Privacy Policy</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="static-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="static-content glass-card p-4 p-md-5">
                        <p class="text-muted">Last updated: November 4, 2025</p>
                        <p>ElegantShop ("us", "we", or "our") operates the ElegantShop website (the "Service"). This page informs you of our policies regarding the collection, use, and disclosure of personal information when you use our Service.</p>
                        
                        <h2>Information Collection and Use</h2>
                        <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>
                        <h3>Types of Data Collected</h3>
                        <ul>
                            <li><strong>Personal Data:</strong> While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). This may include, but is not limited to: Email address, First name and last name, Phone number, Address, State, Province, ZIP/Postal code, City, Cookies and Usage Data.</li>
                            <li><strong>Usage Data:</strong> We may also collect information on how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</li>
                        </ul>
                        
                        <h2>Use of Data</h2>
                        <p>ElegantShop uses the collected data for various purposes:</p>
                        <ul>
                            <li>To provide and maintain the Service</li>
                            <li>To notify you about changes to our Service</li>
                            <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                            <li>To provide customer care and support</li>
                            <li>To provide analysis or valuable information so that we can improve the Service</li>
                            <li>To monitor the usage of the Service</li>
                            <li>To detect, prevent and address technical issues</li>
                        </ul>

                        <h2>Security of Data</h2>
                        <p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

                        <h2>Changes to This Privacy Policy</h2>
                        <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

                        <h2>Contact Us</h2>
                        <p>If you have any questions about this Privacy Policy, please contact us:</p>
                        <ul>
                            <li>By email: <a href="mailto:info@elegantshop.com" class="text-primary">info@elegantshop.com</a></li>
                            <li>By phone: <a href="tel:+12345678900" class="text-primary">+1 234 567 8900</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here --}}