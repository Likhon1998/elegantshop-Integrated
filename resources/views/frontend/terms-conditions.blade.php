@extends('layouts.app')

@section('title', 'Terms & Conditions - Elegant Shop')

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <!-- ===== BREADCRUMB / PAGE HEADER ===== -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Terms & Conditions</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Terms & Conditions</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATIC CONTENT SECTION (Terms & Conditions) ===== -->
    <section class="static-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="static-content glass-card p-4 p-md-5">
                        <p class="text-muted">Last updated: November 4, 2025</p>
                        <p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the **ElegantShop** website (the "Service") operated by ElegantShop ("us", "we", or "our").</p>
                        <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users, and others who access or use the Service.</p>
                        
                        <h2>1. Accounts</h2>
                        <p>When you create an account with us, you must provide us with information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>
                        <p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>
                        
                        <h2>2. Intellectual Property</h2>
                        <p>The Service and its original content, features, and functionality are and will remain the exclusive property of **ElegantShop** and its licensors. The Service is protected by copyright, trademark, and other laws of both the United States and foreign countries.</p>

                        <h2>3. Links to Other Web Sites</h2>
                        <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by ElegantShop. ElegantShop has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that ElegantShop shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                        
                        <h2>4. Termination</h2>
                        <p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. Upon termination, your right to use the Service will immediately cease.</p>

                        <h2>5. Limitation of Liability</h2>
                        <p>In no event shall ElegantShop, nor its directors, employees, partners, agents, suppliers, or affiliates, be liable for any indirect, incidental, special, consequential or punitive damages, including without limitation, loss of profits, data, use, goodwill, or other intangible losses, resulting from (i) your access to or use of or inability to access or use the Service; (ii) any conduct or content of any third party on the Service; (iii) any content obtained from the Service; and (iv) unauthorized access, use or alteration of your transmissions or content, whether based on warranty, contract, tort (including negligence) or any other legal theory, whether or not we have been informed of the possibility of such damage, and even if a remedy set forth herein is found to have failed of its essential purpose.</p>

                        <h2>6. Governing Law</h2>
                        <p>These Terms shall be governed and construed in accordance with the laws of New York, United States, without regard to its conflict of law provisions.</p>
                        
                        <h2>7. Changes</h2>
                        <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                        
                        <h2>Contact Us</h2>
                        <p>If you have any questions about these Terms, please contact us:</p>
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
