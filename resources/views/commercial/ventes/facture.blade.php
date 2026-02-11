<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Facture N° {{ $vente->reference }}</title>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; }

        th { background:#f2f2f2; }
        /* Pied de page */
        .invoice-footer {
            background-color: #2c3e50;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }
        
        .footer-left {
            display: flex;
            flex-direction: column;
        }
        
        .footer-right {
            text-align: right;
        }

        .status-paid {
            background-color: #2ecc71;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
            justify-content: center;
        }
        
    </style>
</head>
<body>

<h1 class="mb-0">{{ $entreprise->nom }}</h1>
<p>
    Telephone : {{ $entreprise->telephone }} <br>
    Adresse : {{ $entreprise->adresse }}
</p>
<p>
    Facture N° : <b>{{ $vente->reference }}</b><br>
    Date : {{ $vente->created_at->format('d/m/Y') }}
</p>

<hr>

<p>
    <b>Client :</b><br>
    {{ $vente->client->nom }}<br>
    {{ $vente->client->telephone ?? '' }}
</p>

<br>

<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire (XOF)</th>
            <th>TVA</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vente->items as $item)
        <tr>
            <td>{{ $item->produit->nom }}</td>
            <td>{{ $item->quantite }}</td>
            <td>{{ number_format($item->prix_unitaire, 0, ',', ' ') }}</td>
            <td>{{$item->taux_tva}} %</td>
        </tr>
        @endforeach
    </tbody>
</table>

<br>
    
<h4>TVA ({{$item->taux_tva}} %) : {{ number_format($item->montant_tva) }} XOF</h4>

<h3>Sous-Total : {{ number_format($item->total, 0, ',', ' ') }} XOF</h3>

<h2 style="color: red;">Total-TVA : {{ number_format($item->total_ttc, 0, ',', ' ') }} XOF</h2>

        <!-- Pied de page -->
        <div class="invoice-footer">
            <!--<div class="footer-left">
                <div>Solutions Pro - SAS au capital de 50 000 €</div>
                <div>RCS Paris 123 456 789 - TVA intracommunautaire FR 12 123456789</div>
            </div>-->
            <div class="footer-right">
                <div class="status-paid">FACTURE PAYÉE</div>
                <div style="margin-top: 10px; font-size: 12px;">Date de paiement: <?= date('d-m-Y'); ?></div>
            </div>
        </div>
<p>
    Merci pour votre confiance.
</p>

</body>
</html>