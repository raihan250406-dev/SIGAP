<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#123B8A">

    <title>Edit Data — SIGAP.</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* =========================================================
           DESIGN SYSTEM VARIABLES & GLOBAL STYLES
           ========================================================= */
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
            overflow-x: clip;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
            min-width: 320px;
            width: 100%;
            overflow-x: clip;
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
            gap: 24px;
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
            gap: 15px;
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

        /* =========================================================
           MAIN CONTAINER & HEADING
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

        .breadcrumb a {
            color: var(--blue);
        }

        .breadcrumb a:hover {
            text-decoration: underline;
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
            font: 900 clamp(32px, 3.5vw, 46px) 'Space Grotesk', sans-serif;
            letter-spacing: -1.8px;
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
        }

        .subtitle {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            font-weight: 500;
            line-height: 1.8;
        }

        /* EDIT STRIP BANNER */
        .edit-strip {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            min-height: 130px;
            margin-bottom: 32px;
            padding: 28px 36px;
            overflow: hidden;
            border: 2.5px solid var(--blue-dark);
            border-radius: 20px;
            background: var(--yellow);
            color: var(--blue-dark);
            box-shadow: 8px 8px 0 var(--blue-dark);
        }

        .edit-strip::after {
            content: 'EDIT MODE';
            position: absolute;
            right: 20px;
            top: 0px;
            color: rgba(18, 59, 138, 0.08);
            font: 900 clamp(50px, 7vw, 100px)/1 'Space Grotesk', sans-serif;
            letter-spacing: -5px;
            pointer-events: none;
        }

        .strip-left {
            display: flex;
            align-items: center;
            gap: 18px;
            position: relative;
            z-index: 1;
        }

        .strip-icon {
            display: grid;
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            place-items: center;
            border-radius: 14px;
            border: 2px solid var(--blue-dark);
            background: var(--blue-dark);
            color: var(--yellow);
            font-size: 26px;
            box-shadow: 3.5px 3.5px 0 white;
        }

        .strip-title {
            font: 900 18px 'Space Grotesk', sans-serif;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
        }

        .strip-desc {
            margin: 0;
            font-size: 13px;
            font-weight: 600;
            color: var(--blue-dark);
            opacity: 0.9;
        }

        .record-chip {
            position: relative;
            z-index: 1;
            padding: 10px 16px;
            border: 2px solid var(--blue-dark);
            border-radius: 9px;
            background: var(--blue-dark);
            color: var(--yellow);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 12px;
            font-weight: 900;
            box-shadow: 3px 3px 0 white;
            white-space: nowrap;
        }

        /* =========================================================
           PANEL & FORM GRID
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
            width: 50px;
            height: 50px;
            place-items: center;
            border-radius: 12px;
            border: 2px solid var(--blue-dark);
            color: var(--blue-dark);
            background: var(--yellow);
            box-shadow: 3.5px 3.5px 0 var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 900;
        }

        .panel-heading h2 {
            margin: 0 0 6px;
            color: var(--blue-dark);
            font: 900 24px 'Space Grotesk', sans-serif;
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

        .section-label {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 0 20px;
            padding: 10px 14px;
            border: 2px solid var(--blue-dark);
            border-left: 6px solid var(--yellow);
            border-radius: 8px;
            background: var(--blue-light);
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11.5px;
            font-weight: 900;
            letter-spacing: 1.5px;
            box-shadow: 3px 3px 0 var(--blue-dark);
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .field {
            min-width: 0;
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

        .optional {
            color: var(--muted);
            font-weight: 700;
            font-size: 10px;
        }

        .field input:not([type="file"]),
        .field select {
            width: 100%;
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

        .field-hint {
            margin: 8px 0 0;
            color: var(--muted);
            font-size: 11px;
            font-weight: 600;
            line-height: 1.6;
        }

        .form-divider {
            margin: 32px 0 28px;
            border: 0;
            border-top: 2px dashed var(--line);
        }

        /* =========================================================
           DATEPICKER ENGINE & TRIGGER
           ========================================================= */
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

        .sigap-calendar-popover {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            z-index: 10000;
            display: none;
            width: 310px;
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

        /* =========================================================
           CUSTOM SELECT ENGINE
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
           STNK & KTP UPLOAD BOXES (RINGKAS + HOVER MODAL PREVIEW)
           ========================================================= */
        .stnk-upload {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 16px;
            border: 2px solid var(--blue-dark);
            border-radius: 14px;
            background: #F8FAFF;
            box-shadow: 4px 4px 0 var(--blue-light);
            transition: all 0.25s ease;
        }

        .stnk-upload:hover {
            background: white;
            box-shadow: 5px 5px 0 var(--yellow);
        }

        .stnk-upload input[type="file"] {
            width: 100%;
            padding: 9px 12px;
            border: 2px solid #CBD8EF;
            border-radius: 8px;
            background: white;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .stnk-upload input[type="file"]:hover {
            border-color: var(--blue-dark);
        }

        .stnk-help {
            display: block;
            margin-top: 6px;
            color: var(--muted);
            font-size: 11px;
            font-weight: 500;
        }

        .stnk-preview-box {
            margin-top: 12px;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        /* CONTAINER RINGKAS FIT & OVERLAY PREVIEW */
        .stnk-preview-wrapper {
            width: 100%;
            height: 170px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid var(--blue-dark);
            border-radius: 9px;
            background: #F1F5F9;
            box-shadow: 3px 3px 0 var(--yellow);
            overflow: hidden;
            padding: 6px;
            position: relative;
            cursor: pointer;
        }

        .stnk-preview-wrapper img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            display: block;
            border-radius: 4px;
            transition: transform 0.3s ease;
        }

        /* OVERLAY HOVER "LIHAT FOTO UTUH" */
        .preview-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(18, 59, 138, 0.75);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            color: white;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 12px;
            font-weight: 800;
            opacity: 0;
            transition: opacity 0.25s ease;
            backdrop-filter: blur(2px);
        }

        .stnk-preview-wrapper:hover .preview-overlay {
            opacity: 1;
        }

        .stnk-preview-wrapper:hover img {
            transform: scale(1.03);
        }

        .overlay-icon {
            display: grid;
            width: 32px;
            height: 32px;
            place-items: center;
            border-radius: 50%;
            background: var(--yellow);
            color: var(--blue-dark);
            font-size: 15px;
            box-shadow: 2px 2px 0 var(--blue-dark);
        }

        .stnk-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 170px;
            border: 2px dashed #CBD8EF;
            border-radius: 9px;
            background: white;
            color: var(--muted);
            text-align: center;
            padding: 12px;
        }

        .stnk-placeholder-icon {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 8px;
            background: var(--yellow);
            border: 2px solid var(--blue-dark);
            color: var(--blue-dark);
            font-size: 18px;
            font-weight: 900;
            box-shadow: 2px 2px 0 var(--blue-dark);
        }

        .stnk-placeholder p {
            margin: 8px 0 0;
            font-size: 11.5px;
            font-weight: 700;
            color: var(--blue-dark);
        }

        .stnk-file-name-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            gap: 8px;
        }

        .stnk-file-name {
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
            padding: 7px 10px;
            border-radius: 7px;
            background: var(--blue-light);
            border: 1.5px solid var(--blue-dark);
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 800;
            word-break: break-all;
            text-align: center;
        }

        .btn-preview-trigger {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 7px 12px;
            border-radius: 7px;
            border: 1.5px solid var(--blue-dark);
            background: var(--yellow);
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 11px;
            font-weight: 900;
            cursor: pointer;
            box-shadow: 2px 2px 0 var(--blue-dark);
            white-space: nowrap;
            transition: transform 0.15s ease;
        }

        .btn-preview-trigger:hover {
            transform: translate(-1px, -1px);
        }

        .stnk-error {
            margin-top: 8px;
            color: var(--red);
            font-size: 12px;
            font-weight: 700;
        }

        /* INFO STATUS BOX */
        .info {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-top: 30px;
            padding: 20px;
            border: 2px solid var(--blue-dark);
            border-left: 6px solid var(--blue);
            border-radius: 14px;
            background: var(--blue-light);
            color: var(--blue-dark);
            box-shadow: 4px 4px 0 var(--yellow);
        }

        .info-icon {
            display: grid;
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            place-items: center;
            border-radius: 9px;
            border: 1.5px solid var(--blue-dark);
            background: var(--yellow);
            color: var(--blue-dark);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 900;
        }

        .info strong {
            display: block;
            margin-bottom: 6px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 13px;
            font-weight: 900;
            letter-spacing: 0.5px;
        }

        .info p {
            margin: 0;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.8;
            opacity: 0.95;
        }

        /* =========================================================
           BUTTONS & FOOTER
           ========================================================= */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-top: 32px;
            padding-top: 24px;
            border-top: 2px dashed var(--line);
        }

        .footer-note {
            max-width: 440px;
            margin: 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.7;
            font-weight: 500;
        }

        .footer-note strong {
            color: var(--blue-dark);
            font-weight: 800;
        }

        .button-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            min-height: 52px;
            padding: 0 24px;
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

        .btn:hover {
            color: var(--blue-dark);
            background: var(--yellow);
            transform: translate(-3px, -3px);
            box-shadow: 7px 7px 0 var(--blue-dark);
        }

        .btn-secondary {
            border-color: var(--blue-dark);
            background: white;
            color: var(--blue-dark);
            box-shadow: 4px 4px 0 var(--blue-dark);
        }

        .btn-secondary:hover {
            background: var(--blue-light);
            transform: translate(-3px, -3px);
            box-shadow: 7px 7px 0 var(--blue-dark);
        }

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

        .footer strong {
            color: var(--blue-dark);
        }

        /* SWEETALERT CUSTOM STYLE & MODAL PREVIEW */
        .sigap-popup {
            border: 2.5px solid var(--blue-dark) !important;
            border-radius: 20px !important;
            box-shadow: 8px 8px 0 var(--yellow) !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .sigap-preview-modal {
            max-width: 850px !important;
            width: 90% !important;
            padding: 24px !important;
        }

        .sigap-title {
            font-family: 'Space Grotesk', sans-serif !important;
            font-weight: 900 !important;
            color: var(--blue-dark) !important;
        }

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

        .sigap-confirm {
            background: var(--yellow) !important;
            color: var(--blue-dark) !important;
        }

        .sigap-confirm:hover {
            background: #F2C900 !important;
            transform: translate(-1px, -1px);
        }

        .sigap-cancel {
            background: var(--blue-light) !important;
            color: var(--blue-dark) !important;
        }

        .sigap-cancel:hover {
            background: #D8E6FF !important;
            transform: translate(-1px, -1px);
        }

        /* RESPONSIVE BREAKPOINTS */
        @media (max-width: 850px) {
            .topbar { padding: 18px 22px; }
            .brand { font-size: 25px; }
            .brand-mark { flex-basis: 45px; width: 45px; height: 45px; font-size: 26px; }
            .main { padding: 28px 20px 34px; }
            .page-heading { align-items: flex-start; flex-direction: column; }
            .edit-strip { flex-direction: column; align-items: flex-start; gap: 16px; padding: 24px; }
            .edit-strip::after { display: none; }
            .panel { padding: 24px; }
            .form-grid { grid-template-columns: minmax(0, 1fr); }
        }

        @media (max-width: 560px) {
            .topbar { align-items: flex-start; flex-direction: column; gap: 14px; padding: 16px; }
            .header-right { width: 100%; justify-content: space-between; }
            .panel { padding: 20px 16px; }
            .form-footer { flex-direction: column; gap: 16px; }
            .button-group { width: 100%; flex-direction: column-reverse; }
            .btn { width: 100%; }
        }
    </style>
</head>

<body>

    <!-- TOPBAR HEADER -->
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
        </div>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main">

        <header class="page-heading">
            <div>
                <div class="breadcrumb">
                    <a href="{{ route('pajakin.index') }}">Dashboard</a> / 
                    <a href="{{ route('pajakin.index') }}#tabel-data">Data Wajib Pajak</a> / 
                    <span>Edit Data</span>
                </div>
                <h1>Edit Data <span class="highlight">Wajib Pajak.</span></h1>
                <p class="subtitle">
                    Perbarui informasi kendaraan, titik layanan, dan dokumen wajib pajak secara presisi.
                </p>
            </div>
        </header>

        <!-- EDIT BANNER STRIP -->
        <section class="edit-strip">
            <div class="strip-left">
                <div class="strip-icon">✎</div>
                <div>
                    <div class="strip-title">MODE EDIT DATA AKTIF</div>
                    <p class="strip-desc">
                        Pastikan seluruh perubahan informasi sudah sesuai sebelum menyimpan data.
                    </p>
                </div>
            </div>

            <div class="record-chip">
                NO ANTREAN #{{ $wajibPajak->no_antrian }}
            </div>
        </section>

        <!-- VALIDATION ERRORS ALERT -->
        @if ($errors->any())
            <div class="alert error" style="border: 2px solid var(--blue-dark); background: #FFF0EE; color: #A32626; padding: 18px; border-radius: 14px; margin-bottom: 28px; box-shadow: 4px 4px 0 var(--red);">
                <strong style="font-family:'Space Grotesk'; font-size:14px; display:block; margin-bottom:6px;">⚠ Ada data yang perlu diperiksa:</strong>
                <ul style="margin: 0; padding-left: 20px; font-size: 13px; font-weight: 600;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- FORM PANEL -->
        <section class="panel">

            <div class="panel-heading">
                <div class="heading-left">
                    <div class="heading-mark">▤</div>
                    <div>
                        <h2>Informasi Wajib Pajak</h2>
                        <p>Perbarui data identitas kendaraan dan rincian layanan.</p>
                    </div>
                </div>

                <div class="required-note">
                    * Wajib diisi · HP & Dokumen Opsional
                </div>
            </div>

            <form
                id="editForm"
                action="{{ route('pajakin.update', $wajibPajak->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')

                <!-- SECTION 01 -->
                <div class="section-label">
                    01 / IDENTITAS WAJIB PAJAK
                </div>

                <div class="form-grid">

                    <div class="field">
                        <label for="nopol">
                            <span>NOMOR POLISI *</span>
                        </label>
                        <input
                            id="nopol"
                            name="nopol"
                            type="text"
                            value="{{ old('nopol', $wajibPajak->nopol) }}"
                            placeholder="Contoh: G 1234 AB"
                            maxlength="20"
                            style="text-transform: uppercase"
                            autocomplete="off"
                            required
                        >
                        <p class="field-hint">
                            Masukkan nomor polisi sesuai plat kendaraan.
                        </p>
                    </div>

                    <div class="field">
                        <label for="nama">
                            <span>NAMA WAJIB PAJAK *</span>
                        </label>
                        <input
                            id="nama"
                            name="nama"
                            type="text"
                            value="{{ old('nama', $wajibPajak->nama) }}"
                            placeholder="Masukkan nama lengkap"
                            maxlength="100"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="no_hp">
                            <span>NOMOR HP <span class="optional">(OPSIONAL)</span></span>
                        </label>
                        <input
                            id="no_hp"
                            name="no_hp"
                            type="tel"
                            value="{{ old('no_hp', $wajibPajak->no_hp) }}"
                            placeholder="Contoh: 081234567890"
                            maxlength="20"
                            inputmode="tel"
                            autocomplete="tel"
                        >
                        <p class="field-hint">
                            Boleh dikosongkan jika tidak ada nomor aktif.
                        </p>
                    </div>

                    <div class="field">
                        <label for="no_antrian">
                            <span>NOMOR ANTREAN *</span>
                        </label>
                        <input
                            id="no_antrian"
                            name="no_antrian"
                            type="text"
                            value="{{ old('no_antrian', $wajibPajak->no_antrian) }}"
                            placeholder="Contoh: A-025"
                            maxlength="20"
                            required
                        >
                    </div>

                </div>

                <hr class="form-divider">

                <!-- SECTION 02 -->
                <div class="section-label">
                    02 / INFORMASI PAJAK & LAYANAN
                </div>

                <div class="form-grid">

                    <!-- TANGGAL JATUH TEMPO (CUSTOM DATEPICKER ENGINE) -->
                    <div class="field">
                        <label for="tanggalJatuhTempoInput">
                            <span>TANGGAL JATUH TEMPO *</span>
                        </label>
                        <div class="date-picker-wrapper">
                            <input
                                id="tanggalJatuhTempoInput"
                                type="text"
                                placeholder="HH-BB-TTTT (misal: 25-10-2026)"
                                value="{{ old('tanggal_jatuh_tempo', $wajibPajak->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($wajibPajak->tanggal_jatuh_tempo)->format('d-m-Y') : '') }}"
                                maxlength="10"
                                autocomplete="off"
                                required
                            >
                            <button type="button" class="date-trigger-btn" id="btnPickerJatuhTempo" title="Buka Kalender">📅</button>
                        </div>
                        <input type="hidden" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ old('tanggal_jatuh_tempo', $wajibPajak->tanggal_jatuh_tempo ? \Carbon\Carbon::parse($wajibPajak->tanggal_jatuh_tempo)->format('Y-m-d') : '') }}">
                        <p class="field-hint">
                            Status MS/TMS akan dikalkulasi secara otomatis oleh sistem.
                        </p>
                    </div>

                    <div class="field">
                        <label for="fungsi">
                            <span>FUNGSI *</span>
                        </label>
                        <select id="fungsi" name="fungsi" required>
                            <option
                                value="Wajib Pribadi"
                                {{ old('fungsi', $wajibPajak->fungsi) === 'Wajib Pribadi' ? 'selected' : '' }}
                            >
                                Wajib Pribadi
                            </option>
                        </select>
                    </div>

                    <div class="field">
                        <label for="titik_layanan">
                            <span>TITIK LAYANAN *</span>
                        </label>
                        <select id="titik_layanan" name="titik_layanan" required>
                            <option value="">Pilih titik layanan</option>
                            @foreach (['SAMSAT Induk', 'SAMSAT Keliling', 'PATEN', 'BUDIMAN'] as $layanan)
                                <option
                                    value="{{ $layanan }}"
                                    {{ old('titik_layanan', $wajibPajak->titik_layanan) === $layanan ? 'selected' : '' }}
                                >
                                    {{ $layanan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <hr class="form-divider">

                <!-- SECTION 03 -->
                <div class="section-label">
                    03 / DOKUMEN PENDUKUNG
                </div>

                <div class="form-grid">

                    <!-- FOTO STNK -->
                    <div class="field">
                        <label for="foto_stnk">
                            <span>FOTO STNK <span class="optional">(OPSIONAL JIKA SUDAH ADA)</span></span>
                        </label>
                        <div class="stnk-upload">
                            <div>
                                <input
                                    type="file"
                                    id="foto_stnk"
                                    name="foto_stnk"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                >
                                <small class="stnk-help">
                                    Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                                </small>
                            </div>

                            <div class="stnk-preview-box">
                                @if (old('foto_stnk') || !empty($wajibPajak->foto_stnk))
                                    <div class="stnk-preview-wrapper" id="stnkWrapper" onclick="openImageModal('foto_stnk', 'Preview Foto STNK')">
                                        <img
                                            id="stnkPreviewImage"
                                            src="{{ !empty($wajibPajak->foto_stnk) ? asset('storage/' . $wajibPajak->foto_stnk) : '' }}"
                                            alt="Preview STNK"
                                        >
                                        <div class="preview-overlay">
                                            <div class="overlay-icon">🔍</div>
                                            <span>Klik untuk Perbesar</span>
                                        </div>
                                    </div>
                                    <div class="stnk-placeholder" id="stnkPlaceholder" style="display:none;">
                                        <div class="stnk-placeholder-icon">▤</div>
                                        <p>Silakan pilih foto STNK.</p>
                                    </div>
                                @else
                                    <div class="stnk-placeholder" id="stnkPlaceholder">
                                        <div class="stnk-placeholder-icon">▤</div>
                                        <p>Belum ada foto STNK tersimpan.</p>
                                    </div>
                                    <div class="stnk-preview-wrapper" id="stnkWrapper" style="display:none;" onclick="openImageModal('foto_stnk', 'Preview Foto STNK')">
                                        <img id="stnkPreviewImage" src="#" alt="Preview STNK">
                                        <div class="preview-overlay">
                                            <div class="overlay-icon">🔍</div>
                                            <span>Klik untuk Perbesar</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="stnk-file-name-bar">
                                    <div class="stnk-file-name" id="stnkFileName">
                                        {{ !empty($wajibPajak->foto_stnk) ? '✓ Foto STNK Tersimpan' : 'Belum ada file baru dipilih' }}
                                    </div>
                                    <button
                                        type="button"
                                        class="btn-preview-trigger"
                                        id="btnPreviewStnk"
                                        style="{{ !empty($wajibPajak->foto_stnk) ? 'display:inline-flex;' : 'display:none;' }}"
                                        onclick="openImageModal('foto_stnk', 'Preview Foto STNK')"
                                    >
                                        👁 Lihat
                                    </button>
                                </div>
                            </div>
                        </div>

                        @error('foto_stnk')
                            <div class="stnk-error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- FOTO KTP -->
                    <div class="field">
                        <label for="foto_ktp">
                            <span>FOTO KTP <span class="optional">(OPSIONAL JIKA SUDAH ADA)</span></span>
                        </label>
                        <div class="stnk-upload">
                            <div>
                                <input
                                    type="file"
                                    id="foto_ktp"
                                    name="foto_ktp"
                                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                                >
                                <small class="stnk-help">
                                    Format JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                                </small>
                            </div>

                            <div class="stnk-preview-box">
                                @if (old('foto_ktp') || !empty($wajibPajak->foto_ktp))
                                    <div class="stnk-preview-wrapper" id="ktpWrapper" onclick="openImageModal('foto_ktp', 'Preview Foto KTP')">
                                        <img
                                            id="ktpPreviewImage"
                                            src="{{ !empty($wajibPajak->foto_ktp) ? asset('storage/' . $wajibPajak->foto_ktp) : '' }}"
                                            alt="Preview KTP"
                                        >
                                        <div class="preview-overlay">
                                            <div class="overlay-icon">🔍</div>
                                            <span>Klik untuk Perbesar</span>
                                        </div>
                                    </div>
                                    <div class="stnk-placeholder" id="ktpPlaceholder" style="display:none;">
                                        <div class="stnk-placeholder-icon">🪪</div>
                                        <p>Silakan pilih foto KTP.</p>
                                    </div>
                                @else
                                    <div class="stnk-placeholder" id="ktpPlaceholder">
                                        <div class="stnk-placeholder-icon">🪪</div>
                                        <p>Belum ada foto KTP tersimpan.</p>
                                    </div>
                                    <div class="stnk-preview-wrapper" id="ktpWrapper" style="display:none;" onclick="openImageModal('foto_ktp', 'Preview Foto KTP')">
                                        <img id="ktpPreviewImage" src="#" alt="Preview KTP">
                                        <div class="preview-overlay">
                                            <div class="overlay-icon">🔍</div>
                                            <span>Klik untuk Perbesar</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="stnk-file-name-bar">
                                    <div class="stnk-file-name" id="ktpFileName">
                                        {{ !empty($wajibPajak->foto_ktp) ? '✓ Foto KTP Tersimpan' : 'Belum ada file baru dipilih' }}
                                    </div>
                                    <button
                                        type="button"
                                        class="btn-preview-trigger"
                                        id="btnPreviewKtp"
                                        style="{{ !empty($wajibPajak->foto_ktp) ? 'display:inline-flex;' : 'display:none;' }}"
                                        onclick="openImageModal('foto_ktp', 'Preview Foto KTP')"
                                    >
                                        👁 Lihat
                                    </button>
                                </div>
                            </div>
                        </div>

                        @error('foto_ktp')
                            <div class="stnk-error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <!-- AUTOMATIC STATUS INFORMATION -->
                <div class="info">
                    <div class="info-icon">i</div>
                    <div>
                        <strong>STATUS OTOMATIS — SYSTEM GENERATED</strong>
                        <p>
                            Jika tanggal jatuh tempo terlewat dari hari ini, sistem menghitung status sebagai <strong>TMS</strong> (Tidak Memenuhi Syarat). Jika jatuh tempo hari ini atau belum lewat, status otomatis menjadi <strong>MS</strong> (Memenuhi Syarat).
                        </p>
                    </div>
                </div>

                <!-- FORM FOOTER -->
                <div class="form-footer">
                    <p class="footer-note">
                        <strong>Heads up!</strong> Pastikan seluruh informasi telah diperiksa kembali sebelum menyimpan perubahan.
                    </p>

                    <div class="button-group">
                        <a href="{{ route('pajakin.index') }}" class="btn btn-secondary">
                            ← Batal
                        </a>

                        <button type="submit" class="btn" id="saveButton">
                            Simpan Perubahan <span>↗</span>
                        </button>
                    </div>
                </div>

            </form>
        </section>

        <!-- FOOTER -->
        <footer class="footer">
            <span><strong>SIGAP® TAX PLATFORM</strong> · UPPD PEMALANG</span>
            <span>© {{ date('Y') }} · BAYAR PAJAKNYA, DAPETIN REWARD-NYA!</span>
        </footer>

    </main>

    <script>
        /* =========================================================
           REALTIME JAM & TANGGAL INDONESIA
           ========================================================= */
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

        /* =========================================================
           NOMOR POLISI UPPERCASE AUTO FORMAT
           ========================================================= */
        const nopolInput = document.getElementById('nopol');
        if (nopolInput) {
            nopolInput.addEventListener('input', function () {
                const start = this.selectionStart;
                const end = this.selectionEnd;
                this.value = this.value.toUpperCase();
                if (start !== null && end !== null) {
                    this.setSelectionRange(start, end);
                }
            });
        }

        /* =========================================================
           FITUR MODAL POPUP PREVIEW FOTO UTUH (SWEETALERT2)
           ========================================================= */
        function openImageModal(type, titleText) {
            let imgElement = null;
            if (type === 'foto_stnk') imgElement = document.getElementById('stnkPreviewImage');
            if (type === 'foto_ktp') imgElement = document.getElementById('ktpPreviewImage');

            if (!imgElement || !imgElement.src || imgElement.src.includes('#') || imgElement.src === '') {
                return;
            }

            Swal.fire({
                title: titleText,
                imageUrl: imgElement.src,
                imageAlt: titleText,
                showCloseButton: true,
                showConfirmButton: false,
                customClass: {
                    popup: 'sigap-popup sigap-preview-modal',
                    title: 'sigap-title'
                }
            });
        }

        /* =========================================================
           IMAGE UPLOAD PREVIEW ENGINE & BUTTON STATE
           ========================================================= */
        function setupImagePreview(inputId, imageId, wrapperId, placeholderId, nameId, btnPreviewId) {
            const input = document.getElementById(inputId);
            const image = document.getElementById(imageId);
            const wrapper = document.getElementById(wrapperId);
            const placeholder = document.getElementById(placeholderId);
            const nameLabel = document.getElementById(nameId);
            const btnPreview = document.getElementById(btnPreviewId);

            let previewUrl = null;

            if (!input || !image) return;

            input.addEventListener('change', function () {
                const file = this.files && this.files[0];
                if (!file) return;

                const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

                if (!allowedTypes.includes(file.type)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Format tidak sesuai',
                        text: 'Silakan pilih foto berformat JPG, JPEG, PNG, atau WEBP.',
                        customClass: {
                            popup: 'sigap-popup',
                            title: 'sigap-title',
                            confirmButton: 'sigap-confirm'
                        },
                        buttonsStyling: false,
                        confirmButtonText: 'Mengerti'
                    });
                    this.value = '';
                    return;
                }

                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ukuran file terlalu besar',
                        text: 'Ukuran foto maksimal adalah 2 MB.',
                        customClass: {
                            popup: 'sigap-popup',
                            title: 'sigap-title',
                            confirmButton: 'sigap-confirm'
                        },
                        buttonsStyling: false,
                        confirmButtonText: 'Mengerti'
                    });
                    this.value = '';
                    return;
                }

                if (previewUrl) URL.revokeObjectURL(previewUrl);

                previewUrl = URL.createObjectURL(file);
                image.src = previewUrl;
                
                if (wrapper) wrapper.style.display = 'flex';
                if (placeholder) placeholder.style.display = 'none';
                if (nameLabel) nameLabel.textContent = 'File Baru: ' + file.name;
                if (btnPreview) btnPreview.style.display = 'inline-flex';
            });
        }

        setupImagePreview('foto_stnk', 'stnkPreviewImage', 'stnkWrapper', 'stnkPlaceholder', 'stnkFileName', 'btnPreviewStnk');
        setupImagePreview('foto_ktp', 'ktpPreviewImage', 'ktpWrapper', 'ktpPlaceholder', 'ktpFileName', 'btnPreviewKtp');

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

        document.querySelectorAll('.panel select').forEach(select => {
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
                    let formattedDisplay = '';

                    if (val.length > 0) formattedDisplay += val.substring(0, 2);
                    if (val.length >= 3) formattedDisplay += '-' + val.substring(2, 4);
                    if (val.length >= 5) formattedDisplay += '-' + val.substring(4, 8);
                    e.target.value = formattedDisplay;

                    if (val.length === 8 && this.hiddenInput) {
                        const day = val.substring(0, 2);
                        const month = val.substring(2, 4);
                        const year = val.substring(4, 8);
                        this.hiddenInput.value = `${year}-${month}-${day}`;
                    } else if (this.hiddenInput) {
                        this.hiddenInput.value = '';
                    }
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
                    const dateDisplayStr = `${formattedDay}-${formattedMonth}-${this.currentYear}`;
                    const dateIsoStr = `${this.currentYear}-${formattedMonth}-${formattedDay}`;

                    const isSelected = (this.input.value === dateDisplayStr);

                    let cellClass = 'cal-day-cell';
                    if (isToday) cellClass += ' today';
                    if (isSelected) cellClass += ' selected';

                    html += `<div class="${cellClass}" data-date="${dateDisplayStr}" data-iso="${dateIsoStr}">${day}</div>`;
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
                        const chosenDisplay = cell.dataset.date;
                        const chosenIso = cell.dataset.iso;
                        this.input.value = chosenDisplay;
                        if (this.hiddenInput) this.hiddenInput.value = chosenIso;
                        this.popover.classList.remove('active');
                    });
                });

                this.popover.querySelector('.today-btn').addEventListener('click', (e) => {
                    e.stopPropagation();
                    const d = String(this.today.getDate()).padStart(2, '0');
                    const m = String(this.today.getMonth() + 1).padStart(2, '0');
                    const y = this.today.getFullYear();
                    const todayDisplayStr = `${d}-${m}-${y}`;
                    const todayIsoStr = `${y}-${m}-${d}`;
                    this.input.value = todayDisplayStr;
                    if (this.hiddenInput) this.hiddenInput.value = todayIsoStr;
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

        /* =========================================================
           KONFIRMASI SIMPAN DATA (SWEETALERT2 BRUTALIST)
           ========================================================= */
        const editForm = document.getElementById('editForm');
        const saveButton = document.getElementById('saveButton');

        if (editForm && saveButton) {
            editForm.addEventListener('submit', function (e) {
                e.preventDefault();

                if (!editForm.checkValidity()) {
                    editForm.reportValidity();
                    return;
                }

                if (typeof Swal === 'undefined') {
                    if (confirm('Simpan perubahan data wajib pajak?')) {
                        saveButton.disabled = true;
                        saveButton.textContent = 'Menyimpan...';
                        editForm.submit();
                    }
                    return;
                }

                Swal.fire({
                    title: 'Simpan Perubahan?',
                    html: 'Data Wajib Pajak Nopol <strong>{{ $wajibPajak->nopol }}</strong> akan diperbarui.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan Now! ↗',
                    cancelButtonText: 'Cek Lagi',
                    customClass: {
                        popup: 'sigap-popup',
                        title: 'sigap-title',
                        confirmButton: 'sigap-confirm',
                        cancelButton: 'sigap-cancel'
                    },
                    buttonsStyling: false
                }).then(function (result) {
                    if (result.isConfirmed) {
                        saveButton.disabled = true;
                        saveButton.innerHTML = 'Menyimpan...';
                        editForm.submit();
                    }
                });
            });
        }
    </script>

</body>
</html>