# Repository Guidelines

## Project Structure & Module Organization
Core application code lives in `app/` with domain services under `App\\Services` and HTTP actions in `App\\Http\\Controllers`. Livewire and Volt view files sit in `resources/views`, while client styling and scripts are in `resources/css` and `resources/js`. Public-facing assets are served from `public/`. Database factories, seeders, and migrations reside in `database/`, with the SQLite dev file at `database/database.sqlite`. Feature and unit tests are grouped in `tests/`, mirroring the runtime namespaces.

## Build, Test, and Development Commands
Install dependencies with `composer install` and `yarn install --immutable`. Run the full local stack (Laravel HTTP server, queue listener, log tail, and Vite) with `composer run dev`. For a production build of the front end, use `yarn build`. Execute the backend suite via `composer test`, which clears cached config and runs `php artisan test`. Use `./vendor/bin/pest --coverage` when you need a detailed report.

## Coding Style & Naming Conventions
Follow PSR-12: four-space indentation, trailing commas in multi-line arrays, and one class per file. Trigger Pint before committing (`./vendor/bin/pint`). Name Livewire/Volt components in PascalCase (class) paired with kebab-case Blade files (e.g., `UserProfile` → `resources/views/livewire/user-profile.blade.php`). Prefer `camelCase` for PHP method names and JavaScript variables, and `SCREAMING_SNAKE_CASE` for environment keys.

## Testing Guidelines
Write new tests with Pest in `tests/Feature` or `tests/Unit`, keeping filenames suffixed with `Test.php`. Group related scenarios with descriptive `describe()` blocks and tag slow suites using Pest groups. Seed data with dedicated factories to keep tests isolated. When adding database changes, include a migration and corresponding test coverage.

## Commit & Pull Request Guidelines
Keep commit subjects short, present-tense verbs (e.g., `fix mailer`, `add queue worker`). Squash incidental WIP commits before opening a PR. Each PR should include: what changed, why it matters, how to validate (commands or screenshots), and any linked issue IDs. Confirm tests (`composer test`) and Pint formatting run clean locally before requesting review.

## Environment & Security Notes
Copy `.env.example` to `.env`, then generate an app key with `php artisan key:generate`. Set queue, mail, and `OPENAI_API_KEY` credentials before running background workers. Avoid committing `.env`, SQLite files, or other secrets; rely on Sail or the provided Docker Compose for reproducible setups.
