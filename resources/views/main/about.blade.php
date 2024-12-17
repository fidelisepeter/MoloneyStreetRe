@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <!-- About Us Page Start -->

    <div class="d-flex align-items-center justify-content-between news-item-header mb-3 z-index-over-social-links bg-light">
        <h2 class="m-0 title">{{ $page_title ?? 'About Us' }}</h2>
        <a class="link-home  font-weight-medium text-decoration-none" href="{{ route('home.index') }}">Go Back
            Home</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="bg-light mb-3" style="padding: 30px;">
                <h3 class="font-weight-bold">Welcome to MoloneyStreet.com</h3>
                <p>
                    MoloneyStreet.com is a dynamic financial markets platform dedicated to providing comprehensive
                    and accurate information on various financial aspects that impact everyday life. Our platform
                    stands out as a one-stop hub for individuals looking to make informed financial decisions with
                    ease and confidence.
                </p>
                <h3 class="font-weight-bold">Our Mission</h3>
                <p>
                    At MoloneyStreet.com, our mission is to empower ordinary people with the financial knowledge and
                    tools they need to navigate the complex world of finance. We aim to bridge the information gap
                    by offering real-time data, insightful analysis, and user-friendly tools that cater to both
                    novice and experienced users.
                </p>
                <h3 class="font-weight-bold">What We Offer</h3>
                <ul>
                    <li><strong>Stock Prices:</strong> Stay updated with the latest stock prices and market trends.
                        Our platform provides real-time updates and historical data to help you make informed
                        investment decisions.</li>
                    <li><strong>Money Transfer Rates:</strong> Get the latest exchange rates for the Naira and other
                        currencies. We provide accurate and timely information to help you get the best rates for
                        your money transfers.</li>
                    <li><strong>Courier/Freight Data:</strong> Explore our comprehensive courier and freight data to
                        find the best shipping options for your needs. Whether you are sending packages locally or
                        internationally, we provide the information you need to make cost-effective decisions.</li>
                    <li><strong>Financial Tools:</strong> Utilize our suite of financial tools designed to simplify
                        your financial planning. From budget calculators to investment trackers, we have the tools
                        you need to manage your finances effectively.</li>
                </ul>
                <h3 class="font-weight-bold">Our Commitment to Quality</h3>
                <p>
                    Quality and accuracy are at the heart of what we do at MoloneyStreet.com. Our dedicated team of
                    financial experts, analysts, and data scientists work tirelessly to ensure that the information
                    we provide is both accurate and up-to-date. We are committed to maintaining the highest
                    standards of integrity and transparency in all our offerings.
                </p>
                <h3 class="font-weight-bold">Community Engagement</h3>
                <p>
                    We believe in the power of community and strive to foster a supportive environment for our
                    users. Our platform includes forums, discussion boards, and Q&A sections where users can share
                    insights, ask questions, and learn from each other. We encourage active participation and value
                    the contributions of our community members.
                </p>
                <h3 class="font-weight-bold">Educational Resources</h3>
                <p>
                    At MoloneyStreet.com, we are dedicated to promoting financial literacy. Our platform features a
                    wealth of educational resources, including articles, tutorials, webinars, and eBooks, designed
                    to help users understand complex financial concepts and make better financial decisions. Our
                    goal is to make financial knowledge accessible to everyone.
                </p>
                <h3 class="font-weight-bold">Join Us on Our Journey</h3>
                <p>
                    We invite you to join us on our journey towards financial empowerment. Whether you are looking
                    to stay updated on market trends, find the best exchange rates, or simply learn more about
                    managing your finances, MoloneyStreet.com is here to support you every step of the way.
                </p>
                <p>
                    Thank you for choosing MoloneyStreet.com as your trusted financial information and tools
                    provider. Together, we can make informed decisions and achieve financial success.
                </p>
            </div>
        </div>
    </div>
    <!-- About Us Page End -->
@endsection

@section('styles')

    <style>
        .news-item-header {
            background: var(--body-bg-bodyer);
        }

        .news-item-header .title {
            color: var(--color-white);
            background: var(--color-primary);
            padding: 10px 60px 10px 20px;
            text-decoration: none;
            font-size: 1.5rem;
            clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);
        }

        .news-item-header .link-home {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: 800;
            padding: 8px 25px 8px 35px;
            background: var(--body-bg-lighter);
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);

        }
    </style>
@endsection
