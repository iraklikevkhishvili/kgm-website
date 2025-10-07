@extends('layouts.default')
@section('title')
    KGM | About Us
@endsection

@section('head-end')
    @vite (['resources/scss/pages/about.scss'])
@endsection
@section(section: 'content')
    <section class="hero hero--about">
        <div class="hero__media">
            <img src="/static/media/images/Our Vineyards | Grgich Hills Estate - Best Vineyards in Napa.jpg" alt="">
        </div>
        <div class="hero__content">
            <h1 class="hero__title">ABOUT US</h1>
            <h4 class="hero__subtitle">Since 1844, Penfolds has been grounded in experimentation, curiosity and
                uncompromising quality.</h4>
            <p class="hero__text">Our success has been driven by a lineage of visionary winemakers. It began with Dr
                Christopher and Mary
                Penfold, the pioneers who dreamed big, inventing tonics, brandies, and fortified wines made from grapes and
                Australian sunshine. It continued with Alf Vesey, Ray Beckwith and Max Schubert, celebrated winemaking
                legends who pushed our development to extraordinary, bold new heights.</p>
            <p class="hero__text">It is this pioneering spirit and curiosity that still rings true after nearly two
                centuries, it is what has
                helped us become one of the most celebrated winemakers in the world today.</p>
        </div>
    </section>
    <section class="section-2">
        <div class="section-2-inner">
            <div class="heading-wrapper">
                <h2>discover KGM</h2>
            </div>
            <div class="about-carousel-wrapper">
                <div class="about-carousel-inner">
                    <article class="about-carousel-container">
                        <a href="{{ route('about.story') }}" target="_blank">
                            <img src="https://kgmwines.com/wp-content/uploads/Viticoltori-Eroici-1.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>our story</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.company') }}" target="_blank">
                            <img src="https://kgmwines.com/wp-content/uploads/Viticoltori-Eroici-1.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>our company</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.team') }}" target="_blank">
                            <img src="/static/media/images/Wedding venue design_ Rustic barrel display under….jpg"
                                alt="">
                            <div class="text-wrapper">
                                <h3>our team</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.export') }}" target="_blank">
                            <img src="https://kgmwines.com/wp-content/uploads/Viticoltori-Eroici-1.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>export</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.story') }}" target="_blank">
                            <img src="/static/media/images/A late late late harvest….jpg" alt="">
                            <div class="text-wrapper">
                                <h3>winemaking</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.story') }}" target="_blank">
                            <img src="https://kgmwines.com/wp-content/uploads/Viticoltori-Eroici-1.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>our winery</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.story') }}" target="_blank">
                            <img src="https://kgmwines.com/wp-content/uploads/Viticoltori-Eroici-1.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>our vineyards</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>
                    <article class="about-carousel-container">
                        <a href="{{ route('about.story') }}" target="_blank">
                            <img src="/static/media/images/Unknown-4.jpg" alt="">
                            <div class="text-wrapper">
                                <h3>awards</h3>
                                <button>discover</button>
                            </div>
                        </a>
                    </article>

                </div>
            </div>
        </div>
    </section>
    <section class="section--3">
        <div class="section--3--content">
            <div class="text--wrapper">
                <h3 class="heading">join the family</h3>
                <h4 class="subheading">shape the future of Georgian winemaking</h2>
                    <p class="text">At KGM, we believe in more than just wine — we believe in people. Whether you’re
                        rooted in tradition
                        or driven by innovation, you’ll find a place to thrive in our diverse and passionate team. Join a
                        family-owned company with deep heritage and bold ambitions, and help us craft stories in every
                        bottle we share with the world.</p>
                    <div class="nav__link nav__button__wrapper">
                        <a href="" class="">explore careers</a>
                    </div>
            </div>
            <div class="image__zoom image">
                <img src="https://kgmwines.com/wp-content/uploads/Round-Pond-Gravel-Series-The-Taste-Edit.jpg"
                    alt="">
            </div>
        </div>
    </section>
    <section class="secton-3">
        <button class="submitbtn">learn more</button>
        <br>
        <a href="" class="navbtn">learn more</a>
        <br>
        <br>
        <a href="" class="something1">abour</a>
        <br><br>
        <a href="" class="something2">home</a>
        <br><br>
        <a href="" class="something3">awards</a>


        <div class="div-1"></div>
        <div class="div-2"></div>

        <h1 class="h1-1"> sometrhing somehtign</h1>
        <h1 class="h1-2"> sometrhing somehtign</h1>
        <h1 class="h1-3"> sometrhing somehtign</h1>
    </section>

    <section class="section-4">
        <h1>about us</h1>
        <h2>Our Winemaking Philosophy</h2>
        <h3>WORK FOR PENFOLDS</h3>
        <h4>Since 1844, Penfolds has been grounded in experimentation, curiosity and uncompromising quality.</h4>
        <h5></h5>
        <h6></h6>
        <p>Our success has been driven by a lineage of visionary winemakers. It began with Dr Christopher and Mary Penfold,
            the pioneers who dreamed big, inventing tonics, brandies, and fortified wines made from grapes and Australian
            sunshine. It continued with Alf Vesey, Ray Beckwith and Max Schubert, celebrated winemaking legends who pushed
            our development to extraordinary, bold new heights.</p>
        <p>It is this pioneering spirit and curiosity that still rings true after nearly two centuries, it is what has
            helped us become one of the most celebrated winemakers in the world today.</p>
    </section>
@endsection


@section('body-end')
    @vite (['resources/js/pages/about.js'])
@endsection
