# Web3Class

Web3Class is a Laravel learning platform for introducing students to Web3, crypto, wallets, exchanges, trading basics, airdrops, and career paths in the ecosystem. The application combines lesson content, quiz-based progression, unlockable demos, referrals, and a market-aware landing page into one guided learning experience.

The current course is organized as 26 lesson cycles, starting with Web3 fundamentals and ending with jobs in Web3.

## What This App Does

- Presents a public landing page with a course call-to-action, crypto market data, and optional crypto news from CoinGecko.
- Supports email/password registration, login, profile management, password reset, and Google OAuth login.
- Tracks each learner's `lesson_progress`, points, ads-to-play penalties, referral code, referrer, and referral points.
- Gates lesson material so users can only view lessons they have unlocked.
- Uses quizzes from the `questions_and_answers` table to decide whether a user advances to the next lesson.
- Unlocks practical demos after the learner reaches the required lesson progress.
- Protects private lesson images behind authenticated routes.
- Collects waitlist emails from the landing page.

## Core Learning Flow

1. A visitor registers or signs in.
2. New learners start the class from `/startclass`, which moves them into lesson 1.
3. The dashboard loads the learner's current lesson, lesson material, quiz questions, previous/next lesson titles, and referral information.
4. The learner answers the lesson quiz.
5. Correct answers advance the learner to the next lesson. Incorrect answers add `ads_to_play` and deduct points.
6. Older unlocked lessons can be viewed through `/viewmaterial/{id}`.
7. Interactive demos become available only after the required progress has been reached.

## Course Outline

The lesson map lives in `app/Services/lessonmap.php` and points to Blade lesson components in `resources/views/components/lessonmaterials`.

- Intro to Web3
- Blockchain
- Cryptography and cryptocurrency
- Crypto as accepted money
- Crypto terminology
- Bitcoin
- Altcoins
- Token DEX listing, liquidity, and price
- Token CEX listing
- Tokenomics dynamics
- Creating a wallet
- Common mistakes
- Decentralized exchanges
- Centralized exchanges
- Placing orders
- Airdrops
- Participating in airdrops
- Crypto trading
- Degen trading
- Trading tools
- Funding a wallet
- Crypto investing
- Trading candlesticks
- Basic analysis and indicators
- HWWW of trading
- Jobs in Web3

## Tech Stack

- Laravel 12
- PHP 8.2+
- Laravel Breeze authentication scaffolding
- Laravel Socialite for Google login
- Blade components and views
- Tailwind CSS 4 and Vite
- Alpine.js
- SQLite by default, configurable through Laravel database settings
- CoinGecko API integration for market data and news

## Important Routes

- `/` and `/welcome` - public landing page
- `/register` - learner registration, including optional referral code handling
- `/login` - learner login
- `/auth/google` - Google OAuth redirect
- `/auth/google/callback` - Google OAuth callback
- `/dashboard` - authenticated learner dashboard
- `/startclass` - starts a new learner's first lesson
- `/question` - submits lesson quiz answers
- `/viewmaterial/{id}` - views unlocked lesson material
- `/demo/metamask-demo` - wallet demo, unlocked at lesson progress 12
- `/demo/placing-orders` - order placement demo, unlocked at lesson progress 16
- `/lesson-images/{filename}` - authenticated private lesson image access
- `/joinwaitlist` - waitlist email submission
- `/company/{slug}` - company page

## Local Setup

Clone the project, install dependencies, configure the environment, migrate the database, and start the Laravel/Vite development stack.

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
composer run dev
```

The `composer run dev` command starts the Laravel server, queue listener, log tailing, and Vite together.

If you prefer to run services separately:

```bash
php artisan serve
npm run dev
php artisan queue:listen --tries=1
```

## Environment Variables

The app can run locally without paid API credentials, but these values are used when available:

```env
APP_NAME=Web3Class
APP_URL=http://localhost:8000

GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

COINGECKO_API_KEY=
COINGECKO_PRO_URL=https://pro-api.coingecko.com/api/v3
COINGECKO_DEMO_URL=https://api.coingecko.com/api/v3
```

Market prices use CoinGecko's public API when no API key is configured. Crypto news requires a CoinGecko API key.

## Database Notes

The learning engine expects lesson quiz data in the `questions_and_answers` table. Each row belongs to a `learning_cycle` and can include:

- `material_title`
- `lesson_video`
- `question`
- answer/options fields used by the quiz UI and submission logic

The user table is extended by the application to store lesson and referral state, including:

- `lesson_progress`
- `ads_to_play`
- `points`
- `authcreatetype`
- `referral_code`
- `referrer`
- `referral_points`

Make sure your migrations and seed data include the columns used by the controllers and views before running the full learning flow.

## Working With Lessons

To add or rename a lesson:

1. Create or update the Blade component in `resources/views/components/lessonmaterials`.
2. Register the lesson slug in `app/Services/lessonmap.php`.
3. Add matching quiz/material rows to `questions_and_answers` using the same `learning_cycle`.
4. Update any unlock requirements in `app/Http/Controllers/DemoController.php` if the lesson affects demos.

## Tests

Run the PHP test suite with:

```bash
composer test
```

Build frontend assets with:

```bash
npm run build
```

## Project Structure

- `app/Http/Controllers` - landing page, dashboard, lesson, demo, profile, and auth controllers
- `app/Services` - lesson map and referral code service
- `resources/views` - Blade pages and components
- `resources/views/components/lessonmaterials` - course lesson content
- `resources/views/components/democenter` - interactive demo views
- `resources/js/demo` - demo JavaScript
- `public/css` - additional public stylesheets
- `database/migrations` - database schema

## Application Goal

The goal of Web3Class is to make Web3 education practical, sequential, and beginner-friendly. Learners should not only read about crypto concepts; they should progress through structured lessons, prove understanding through quizzes, unlock practice demos, and build enough confidence to use wallets, exchanges, and market tools responsibly.
