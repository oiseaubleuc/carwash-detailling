# Carwash Detailling (Laravel Project)

Carwash Detailling is een praktijkproject gebouwd met Laravel (MVC-architectuur) dat gericht is op het aanbieden en beheren van carwash- en detailing-services. De applicatie bevat:

- Gebruikersregistratie en login
- Admin dashboard met gebruikers-, diensten- en boekingenbeheer
- Reserveringssysteem met tijdsloten
- Blade templates voor consistente UI

## Technische details

- Framework: Laravel 10.x
- Auth: Laravel Breeze
- Database: MySQL / SQLite (afhankelijk van omgeving)
- Assets: Vite

## Seeders & Admin

- Er is een `UserSeeder` die een admin gebruiker aanmaakt met:
	- **Email:** `admin@carwash.be`
	- **Wachtwoord:** `password`

- Je kunt de admin ook (aanmaken of bijwerken) via het artisan-commando:

	php artisan admin:create admin@carwash.be YourSecurePassword

	Gebruik deze opdracht om het wachtwoord direct te veranderen.


## Screenshots (geordend) 🖼️

De project-screenshots bevinden zich in `public/screenshot/` en zijn **nummeriek geordend** zodat ze de belangrijkste views en flow van de applicatie tonen.

| Bestand | Voorvertoning | Beschrijving |
|---|---:|---|
| `screen1.png` | <img src="public/screenshot/screen1.png" width="240" alt="screen1"> | **Admin Dashboard** — overzichtsscherm wanneer een admin is ingelogd (statistieken, snelle acties).
| `screen2.png` | <img src="public/screenshot/screen2.png" width="240" alt="screen2"> | **Home - Diensten** — sectie met diensten en korte omschrijvingen.
| `screen3.png` | <img src="public/screenshot/screen3.png" width="240" alt="screen3"> | **Service cards** — gedetailleerde weergave van pakketten en prijzen.
| `screen4.png` | <img src="public/screenshot/screen4.png" width="240" alt="screen4"> | **Feature sectie** — 'Waarom kiezen' / voordelen en iconen.
| `screen5.png` | <img src="public/screenshot/screen5.png" width="240" alt="screen5"> | **Homepage hero** — grote titel, call-to-action-knoppen en intro-tekst.

Als je liever andere omschrijvingen wilt gebruiken of een andere volgorde wilt markeren, laat het me weten dan pas ik het aan.

---

## Project Preview — duidelijke layout met grote screenshots 🔍

Hieronder vind je een overzichtelijke weergave van belangrijke pagina's in het project. Elke afbeelding is klikbaar om de volledige resolutie te bekijken.

### Market Overview
<p>
<a href="public/screenshot/screen1.png">
	<img src="public/screenshot/screen1.png" alt="Market Overview" style="max-width:100%;border-radius:6px;box-shadow:0 6px 18px rgba(0,0,0,0.4)">
</a>
</p>
**Beschrijving:** Het Market Overview scherm toont realtime prijzen, 24u-variaties en samenvattende kaarten met totalen (total value, total investment, profit/loss). Dit is ideaal als eerste scherm voor gebruikers die marktdata willen volgen.

---

### Portfolio Management
<p>
<a href="public/screenshot/screen2.png">
	<img src="public/screenshot/screen2.png" alt="Portfolio Management" style="max-width:100%;border-radius:6px;box-shadow:0 6px 18px rgba(0,0,0,0.4)">
</a>
</p>
**Beschrijving:** Portfolio view met overzichtskaarten en individuele investeringsregels (hoeveelheid, aankoopprijs, huidige prijs en winst/verlies). Gebruikers kunnen posities toevoegen of verwijderen en realtime waarde volgen.

---

### Extra views
<div>
	<a href="public/screenshot/screen3.png"><img src="public/screenshot/screen3.png" alt="Service cards" width="320" style="margin:6px;border-radius:6px"></a>
	<a href="public/screenshot/screen4.png"><img src="public/screenshot/screen4.png" alt="Feature section" width="320" style="margin:6px;border-radius:6px"></a>
	<a href="public/screenshot/screen5.png"><img src="public/screenshot/screen5.png" alt="Homepage hero" width="320" style="margin:6px;border-radius:6px"></a>
</div>

**Toelichting:** De extra screenshots tonen respectievelijk service-kaarten, feature-sectie en home-hero — dit helpt bij het presenteren van de visuele flow van de site.

## Installatie

1. Clone the repo
2. Composer install: `composer install`
3. Copy `.env.example` → `.env` and set DB credentials
4. Run migrations & seeders: `php artisan migrate --seed`
5. Serve: `php artisan serve`

## Bekende punten & tips

- Pas altijd het admin-wachtwoord aan vóór productie.
- Check `.env` mail-instellingen als je e-mails wil laten werken.

---

Als je wilt dat ik de afbeeldingen ook uitputtend optimaliseer of een afbeelding CDN instel, zeg het even — ik kan dat toevoegen of uitvoeren.
