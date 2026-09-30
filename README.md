# Login-Protected Student Manager — starter example

Drop these into a Laravel 13.x app (over your real Lesson 3 files, adjusting names
as needed), then:

```bash
php artisan migrate
php artisan db:seed --class=Database\\Seeders\\StudentManagerSeeder
```

## Test accounts (all password: `password`)

| Email | Role |
|---|---|
| jamie@example.com | Owns all 4 seeded students |
| sam@example.com | Owns nothing — should get 403 editing Jamie's students |
| admin@example.com | `is_admin = true` — can edit/delete anything |

## Checklist walkthrough

- **Guest redirected to /login** — log out, visit `/students` directly. The `auth`
  middleware in `routes/web.php` catches this before `StudentController` ever runs.
- **Owner can view/edit/delete their own record** — log in as Jamie, open any
  student, Edit/Delete buttons appear (`@can` in the views) and work
  (`$this->authorize()` in the controller passes).
- **Non-owner gets 403** — log in as Sam, visit a student's `/edit` URL directly
  (not just click a hidden button) — `$this->authorize('update', $student)`
  throws before the form renders.
- **Buttons hidden from disallowed users** — Sam's index/show views won't render
  Edit/Delete at all, per the `@can` / `@endcan` blocks.

## Things you'll likely need to change

- If your real Lesson 3 `students` table has a different owner/user column name,
  update `owner_id` throughout (migration, model, policy, controller, seeder).
- If you're not using Blade components (`<x-layout>`), swap in your own
  `@extends`/`@section` layout instead.
- `App\Http\Controllers\Controller.php` needs the `AuthorizesRequests` trait
  added manually in Laravel 11+/13 — it's not there by default.
