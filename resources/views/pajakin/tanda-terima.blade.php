<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#123B8A">
    <title>Tanda Terima Hadiah — SIGAP</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root {
            --blue-dark: #123B8A;
            --blue: #2563EB;
            --blue-soft: #EAF2FF;
            --yellow: #FFD633;
            --yellow-soft: #FFF8D8;
            --ink: #14213D;
            --muted: #64748B;
            --line: #DCE6F5;
            --paper: #FFFFFF;
            --page-bg: #F5F8FF;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            margin: 0;
            padding: 16px 12px;
            color: var(--ink);
            background:
                radial-gradient(circle at 8% 0%, rgba(37,99,235,.09), transparent 28%),
                var(--page-bg);
            font-family: 'Poppins', Arial, sans-serif;
            font-size: 11px;
        }

        button, a { font: inherit; }

        .page {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
        }

        /* BRAND HEADER */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .brand-mark {
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            color: var(--blue-dark);
            background: var(--yellow);
            border-radius: 8px 3px;
            font-size: 20px;
            font-weight: 900;
            transform: rotate(-4deg);
        }

        .brand {
            margin: 0;
            color: var(--blue-dark);
            font-size: 18px;
            font-weight: 900;
            letter-spacing: 1px;
            line-height: 1.1;
        }

        .brand sup { font-size: 7px; }

        .brand-caption {
            margin-top: 1px;
            color: var(--muted);
            font-size: 7.5px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .topbar-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 10px;
            color: var(--blue-dark);
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 30px;
            font-size: 9px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-dot {
            width: 6px;
            height: 6px;
            flex: 0 0 6px;
            background: var(--blue);
            border-radius: 50%;
        }

        /* RECEIPT CARD */
        .receipt {
            overflow: hidden;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(18,59,138,.06);
        }

        .receipt-head {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            min-height: 65px;
            padding: 12px 18px;
            overflow: hidden;
            color: #fff;
            background: linear-gradient(112deg, #123B8A 0%, #1D4ED8 72%, #2563EB 100%);
        }

        .receipt-head::before {
            position: absolute;
            z-index: 0;
            top: -35%;
            right: 17%;
            width: 60px;
            height: 175%;
            content: "";
            background: var(--yellow);
            opacity: .98;
            transform: skewX(-29deg);
            pointer-events: none;
        }

        .receipt-heading, .receipt-meta {
            position: relative;
            z-index: 1;
        }

        .eyebrow {
            margin-bottom: 1px;
            color: var(--yellow);
            font-size: 8.5px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .receipt-title {
            margin: 0;
            color: #fff;
            font-size: 19px;
            font-weight: 900;
            line-height: 1.1;
        }

        .receipt-description {
            margin: 1px 0 0;
            color: #EAF1FF;
            font-size: 9.5px;
        }

        .receipt-meta {
            flex: 0 0 auto;
            text-align: right;
        }

        .receipt-tag {
            display: inline-block;
            padding: 4px 8px;
            color: var(--blue-dark);
            background: var(--yellow);
            border-radius: 4px 2px;
            font-size: 8.5px;
            font-weight: 900;
        }

        .receipt-date {
            margin-top: 2px;
            color: #F2F6FF;
            font-size: 8.5px;
        }

        .receipt-body { padding: 16px 18px; }

        /* TWO MAIN COLUMNS ATAS */
        .receipt-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            align-items: start;
        }

        .section { min-width: 0; }

        .section-title {
            position: relative;
            display: flex;
            align-items: center;
            gap: 6px;
            margin: 0 0 8px;
            padding-bottom: 4px;
            color: var(--blue-dark);
            border-bottom: 1px solid var(--line);
            font-size: 11px;
            font-weight: 900;
        }

        .section-title::after {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 45px;
            height: 2.5px;
            content: "";
            background: var(--yellow);
            border-radius: 2px;
        }

        .section-number {
            display: grid;
            place-items: center;
            width: 20px;
            height: 20px;
            flex: 0 0 20px;
            color: var(--blue-dark);
            background: var(--yellow-soft);
            border: 1px solid var(--yellow);
            border-radius: 5px;
            font-size: 9px;
            font-weight: 900;
        }

        .detail {
            display: grid;
            grid-template-columns: 120px minmax(0, 1fr);
            gap: 6px;
            margin-bottom: 6px;
            line-height: 1.3;
        }

        .detail-label { color: var(--muted); font-size: 10px; }
        .detail-value { min-width: 0; color: var(--ink); font-size: 10px; font-weight: 800; word-break: break-word; }

        /* VEHICLE PLATE */
        .nopol-box {
            margin-top: 8px;
            padding: 6px 10px;
            background: linear-gradient(110deg, #EAF2FF, #FFFFFF 82%);
            border: 1px solid #BFD4FF;
            border-left: 4px solid var(--blue);
            border-radius: 4px 6px;
        }

        .nopol-caption {
            margin-bottom: 1px;
            color: #52708F;
            font-size: 7.5px;
            font-weight: 900;
            letter-spacing: 0.8px;
        }

        .nopol-value {
            color: var(--blue-dark);
            font-size: 16px;
            font-weight: 900;
            letter-spacing: 1px;
        }

        .queue-badge {
            display: inline-flex;
            align-items: center;
            margin-top: 4px;
            padding: 2px 6px;
            color: var(--blue-dark);
            background: var(--yellow-soft);
            border: 1px solid var(--yellow);
            border-radius: 3px;
            font-size: 8px;
            font-weight: 900;
        }

        /* REWARD DETAILS */
        .amount-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 6px;
            padding: 6px 0;
            border-bottom: 1px solid var(--line);
        }

        .amount-label { color: var(--muted); font-size: 10px; }
        .amount { color: var(--ink); font-size: 10px; font-weight: 900; }

        .total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            padding: 8px 10px;
            color: #fff;
            background: linear-gradient(105deg, var(--blue-dark), var(--blue));
            border-left: 3px solid var(--yellow);
            border-radius: 5px;
        }

        .total-label { color: #fff; font-size: 9px; font-weight: 900; }
        .total .amount { color: #fff; font-size: 15px; }

        .note {
            margin: 8px 0 0;
            padding: 6px 8px;
            color: var(--muted);
            background: #F4F7FD;
            border-left: 2.5px solid var(--yellow);
            border-radius: 0 4px 4px 0;
            font-size: 9px;
            line-height: 1.4;
        }

        .note strong { color: var(--blue-dark); }

        /* AREA BAWAH LAYOUT (DOKUMEN & TTD) */
        .proof-signatures-layout {
            margin-top: 14px;
            padding-top: 14px;
            border-top: 1px solid var(--line);
        }

        .documents-wrapper {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 16px;
            width: 100%;
        }

        .doc-section-stnk {
            width: 58%;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-width: 0;
        }

        .doc-section-ktp {
            width: 40%;
            max-width: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .doc-label {
            margin: 0 0 6px;
            color: var(--blue-dark);
            font-size: 9.5px;
            font-weight: 900;
            text-align: center;
        }

        .doc-container-stnk, .doc-container-ktp {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            background: #F8FAFF;
            border: 1px solid var(--line);
            border-radius: 6px;
            padding: 4px;
            overflow: hidden;
        }

        .doc-photo-stnk, .doc-photo-ktp {
            display: block;
            width: 100%;
            max-height: 260px;
            height: auto;
            object-fit: contain;
            border-radius: 4px;
        }

        .doc-empty {
            display: grid;
            place-items: center;
            width: 100%;
            min-height: 120px;
            color: var(--muted);
            background: #F8FAFF;
            border: 1px dashed #B9C9E2;
            border-radius: 6px;
            font-size: 9px;
            text-align: center;
            padding: 8px;
        }

        /* LAYOUT TANDA TANGAN KANAN - KIRI */
        .horizontal-signatures {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 10px;
            padding-top: 6px;
        }

        .signature-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .signature-label {
            margin: 0 0 6px;
            color: var(--blue-dark);
            font-size: 9px;
            font-weight: 900;
        }

        .signature-box-free {
            position: relative;
            width: 100%;
            max-width: 240px;
            height: 90px;
            background: transparent;
            margin: 0 auto;
        }

        canvas.signature-canvas, img.signature-print {
            position: absolute;
            inset: 0;
            display: block;
            width: 100%;
            height: 100%;
            border: 0;
            outline: 0;
            background: transparent;
            object-fit: contain;
            object-position: center;
        }

        canvas.signature-canvas { z-index: 1; cursor: crosshair; touch-action: none; }
        img.signature-print { display: none; z-index: 2; }

        .official-stamp-png {
            position: absolute;
            z-index: 3;
            top: 50%;
            left: -15px;
            width: 75px;
            height: 75px;
            display: block;
            object-fit: contain;
            opacity: 0.88;
            transform: translateY(-50%) rotate(-6deg);
            pointer-events: none;
        }

        .signature-hint {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 8px;
        }

        .signature-line {
            width: 140px;
            margin: 6px auto 2px;
            border-bottom: 1px solid #7892BA;
        }

        .signature-caption { color: var(--muted); font-size: 8px; }
        .signature-name { margin-top: 1px; color: var(--blue-dark); font-size: 9px; font-weight: 900; }

        /* FOOTER */
        .receipt-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: #F5F8FF;
            border-top: 2px solid var(--yellow);
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 4px;
            color: var(--blue-dark);
            font-size: 8.5px;
            font-weight: 700;
        }

        .footer-brand strong { font-size: 9.5px; font-weight: 900; }
        .footer-separator { color: var(--blue); font-weight: 900; }
        .footer-copyright { color: var(--muted); font-size: 8.5px; font-weight: 600; }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 16px auto 0;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 38px;
            padding: 0 16px;
            border: 1px solid transparent;
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
            transition: background-color 0.2s, transform 0.1s;
        }

        .btn:active { transform: scale(0.98); }
        .btn-primary { color: #fff; background: var(--blue-dark); }
        .btn-primary:hover { background: var(--blue); }
        .btn-secondary { color: var(--blue-dark); background: #fff; border-color: var(--line); }

        /* =========================================================
           RESPONSIVE MOBILE STYLES (SCREEN DISPLAYS <= 768px)
           ========================================================= */
        @media screen and (max-width: 768px) {
            body { padding: 10px 8px; }
            
            .topbar { flex-direction: row; }
            .brand { font-size: 16px; }
            .topbar-badge { padding: 4px 8px; font-size: 8px; }

            .receipt-head {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                padding: 14px;
            }

            .receipt-head::before {
                right: -10%;
                width: 100px;
            }

            .receipt-meta {
                text-align: left;
            }

            .receipt-layout {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .detail {
                grid-template-columns: 110px 1fr;
            }

            .documents-wrapper {
                flex-direction: column;
                gap: 14px;
            }

            .doc-section-stnk, .doc-section-ktp {
                width: 100%;
                max-width: 100%;
            }

            .horizontal-signatures {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .official-stamp-png {
                left: 10px;
            }

            .receipt-footer {
                flex-direction: column;
                gap: 4px;
                text-align: center;
            }

            .actions {
                flex-direction: column;
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }

        /* =========================================================
           CETAK SPESIFIK KERTAS F4/FOLIO LANDSCAPE PAS 1 HALAMAN
           ========================================================= */
        @page {
            size: 215mm 330mm landscape;
            margin: 3mm;
        }

        @media print {
            html, body {
                width: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
                color: var(--ink) !important;
                overflow: hidden !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            body { font-size: 7.5pt !important; }

            .page { width: 100% !important; max-width: none !important; margin: 0 !important; padding: 0 !important; }
            .topbar { margin-bottom: 0.5mm !important; }
            .brand-mark { width: 4.5mm !important; height: 4.5mm !important; flex-basis: 4.5mm !important; font-size: 7.5pt !important; }
            .brand { font-size: 10pt !important; }
            .topbar-badge { padding: 0.3mm 0.8mm !important; font-size: 4.5pt !important; }

            .receipt { border: .15mm solid var(--line) !important; border-radius: 0.8mm !important; box-shadow: none !important; }
            .receipt-head { min-height: 10mm !important; padding: 1mm 2.5mm !important; flex-direction: row !important; }
            .receipt-meta { text-align: right !important; }
            .receipt-title { font-size: 11pt !important; }
            .receipt-body { padding: 1.2mm 2.5mm 0.8mm !important; }

            .receipt-layout { display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 2.5mm !important; }
            .section-title { margin-bottom: 0.4mm !important; padding-bottom: 0.3mm !important; font-size: 6.5pt !important; }
            .detail { display: grid !important; grid-template-columns: 100px minmax(0, 1fr) !important; gap: 0.6mm !important; margin-bottom: 0.3mm !important; line-height: 1.05 !important; }
            .detail-label, .detail-value { font-size: 5.5pt !important; }

            .nopol-box { margin-top: 0.4mm !important; padding: 0.4mm 0.8mm !important; }
            .nopol-value { font-size: 9pt !important; }

            .amount-row { padding: 0.4mm 0 !important; }
            .total { margin-top: 0.4mm !important; padding: 0.6mm 0.8mm !important; }
            .total .amount { font-size: 9pt !important; }
            .note { margin-top: 0.4mm !important; padding: 0.4mm 0.6mm !important; font-size: 4.8pt !important; line-height: 1.1 !important; }

            .proof-signatures-layout {
                margin-top: 0.8mm !important;
                padding-top: 0.6mm !important;
            }

            .documents-wrapper {
                display: flex !important;
                flex-direction: row !important;
                gap: 5mm !important;
                margin-bottom: 2mm !important;
            }
            .doc-section-stnk { width: 60% !important; }
            .doc-section-ktp { width: 38% !important; }
            .doc-label { font-size: 5.5pt !important; margin-bottom: 0.2mm !important; }

            .doc-photo-stnk, .doc-photo-ktp {
                max-height: 68mm !important;
            }

            .doc-empty { font-size: 5pt !important; }

            .horizontal-signatures {
                display: grid !important;
                grid-template-columns: 1fr 1fr !important;
                gap: 10mm !important;
                margin-top: 1mm !important;
                padding-top: 1mm !important;
            }

            .signature-label { font-size: 5.2pt !important; margin-bottom: 0.1mm !important; }
            
            .signature-box-free {
                width: 45mm !important;
                height: 18mm !important;
                background: transparent !important;
            }

            canvas.signature-canvas { display: none !important; }
            img.signature-print { display: block !important; position: absolute !important; inset: 0 !important; }

            .official-stamp-png {
                display: block !important;
                position: absolute !important;
                z-index: 10 !important;
                top: 50% !important;
                left: -8mm !important;
                width: 16mm !important;
                height: 16mm !important;
                opacity: 0.88 !important;
            }

            .signature-hint { display: none !important; }
            .signature-line { margin-top: 0.1mm !important; width: 35mm !important; }
            .signature-caption, .signature-name { font-size: 4.8pt !important; }

            .receipt-footer { padding: 0.6mm 2mm !important; flex-direction: row !important; text-align: left !important; }
            .actions, .screen-only, button { display: none !important; }
        }
    </style>
</head>

<body>
<main class="page">
    <header class="topbar">
        <div class="brand-wrap">
            <div class="brand-mark">S</div>
            <div>
                <h1 class="brand">SIGAP<sup>®</sup></h1>
                <div class="brand-caption">SMART TAX SERVICE SYSTEM</div>
            </div>
        </div>

        <div class="topbar-badge">
            <span class="status-dot"></span>
            Sistem Layanan Pajak
        </div>
    </header>

    <article class="receipt">
        <header class="receipt-head">
            <div class="receipt-heading">
                <div class="eyebrow">DOKUMEN PENERIMAAN</div>
                <h2 class="receipt-title">Tanda Terima Hadiah</h2>
                <p class="receipt-description">Bukti penerimaan hadiah wajib pajak SIGAP.</p>
            </div>

            <div class="receipt-meta">
                <div class="receipt-tag">BUKTI PENERIMAAN</div>
                <div class="receipt-date">Tanggal: {{ now()->format('d-m-Y') }}</div>
            </div>
        </header>

        <div class="receipt-body">
            <div class="receipt-layout">
                {{-- INFORMASI PENERIMA --}}
                <section class="section">
                    <h3 class="section-title">
                        <span class="section-number">01</span>
                        Informasi Penerima
                    </h3>

                    <div class="detail">
                        <span class="detail-label">Nama penerima</span>
                        <span class="detail-value">{{ $wajibPajak->nama ?: '-' }}</span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Nomor HP</span>
                        <span class="detail-value">{{ $wajibPajak->no_hp ?: '-' }}</span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Jenis Pendaftaran</span>
                        <span class="detail-value">{{ $wajibPajak->jenis_pendaftaran ?: '-' }}</span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Titik layanan</span>
                        <span class="detail-value">{{ $wajibPajak->titik_layanan ?: '-' }}</span>
                    </div>

                    <div class="detail">
                        <span class="detail-label">Fungsi</span>
                        <span class="detail-value">{{ $wajibPajak->fungsi ?: '-' }}</span>
                    </div>

                    <div class="nopol-box">
                        <div class="nopol-caption">NOMOR POLISI KENDARAAN</div>
                        <div class="nopol-value">{{ $wajibPajak->nopol ?: '-' }}</div>
                        <div class="queue-badge">NO. ANTREAN: {{ $wajibPajak->no_antrian ?: '-' }}</div>
                    </div>
                </section>

                {{-- RINCIAN HADIAH --}}
                <section class="section">
                    <h3 class="section-title">
                        <span class="section-number">02</span>
                        Rincian Hadiah
                    </h3>

                    <div class="amount-row">
                        <span class="amount-label">Nilai hadiah</span>
                        <span class="amount">Rp{{ number_format($nilaiHadiah, 0, ',', '.') }}</span>
                    </div>

                    <div class="amount-row">
                        <span class="amount-label">PPh Pasal 21</span>
                        <span class="amount">Rp{{ number_format($pph21, 0, ',', '.') }}</span>
                    </div>

                    <div class="total">
                        <span class="total-label">TOTAL NILAI HADIAH + PPh 21</span>
                        <span class="amount">Rp{{ number_format($totalNilai, 0, ',', '.') }}</span>
                    </div>

                    <p class="note">
                        Penerima memperoleh hadiah senilai
                        <strong>Rp{{ number_format($nilaiHadiah, 0, ',', '.') }}</strong>.
                        PPh Pasal 21 sebesar
                        <strong>Rp{{ number_format($pph21, 0, ',', '.') }}</strong>
                        dicatat sebagai komponen pajak. Total nilai hadiah beserta pajaknya
                        adalah <strong>Rp{{ number_format($totalNilai, 0, ',', '.') }}</strong>.
                    </p>
                </section>
            </div>

            {{-- AREA BAWAH: FOTO DOKUMEN & DUA TTD KANAN-KIRI --}}
            <div class="proof-signatures-layout">
                
                {{-- DOKUMEN FOTO: STNK (KIRI) & KTP (KANAN) --}}
                <div class="documents-wrapper">
                    {{-- 1. FOTO STNK --}}
                    <section class="doc-section-stnk">
                        <div class="doc-label">FOTO STNK KENDARAAN</div>
                        <div class="doc-container-stnk">
                            @if (
                                $wajibPajak->foto_stnk &&
                                \Illuminate\Support\Facades\Storage::disk('public')->exists($wajibPajak->foto_stnk)
                            )
                                <img
                                    src="{{ asset('storage/' . $wajibPajak->foto_stnk) }}"
                                    alt="Foto STNK {{ $wajibPajak->nopol }}"
                                    class="doc-photo-stnk"
                                >
                            @else
                                <div class="doc-empty">Foto STNK belum diunggah.</div>
                            @endif
                        </div>
                    </section>

                    {{-- 2. FOTO KTP --}}
                    <section class="doc-section-ktp">
                        <div class="doc-label">FOTO KTP WAJIB PAJAK</div>
                        <div class="doc-container-ktp">
                            @if (
                                $wajibPajak->foto_ktp &&
                                \Illuminate\Support\Facades\Storage::disk('public')->exists($wajibPajak->foto_ktp)
                            )
                                <img
                                    src="{{ asset('storage/' . $wajibPajak->foto_ktp) }}"
                                    alt="Foto KTP {{ $wajibPajak->nama }}"
                                    class="doc-photo-ktp"
                                >
                            @else
                                <div class="doc-empty">Foto KTP belum diunggah.</div>
                            @endif
                        </div>
                    </section>
                </div>

                {{-- TANDA TANGAN HORIZONTAL (KIRI: WAJIB PAJAK, KANAN: PETUGAS) --}}
                <div class="horizontal-signatures">
                    
                    {{-- KIRI: TTD WAJIB PAJAK --}}
                    <section class="signature-section">
                        <div class="signature-label">TANDA TANGAN WAJIB PAJAK</div>

                        <div class="signature-box-free">
                            <canvas id="canvasWajibPajak" class="signature-canvas" width="300" height="150"></canvas>
                            <img id="printWajibPajak" class="signature-print" alt="Tanda tangan wajib pajak">
                        </div>

                        <div class="signature-hint screen-only">
                            Bubuhkan tanda tangan Wajib Pajak di atas.
                        </div>

                        <div class="signature-line"></div>
                        <div class="signature-caption">Penerima Hadiah</div>
                        <div class="signature-name">{{ $wajibPajak->nama ?: 'Wajib Pajak' }}</div>
                    </section>

                    {{-- KANAN: TTD PETUGAS + STEMPEL PNG DI SEBELAH KIRI TTD --}}
                    <section class="signature-section">
                        <div class="signature-label">TANDA TANGAN DAN CAP PETUGAS</div>

                        <div class="signature-box-free">
                            <img
                                src="{{ asset('storage/images/stempel-samsat.png') }}"
                                alt="Stempel Resmi"
                                class="official-stamp-png"
                                id="stempelImg"
                            >

                            <canvas id="canvasPetugas" class="signature-canvas" width="300" height="150"></canvas>
                            <img id="printPetugas" class="signature-print" alt="Tanda tangan petugas">
                        </div>

                        <div class="signature-hint screen-only">
                            Bubuhkan tanda tangan Petugas di atas.
                        </div>

                        <div class="signature-line"></div>
                        <div class="signature-caption">Kasi Pelayanan Pajak Daerah</div>
                        <div class="signature-name">Ari Setiawan, S.Kom., M.Si.</div>
                    </section>

                </div>
            </div>
        </div>

        <footer class="receipt-footer">
            <div class="footer-brand">
                <strong>SIGAP<sup>®</sup></strong>
                <span class="footer-separator">·</span>
                <span>SISTEM INSENTIF DAN GANJARAN APRESIASI PAJAK</span>
            </div>

            <div class="footer-copyright">
                © {{ date('Y') }}
                <span class="footer-separator">·</span>
                TAAT PAJAK-NYA, DAPAT REWARD-NYA!
            </div>
        </footer>
    </article>

    <div class="actions screen-only">
        <a href="{{ route('pajakin.index') }}" class="btn btn-secondary">
            ← Kembali ke Dashboard
        </a>

        <button type="button" class="btn btn-secondary" id="clearSignatures">
            Hapus Tanda Tangan
        </button>

        <button type="button" class="btn btn-primary" id="printReceipt">
            Cetak Tanda Terima ↗
        </button>
    </div>
</main>

<script>
(() => {
    function initCanvas(canvasId, printImgId) {
        const canvas = document.getElementById(canvasId);
        const printImg = document.getElementById(printImgId);
        if (!canvas) return null;

        const ctx = canvas.getContext('2d');
        let isDrawing = false;
        let hasSignature = false;

        ctx.strokeStyle = '#123B8A';
        ctx.lineWidth = 3;
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';

        function getPos(e) {
            const rect = canvas.getBoundingClientRect();
            return {
                x: (e.clientX - rect.left) * canvas.width / rect.width,
                y: (e.clientY - rect.top) * canvas.height / rect.height
            };
        }

        canvas.addEventListener('pointerdown', (e) => {
            e.preventDefault();
            isDrawing = true;
            canvas.setPointerCapture(e.pointerId);
            const p = getPos(e);
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.x + 0.1, p.y + 0.1);
            ctx.stroke();
            hasSignature = true;
        });

        canvas.addEventListener('pointermove', (e) => {
            if (!isDrawing) return;
            e.preventDefault();
            const p = getPos(e);
            ctx.lineTo(p.x, p.y);
            ctx.stroke();
            hasSignature = true;
        });

        function stop() {
            isDrawing = false;
            ctx.beginPath();
        }

        canvas.addEventListener('pointerup', stop);
        canvas.addEventListener('pointercancel', stop);

        return {
            clear: () => {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                hasSignature = false;
                if(printImg) printImg.removeAttribute('src');
            },
            prepareForPrint: async () => {
                if (!hasSignature) return false;
                printImg.src = canvas.toDataURL('image/png');
                if (typeof printImg.decode === 'function') {
                    await printImg.decode();
                }
                return true;
            },
            hasSignature: () => hasSignature
        };
    }

    const padWP = initCanvas('canvasWajibPajak', 'printWajibPajak');
    const padPetugas = initCanvas('canvasPetugas', 'printPetugas');

    const stempelImg = document.getElementById('stempelImg');
    if (stempelImg) {
        stempelImg.onerror = function() {
            this.onerror = null;
            this.src = "data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 120 120'><circle cx='60' cy='60' r='54' fill='none' stroke='%232563eb' stroke-width='3' stroke-dasharray='6 2'/><circle cx='60' cy='60' r='48' fill='none' stroke='%23123b8a' stroke-width='2'/><text x='60' y='45' font-family='Arial' font-size='9' font-weight='bold' fill='%23123b8a' text-anchor='middle'>SAMSAT UTAMA</text><text x='60' y='64' font-family='Arial' font-size='12' font-weight='900' fill='%23dc2626' text-anchor='middle'>SAH</text><text x='60' y='80' font-family='Arial' font-size='8' font-weight='bold' fill='%23123b8a' text-anchor='middle'>PELAYANAN PAJAK</text></svg>";
        };
    }

    const clearBtn = document.getElementById('clearSignatures');
    if (clearBtn) {
        clearBtn.addEventListener('click', () => {
            if (padWP) padWP.clear();
            if (padPetugas) padPetugas.clear();
        });
    }

    const printBtn = document.getElementById('printReceipt');
    if (printBtn) {
        printBtn.addEventListener('click', async () => {
            if (!padPetugas.hasSignature()) {
                alert('Mohon bubuhkan Tanda Tangan Petugas terlebih dahulu.');
                return;
            }

            try {
                await padWP.prepareForPrint();
                await padPetugas.prepareForPrint();
                await new Promise((resolve) => setTimeout(resolve, 100));
                window.print();
            } catch (err) {
                console.error(err);
                window.print();
            }
        });
    }
})();
</script>
</body>
</html>