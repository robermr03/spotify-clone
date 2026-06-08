# 🎵 Melodify — Spotify Architecture Clone

A music streaming platform built with Laravel, replicating Spotify's core architecture. Not just a UI clone — a real implementation of the technical decisions behind a production-grade streaming service.

![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-4FC08D?style=flat&logo=vue.js&logoColor=white)
![AWS](https://img.shields.io/badge/AWS-232F3E?style=flat&logo=amazonaws&logoColor=white)
![Redis](https://img.shields.io/badge/Redis-DC382D?style=flat&logo=redis&logoColor=white)

---

## ✨ Features

- 🔐 **Authentication** — Laravel Sanctum with session-based auth
- 🎵 **Audio streaming** — Files stored and served from AWS S3
- 🎛️ **Persistent player** — Global state with Pinia, plays across page navigation
- 📋 **Playlists** — Create, edit and manage personal playlists
- 🎨 **Admin panel** — Full content management with Filament v5
- ⚡ **Real-time** — Friend activity with Laravel Reverb and WebSockets
- 🤖 **Recommendations** — History-based suggestions via background Jobs and Redis
- 🐳 **Docker** — Full environment with Docker Compose

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12, PHP 8.2 |
| Frontend | Vue 3, Inertia.js, Tailwind CSS |
| State | Pinia |
| Database | MySQL, Redis |
| Storage | AWS S3 |
| Admin | Filament v5 |
| Real-time | Laravel Reverb |
| Auth | Laravel Sanctum |

---

## ⚙️ Installation

**1. Clone the repository**

    git clone https://github.com/robermr03/spotify-clone.git
    cd spotify-clone

**2. Install dependencies**

    composer install
    npm install

**3. Environment setup**

    cp .env.example .env
    php artisan key:generate

**4. Configure your `.env`**

    DB_CONNECTION=mysql
    DB_DATABASE=spotify_clone
    DB_USERNAME=root
    DB_PASSWORD=

    AWS_ACCESS_KEY_ID=your_key
    AWS_SECRET_ACCESS_KEY=your_secret
    AWS_DEFAULT_REGION=eu-north-1
    AWS_BUCKET=your_bucket

    MAIL_MAILER=smtp
    MAIL_HOST=127.0.0.1
    MAIL_PORT=1025

**5. Run migrations and seeders**

    php artisan migrate --seed

**6. Start all services**

    # Terminal 1 — Laravel
    php artisan serve

    # Terminal 2 — Assets
    npm run dev

    # Terminal 3 — Mailpit
    mailpit

**7.** Open `http://localhost:8000`

---

## 📁 Project Structure

    app/
    ├── Http/Controllers/
    │   ├── Auth/AuthController.php
    │   ├── DashboardController.php
    │   ├── ArtistController.php
    │   └── AlbumController.php
    ├── Models/
    │   ├── Song.php           # file_url accessor → S3 URL
    │   ├── Artist.php
    │   ├── Album.php
    │   └── Playlist.php
    ├── Filament/Resources/
    └── ...

    resources/js/
    ├── Pages/
    ├── Components/
    │   └── Player.vue         # Persistent audio player
    ├── Layouts/
    │   └── AppLayout.vue
    └── stores/
        └── player.js          # Pinia store — global audio state

---

## 🔄 How the player works

The Audio object lives outside Vue so it is never destroyed on navigation — this is what makes the player persistent.

    User clicks a song
        → player.play(song) called on Pinia store
        → Audio element loads S3 URL
        → Song plays without interruption across navigation
        → timeupdate listener syncs progress bar in real-time

---

## 📸 Screenshots

<!-- Add screenshots here -->

---

## 🚀 Roadmap

- [ ] Likes and saved songs
- [ ] Search with Laravel Scout
- [ ] Redis caching and trending songs
- [ ] Real-time friend activity with Reverb
- [ ] Recommendations engine with background Jobs
- [ ] Docker Compose full setup
- [ ] Tests with Pest

---

## 👨‍💻 Author

**Roberto Romero Monge**
[LinkedIn](https://www.linkedin.com/in/roberto-romero-monge/) · [GitHub](https://github.com/robermr03)
