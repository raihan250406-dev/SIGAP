<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#123B8A">

    <title>SIGAP — Bayar Pajaknya, Dapetin Reward-Nya!</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            --line: #CBD8EF;
            --red: #D43232;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            min-width: 320px;
            width: 100%;
            overflow-x: hidden;
            color: var(--ink);
            background:
                radial-gradient(circle at 1px 1px, #2563EB16 1px, transparent 0) 0 0 / 18px 18px,
                var(--bg);
            font-family: 'DM Sans', sans-serif;
            animation: fadeInBody 0.6s ease-out forwards;
        }

        @keyframes fadeInBody {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        button, input, select {
            font: inherit;
        }

        button, a {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        h1, h2, h3, p {
            margin-top: 0;
        }

        /* =========================================================
           TOPBAR HEADER
           ========================================================= */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            width: 100%;
            min-height: 95px;
            padding: 18px 42px;
            border-bottom: 2.5px solid var(--blue-dark);
            box-shadow: 0 5px 0 var(--yellow);
            background: rgba(255, 255, 255, .96);
            backdrop-filter: blur(14px);
            position: relative;
            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-shrink: 0;
            font: 900 29px 'Space Grotesk', sans-serif;
            letter-spacing: -1.2px;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .brand:hover {
            transform: scale(1.02);
        }

        .brand-mark {
            display: grid;
            flex: 0 0 52px;
            width: 52px;
            height: 52px;
            place-items: center;
            border: 2.5px solid var(--blue-dark);
            border-radius: 14px 5px;
            color: var(--blue-dark);
            background: var(--yellow);
            box-shadow: 4px 4px 0 var(--blue-dark);
            font: 900 30px 'Space Grotesk', sans-serif;
            transform: rotate(-4deg);
            transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .brand:hover .brand-mark {
            transform: rotate(0deg) scale(1.08);
        }

        .brand small {
            display: block;
            margin-top: 3px;
            color: var(--blue);
            font: 800 10px 'DM Sans', sans-serif;
            letter-spacing: 2px;
        }

        .header-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 12px;
        }

        .date-chip {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 8px 14px;
            border: 2px solid var(--blue-dark);
            border-radius: 10px;
            background: white;
            box-shadow: 3px 3px 0 var(--blue-dark);
        }

        .clock-icon {
            display: grid;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            place-items: center;
            border-radius: 7px;
            color: var(--blue-dark);
            background: var(--yellow);
            border: 1.5px solid var(--blue-dark);
            font-size: 18px;
            font-weight: 900;
        }

        .date-details {
            min-width: 0;
        }

        .date-day {
            font-size: 11px;
            font-weight: 800;
            line-height: 1.4;
            color: var(--blue-dark);
        }

        .date-time {
            color: var(--blue);
            font: 800 13px 'Space Grotesk', sans-serif;
            font-variant-numeric: tabular-nums;
        }

        .timezone {
            color: var(--muted);
            font: 700 9px 'DM Sans', sans-serif;
        }

        .system-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 13px;
            border: 2px solid var(--blue-dark);
            border-radius: 8px;
            color: var(--blue-dark);
            background: var(--yellow);
            box-shadow: 3px 3px 0 var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
            white-space: nowrap;
        }

        .live-dot {
            width: 8px;
            height: 8px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #22C55E;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.4);
            animation: liveGlow 1.8s infinite;
        }

        @keyframes liveGlow {
            0% { box-shadow: 0 0 0 0px rgba(34, 197, 94, 0.6); }
            70% { box-shadow: 0 0 0 8px rgba(34, 197, 94, 0); }
            100% { box-shadow: 0 0 0 0px rgba(34, 197, 94, 0); }
        }

        .logout-form {
            margin: 0;
        }

        .logout-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            padding: 0 16px;
            border: 2px solid var(--blue-dark);
            border-radius: 8px;
            color: #B42323;
            background: #FFF1F1;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            cursor: pointer;
            box-shadow: 3px 3px 0 var(--blue-dark);
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .logout-btn:hover {
            color: white;
            background: var(--red);
            transform: translate(-2px, -2px);
            box-shadow: 5px 5px 0 var(--blue-dark);
        }

        /* =========================================================
           MAIN CONTAINER & PAGE HEADING
           ========================================================= */
        .main {
            width: 100%;
            max-width: 1800px;
            min-height: calc(100vh - 100px);
            margin: 0 auto;
            padding: 38px 42px 45px;
        }

        .breadcrumb {
            margin-bottom: 12px;
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1.8px;
            line-height: 1.8;
            text-transform: uppercase;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 24px;
            margin-bottom: 32px;
        }

        h1 {
            margin-bottom: 8px;
            color: var(--blue-dark);
            font: 900 clamp(28px, 4.5vw, 46px) 'Space Grotesk', sans-serif;
            letter-spacing: -1.5px;
            line-height: 1.15;
        }

        .highlight {
            position: relative;
            z-index: 1;
            display: inline-block;
            color: var(--blue-dark);
        }

        .highlight::after {
            position: absolute;
            z-index: -1;
            right: -4px;
            bottom: 4px;
            left: -2px;
            height: 14px;
            background: var(--yellow);
            content: "";
            transform: rotate(-1deg);
            transition: transform 0.3s ease;
        }

        .subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            font-weight: 500;
            line-height: 1.7;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            max-width: 100%;
            padding: 8px 12px;
            border-radius: 6px;
            border: 2px solid var(--blue-dark);
            color: var(--blue-dark);
            background: var(--yellow);
            box-shadow: 3px 3px 0 var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        /* =========================================================
           HERO BANNER
           ========================================================= */
        .hero {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            min-height: 240px;
            margin-bottom: 32px;
            padding: 36px 40px;
            overflow: hidden;
            border: 2.5px solid var(--blue-dark);
            border-radius: 20px;
            color: white;
            background: linear-gradient(135deg, #123B8A, #1D4ED8 70%, #2563EB);
            box-shadow: 8px 8px 0 var(--yellow);
            animation: heroSlide 0.7s ease-out;
        }

        @keyframes heroSlide {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero::before {
            position: absolute;
            top: -90px;
            right: 60px;
            color: rgba(255, 255, 255, 0.08);
            content: "S";
            font: 900 380px 'Space Grotesk', sans-serif;
            line-height: 1;
            transform: rotate(-8deg);
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 780px;
        }

        .hero h2 {
            margin-top: 12px;
            margin-bottom: 14px;
            color: white;
            font: 900 clamp(24px, 4vw, 44px) 'Space Grotesk', sans-serif;
            letter-spacing: -1.5px;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .hero h2 span {
            color: var(--yellow);
            background: var(--blue-dark);
            padding: 2px 10px;
            border-radius: 6px;
            border: 1.5px solid white;
            display: inline-block;
            transform: rotate(-1deg);
        }

        .hero p {
            max-width: 620px;
            margin: 0;
            color: #E3ECFF;
            font-size: 14px;
            line-height: 1.7;
            font-weight: 500;
        }

        .hero-stamp {
            position: relative;
            z-index: 1;
            display: grid;
            flex-shrink: 0;
            width: 140px;
            height: 140px;
            place-items: center;
            border: 3px solid var(--yellow);
            border-radius: 18px 50%;
            color: var(--yellow);
            text-align: center;
            transform: rotate(7deg);
            animation: floatStamp 4s infinite ease-in-out;
            background: rgba(18, 59, 138, 0.4);
            backdrop-filter: blur(4px);
            box-shadow: 4px 4px 0 var(--blue-dark);
        }

        @keyframes floatStamp {
            0%, 100% { transform: rotate(7deg) translateY(0px); }
            50% { transform: rotate(10deg) translateY(-8px); }
        }

        .hero-stamp strong { font: 900 40px 'Space Grotesk', sans-serif; line-height: 1; }
        .hero-stamp small { font-family: 'Space Grotesk', sans-serif; font-size: 9.5px; font-weight: 900; letter-spacing: 1.5px; line-height: 1.6; }

        /* =========================================================
           STATISTICS CARDS
           ========================================================= */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            margin-bottom: 34px;
        }

        .stat {
            min-width: 0;
            padding: 24px;
            border: 2.5px solid var(--blue-dark);
            border-radius: 16px;
            background: white;
            box-shadow: 6px 6px 0 var(--blue-dark);
            transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .stat:hover {
            transform: translate(-3px, -3px);
            box-shadow: 9px 9px 0 var(--yellow);
        }

        .stat:first-child {
            color: white;
            background: var(--blue-dark);
            box-shadow: 6px 6px 0 var(--yellow);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-label {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .stat-icon {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border-radius: 10px;
            border: 2px solid var(--blue-dark);
            background: var(--blue-light);
            font-size: 18px;
            font-weight: 900;
        }

        .stat:first-child .stat-icon { color: var(--blue-dark); background: var(--yellow); }
        .stat:nth-child(3) .stat-icon { color: #B42323; background: #FDE9E7; border-color: #B42323; }

        .stat-number {
            margin: 16px 0 6px;
            font: 900 clamp(28px, 3.5vw, 42px) 'Space Grotesk', sans-serif;
            letter-spacing: -1.5px;
            line-height: 1.1;
        }

        .stat-desc {
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
        }

        .stat:first-child .stat-desc { color: #DCE8FF; }

        /* =========================================================
           PANELS & FORMS
           ========================================================= */
        .panel {
            min-width: 0;
            margin-bottom: 32px;
            padding: 34px;
            border: 2.5px solid var(--blue-dark);
            border-radius: 20px;
            background: white;
            box-shadow: 8px 8px 0 var(--yellow);
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 28px;
        }

        .heading-left {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .heading-mark {
            display: grid;
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            place-items: center;
            border-radius: 12px;
            border: 2px solid var(--blue-dark);
            color: var(--blue-dark);
            background: var(--yellow);
            box-shadow: 3.5px 3.5px 0 var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 22px;
            font-weight: 900;
        }

        .panel-heading h2 {
            margin: 0 0 4px;
            color: var(--blue-dark);
            font: 900 clamp(20px, 2.5vw, 24px) 'Space Grotesk', sans-serif;
        }

        .panel-heading p {
            margin: 0;
            color: var(--muted);
            font-size: 13px;
        }

        .required-note {
            color: var(--muted);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .documents-grid {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
            margin-top: 8px;
            padding-top: 24px;
            border-top: 2px dashed var(--line);
        }

        .field label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 9px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11.5px;
            font-weight: 900;
            color: var(--blue-dark);
        }

        .field input:not([type="file"]),
        .field select {
            width: 100%;
            height: 52px;
            min-height: 52px;
            padding: 12px 16px;
            border: 2px solid #CBD8EF;
            border-radius: 10px;
            outline: none;
            color: var(--ink);
            background: #F8FAFF;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .field input:focus,
        .field select:focus {
            border-color: var(--blue-dark);
            background: white;
            box-shadow: 4px 4px 0 var(--yellow);
            transform: translateY(-2px);
        }

        .date-picker-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .date-picker-wrapper input[type="text"] {
            padding-right: 48px;
        }

        .date-trigger-btn {
            position: absolute;
            right: 8px;
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border: 1.5px solid var(--blue-dark);
            border-radius: 7px;
            background: var(--yellow);
            color: var(--blue-dark);
            cursor: pointer;
            font-size: 16px;
            box-shadow: 2px 2px 0 var(--blue-dark);
            transition: all 0.2s ease;
        }

        .date-trigger-btn:hover {
            transform: scale(1.08) rotate(5deg);
        }

        .optional {
            color: var(--muted);
            font-weight: 700;
            font-size: 10px;
        }

        .stnk-upload {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 18px;
            border: 2px dashed #B7CCF5;
            border-radius: 14px;
            background: #F4F8FF;
        }

        .stnk-upload input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid #CBD8EF;
            border-radius: 8px;
            background: white;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .stnk-help {
            display: block;
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
        }

        .stnk-preview {
            display: none;
            width: 100%;
            max-width: 280px;
            max-height: 190px;
            margin-top: 14px;
            object-fit: contain;
            border: 2px solid var(--blue-dark);
            border-radius: 10px;
            background: white;
            box-shadow: 4px 4px 0 var(--yellow);
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-top: 28px;
            padding-top: 24px;
            border-top: 2px dashed var(--line);
        }

        .helper {
            margin: 0;
            color: var(--muted);
            font-size: 11.5px;
            font-weight: 600;
        }

        .queue-preview {
            min-height: 52px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            border: 2px solid var(--blue-dark);
            border-radius: 10px;
            background: var(--blue-light);
            box-shadow: 3px 3px 0 var(--yellow);
        }

        .queue-preview strong {
            color: var(--blue-dark);
            font: 900 22px 'Space Grotesk', sans-serif;
        }

        .queue-preview small {
            color: var(--muted);
            font-size: 10.5px;
            font-weight: 600;
        }

        /* =========================================================
           ULTRA-KALCER CUSTOM SELECT DROPDOWN STYLE
           ========================================================= */
        .sigap-custom-select {
            position: relative;
            width: 100%;
        }

        .sigap-select-trigger {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 52px;
            min-height: 52px;
            padding: 12px 16px;
            border: 2px solid #CBD8EF;
            border-radius: 10px;
            background: #F8FAFF;
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            user-select: none;
        }

        .sigap-custom-select.active .sigap-select-trigger,
        .sigap-select-trigger:hover {
            border-color: var(--blue-dark);
            background: white;
            box-shadow: 4px 4px 0 var(--yellow);
            transform: translateY(-2px);
        }

        .sigap-select-arrow {
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 6px;
            background: var(--yellow);
            border: 1.5px solid var(--blue-dark);
            color: var(--blue-dark);
            font-size: 10px;
            font-weight: 900;
            transition: transform 0.25s ease;
        }

        .sigap-custom-select.active .sigap-select-arrow {
            transform: rotate(180deg);
        }

        .sigap-select-popover {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            right: 0;
            z-index: 9999;
            display: none;
            padding: 8px;
            border: 2.5px solid var(--blue-dark);
            border-radius: 14px;
            background: white;
            box-shadow: 6px 6px 0 var(--yellow);
            animation: selectPopIn 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .sigap-custom-select.active .sigap-select-popover {
            display: block;
        }

        @keyframes selectPopIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .sigap-select-option {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 14px;
            border-radius: 8px;
            border: 1.5px solid transparent;
            color: var(--ink);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .sigap-select-option:hover {
            border-color: var(--blue-dark);
            background: var(--yellow);
            color: var(--blue-dark);
            transform: scale(1.01);
            box-shadow: 2px 2px 0 var(--blue-dark);
        }

        .sigap-select-option.selected {
            border-color: var(--blue-dark);
            background: var(--blue-light);
            color: var(--blue-dark);
            font-weight: 900;
        }

        .sigap-select-option.placeholder-option {
            color: #94A3B8;
            font-weight: 500;
        }

        .sigap-native-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        /* =========================================================
           TABLE TOOLBAR & SEARCH (FIX MOBILE STYLING)
           ========================================================= */
        .table-toolbar {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 14px;
            margin-bottom: 22px;
            align-items: center;
        }

        .search {
            width: 100%;
            height: 52px;
            min-height: 52px;
            max-height: 52px;
            padding: 0 16px;
            border: 2px solid var(--line);
            border-radius: 10px;
            outline: none;
            background: #F8FAFF;
            font-family: 'DM Sans', sans-serif;
            font-size: 13.5px;
            font-weight: 600;
            color: var(--ink);
            box-sizing: border-box;
            transition: all 0.25s ease;
        }

        .search:focus {
            border-color: var(--blue-dark);
            background: white;
            box-shadow: 4px 4px 0 var(--yellow);
            transform: translateY(-2px);
        }

        .filter {
            width: 100%;
            height: 52px;
            min-height: 52px;
            padding: 12px 14px;
            border: 2px solid var(--line);
            border-radius: 10px;
            outline: none;
            background: white;
            font-size: 13px;
            font-weight: 700;
        }

        .table-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
        }

        .table-meta strong { color: var(--blue-dark); font: 900 17px 'Space Grotesk', sans-serif; }
        .table-meta span { color: var(--muted); font-family: 'Space Grotesk', sans-serif; font-size: 11.5px; font-weight: 800; }

        /* =========================================================
           BUTTONS & TABLE
           ========================================================= */
        .btn, .export-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            min-height: 52px;
            padding: 0 22px;
            border: 2px solid var(--blue-dark);
            border-radius: 10px;
            color: white;
            background: var(--blue-dark);
            box-shadow: 4px 4px 0 var(--yellow);
            cursor: pointer;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 13px;
            font-weight: 900;
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn:hover, .export-btn:hover {
            color: var(--blue-dark);
            background: var(--yellow);
            transform: translate(-3px, -3px);
            box-shadow: 7px 7px 0 var(--blue-dark);
        }

        .export-btn { min-height: 46px; padding: 0 18px; }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            border: 2px solid var(--blue-dark);
            border-radius: 14px;
            box-shadow: 4px 4px 0 var(--yellow);
        }

        table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            padding: 18px 16px;
            color: var(--blue-dark);
            background: var(--blue-light);
            border-bottom: 2px solid var(--blue-dark);
            text-align: left;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        td {
            padding: 18px 16px;
            border-bottom: 1px solid #E8EEF8;
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: 0; }
        tbody tr[data-status]:hover { background: #F2F6FF; }

        .row-number {
            display: grid;
            width: 34px;
            height: 34px;
            place-items: center;
            border-radius: 8px;
            border: 1.5px solid var(--blue-dark);
            color: var(--blue-dark);
            background: var(--yellow);
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 900;
        }

        .plate { font: 900 14px 'Space Grotesk', sans-serif; color: var(--blue-dark); }
        .owner { margin-top: 3px; font-size: 12.5px; font-weight: 800; }
        .subtext { margin-top: 3px; color: var(--muted); font-size: 11px; font-weight: 600; }

        .service-label {
            display: inline-block;
            padding: 6px 11px;
            border: 1.5px solid var(--blue-dark);
            border-radius: 6px;
            background: #F4F7FF;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 800;
            color: var(--blue-dark);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 7px;
            border: 1.5px solid var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 10.5px;
            font-weight: 900;
            box-shadow: 2px 2px 0 var(--blue-dark);
            white-space: nowrap;
        }

        .badge::before {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
            content: "";
        }

        .badge.ms { color: var(--blue-dark); background: var(--yellow); }
        .badge.tms { color: #B42323; background: #FDE9E7; border-color: #B42323; }

        .action-buttons { display: flex; align-items: center; gap: 8px; }

        .action-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 38px;
            padding: 0 13px;
            border: 1.5px solid var(--blue-dark);
            border-radius: 8px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            box-shadow: 2px 2px 0 var(--blue-dark);
            transition: all 0.2s ease;
            cursor: pointer;
            white-space: nowrap;
        }

        .receipt-btn { color: var(--blue-dark); background: var(--yellow); }
        .receipt-btn:hover { transform: translate(-1px, -1px); box-shadow: 3px 3px 0 var(--blue-dark); }

        .edit-btn { color: var(--blue-dark); background: var(--blue-light); }
        .edit-btn:hover { background: #D8E6FF; transform: translate(-1px, -1px); box-shadow: 3px 3px 0 var(--blue-dark); }

        .delete-btn { border-color: #B42323; color: #B42323; background: #FFF0EE; }
        .delete-btn:hover { color: white; background: var(--red); transform: translate(-1px, -1px); box-shadow: 3px 3px 0 var(--blue-dark); }

        .empty { padding: 45px 15px; color: var(--muted); text-align: center; font-weight: 600; }
        .empty-icon { margin-bottom: 10px; font-size: 34px; }

        .footer {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            margin-top: 32px;
            padding-top: 22px;
            border-top: 2px solid var(--line);
            color: #7C8A80;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 800;
        }

        .footer strong { color: var(--blue-dark); }

        /* SweetAlert Custom Style (Brutalist Theme) */
        .sigap-popup {
            border: 2.5px solid var(--blue-dark) !important;
            border-radius: 20px !important;
            box-shadow: 8px 8px 0 var(--yellow) !important;
            font-family: 'DM Sans', sans-serif !important;
            max-width: 90vw !important;
        }

        .sigap-title { font-family: 'Space Grotesk', sans-serif !important; font-weight: 900 !important; color: var(--blue-dark) !important; }

        .sigap-confirm, .sigap-cancel {
            padding: 12px 20px !important;
            border-radius: 9px !important;
            border: 1.5px solid var(--blue-dark) !important;
            font-family: 'Space Grotesk', sans-serif !important;
            font-size: 12px !important;
            font-weight: 900 !important;
            box-shadow: 3px 3px 0 var(--blue-dark) !important;
            cursor: pointer !important;
        }

        .sigap-confirm { background: var(--red) !important; color: white !important; }
        .sigap-confirm:hover { background: #B42323 !important; transform: translate(-1px, -1px); }
        .sigap-cancel { background: var(--blue-light) !important; color: var(--blue-dark) !important; }
        .sigap-cancel:hover { background: #D8E6FF !important; transform: translate(-1px, -1px); }

        /* =========================================================
           ULTRA-KALCER CUSTOM DATEPICKER (POPPER)
           ========================================================= */
        .sigap-calendar-popover {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            z-index: 10000;
            display: none;
            width: 310px;
            max-width: 90vw;
            padding: 18px;
            border: 2.5px solid var(--blue-dark);
            border-radius: 16px;
            background: white;
            box-shadow: 7px 7px 0 var(--yellow);
            animation: calPopIn 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        .sigap-calendar-popover.active {
            display: block;
        }

        @keyframes calPopIn {
            from { opacity: 0; transform: translateY(-8px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        .cal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
            padding-bottom: 10px;
            border-bottom: 2px dashed var(--line);
        }

        .cal-title {
            color: var(--blue-dark);
            font: 900 15px 'Space Grotesk', sans-serif;
            letter-spacing: -0.3px;
        }

        .cal-nav-btn {
            display: grid;
            width: 32px;
            height: 32px;
            place-items: center;
            border: 1.5px solid var(--blue-dark);
            border-radius: 8px;
            background: var(--blue-light);
            color: var(--blue-dark);
            font-weight: 900;
            cursor: pointer;
            box-shadow: 2px 2px 0 var(--blue-dark);
            transition: all 0.15s ease;
        }

        .cal-nav-btn:hover {
            background: var(--yellow);
            transform: translate(-1px, -1px);
            box-shadow: 3px 3px 0 var(--blue-dark);
        }

        .cal-weekdays {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-bottom: 8px;
            text-align: center;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            color: var(--blue-dark);
        }

        .cal-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .cal-day-cell {
            display: grid;
            width: 34px;
            height: 34px;
            margin: 0 auto;
            place-items: center;
            border: 1.5px solid transparent;
            border-radius: 8px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 12px;
            font-weight: 800;
            color: var(--ink);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .cal-day-cell:hover:not(.empty-cell) {
            border-color: var(--blue-dark);
            background: var(--yellow);
            color: var(--blue-dark);
            box-shadow: 2px 2px 0 var(--blue-dark);
            transform: scale(1.08);
        }

        .cal-day-cell.today {
            border-color: var(--blue-dark);
            background: var(--blue-light);
            color: var(--blue-dark);
        }

        .cal-day-cell.selected {
            border-color: var(--blue-dark);
            background: var(--blue-dark) !important;
            color: white !important;
            box-shadow: 2px 2px 0 var(--yellow);
        }

        .cal-day-cell.empty-cell {
            cursor: default;
        }

        .cal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px;
            padding-top: 10px;
            border-top: 2px dashed var(--line);
        }

        .cal-footer-btn {
            border: none;
            background: none;
            color: var(--blue);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cal-footer-btn:hover {
            color: var(--blue-dark);
            text-decoration: underline;
        }

        /* MODAL EXPORT EXCEL */
        .modal-backdrop {
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: none;
            place-items: center;
            padding: 16px;
            background: rgba(20, 33, 61, 0.65);
            backdrop-filter: blur(6px);
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .modal-backdrop.active { display: grid; opacity: 1; }

        .modal-card {
            width: 100%;
            max-width: 480px;
            padding: 30px;
            border: 2.5px solid var(--blue-dark);
            border-radius: 20px;
            background: white;
            box-shadow: 9px 9px 0 var(--yellow);
            transform: scale(0.9);
            transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .modal-backdrop.active .modal-card { transform: scale(1); }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            padding-bottom: 14px;
            border-bottom: 2px dashed var(--line);
        }

        .modal-header h3 { margin: 0; color: var(--blue-dark); font: 900 20px 'Space Grotesk', sans-serif; }

        .modal-close {
            display: grid;
            width: 34px;
            height: 34px;
            place-items: center;
            border: 1.5px solid var(--blue-dark);
            border-radius: 8px;
            background: #F8FAFF;
            color: var(--blue-dark);
            cursor: pointer;
            font-weight: 900;
            box-shadow: 2px 2px 0 var(--blue-dark);
        }

        .modal-close:hover { color: white; background: var(--red); transform: rotate(90deg); }

        /* =========================================================
           RESPONSIVE BREAKPOINTS (MOBILE FIXES)
           ========================================================= */
        @media (max-width: 992px) {
            .form-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .table-toolbar { grid-template-columns: 1fr 1fr; }
            .search { grid-column: 1 / -1; }
        }

        @media (max-width: 850px) {
            .topbar { padding: 18px 22px; }
            .brand { font-size: 24px; }
            .brand-mark { flex-basis: 44px; width: 44px; height: 44px; font-size: 24px; }
            .main { padding: 24px 18px 34px; }
            .page-heading { align-items: flex-start; flex-direction: column; gap: 12px; }
            .hero { min-height: 200px; padding: 28px; }
            .hero-stamp { display: none; }
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; }
            .panel { padding: 24px; }
        }

        @media (max-width: 640px) {
            .topbar {
                flex-direction: column;
                align-items: stretch;
                gap: 14px;
                padding: 16px;
            }
            .header-right {
                width: 100%;
                justify-content: space-between;
            }
            .date-chip {
                flex: 1;
                padding: 6px 10px;
                gap: 8px;
            }
            .clock-icon {
                width: 30px;
                height: 30px;
                font-size: 14px;
            }
            .date-day { font-size: 10px; }
            .date-time { font-size: 11px; }

            .panel-heading {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .panel-heading .export-btn {
                width: 100%;
            }
            .form-grid {
                grid-template-columns: minmax(0, 1fr);
            }
            .documents-grid {
                grid-template-columns: minmax(0, 1fr);
                gap: 16px;
            }

            .table-toolbar {
                grid-template-columns: minmax(0, 1fr);
                gap: 12px;
            }
        }

        @media (max-width: 480px) {
            .main { padding: 16px 12px 28px; }
            .hero {
                padding: 22px 18px;
                border-radius: 14px;
                box-shadow: 5px 5px 0 var(--yellow);
            }
            .hero h2 {
                font-size: 22px;
                letter-spacing: -0.5px;
            }
            .hero p {
                font-size: 12.5px;
            }
            .stats {
                grid-template-columns: minmax(0, 1fr);
                gap: 12px;
            }
            .stat {
                padding: 18px;
                box-shadow: 4px 4px 0 var(--blue-dark);
            }
            .panel {
                padding: 18px 14px;
                border-radius: 14px;
                box-shadow: 5px 5px 0 var(--yellow);
            }
            .heading-mark {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }
            .form-footer {
                flex-direction: column;
                align-items: stretch;
                gap: 14px;
            }
            .form-footer .btn {
                width: 100%;
            }
            .sigap-calendar-popover {
                left: 50% !important;
                transform: translateX(-50%) !important;
                width: 290px;
            }
            @keyframes calPopIn {
                from { opacity: 0; transform: translate(-50%, -8px) scale(0.95); }
                to { opacity: 1; transform: translate(-50%, 0) scale(1); }
            }
            .modal-card {
                padding: 20px 16px;
                box-shadow: 5px 5px 0 var(--yellow);
            }
            .footer {
                flex-direction: column;
                gap: 6px;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header class="topbar">
    <a href="{{ route('pajakin.index') }}" class="brand">
        <div class="brand-mark">S</div>
        <div>
            SIGAP<span style="color:var(--yellow)">®</span>
            <small>REWARD TAX SYSTEM</small>
        </div>
    </a>

    <div class="header-right">
        <div class="date-chip">
            <div class="clock-icon">◷</div>
            <div class="date-details">
                <div class="date-day" id="tanggalIndonesia">
                    {{ now()->timezone('Asia/Jakarta')->locale('id')->translatedFormat('l, d F Y') }}
                </div>
                <div class="date-time">
                    <span id="jamIndonesia">--:--:--</span>
                    <span class="timezone"> WIB · UTC+7</span>
                </div>
            </div>
        </div>

        <div class="system-pill">
            <span class="live-dot"></span>
            SISTEM AKTIF
        </div>

        <form action="{{ route('logout') }}" method="POST" class="logout-form" id="logoutForm">
            @csrf
            <button type="button" class="logout-btn" id="logoutBtn">
                <span>↪</span> LOGOUT
            </button>
        </form>
    </div>
</header>

<main class="main">

    <header class="page-heading">
        <div>
            <div class="breadcrumb">SIGAP / Workspace / Dashboard</div>
            <h1>Dashboard <span class="highlight">Wajib Pajak.</span></h1>
            <p class="subtitle">
                Kelola data dengan praktis, pantau kepatuhan, dan berikan apresiasi bagi wajib pajak.
            </p>
        </div>
    </header>

    @if ($errors->any())
        <div class="alert error" style="border: 2px solid var(--blue-dark); background: #FFF0EE; color: #A32626; padding: 16px; border-radius: 12px; margin-bottom: 24px; box-shadow: 4px 4px 0 var(--red);">
            <strong>Data belum berhasil disimpan.</strong>
            <ul style="margin: 8px 0 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- HERO BANNER --}}
    <section class="hero">
        <div class="hero-content">
            <span class="tag">SIGAP® / SPECIAL EDITION</span>
            <h2>BAYAR PAJAKNYA,<br><span>DAPETIN REWARD-NYA!</span></h2>
            <p>
                Bayar tepat waktu, nikmati reward eksklusif, dan wujudkan perjalanan tanpa rasa cemas. SIGAP® siap mendampingi kepatuhan pajak kendaraanmu dengan cepat, transparan, dan terpercaya!
            </p>
        </div>

        <div class="hero-stamp">
            <div>
                <strong>S.</strong><br>
                <small>BEBAS DENDA<br>RAIH REWARD</small>
            </div>
        </div>
    </section>

    {{-- STATISTIK CARDS --}}
    <section class="stats">
        <div class="stat">
            <div class="stat-top">
                <div class="stat-label">TOTAL WAJIB PAJAK</div>
                <div class="stat-icon">▤</div>
            </div>
            <div class="stat-number">{{ $wajibPajaks->count() }}</div>
            <div class="stat-desc">Total data tercatat di sistem.</div>
        </div>

        <div class="stat">
            <div class="stat-top">
                <div class="stat-label">MEMENUHI SYARAT</div>
                <div class="stat-icon">✓</div>
            </div>
            <div class="stat-number">{{ $wajibPajaks->where('status', 'MS')->count() }}</div>
            <div class="stat-desc">Jatuh tempo hari ini atau belum terlewat.</div>
        </div>

        <div class="stat">
            <div class="stat-top">
                <div class="stat-label">TIDAK MEMENUHI SYARAT</div>
                <div class="stat-icon">!</div>
            </div>
            <div class="stat-number">{{ $wajibPajaks->where('status', 'TMS')->count() }}</div>
            <div class="stat-desc">Tanggal jatuh tempo sudah terlewat.</div>
        </div>
    </section>

    {{-- FORM TAMBAH DATA --}}
    <section class="panel" id="form-data">
        <div class="panel-heading">
            <div class="heading-left">
                <div class="heading-mark">＋</div>
                <div>
                    <h2>Tambah Data Wajib Pajak</h2>
                    <p>Lengkapi informasi kendaraan, foto STNK, foto KTP, dan titik layanan.</p>
                </div>
            </div>
            <span class="required-note">* Wajib diisi · HP, STNK & KTP Opsional</span>
        </div>

        <form action="{{ route('pajakin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-grid">
                <div class="field">
                    <label for="nopol">NOMOR POLISI *</label>
                    <input id="nopol" name="nopol" type="text" value="{{ old('nopol') }}" placeholder="Contoh: G 1234 AB" maxlength="20" style="text-transform:uppercase" autocomplete="off" required>
                </div>

                <div class="field">
                    <label for="nama">NAMA WAJIB PAJAK *</label>
                    <input id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Nama lengkap wajib pajak" maxlength="100" required>
                </div>

                <div class="field">
                    <label for="no_hp">NOMOR HP <span class="optional">(OPSIONAL)</span></label>
                    <input id="no_hp" name="no_hp" type="tel" value="{{ old('no_hp') }}" placeholder="Contoh: 081234567890" maxlength="20" inputmode="tel">
                </div>

                <div class="field">
                    <label for="jenis_pendaftaran">JENIS PENDAFTARAN *</label>
                    <select id="jenis_pendaftaran" name="jenis_pendaftaran" required>
                        <option value="">Pilih jenis pendaftaran</option>
                        @foreach (['PU TAHUNAN', 'PU 5 TAHUNAN', 'MUTASI MASUK', 'DUPLIKAT PAJAK'] as $jenis)
                            <option value="{{ $jenis }}" {{ old('jenis_pendaftaran') === $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="field" id="pilihanAntreanField" style="display:none;">
                    <label for="jalur_antrean">PILIH JALUR ANTREAN *</label>
                    <select id="jalur_antrean" name="jalur_antrean">
                        <option value="">Pilih jalur antrean</option>
                        <option value="A" {{ old('jalur_antrean') === 'A' ? 'selected' : '' }}>ANTREAN A</option>
                        <option value="B" {{ old('jalur_antrean') === 'B' ? 'selected' : '' }}>ANTREAN B</option>
                    </select>
                </div>

                <div class="field">
                    <label>NOMOR ANTREAN OTOMATIS</label>
                    <div class="queue-preview">
                        <div>
                            <strong id="nomorAntreanPreview">Menunggu pilihan</strong>
                            <br>
                            <small id="keteranganAntrean">Nomor antrean dibuat otomatis oleh sistem.</small>
                        </div>
                        <span style="font-size:22px; font-weight:900;">▤</span>
                    </div>
                    <input type="hidden" id="no_antrian" name="no_antrian" value="{{ old('no_antrian') }}">
                </div>

                <!-- TANGGAL JATUH TEMPO DENGAN CUSTOM KALENDER KALCER -->
                <div class="field">
                    <label for="tanggalJatuhTempoInput">TANGGAL JATUH TEMPO *</label>
                    <div class="date-picker-wrapper">
                        <input id="tanggalJatuhTempoInput" type="text" placeholder="HH-BB-TTTT (misal: 25-10-2026)" value="{{ old('tanggal_jatuh_tempo') }}" maxlength="10" autocomplete="off" required>
                        <button type="button" class="date-trigger-btn" id="btnPickerJatuhTempo" title="Buka Kalender Kalcer">📅</button>
                    </div>
                    <input type="hidden" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ old('tanggal_jatuh_tempo') }}">
                </div>

                <div class="field">
                    <label for="fungsi">FUNGSI *</label>
                    <select id="fungsi" name="fungsi" required>
                        <option value="Wajib Pribadi" {{ old('fungsi', 'Wajib Pribadi') === 'Wajib Pribadi' ? 'selected' : '' }}>Wajib Pribadi</option>
                    </select>
                </div>

                <div class="field">
                    <label for="titik_layanan">TITIK LAYANAN *</label>
                    <select id="titik_layanan" name="titik_layanan" required>
                        <option value="">Pilih titik layanan</option>
                        @foreach (['SAMSAT Induk', 'SAMSAT Keliling', 'PATEN', 'BUDIMAN'] as $layanan)
                            <option value="{{ $layanan }}" {{ old('titik_layanan') === $layanan ? 'selected' : '' }}>
                                {{ $layanan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="documents-grid">
                    <div class="field">
                        <label for="foto_stnk">FOTO STNK <span class="optional">(OPSIONAL)</span></label>
                        <div class="stnk-upload">
                            <div>
                                <input id="foto_stnk" name="foto_stnk" type="file" accept=".jpg,.jpeg,.png,.webp">
                                <small class="stnk-help">Format JPG, JPEG, PNG, WEBP. Maks 2 MB.</small>
                            </div>
                            <img id="stnkPreview" class="stnk-preview" src="#" alt="Preview STNK">
                        </div>
                    </div>

                    <div class="field">
                        <label for="foto_ktp">FOTO KTP <span class="optional">(OPSIONAL)</span></label>
                        <div class="stnk-upload">
                            <div>
                                <input id="foto_ktp" name="foto_ktp" type="file" accept=".jpg,.jpeg,.png,.webp">
                                <small class="stnk-help">Format JPG, JPEG, PNG, WEBP. Maks 2 MB.</small>
                            </div>
                            <img id="ktpPreview" class="stnk-preview" src="#" alt="Preview KTP">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-footer">
                <p class="helper">✳ Status MS/TMS ditentukan otomatis berdasarkan tanggal jatuh tempo yang dimasukkan.</p>
                <button class="btn" type="submit">SIMPAN DATA ↗</button>
            </div>
        </form>
    </section>

    {{-- DATABASE TABLE --}}
    <section class="panel" id="tabel-data">
        <div class="panel-heading">
            <div class="heading-left">
                <div class="heading-mark">▤</div>
                <div>
                    <h2>Database Wajib Pajak</h2>
                    <p>Cari, filter, dan kelola data terdaftar di workspace.</p>
                </div>
            </div>

            <button type="button" class="export-btn" id="openExportModalBtn">
                <span>↓</span> EXPORT EXCEL
            </button>
        </div>

        <div class="table-toolbar">
            <input class="search" id="searchInput" type="search" placeholder="⌕ Cari nopol, nama, atau nomor antrean..." aria-label="Cari data wajib pajak">
            <select class="filter" id="statusFilter" aria-label="Filter status">
                <option value="">Semua Status</option>
                <option value="MS">MS — Memenuhi Syarat</option>
                <option value="TMS">TMS — Tidak Memenuhi Syarat</option>
            </select>
            <select class="filter" id="layananFilter" aria-label="Filter layanan">
                <option value="">Semua Layanan</option>
                <option value="SAMSAT Induk">SAMSAT Induk</option>
                <option value="SAMSAT Keliling">SAMSAT Keliling</option>
                <option value="PATEN">PATEN</option>
                <option value="BUDIMAN">BUDIMAN</option>
            </select>
        </div>

        <div class="table-meta">
            <strong>Data terdaftar</strong>
            <span id="visibleCount">{{ $wajibPajaks->count() }} data</span>
        </div>

        <div class="table-wrap">
            <table id="wajibPajakTable">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>DATA WAJIB PAJAK</th>
                        <th>JENIS PENDAFTARAN</th>
                        <th>NO. ANTREAN</th>
                        <th>JATUH TEMPO</th>
                        <th>TITIK LAYANAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wajibPajaks as $index => $wajibPajak)
                        <tr data-status="{{ $wajibPajak->status }}" data-layanan="{{ $wajibPajak->titik_layanan }}">
                            <td><span class="row-number">{{ $index + 1 }}</span></td>
                            <td>
                                <div class="plate">{{ $wajibPajak->nopol }}</div>
                                <div class="owner">{{ $wajibPajak->nama }}</div>
                                <div class="subtext">{{ $wajibPajak->no_hp ?: 'Nomor HP tidak diisi' }}</div>
                            </td>
                            <td><span class="service-label">{{ $wajibPajak->jenis_pendaftaran }}</span></td>
                            <td><strong style="font-family:'Space Grotesk'; font-size:14px; color:var(--blue-dark);">{{ $wajibPajak->no_antrian ?: '—' }}</strong></td>
                            <td>{{ $wajibPajak->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($wajibPajak->tanggal_jatuh_tempo)->format('d-m-Y') : '—' }}</td>
                            <td><span class="service-label">{{ $wajibPajak->titik_layanan }}</span></td>
                            <td>
                                <span class="badge {{ $wajibPajak->status === 'MS' ? 'ms' : 'tms' }}">
                                    {{ $wajibPajak->status }} · {{ $wajibPajak->status === 'MS' ? 'Memenuhi Syarat' : 'Tidak Memenuhi Syarat' }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if ($wajibPajak->status === 'MS')
                                        <a href="{{ route('pajakin.tanda-terima', $wajibPajak->id) }}" class="action-btn receipt-btn">▧ Tanda Terima</a>
                                    @else
                                        <button type="button" class="action-btn" disabled style="background:#F1F5F9;color:#94A3B8;border:1.5px solid #CBD5E1;cursor:not-allowed;box-shadow:none;">🔒 TMS</button>
                                    @endif
                                    <a href="{{ route('pajakin.edit', $wajibPajak->id) }}" class="action-btn edit-btn">✎ Edit</a>
                                    <form action="{{ route('pajakin.destroy', $wajibPajak->id) }}" method="POST" class="delete-form" data-nopol="{{ $wajibPajak->nopol }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn">✕ Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr id="emptyRow">
                            <td colspan="8" class="empty">
                                <div class="empty-icon">▤</div>
                                <strong>Belum ada data wajib pajak tercatat.</strong><br>
                                Gunakan formulir di atas untuk menambahkan data baru.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <footer class="footer">
        <span><strong>SIGAP® TAX PLATFORM</strong> · UPPD PEMALANG</span>
        <span>© {{ date('Y') }} · BAYAR PAJAKNYA, DAPETIN REWARD-NYA!</span>
    </footer>

</main>

{{-- MODAL FILTER EXPORT --}}
<div class="modal-backdrop" id="exportModalBackdrop">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Download Laporan Excel</h3>
            <button type="button" class="modal-close" id="closeExportModalBtn">✕</button>
        </div>

        <form action="{{ route('pajakin.export') }}" method="GET" id="exportFilterForm">
            <div class="field" style="margin-bottom:18px;">
                <label for="modalFilterTipe">PILIH OPSI FILTER PERIODE</label>
                <select id="modalFilterTipe" name="filter_tipe" class="filter" style="width:100%; min-height:50px;">
                    <option value="">Semua Data (Tanpa Filter)</option>
                    <option value="hari">Hari Ini</option>
                    <option value="minggu">Minggu Ini</option>
                    <option value="bulan">Bulan Spesifik</option>
                    <option value="custom">Rentang Tanggal Custom</option>
                </select>
            </div>

            <div id="monthFilterContainer" style="display:none; margin-bottom:18px;">
                <div class="field">
                    <label for="modalPilihBulan">PILIH BULAN & TAHUN</label>
                    <input type="month" id="modalPilihBulan" name="bulan_pilihan" class="filter" style="width:100%; min-height:50px;" value="{{ date('Y-m') }}">
                </div>
            </div>

            <div id="customDateContainer" style="display:none; margin-bottom:20px;">
                <div class="form-grid" style="grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap:14px;">
                    <div class="field">
                        <label for="modalTglMulaiInput">TANGGAL MULAI</label>
                        <div class="date-picker-wrapper">
                            <input type="text" id="modalTglMulaiInput" name="tanggal_mulai" style="min-height:46px;" placeholder="HH-BB-TTTT" maxlength="10">
                            <button type="button" class="date-trigger-btn" id="btnPickerTglMulai">📅</button>
                        </div>
                    </div>
                    <div class="field">
                        <label for="modalTglSelesaiInput">TANGGAL SELESAI</label>
                        <div class="date-picker-wrapper">
                            <input type="text" id="modalTglSelesaiInput" name="tanggal_selesai" style="min-height:46px;" placeholder="HH-BB-TTTT" maxlength="10">
                            <button type="button" class="date-trigger-btn" id="btnPickerTglSelesai">📅</button>
                        </div>
                    </div>
                </div>
            </div>

            <div style="display:flex; justify-content:flex-end; gap:12px; margin-top:24px; flex-wrap:wrap;">
                <button type="button" class="action-btn edit-btn" id="cancelExportModalBtn" style="min-height:46px; padding:0 18px; flex:1;">Batal</button>
                <button type="submit" class="btn" style="min-height:46px; padding:0 22px; flex:2;">↓ DOWNLOAD EXCEL</button>
            </div>
        </form>
    </div>
</div>

<script>
    // SWEETALERT2 UNTUK LOGOUT
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutForm = document.getElementById('logoutForm');

    if (logoutBtn && logoutForm) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin mau keluar?',
                text: 'Sesi kamu akan diakhiri dan kamu perlu login kembali untuk mengakses SIGAP®.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Logout Now ↪',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'sigap-popup',
                    title: 'sigap-title',
                    confirmButton: 'sigap-confirm',
                    cancelButton: 'sigap-cancel'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    logoutForm.submit();
                }
            });
        });
    }

    // SWEETALERT2 UNTUK HAPUS DATA
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const nopol = this.dataset.nopol || 'data ini';
            Swal.fire({
                title: 'Hapus Wajib Pajak?',
                text: `Data dengan Nopol ${nopol} akan dihapus permanen.`,
                icon: 'error',
                showCancelButton: true,
                confirmButtonText: 'Hapus Permanen ✕',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'sigap-popup',
                    title: 'sigap-title',
                    confirmButton: 'sigap-confirm',
                    cancelButton: 'sigap-cancel'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });

    // JAM & TANGGAL REALTIME
    function updateJamIndonesia() {
        const sekarang = new Date();
        const formatTanggal = new Intl.DateTimeFormat('id-ID', {
            timeZone: 'Asia/Jakarta', weekday: 'long', day: '2-digit', month: 'long', year: 'numeric'
        });
        const formatJam = new Intl.DateTimeFormat('id-ID', {
            timeZone: 'Asia/Jakarta', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false
        });

        const tanggalElement = document.getElementById('tanggalIndonesia');
        const jamElement = document.getElementById('jamIndonesia');

        if (tanggalElement) tanggalElement.textContent = formatTanggal.format(sekarang);
        if (jamElement) jamElement.textContent = formatJam.format(sekarang).replace(/\./g, ':');
    }
    updateJamIndonesia();
    setInterval(updateJamIndonesia, 1000);

    // PREVIEW IMAGE UPLOAD
    function handleImageUpload(inputId, previewId, labelText) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(previewId);
        if (!input || !preview) return;

        input.addEventListener('change', function () {
            const file = this.files && this.files[0];
            if (!file) { preview.style.display = 'none'; return; }

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    }
    handleImageUpload('foto_stnk', 'stnkPreview', 'STNK');
    handleImageUpload('foto_ktp', 'ktpPreview', 'KTP');

    // ANTREAN SELECTION LOGIC
    const jenisPendaftaran = document.getElementById('jenis_pendaftaran');
    const jalurAntrean = document.getElementById('jalur_antrean');
    const pilihanAntreanField = document.getElementById('pilihanAntreanField');
    const nomorAntreanPreview = document.getElementById('nomorAntreanPreview');
    const keteranganAntrean = document.getElementById('keteranganAntrean');

    function aturJenisAntrean() {
        if (!jenisPendaftaran) return;
        const jenis = jenisPendaftaran.value;

        if (jenis === 'PU TAHUNAN') {
            pilihanAntreanField.style.display = 'block';
            jalurAntrean.required = true;
            nomorAntreanPreview.textContent = jalurAntrean.value ? 'Antrean ' + jalurAntrean.value : 'Pilih jalur A/B';
            keteranganAntrean.textContent = 'PU Tahunan dapat memilih jalur A atau B.';
        } else if (jenis) {
            pilihanAntreanField.style.display = 'none';
            jalurAntrean.required = false;
            jalurAntrean.value = 'A';
            if (jalurAntrean.sigapCustomSelect) jalurAntrean.sigapCustomSelect.updateFromNative();
            nomorAntreanPreview.textContent = 'Antrean A';
            keteranganAntrean.textContent = 'Otomatis menggunakan antrean A.';
        } else {
            pilihanAntreanField.style.display = 'none';
            nomorAntreanPreview.textContent = 'Menunggu pilihan';
        }
    }

    if (jenisPendaftaran) {
        jenisPendaftaran.addEventListener('change', aturJenisAntrean);
        if (jalurAntrean) jalurAntrean.addEventListener('change', aturJenisAntrean);
    }

    /* =========================================================
       ULTRA-KALCER CUSTOM SELECT ENGINE
       ========================================================= */
    class SigapCustomSelect {
        constructor(nativeSelect) {
            this.nativeSelect = nativeSelect;
            if (!this.nativeSelect) return;

            this.nativeSelect.sigapCustomSelect = this;
            this.init();
        }

        init() {
            this.nativeSelect.classList.add('sigap-native-hidden');

            this.wrapper = document.createElement('div');
            this.wrapper.className = 'sigap-custom-select';

            this.trigger = document.createElement('div');
            this.trigger.className = 'sigap-select-trigger';

            this.triggerText = document.createElement('span');
            this.triggerArrow = document.createElement('div');
            this.triggerArrow.className = 'sigap-select-arrow';
            this.triggerArrow.textContent = '▼';

            this.trigger.appendChild(this.triggerText);
            this.trigger.appendChild(this.triggerArrow);
            this.wrapper.appendChild(this.trigger);

            this.popover = document.createElement('div');
            this.popover.className = 'sigap-select-popover';
            this.wrapper.appendChild(this.popover);

            this.nativeSelect.parentNode.insertBefore(this.wrapper, this.nativeSelect);
            this.wrapper.appendChild(this.nativeSelect);

            this.renderOptions();

            this.trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                document.querySelectorAll('.sigap-custom-select').forEach(el => {
                    if (el !== this.wrapper) el.classList.remove('active');
                });
                this.wrapper.classList.toggle('active');
            });

            document.addEventListener('click', (e) => {
                if (!this.wrapper.contains(e.target)) {
                    this.wrapper.classList.remove('active');
                }
            });
        }

        renderOptions() {
            this.popover.innerHTML = '';
            const options = [...this.nativeSelect.options];

            const selectedOpt = options.find(o => o.selected) || options[0];
            this.triggerText.textContent = selectedOpt ? selectedOpt.text : 'Pilih...';
            if (selectedOpt && selectedOpt.value === '') {
                this.triggerText.style.color = '#94A3B8';
            } else {
                this.triggerText.style.color = 'var(--ink)';
            }

            options.forEach(opt => {
                const item = document.createElement('div');
                let className = 'sigap-select-option';
                if (opt.value === '') className += ' placeholder-option';
                if (opt.selected) className += ' selected';
                item.className = className;

                item.innerHTML = `<span>${opt.text}</span> ${opt.selected ? '<span>✓</span>' : ''}`;

                item.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.nativeSelect.value = opt.value;
                    this.nativeSelect.dispatchEvent(new Event('change', { bubbles: true }));
                    this.updateFromNative();
                    this.wrapper.classList.remove('active');
                });

                this.popover.appendChild(item);
            });
        }

        updateFromNative() {
            this.renderOptions();
        }
    }

    // TERAPKAN CUSTOM SELECT KE SEMUA DROPDOWN (FORM + TOOLBAR FILTER)
    document.querySelectorAll('select:not(#modalFilterTipe)').forEach(select => {
        new SigapCustomSelect(select);
    });

    /* =========================================================
       ULTRA-KALCER CUSTOM DATEPICKER ENGINE
       ========================================================= */
    class SigapDatePicker {
        constructor(inputId, btnId, hiddenId = null) {
            this.input = document.getElementById(inputId);
            this.btn = document.getElementById(btnId);
            this.hiddenInput = hiddenId ? document.getElementById(hiddenId) : null;
            if (!this.input || !this.btn) return;

            this.today = new Date();
            this.currentMonth = this.today.getMonth();
            this.currentYear = this.today.getFullYear();

            this.namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            this.init();
        }

        init() {
            this.input.addEventListener('input', (e) => {
                let val = e.target.value.replace(/\D/g, '');
                if (val.length > 8) val = val.substring(0, 8);
                let formatted = '';
                if (val.length > 0) formatted += val.substring(0, 2);
                if (val.length >= 3) formatted += '-' + val.substring(2, 4);
                if (val.length >= 5) formatted += '-' + val.substring(4, 8);
                e.target.value = formatted;
                if (this.hiddenInput) this.hiddenInput.value = formatted;
            });

            this.popover = document.createElement('div');
            this.popover.className = 'sigap-calendar-popover';
            this.input.parentElement.appendChild(this.popover);

            this.btn.addEventListener('click', (e) => {
                e.stopPropagation();
                document.querySelectorAll('.sigap-calendar-popover, .sigap-custom-select').forEach(p => p.classList.remove('active'));
                this.popover.classList.toggle('active');
                if (this.popover.classList.contains('active')) {
                    this.render();
                }
            });

            document.addEventListener('click', (e) => {
                if (!this.popover.contains(e.target) && e.target !== this.btn && e.target !== this.input) {
                    this.popover.classList.remove('active');
                }
            });
        }

        render() {
            const firstDay = new Date(this.currentYear, this.currentMonth, 1).getDay();
            const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
            const startingDay = (firstDay === 0) ? 6 : firstDay - 1;

            let html = `
                <div class="cal-header">
                    <button type="button" class="cal-nav-btn prev-month">◄</button>
                    <div class="cal-title">${this.namaBulan[this.currentMonth]} ${this.currentYear}</div>
                    <button type="button" class="cal-nav-btn next-month">►</button>
                </div>
                <div class="cal-weekdays">
                    <div>Sen</div><div>Sel</div><div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div><div>Min</div>
                </div>
                <div class="cal-days">
            `;

            for (let i = 0; i < startingDay; i++) {
                html += `<div class="cal-day-cell empty-cell"></div>`;
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const isToday = (day === this.today.getDate() && this.currentMonth === this.today.getMonth() && this.currentYear === this.today.getFullYear());
                const formattedDay = String(day).padStart(2, '0');
                const formattedMonth = String(this.currentMonth + 1).padStart(2, '0');
                const dateStr = `${formattedDay}-${formattedMonth}-${this.currentYear}`;

                const isSelected = (this.input.value === dateStr);

                let cellClass = 'cal-day-cell';
                if (isToday) cellClass += ' today';
                if (isSelected) cellClass += ' selected';

                html += `<div class="${cellClass}" data-date="${dateStr}">${day}</div>`;
            }

            html += `
                </div>
                <div class="cal-footer">
                    <button type="button" class="cal-footer-btn reset-btn">Reset</button>
                    <button type="button" class="cal-footer-btn today-btn">Hari Ini</button>
                </div>
            `;

            this.popover.innerHTML = html;

            this.popover.querySelector('.prev-month').addEventListener('click', (e) => {
                e.stopPropagation();
                this.currentMonth--;
                if (this.currentMonth < 0) { this.currentMonth = 11; this.currentYear--; }
                this.render();
            });

            this.popover.querySelector('.next-month').addEventListener('click', (e) => {
                e.stopPropagation();
                this.currentMonth++;
                if (this.currentMonth > 11) { this.currentMonth = 0; this.currentYear++; }
                this.render();
            });

            this.popover.querySelectorAll('.cal-day-cell:not(.empty-cell)').forEach(cell => {
                cell.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const chosen = cell.dataset.date;
                    this.input.value = chosen;
                    if (this.hiddenInput) this.hiddenInput.value = chosen;
                    this.popover.classList.remove('active');
                });
            });

            this.popover.querySelector('.today-btn').addEventListener('click', (e) => {
                e.stopPropagation();
                const d = String(this.today.getDate()).padStart(2, '0');
                const m = String(this.today.getMonth() + 1).padStart(2, '0');
                const y = this.today.getFullYear();
                const todayStr = `${d}-${m}-${y}`;
                this.input.value = todayStr;
                if (this.hiddenInput) this.hiddenInput.value = todayStr;
                this.popover.classList.remove('active');
            });

            this.popover.querySelector('.reset-btn').addEventListener('click', (e) => {
                e.stopPropagation();
                this.input.value = '';
                if (this.hiddenInput) this.hiddenInput.value = '';
                this.popover.classList.remove('active');
            });
        }
    }

    new SigapDatePicker('tanggalJatuhTempoInput', 'btnPickerJatuhTempo', 'tanggal_jatuh_tempo');
    new SigapDatePicker('modalTglMulaiInput', 'btnPickerTglMulai');
    new SigapDatePicker('modalTglSelesaiInput', 'btnPickerTglSelesai');

    // MODAL EXPORT LOGIC
    const modalBackdrop = document.getElementById('exportModalBackdrop');
    const openExportModalBtn = document.getElementById('openExportModalBtn');
    const closeExportModalBtn = document.getElementById('closeExportModalBtn');
    const cancelExportModalBtn = document.getElementById('cancelExportModalBtn');
    const modalFilterTipe = document.getElementById('modalFilterTipe');

    if (openExportModalBtn) openExportModalBtn.addEventListener('click', () => modalBackdrop.classList.add('active'));
    if (closeExportModalBtn) closeExportModalBtn.addEventListener('click', () => modalBackdrop.classList.remove('active'));
    if (cancelExportModalBtn) cancelExportModalBtn.addEventListener('click', () => modalBackdrop.classList.remove('active'));

    if (modalFilterTipe) {
        modalFilterTipe.addEventListener('change', function () {
            document.getElementById('customDateContainer').style.display = (this.value === 'custom') ? 'block' : 'none';
            document.getElementById('monthFilterContainer').style.display = (this.value === 'bulan') ? 'block' : 'none';
        });
    }

    // LIVE TABLE SEARCH & FILTERING (CLIENT SIDE)
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const layananFilter = document.getElementById('layananFilter');
    const tableRows = document.querySelectorAll('#wajibPajakTable tbody tr[data-status]');
    const visibleCount = document.getElementById('visibleCount');

    function filterTable() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
        const statusVal = statusFilter ? statusFilter.value : '';
        const layananVal = layananFilter ? layananFilter.value : '';
        let count = 0;

        tableRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const rowStatus = row.dataset.status || '';
            const rowLayanan = row.dataset.layanan || '';

            const matchQuery = !query || text.includes(query);
            const matchStatus = !statusVal || rowStatus === statusVal;
            const matchLayanan = !layananVal || rowLayanan === layananVal;

            if (matchQuery && matchStatus && matchLayanan) {
                row.style.display = '';
                count++;
            } else {
                row.style.display = 'none';
            }
        });

        if (visibleCount) {
            visibleCount.textContent = `${count} data`;
        }
    }

    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (statusFilter) statusFilter.addEventListener('change', filterTable);
    if (layananFilter) layananFilter.addEventListener('change', filterTable);
</script>

</body>
</html>

<?php
require __DIR__ . '/../public/index.php';