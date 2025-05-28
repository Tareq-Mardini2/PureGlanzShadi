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
                <a href="{{ route('View.Home.Page') }}">heim</a>
                <a href="{{ route('View.Home.Page') }}">über unsere</a>
                <a href="{{ route('View.Home.Page') }}">Unsere Leistungen</a>
                <a href="{{ route('View.Home.Page') }}">Kontaktieren</a>
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
    <hr style="margin: 0px;">
    <section class="why-us">
        <h2 style="font-size: 30px;" class="section-title">
            <i class="fas fa-shield-alt" style="color: #ee4962"></i>
            Unsere <span style="color: #1ab79d">Datenschutzerklärung</span>
        </h2>
        <div class="container">
            <section class="datenschutz-section">
                <h3 style="color: #1ab79d; margin-top:0px">
                    Datenschutz – Ihre Privatsphäre zählt
                </h3>

                <p>
                    Wir freuen uns über Ihr Interesse an unserem Reinigungsservice. Der Schutz Ihrer persönlichen Daten ist uns wichtig – deshalb halten wir alles so einfach und transparent wie möglich.
                </p>

                <h3 style="color: #1ab79d">Keine Datenerfassung</h3>
                <p>
                    Beim Besuch unserer Website werden durch uns keine personenbezogenen Daten erfasst. Es gibt kein Kontaktformular, keine Registrierung und keine Cookies, die durch uns gesetzt werden.
                </p>

                <h3 style="color: #1ab79d">Google Maps – Nur mit Ihrer Zustimmung</h3>
                <p>
                    Um Ihnen unseren Standort zu zeigen, nutzen wir Google Maps. Dieser Dienst wird von Google Ireland Limited, Gordon House, Barrow Street, Dublin 4, Irland bereitgestellt.
                </p>
                <p>
                    Die Karte wird <strong>erst geladen, wenn Sie dem ausdrücklich zustimmen</strong>. Erst dann wird Ihre IP-Adresse an Google übermittelt. Ohne Zustimmung bleibt die Karte deaktiviert und es findet keine Datenübertragung statt.
                </p>

                <h3 style="color: #1ab79d">Ihre Rechte</h3>
                <p>
                    Auch wenn wir keine Daten erheben, möchten wir Sie darauf hinweisen, dass Ihnen laut DSGVO folgende Rechte zustehen: Auskunft, Berichtigung, Löschung, Einschränkung der Verarbeitung und Widerspruch.
                </p>

                <h3 style="color: #1ab79d">Kontakt</h3>
                <p>
                    Bei Fragen zum Datenschutz erreichen Sie uns unter:
                </p>
                <p>Shadi kurdi (Reinigungsservice)</p>
                <p>Zum Lebensbaum 16B</p>
                <p>18147 Rostock</p>
                <p>E-Mail: PureGlanzRostock@gmail.com</p>

                <p>
                    Weitere Informationen zu Google finden Sie hier:
                    <a href="https://policies.google.com/privacy" target="_blank" class="text-blue-600 underline">https://policies.google.com/privacy</a>
                </p>
            </section>

        </div>
    </section>
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
    @vite('resources/js/script.js')
</body>

</html>