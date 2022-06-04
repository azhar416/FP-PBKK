# Kelompok 8 PBKK-B

1. Daffa Muhamad Azhar 05111940000037
2. Muh. Nur Fajrin Amiruddin - 05111940000005
3. Muhammad Valda Rizky Nur Firdaus - 05111940000115
4. 

# Tutorial

1. Git Clone / Download Repository

```
git clone https://github.com/azhar416/FP-PBKK.git
```

2. Masuk ke folder project

3. Install composer dengan terminal

```
composer install
```

4. Copy `.env.example` ke `.env`

```
copy .env.example .env
```
atau

```
cp .env.example .env
```

5. Buka `.env` file dan setting database sesuai yang ada pada perangkat

6. Generate key

```
php artisan key:generate
```

7. Migrate Database

```
php artisan migrate:fresh
```

8. Install TailwindCSS

[Tutorial Instalasi TailwindCSS](https://tailwindcss.com/docs/guides/laravel)

- Buka project Laravel

- Install TailwindCSS

Install `tailwindcss` and its peer dependencies via npm, and create your `tailwind.config.js` file.

```
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init
```

- Add Tailwind to your Laravel Mix configuration

In your `webpack.mix.js` file, add `tailwindcss` as a PostCSS plugin.

```
mix.js("resources/js/app.js", "public/js")
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
  ]);
```

- Configure your template paths

Add the paths to all of your template files in your `tailwind.config.js` file.

```
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

- Add the Tailwind directives to your CSS

Add the `@tailwind` directives for each of Tailwind’s layers to your `./resources/css/app.css` file.

```
@tailwind base;
@tailwind components;
@tailwind utilities;
```

- Start your build process (Nyalakan terus)

Run your build process with `npm run watch`.

```
npm run watch
```

- Start using Tailwind in your project

Make sure your compiled CSS is included in the `<head>` then start using Tailwind’s utility classes to style your content.

```html
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>
</html>
```

9. Pastikan `npm run watch` dan `php artisan serve` menyala pada terminal.
