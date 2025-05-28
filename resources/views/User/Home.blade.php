<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pure Glanz</title>
    @vite('resources/css/style.css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <meta name="description" content="Professionelle Reinigungsdienste in Rostock – Pure Glanz bietet Ihnen zuverlässige, schnelle und gründliche Reinigung für Haushalte und Unternehmen.">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="{{asset('images/logo233.png')}}" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="main-header">
        <div class="container">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; margin:0; padding:10px 0;" class="logo">
                <img src="/images/logo233.png" alt="PureGlanz Logo" style="height:113px; width:130px" loading="eager">
                <div class="menu-icon" id="menuIcon" onclick="toggleMenu()">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <nav class="nav-links" id="navLinks">
                <a href="#heim">heim</a>
                <a href="#ueber-uns">über unsere</a>
                <a href="#leistungen">Unsere Leistungen</a>
                <a href="#kontakt">Kontaktieren</a>
            </nav>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const nav = document.getElementById("navLinks");
            const icon = document.getElementById("menuIcon");
            nav.classList.toggle("active");
            icon.classList.toggle("active");
        }

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById("navLinks").classList.remove("active");
                document.getElementById("menuIcon").classList.remove("active");
            });
        });
    </script>

    <section id="heim" class="hero" style="background: url('/images/glass-6635671_640.jpg') no-repeat center center / cover;">

        <div class="bubbles">
            <span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span>
        </div>
        <div class="container">
            <div class="hero-text">
                <h1>
                    Professional
                    <span style="color: #1ab79d">Reinigung</span> Dienstleistungen
                </h1>
                <p>
                    Wir bringen Ihr Zuhause oder Büro mit erstklassigen
                    Reinigungslösungen zum Strahlen. Schnell, umweltfreundlich und
                    erschwinglich.
                </p>
                <a href="#kontakt" class="hero-button">Kontaktieren Sie uns jetzt</a>
            </div>
        </div>
    </section>

    <section id="ueber-uns" class="why-us">
        <h2 class="section-title">
            <i class="fas fa-broom" style="color: #ee4962"></i>
            Warum <span style="color: #1ab79d">Pure Glanz</span> wählen?
        </h2>
        <div class="container">
            <div class="features">
                <div class="feature-card">
                    <h3>
                        <i style="color: #ee4962" class="fas fa-users"></i> Zuverlässiges
                        und professionelles Team
                    </h3>
                    <p>
                        Unser erfahrenes Team sorgt für eine hochwertige Reinigung mit
                        Sorgfalt und Sorgfalt Integrität.
                    </p>
                </div>
                <div class="feature-card">
                    <h3>
                        <i style="color: #ee4962" class="fas fa-leaf"></i>
                        Umweltfreundliche Reinigungsprodukte
                    </h3>
                    <p>
                        Wir verwenden umweltfreundliche Produkte für ein saubereres
                        Zuhause und mehr grünerer Planet.
                    </p>
                </div>
                <div class="feature-card">
                    <h3>
                        <i style="color: #ee4962" class="fas fa-tags"></i> Klare und faire
                        Preise
                    </h3>
                    <p>
                        Es gibt keine versteckten Gebühren – nur ehrliche und transparente
                        Preise, die für Sie funktionieren Budget.
                    </p>
                </div>
                <div class="feature-card">
                    <h3>
                        <i style="color: #ee4962" class="fas fa-map-marker-alt"></i>
                        Service in Rostock und Umgebung
                    </h3>
                    <p>
                        Wir sind stolz darauf, Rostock und Umgebung mit zuverlässigen
                        Einheimischen zu bedienen Pflege.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="leistungen" class="services-section">
        <div class="container-content">
            <h2 class="section-title">
                <i class="fas fa-soap" style="color: #ee4962"></i> Unsere
                <span style="color: #1ab79d">Leistungen</span>
            </h2>

            <div class="services-grid">
                @foreach ($services as $service)
                <div class="service-card">
                    <div class="service-image">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="{{ $service->title }}" loading="lazy" />
                    </div>
                    <h3>{{ $service->title }}</h3>
                    <a href="#" class="read-more"
                        data-id="{{ $service->id }}"
                        data-title="{{ $service->title }}">Details lesen <span class="arrow">→</span></a>
                    <div class="hidden-description" id="desc-{{ $service->id }}" style="display: none;">
                        {!! $service->description !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal HTML -->
    <div id="service-modal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="modal-body">
                <h3 id="modal-title" class="modal-heading"></h3>
                <div id="modal-description"></div>
                <div class="modal-footer">
                    <div class="modal-footer">
                        <a href="#kontakt" id="modal-action-btn" class="modal-button">
                            <i class="bx bx-link-external" style="margin-right: 8px;"></i> Kontaktieren Sie uns
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <h2 style="padding-left: 14px;padding-right:14px" id="kontakt" class="section-title">
        <i class="fas fa-envelope" style="color: #ee4962"></i> Kontaktieren
        <span style="color: #1ab79d">Sie uns</span>
    </h2>
    <section style="padding-top: 0px;" class="contact-wrapper">
        <div class="contact-content">
            <!-- Left: Text -->
            <div class="contact-info">
                <h3 style="margin-top:0px">Pure Glanz</h3>
                <p class="tagline">Zuverlässig, Reaktionsschnell, Bemerkenswert sauber.</p>

                <p><i class="fas fa-map-marker-alt"></i><strong>Adresse:</strong> Zum Lebensbaum 16B, 18147 Rostock</p>
                <p><i class="fas fa-phone-alt"></i><strong>Telefon:</strong> <a href="tel:+4917658100358">0049 176 58100358</a></p>
                <p><i style="font-weight: 700;" class="fab fa-whatsapp"></i><strong>WhatsApp:</strong> <a href="https://wa.me/4917658100358" target="_blank">0049 176 58100358</a></p>
                <p><i class="fas fa-envelope"></i><strong>E-Mail:</strong> <a href="https://mail.google.com/mail/?view=cm&fs=1&to=PureGlanzRostock@gmail.com" target="_blank">PureGlanzRostock@gmail.com</a></p>
                <p><i class="fas fa-clock"></i><strong>Öffnungszeiten:</strong> Montag – Freitag: 08:00 – 17:00</p>
                <em class="support-note">*Telefonischer Support auch am Samstag & Sonntag von 12:00 – 16:00 erreichbar</em>
                <p class="response-highlight">📞 Wir antworten schnell — Egal ob Anruf, E-Mail oder Nachricht: Rechnen Sie mit einer schnellen und freundlichen Rückmeldung.</p>
            </div>

            <!-- Right: Map -->
            <div class="map-box">
                <div id="map-consent-box" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;  text-align: center;">
                    <p style="margin-bottom: 20px; width: 62%;margin-right: 26px;">
                        Diese Seite verwendet Google Maps. Durch das Laden der Karte wird Ihre IP-Adresse an Google übermittelt.
                    </p>
                    <button id="accept-map" style="margin-right: 31px; padding: 10px 20px; background-color: #1ab79d; color: white; border: none; border-radius: 5px; cursor: pointer;">
                        Karte laden
                    </button>
                </div>
                <div id="map-container" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </section>

    <script>
        function setCookie(name, value, days) {
            const expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
        }

        function getCookie(name) {
            return document.cookie.split('; ').find(row => row.startsWith(name + '='))?.split('=')[1];
        }

        function loadMap() {
            const iframe = document.createElement('iframe');
            iframe.src = "https://www.google.com/maps?q=54.110644,12.156383&t=k&z=17&output=embed";
            iframe.allowFullscreen = true;
            iframe.loading = "lazy";
            iframe.referrerPolicy = "no-referrer-when-downgrade";
            iframe.style.border = "0";
            iframe.style.width = "100%";
            iframe.style.height = "100%";
            document.getElementById('map-container').appendChild(iframe);
        }

        if (getCookie('mapConsent') === 'true') {
            document.getElementById('map-consent-box').style.display = 'none';
            loadMap();
        }

        document.getElementById('accept-map').addEventListener('click', function() {
            setCookie('mapConsent', 'true', 30);
            document.getElementById('map-consent-box').style.display = 'none';
            loadMap();
        });
    </script>


    <footer style="background-image: url('/images/footer-bg.png')">
        <div>
            <p style="color: white;">
                © 2025 Shadi Kurdi Reinigungsservice – Alle Rechte vorbehalten.
            </p>
            <p>
                <a href="{{ route('View.Impressum') }}" style="color: #1ab79d; text-decoration: none; margin: 0 10px;">Impressum</a> |
                <a href="{{ route('View.Datenschutz') }}" style="color: #1ab79d; text-decoration: none; margin: 0 10px;">Datenschutzerklärung</a>
            </p>
            <p style="margin-top: 10px; font-size: 12px;color: white;">
                Einige Bilder auf dieser Website stammen aus externen Quellen (z. B. <a href="https://pixabay.com" target="_blank" style="color: #1ab79d; text-decoration: underline;">pixabay.com</a>) und wurden gemäß ihrer Lizenz verwendet.
            </p>
        </div>
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @vite('resources/js/script.js')
</body>

</html>