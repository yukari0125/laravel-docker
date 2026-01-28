<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
    }

    html,
    body {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: #333;
      background: #f5f5f5;
    }

    .container {
      max-width: 960px;
      margin: 40px auto;
      padding: 0 16px;
    }

    .header {
      background: #fff;
      border-bottom: 1px solid #e0e0e0;
    }

    .header__inner {
      max-width: 1380px;
      margin: 0 auto;
      padding: 12px 16px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
    }

    .logo {
      margin: 0;
      font-family: "Dancing Script", cursive;
      font-size: 34px;        
      font-weight: 600;
      letter-spacing: 0.04em;    
      color: #f6b400; 
      text-transform: none;      
    }

    

    .page-title {
      margin: 0 0 24px;
      font-size: 22px;
      font-weight: 700;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 8px 18px;
      border-radius: 4px;
      border: 1px solid transparent;
      font-size: 14px;
      text-decoration: none;
      cursor: pointer;
      transition: background 0.15s ease, color 0.15s ease, border-color 0.15s ease;
    }

    .btn--primary {
      background: #2f80ed;
      border-color: #2f80ed;
      color: #fff;
    }

    .btn--primary:hover {
      background: #1c5fb8;
      border-color: #1c5fb8;
    }

    .btn--accent {
      background: #27ae60;
      border-color: #27ae60;
      color: #fff;
    }

    .btn--accent:hover {
      background: #1f8a4d;
      border-color: #1f8a4d;
    }

    .btn--ghost {
      background: #fff;
      border-color: #d0d0d0;
      color: #333;
    }

    .btn--ghost:hover {
      background: #f2f2f2;
    }

    .btn--danger {
      background: #eb5757;
      border-color: #eb5757;
      color: #fff;
    }

    .btn--danger:hover {
      background: #c0392b;
      border-color: #c0392b;
    }

    .input,
    .select,
    .textarea,
    .input-file {
      width: 100%;
      font-size: 14px;
      padding: 8px 10px;
      border-radius: 4px;
      border: 1px solid #d0d0d0;
      outline: none;
    }

    .input:focus,
    .select:focus,
    .textarea:focus {
      border-color: #2f80ed;
      box-shadow: 0 0 0 1px rgba(47, 128, 237, 0.1);
    }

    .textarea {
      resize: vertical;
    }

    .req {
      color: #eb5757;
      font-size: 12px;
      margin-left: 4px;
    }

    .error {
      margin: 4px 0 0;
      font-size: 12px;
      color: #eb5757;
    }

    .alert {
      margin-bottom: 16px;
      padding: 8px 12px;
      border-radius: 4px;
      font-size: 13px;
    }

    .alert-success {
      background: #e9f7ef;
      border: 1px solid #2ecc71;
      color: #2d7a46;
    }
  </style>
<link
  href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;600&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  @yield('css')
</head>
<body>
  <header class="header">
    <div class="header__inner">
      <h1 class="logo">mogitate</h1>
    </div>
  </header>

  <main class="container">
    @yield('content')
  </main>
</body>
</html>
