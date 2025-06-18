@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header"></div>

                <div id="gymCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/1.png') }}" class="d-block w-100" alt="La nostra palestra">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h1>La Nostra Palestra</h1>
                    <p>
                        Benvenuti nella nostra palestra! Siamo dedicati a fornire un ambiente
                        supportivo e motivante per aiutarti a raggiungere i tuoi obiettivi di
                        fitness. La nostra struttura all'avanguardia è dotata delle più recenti
                        attrezzature e offre una varietà di corsi per soddisfare tutti i livelli
                        di preparazione fisica.
                    </p>
                    <p>
                        Il nostro team di trainer esperti è appassionato nell'aiutarti a
                        raggiungere il tuo pieno potenziale. Che tu stia cercando di perdere
                        peso, aumentare la massa muscolare o migliorare la tua salute generale,
                        siamo qui per guidarti in ogni fase del percorso.
                    </p>
                    <p>
                        Unisciti alla nostra comunità oggi e scopri la differenza!
                    </p>
                    <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">

                        <a style=""> <h2>Riscatta la tua prova Gratuita </h2></a>
                            <h3 class="text-uppercase"> Coach Connect </h3>
                            <p>
                                <br>
                                &nbsp;<i class="fa fa-map-marker"></i>&nbsp;
                                <span itemprop="streetAddress">
                                    Via Roma 123, Pescara (PE) - 65100
                                </span>
                            </p>
                            <br>
                            <p style="text-align:left">
                                </p><div><span style="color: #2377e6;"><strong>Coach Connect</strong></span> è anche a <span style="color: #2377e6;"><strong>Pescara</strong></span><br><br></div><br><div>L'esperienza maturata in anni di attività nel settore del Fitness ci ha permesso di diventare il primo Brand Italiano per&nbsp; numero di strutture aperte.&nbsp;<br><br></div><br><div>Il Club di <span style="color: #2377e6;"><strong>Pescara</strong></span> si trova vicinissimo al centro città, in un punto facilmente raggiungibile con l'auto o con i mezzi pubblici.<br><br></div><br><div>Ti accoglieremo in un ambiente luminoso ed ospitale dove troverai tantissimi attrezzi Fitness a marchio <em>Matrix,</em> un'ampia sala corsi ed aree relax , in uno spazio di 1.100mq in totale.<br><br></div><br><div>Cosa troverai in <span style="color: #2377e6;"><strong>Coach Connect</strong></span>? <br>Un palinsesto corsi ricco e completo, una squadra di Personal Trainer preparatissimi e tantissimi servizi illimitati pensati apposta per te.<br><br></div><br><div>Scegli di allenare la felicità, scegli <span style="color: #2377e6;"><strong>Coach Connect!</strong></span></div><br><div>&nbsp;</div>
                            <p></p>
                            <br>
                            <p>
                                <strong>Orari palestra</strong><br>
                                        <span>La struttura è completamente automatizzata ed aperta <strong>24h/24h, 7 giorni su 7!</strong></span>
                            </p>
                            <p>
                                    <strong>Orari reception</strong><br>

                                <i class="fa fa-clock-o"></i>&nbsp;
                                <span>Lun-Ven 09:00-21:00 | Sab 09:00 - 17:00 | Dom 09:00 - 13:00</span>
                            </p>
                            <div class="row" style="text-align:left;">
                                <br>
                                    <div class="col-md-12 col-sm-12">
                                        <i class="fa fa-phone"></i>
                                        <span>
                                            <a href="tel:+39 123456789"> +39 123456789</a>
                                        </span>
                                    </div>

                                <br>
                                    <div class="col-md-12 col-sm-12">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <span>
                                            <a href="mailto:pescara@coachconnect.it">pescara@coachconnect.it</a>
                                        </span>
                                    </div>

                                <br>
                                    <div class="col-md-12 col-sm-12">

                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                        <span>
                                            <a rel="nofollow" href="https://www.facebook.com/" target="_blank">Coach Connect</a>
                                        </span>
                                    </div>

                                <br>
                                <div class="col-md-12 col-sm-12">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                    <span>
                                        <a href="https://www.instagram.com">Coach Connect</a>
                                    </span>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection