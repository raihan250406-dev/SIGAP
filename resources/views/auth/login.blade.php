<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#123B8A">

    <title>Login SIGAP | UPPD Pemalang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-dark: #123B8A;
            --blue: #2563EB;
            --blue-light: #EAF2FF;
            --yellow: #FFD633;
            --white: #FFFFFF;
            --bg: #F5F8FF;
            --ink: #14213D;
            --muted: #64748B;
            --line: #DCE6F5;
            --red: #D43232;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background:
                radial-gradient(circle at 1px 1px, #2563EB16 1px, transparent 0) 0 0 / 18px 18px,
                var(--bg);
            color: var(--ink);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow-x: hidden;
            position: relative;
        }

        /* =========================================================
           ULTRA-KALCER GEN Z SPLASH SCREEN (4.5 DETIK INTRO)
           ========================================================= */
        #splashScreen {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: var(--blue-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px;
            overflow: hidden;
            transition: transform 0.9s cubic-bezier(0.87, 0, 0.13, 1), opacity 0.5s ease;
        }

        #splashScreen.fade-out {
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }

        .splash-marquee-container {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 0;
            opacity: 0.12;
            pointer-events: none;
            user-select: none;
        }

        .splash-marquee-row {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(60px, 12vw, 140px);
            font-weight: 900;
            color: white;
            white-space: nowrap;
            letter-spacing: -3px;
            text-transform: uppercase;
        }

        .splash-marquee-row.left {
            animation: marqueeLeft 20s linear infinite;
        }

        .splash-marquee-row.right {
            animation: marqueeRight 20s linear infinite;
        }

        @keyframes marqueeLeft {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }

        @keyframes marqueeRight {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0%); }
        }

        .splash-content {
            position: relative;
            z-index: 2;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 650px;
        }

        .splash-top-tags {
            display: flex;
            gap: 10px;
            margin-bottom: 24px;
            opacity: 0;
            animation: tagBounce 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.3s forwards;
        }

        @keyframes tagBounce {
            0% { opacity: 0; transform: translateY(-15px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .mini-tag {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.5px;
            padding: 5px 12px;
            border-radius: 4px;
            border: 1.5px solid white;
            color: white;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(4px);
        }

        .mini-tag.yellow {
            background: var(--yellow);
            color: var(--blue-dark);
            border-color: var(--blue-dark);
            box-shadow: 2px 2px 0 white;
        }

        .splash-logo-wrapper {
            position: relative;
            margin-bottom: 24px;
            opacity: 0;
            animation: logoSpinPop 0.9s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.6s forwards;
        }

        @keyframes logoSpinPop {
            0% { opacity: 0; transform: scale(0) rotate(-180deg); }
            70% { transform: scale(1.15) rotate(10deg); }
            100% { opacity: 1; transform: scale(1) rotate(-4deg); }
        }

        .splash-logo-mark {
            width: 95px;
            height: 95px;
            border: 3px solid var(--blue-dark);
            border-radius: 22px 8px;
            background: var(--yellow);
            color: var(--blue-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 58px;
            font-weight: 900;
            box-shadow: 7px 7px 0 white;
        }

        .splash-brand-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 13px;
            font-weight: 900;
            color: var(--yellow);
            letter-spacing: 5px;
            margin-bottom: 18px;
            opacity: 0;
            animation: fadeIn 0.5s ease 1.2s forwards;
        }

        .splash-tagline {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(28px, 5.5vw, 48px);
            font-weight: 900;
            color: white;
            line-height: 1.15;
            letter-spacing: -2px;
            text-transform: uppercase;
            margin-bottom: 32px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .tagline-line-1 {
            opacity: 0;
            animation: slideInText 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 1.5s forwards;
        }

        .tagline-line-2 {
            opacity: 0;
            animation: slideInText 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) 2.0s forwards;
        }

        .tagline-highlight {
            background: var(--yellow);
            color: var(--blue-dark);
            padding: 4px 16px;
            display: inline-block;
            border-radius: 8px;
            border: 2px solid var(--blue-dark);
            transform: rotate(-1.5deg);
            box-shadow: 4px 4px 0 white;
        }

        @keyframes slideInText {
            0% { opacity: 0; transform: translateY(25px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }

        .splash-progress-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            opacity: 0;
            animation: fadeIn 0.4s ease 2.4s forwards;
        }

        .splash-progress-bar {
            width: 240px;
            height: 8px;
            background: rgba(255, 255, 255, 0.15);
            border: 1.5px solid rgba(255, 255, 255, 0.3);
            border-radius: 99px;
            overflow: hidden;
            position: relative;
        }

        .splash-progress-fill {
            height: 100%;
            width: 0%;
            background: var(--yellow);
            border-radius: 99px;
            animation: progressFill 1.8s cubic-bezier(0.65, 0, 0.35, 1) 2.5s forwards;
        }

        .splash-status-text {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.75);
            letter-spacing: 2px;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        @keyframes progressFill {
            0% { width: 0%; }
            100% { width: 100%; }
        }


        /* =========================================================
           MAIN LOGIN WRAPPER & BRAND PANEL
           ========================================================= */
        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 1040px;
            min-height: 640px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: var(--white);
            border: 2.5px solid var(--blue-dark);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 10px 10px 0 var(--yellow);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.7s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .login-wrapper.ready {
            opacity: 1;
            transform: translateY(0);
        }

        .brand-panel {
            background: linear-gradient(
                135deg,
                #123B8A,
                #1D4ED8 70%,
                #2563EB
            );
            color: white;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            isolation: isolate;
            overflow: hidden;
            border-right: 2.5px solid var(--blue-dark);
        }

        .brand-panel::before {
            content: "S";
            position: absolute;
            right: -20px;
            bottom: -20px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 380px;
            font-weight: 900;
            line-height: 1;
            color: rgba(255, 255, 255, 0.07);
            z-index: -1;
            pointer-events: none;
            transform: rotate(-6deg);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .brand-mark {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            border: 2.5px solid var(--blue-dark);
            border-radius: 14px 5px;
            background: var(--yellow);
            color: var(--blue-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 32px;
            font-weight: 900;
            box-shadow: 4px 4px 0 var(--blue-dark);
            transform: rotate(-4deg);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .brand:hover .brand-mark {
            transform: rotate(0deg) scale(1.08);
        }

        .brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 29px;
            line-height: 1.1;
            font-weight: 800;
            letter-spacing: -1.2px;
        }

        .brand-caption {
            margin-top: 4px;
            color: var(--yellow);
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .hero-copy {
            margin: 40px 0;
            max-width: 400px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--yellow);
            color: var(--blue-dark);
            border: 2px solid var(--blue-dark);
            box-shadow: 3px 3px 0 var(--blue-dark);
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1.2px;
            margin-bottom: 22px;
        }

        .hero-copy h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(30px, 3.6vw, 44px);
            line-height: 1.15;
            letter-spacing: -1.5px;
            margin-bottom: 18px;
            color: white;
            text-transform: uppercase;
        }

        .hero-copy h1 em {
            color: var(--yellow);
            font-style: normal;
        }

        .hero-copy p {
            color: #E3ECFF;
            font-size: 13.5px;
            line-height: 1.8;
            max-width: 350px;
        }

        .brand-footer {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.8;
        }

        .brand-footer strong {
            color: white;
        }


        /* =========================================================
           ULTRA-KALCER GEN Z FORM LOGIN STYLE
           ========================================================= */
        .form-panel {
            padding: 45px 44px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            background: white;
            position: relative;
        }

        .form-header-tags {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .form-heading .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--blue-dark);
            background: var(--yellow);
            border: 1.5px solid var(--blue-dark);
            box-shadow: 2.5px 2.5px 0 var(--blue-dark);
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .form-heading .tag-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--blue-dark);
            animation: pulseDot 1.5s infinite ease-in-out;
        }

        @keyframes pulseDot {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.5; }
        }

        .form-subtag {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10px;
            font-weight: 800;
            color: var(--muted);
            letter-spacing: 1px;
        }

        .form-heading h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -1.2px;
            color: var(--blue-dark);
            margin-bottom: 6px;
        }

        .form-heading h2 span {
            color: var(--blue);
            position: relative;
            display: inline-block;
        }

        .form-heading h2 span::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 2px;
            width: 100%;
            height: 4px;
            background: var(--yellow);
            z-index: -1;
            transform: rotate(-1deg);
        }

        .form-heading p {
            color: var(--muted);
            font-size: 12.5px;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        /* Preset Account Badge */
        .preset-account-card {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 12px 14px;
            border: 1.5px solid var(--blue-dark);
            border-radius: 10px;
            background: var(--blue-light);
            box-shadow: 3px 3px 0 var(--blue-dark);
            margin-bottom: 22px;
        }

        .preset-account-card .icon-key {
            display: grid;
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            place-items: center;
            border-radius: 7px;
            background: var(--yellow);
            color: var(--blue-dark);
            font-weight: 900;
            font-size: 15px;
            border: 1px solid var(--blue-dark);
        }

        .preset-account-info {
            min-width: 0;
            font-size: 11px;
            line-height: 1.5;
        }

        .preset-account-info strong {
            display: block;
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11.5px;
            font-weight: 800;
            letter-spacing: 0.3px;
        }

        .preset-account-info span {
            color: var(--muted);
            font-size: 10.5px;
        }

        .preset-account-info code {
            color: var(--blue-dark);
            font-weight: 800;
            background: rgba(255, 255, 255, 0.7);
            padding: 1px 5px;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.8px;
            margin-bottom: 8px;
            color: var(--blue-dark);
        }

        .form-group label small {
            color: var(--muted);
            font-weight: 600;
            font-size: 10px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap input {
            width: 100%;
            height: 50px;
            padding: 0 16px;
            border: 2px solid #CBD8EF;
            border-radius: 10px;
            outline: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 700;
            color: var(--ink);
            background: #F8FAFF;
            transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .input-wrap input:focus {
            border-color: var(--blue-dark);
            background: white;
            box-shadow: 4px 4px 0 var(--yellow);
            transform: translateY(-2px);
        }

        .password-input {
            padding-right: 125px !important;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            border: 1.5px solid var(--blue-dark);
            border-radius: 7px;
            background: var(--blue-light);
            color: var(--blue-dark);
            padding: 6px 12px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 0.5px;
            cursor: pointer;
            box-shadow: 2px 2px 0 var(--blue-dark);
            transition: all 0.2s ease;
        }

        .toggle-password:hover {
            background: var(--yellow);
            transform: translateY(-50%) translate(-1px, -1px);
            box-shadow: 3px 3px 0 var(--blue-dark);
        }

        .toggle-password:active {
            transform: translateY(-50%) translate(0, 0);
            box-shadow: 1px 1px 0 var(--blue-dark);
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin: 4px 0 24px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 12px;
            font-weight: 700;
            color: var(--ink);
            cursor: pointer;
            user-select: none;
        }

        .remember input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        .custom-checkbox {
            width: 18px;
            height: 18px;
            border: 2px solid var(--blue-dark);
            border-radius: 5px;
            background: #F8FAFF;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 0 var(--yellow);
            transition: all 0.2s ease;
        }

        .remember:hover input ~ .custom-checkbox {
            background: var(--blue-light);
        }

        .remember input:checked ~ .custom-checkbox {
            background: var(--yellow);
            border-color: var(--blue-dark);
        }

        .remember input:checked ~ .custom-checkbox::after {
            content: "✓";
            font-family: 'Space Grotesk', sans-serif;
            font-size: 12px;
            font-weight: 900;
            color: var(--blue-dark);
        }

        .login-button {
            width: 100%;
            min-height: 52px;
            border: 2px solid var(--blue-dark);
            border-radius: 10px;
            background: var(--blue-dark);
            color: white;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 4px 4px 0 var(--yellow);
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .login-button:hover {
            color: var(--blue-dark);
            background: var(--yellow);
            transform: translate(-3px, -3px);
            box-shadow: 7px 7px 0 var(--blue-dark);
        }

        .login-button:active {
            transform: translate(0, 0);
            box-shadow: 2px 2px 0 var(--blue-dark);
        }

        .login-button-arrow {
            font-size: 18px;
            transition: transform 0.2s ease;
        }

        .login-button:hover .login-button-arrow {
            transform: translateX(4px) translateY(-2px);
        }

        .error-message {
            margin-top: 6px;
            font-size: 11px;
            font-weight: 800;
            color: var(--red);
        }

        .alert {
            padding: 12px 14px;
            margin-bottom: 18px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            line-height: 1.6;
            border: 2px solid transparent;
            box-shadow: 3px 3px 0 rgba(0,0,0,0.05);
        }

        .alert-error {
            background: #FFF1F1;
            border-color: #FECACA;
            color: #B91C1C;
        }

        .alert-success {
            background: #ECFDF5;
            border-color: #A7F3D0;
            color: #047857;
        }

        .form-note {
            text-align: center;
            margin-top: 24px;
            color: var(--muted);
            font-size: 10.5px;
            line-height: 1.8;
            font-weight: 600;
        }

        .form-note strong {
            color: var(--blue-dark);
            font-weight: 800;
        }

        @media (max-width: 850px) {
            body {
                padding: 16px;
            }

            .login-wrapper {
                max-width: 460px;
                min-height: auto;
                grid-template-columns: 1fr;
                border-radius: 18px;
            }

            .brand-panel {
                min-height: 220px;
                padding: 32px 28px;
                border-right: none;
                border-bottom: 2.5px solid var(--blue-dark);
            }

            .brand-mark {
                width: 46px;
                height: 46px;
                font-size: 25px;
            }

            .brand-name {
                font-size: 25px;
            }

            .hero-copy {
                margin: 25px 0 15px;
            }

            .hero-copy h1 {
                font-size: 28px;
                margin-bottom: 10px;
            }

            .hero-copy p {
                font-size: 12px;
            }

            .brand-footer {
                display: none;
            }

            .form-panel {
                padding: 35px 26px;
            }

            .form-heading h2 {
                font-size: 28px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

    <!-- INTRO SPLASH SCREEN DENGAN TAGLINE PRESISE -->
    <div id="splashScreen">
        <div class="splash-marquee-container">
            <div class="splash-marquee-row left">
                SIGAP TAX SYSTEM · UPPD PEMALANG · REWARD TAX · TAAT PAJAK BEBAS DENDA ·
            </div>
            <div class="splash-marquee-row right">
                BAYAR PAJAKNYA DAPETIN REWARDNYA · DIGITAL TAX PLATFORM 2026 ·
            </div>
        </div>

        <div class="splash-content">
            <div class="splash-top-tags">
                <span class="mini-tag yellow">SIGAP / VER.2026</span>
                <span class="mini-tag">UPPD PEMALANG</span>
            </div>

            <div class="splash-logo-wrapper">
                <div class="splash-logo-mark">S</div>
            </div>

            <div class="splash-brand-title">REWARD TAX PLATFORM</div>

            <h1 class="splash-tagline">
                <span class="tagline-line-1">BAYAR PAJAKNYA,</span>
                <span class="tagline-line-2 tagline-highlight">DAPETIN REWARD-NYA!</span>
            </h1>

            <div class="splash-progress-wrapper">
                <div class="splash-progress-bar">
                    <div class="splash-progress-fill"></div>
                </div>
                <div class="splash-status-text" id="splashStatusText">INITIALIZING SYSTEM...</div>
            </div>
        </div>
    </div>

    <!-- MAIN LOGIN WRAPPER -->
    <main class="login-wrapper" id="loginWrapper">

        <!-- BRAND SIGAP PANEL KIRI -->
        <section class="brand-panel">

            <div class="brand">
                <div class="brand-mark">S</div>

                <div>
                    <div class="brand-name">SIGAP<span style="color:var(--yellow)">®</span></div>
                    <div class="brand-caption">REWARD TAX SYSTEM</div>
                </div>
            </div>

            <div class="hero-copy">

                <div class="eyebrow">
                    SIGAP® / SPECIAL EDITION
                </div>

                <h1>
                    BAYAR PAJAKNYA,<br>
                    <em>DAPETIN REWARD-NYA!</em>
                </h1>

                <p>
                    Sistem pengelolaan data wajib pajak yang praktis,
                    modern, dan terintegrasi untuk mendukung pelayanan
                    yang lebih efektif di UPPD Pemalang.
                </p>

            </div>

            <div class="brand-footer">
                <strong>UPPD PEMALANG</strong><br>
                Sistem Informasi Pengelolaan dan Reward Pajak
            </div>

        </section>

        <!-- FORM LOGIN KALCER GEN Z PANEL KANAN -->
        <section class="form-panel">

            <div class="form-heading">
                <div class="form-header-tags">
                    <span class="tag">
                        <span class="tag-dot"></span>
                        AUTHENTICATION
                    </span>
                    <span class="form-subtag">SIGAP / LOGIN</span>
                </div>

                <h2>Login <span>dulu, yuk.</span></h2>

                <p>
                    Masuk menggunakan akun petugas terdaftar untuk mengakses workspace.
                </p>
            </div>

            <!-- PRESET KREDENSIAL LOGIN ADMIN -->
            <div class="preset-account-card">
                <div class="icon-key">⚡</div>
                <div class="preset-account-info">
                    <strong>AKUN DEFAULT PETUGAS ADMIN</strong>
                    <span>Email: <code>adminsigap@gmail.com</code> | Password: <code>Adminsigap12345</code></span>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <div class="form-group">
                    <label for="email">
                        EMAIL ADDRESS
                        <small>AKUN TERDAFTAR</small>
                    </label>

                    <div class="input-wrap">
                        {{-- PRESET EMAIL BANYAK DIGUNAKAN --}}
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', 'adminsigap@gmail.com') }}"
                            placeholder="nama@email.com"
                            autocomplete="off"
                            required
                        >
                    </div>

                    @error('email')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">
                        PASSWORD
                        <small>KATA SANDI</small>
                    </label>

                    <div class="input-wrap">
                        {{-- PRESET PASSWORD DIBUATKAN DEFAUL --}}
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="password-input"
                            value="Adminsigap12345"
                            placeholder="Masukkan password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                        >
                            LIHAT
                        </button>
                    </div>

                    @error('password')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-options">
                    <label class="remember">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            checked
                        >
                        <span class="custom-checkbox"></span>
                        Ingat sesi login saya
                    </label>
                </div>

                <button type="submit" class="login-button">
                    MASUK KE SIGAP <span class="login-button-arrow">↗</span>
                </button>

            </form>

            <div class="form-note">
                Sistem Keamanan Terenkripsi UPPD Pemalang.<br>
                <strong>SIGAP® TAX PLATFORM</strong> &copy; {{ date('Y') }}
            </div>

        </section>

    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const splashScreen = document.getElementById('splashScreen');
            const loginWrapper = document.getElementById('loginWrapper');
            const emailInput = document.getElementById('email');
            const statusText = document.getElementById('splashStatusText');

            setTimeout(() => {
                if (statusText) statusText.textContent = 'LOADING REWARD ENGINE...';
            }, 1500);

            setTimeout(() => {
                if (statusText) statusText.textContent = 'SYSTEM READY!';
            }, 3200);

            setTimeout(() => {
                splashScreen.classList.add('fade-out');
                loginWrapper.classList.add('ready');

                setTimeout(() => {
                    if (emailInput) {
                        emailInput.focus();
                    }
                }, 500);

            }, 4500);
        });

        // TOGGLE PASSWORD VISIBILITY
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';

                togglePassword.textContent = isPassword
                    ? 'SEMBUNYIKAN'
                    : 'LIHAT';

                togglePassword.setAttribute(
                    'aria-label',
                    isPassword ? 'Sembunyikan password' : 'Tampilkan password'
                );
            });
        }
    </script>
</body>
</html>