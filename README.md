<p align="center">
  <img src="public/logo-with-text.png" alt="LuxHotel" width="300">
</p>

<h1 align="center">LuxHotel - Hotel Booking Platform</h1>

<p align="center">
  A team-built hotel booking platform powered by Laravel.
</p>

---

## About

LuxHotel is a hotel booking web application built as a team project using Laravel. It features hotel listings with search and filters, user authentication, booking management, and an admin dashboard for managing hotels, rooms, and reservations.

### Built With

- **Laravel 12** — Backend framework
- **Tailwind CSS v4** — Styling
- **Vite** — Asset bundling
- **Lucide Icons** — Icon set

---

## Getting Started

### Installation

```bash
# Clone the repo
git clone <repo-url>
cd ieee-backend-project

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Build frontend assets
npm run build
```

### Development

Start both the Laravel dev server and Vite hot-reload:

```bash
php artisan serve
npm run dev
```

---

## Project Structure

```
app/Http/Controllers/       # Application controllers
resources/views/            # Blade templates
  ├── components/           # Reusable UI components
  ├── auth/                 # Login, register, forgot password
  ├── hotels/               # Hotel listing & detail pages
  ├── booking/              # Booking form
  ├── dashboard/            # User dashboard
  └── admin/                # Admin management pages
routes/web.php              # All application routes
public/                     # Static assets & build output
```

---

## Golden Rules

- **Never push directly to `main`** — always open a pull request.
- **Never use `git push --force`** — it destroys others' work.
- Always pull the latest `main` before starting new work.
- Keep commits small and focused on one thing.

## Branch Strategy

Each team member works on their own branch and opens a pull request to `main`.

| Branch | Purpose |
|--------|---------|
| `main` | Production-ready code. Protected — no direct pushes. |
| `<your_name>` | Your personal branch (e.g., `abdallah`, `ehab`, `rawan`). |

### Workflow

1. **Create your branch** from `main`:
   ```bash
   git checkout main
   git pull origin main
   git checkout -b your-name
   ```

2. **Make changes** and commit regularly:
   ```bash
   git add .
   git commit -m "describe what you changed"
   ```

3. **Push your branch**:
   ```bash
   git push origin your-name
   ```

4. **Open a Pull Request** on GitHub from your branch → `main`.

5. After approval, merge via GitHub. Never merge locally into `main`.

### Commit Messages

Keep them short and descriptive:

- `feat: add hotel search by city`
- `fix: correct date validation in booking form`
- `style: update navbar spacing`
- `refactor: extract hotel card into component`

---

## Team

- [Ehap](https://github.com/ehap1222)
- [Rawan](https://github.com/rawan187)
- [Abdallah](https://github.com/abdullahMohamed13)
