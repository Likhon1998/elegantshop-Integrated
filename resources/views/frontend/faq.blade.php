@extends('layouts.app')

@section('title', 'FAQ - Elegant Shop')

{{-- No @section('styles') or @section('scripts') needed as they are handled in app.blade.php --}}

@section('content')

    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Frequently Asked Questions</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="faq-header text-center">
                        <span class="section-subtitle">Help Center</span>
                        <h2 class="section-title">How Can We Help You?</h2>
                    </div>
                    
                    <div class="accordion" id="faqAccordion">
                        
                        <div class="accordion-item glass-card">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is your return policy?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We offer a **30-day return policy** for most items. Products must be returned in their original condition, unused, and with all tags attached. To initiate a return, please visit your account's "<a href="{{ url('account/orders') }}" class="text-primary">My Orders</a>" page and select the items you wish to return.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item glass-card">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How do I track my order?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Once your order has shipped, you will receive a confirmation email with a tracking number. You can use this number on the carrier's website to track your package. You can also find the tracking information in the "<a href="{{ url('account/orders') }}" class="text-primary">My Orders</a>" section of your account.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item glass-card">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We accept all major credit cards (**Visa, Mastercard, American Express**), **PayPal**, and various other secure payment methods. All transactions are encrypted for your safety.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item glass-card">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How long does shipping take?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Standard shipping typically takes **3-5 business days**. We also offer expedited (2-day) and overnight shipping options at checkout for an additional fee. International shipping times may vary based on the destination.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item glass-card">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Do you offer international shipping?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, we ship to over 50 countries worldwide. International shipping costs and delivery times are calculated at checkout based on your location and the weight of your order. Please note that customers are responsible for any applicable customs duties or taxes.
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

{{-- No custom JS needed here, relying on Bootstrap and main.js in app.blade.php --}}