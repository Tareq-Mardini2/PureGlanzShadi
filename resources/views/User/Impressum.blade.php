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
        <h2 style="font-size: 30px;padding-top: 25px;" class="section-title">
            <i class="fas fa-file-alt" style="color: #ee4962"></i>
            Unser <span style="color: #1ab79d">Impressum</span>
        </h2>

        <div class="container">
            <section class="datenschutz-section">
                <h3 style="color: #1ab79d; margin-top:0px">Angaben gemäß § 5 TMG</h3>
                <p>
                    Shadi Kurdi (Reinigungsservice)<br>
                    Zum Lebensbaum 16B<br>
                    18147 Rostock<br>
                    Deutschland
                </p>

                <h3 style="color: #1ab79d">Vertreten durch:</h3>
                <p>
                    Shadi Kurdi
                </p>

                <h3 style="color: #1ab79d">Kontakt</h3>
                <p>
                    Telefon: 0049 176 58100358<br>
                    E-Mail: PureGlanzRostock@gmail.com
                </p>


                <h3 style="color: #1ab79d">Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV</h3>
                <p>
                    Shadi Kurdi<br>
                    Zum Lebensbaum 16B<br>
                    18147 Rostock
                </p>

                <h3 style="color: #1ab79d">Haftung für Inhalte</h3>
                <p>
                    Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen.
                </p>

                <h3 style="color: #1ab79d">Haftung für Links</h3>
                <p>
                    Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen.
                </p>

                <h3 style="color: #1ab79d">Urheberrecht</h3>
                <p>
                    Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Downloads und Kopien dieser Seite sind nur für den privaten, nicht kommerziellen Gebrauch gestattet.
                </p>
                <p>
                    Einige Bilder auf dieser Website stammen aus externen Quellen (z. B. <a href="https://pixabay.com" target="_blank" style="color: #1ab79d; text-decoration: underline;">pixabay.com</a>) und wurden gemäß der dort angegebenen Lizenzbedingungen verwendet. Diese Inhalte sind ebenfalls entsprechend gekennzeichnet, soweit dies erforderlich ist.
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