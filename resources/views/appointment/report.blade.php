<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita No {{ $appointment->id }}</title>



    <style>
        div {
            margin: 3rem 0;
        }

        body {
            font-size: 16px;
            font-family: -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr td {
            padding: 0;
        }

        table tr td:last-child {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .right {
            text-align: right;
        }

        .large {
            font-size: 1.75em;
        }

        .total {
            font-weight: bold;
            color: #fb7578;
        }

        .logo-container {
            margin: 20px 0 70px 0;
        }

        .invoice-info-container {
            font-size: 0.875em;
        }
        .invoice-info-container td {
            padding: 4px 0;
        }

        .client-name {
            font-size: 1.5em;
            vertical-align: top;
        }

        .line-items-container {
            margin: 70px 0;
            font-size: 0.875em;
        }

        .line-items-container th {
            text-align: left;
            color: #999;
            border-bottom: 2px solid #ddd;
            padding: 10px 0 15px 0;
            font-size: 0.75em;
            text-transform: uppercase;
        }

        .line-items-container th:last-child {
            text-align: right;
        }

        .line-items-container td {
            padding: 15px 0;
        }

        .line-items-container tbody tr:first-child td {
            padding-top: 25px;
        }

        .line-items-container.has-bottom-border tbody tr:last-child td {
            padding-bottom: 25px;
            border-bottom: 2px solid #ddd;
        }

        .line-items-container.has-bottom-border {
            margin-bottom: 0;
        }

        .line-items-container th.heading-quantity {
            width: 50px;
        }
        .line-items-container th.heading-price {
            text-align: right;
            width: 100px;
        }
        .line-items-container th.heading-subtotal {
            width: 100px;
        }

        .payment-info {
            width: 38%;
            font-size: 0.75em;
            line-height: 1.5;
        }

        .footer {
            margin-top: 100px;
        }

        .footer-thanks {
            font-size: 1.125em;
        }

        .footer-thanks img {
            display: inline-block;
            position: relative;
            top: 1px;
            width: 16px;
            margin-right: 4px;
        }

        .footer-info {
            float: right;
            margin-top: 5px;
            font-size: 0.75em;
            color: #ccc;
        }

        .footer-info span {
            padding: 0 5px;
            color: black;
        }

        .footer-info span:last-child {
            padding-right: 0;
        }

        .page-container {
            display: none;
        }

        .header {
            display: flex;
            margin-left: 0.75rem;
            margin-right: 0.75rem;
            margin-top: 1rem;
            margin-bottom: 2rem;
            text-align: center;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .vet {
            display: flex;
            margin-bottom: 1rem;
            color: #111827;
            font-size: 2.25rem;
            line-height: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            line-height: 1;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .botw {
            padding-top: 0.125rem;
            padding-bottom: 0.125rem;
            padding-left: 0.625rem;
            padding-right: 0.625rem;
            margin-right: 0.5rem;
            margin-left: 0.5rem;
            background-color: #DBEAFE;
            color: #1E40AF;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 600;
            border-radius: 0.25rem;
        }

        .table {
            width: 100%;
            table-layout: auto;
        }

        .thead {
            background-color: #F9FAFB;
            color: #9CA3AF;
            font-size: 0.75rem;
            line-height: 1rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        th {
            padding: 0.5rem;
            white-space: nowrap;
        }

        .th-div {
            font-weight: 600;
            text-align: center;
            margin: .2rem 0;
        }

        .tr {
            color: #6B7280;
            font-weight: 600;
            margin: .2rem 0;
        }

    </style>

</head>
<body >
    <div style="height: 100vh; display: flex; justify-content: center; align-items: center;">

        <div class="page-container">
            Pagina
            <span class="page"></span>
            de
            <span class="pages"></span>
        </div>

        <div class="header">
            <h2 class="vet">Veterinaria <span class="botw">BOTW</span></h2>
        </div>

        <table class="invoice-info-container" style="margin: 0 auto;">
            <tr>
                <td rowspan="2" class="client-name" style="font-size: 0.9rem">
                    Estimado({{ ($appointment->user === 'M')? 'o' : 'a' }}) {{ $appointment->user->name . ' ' . $appointment->user->lastname }}
                </td>
                <td>
                    Veterinaria BOTW
                </td>
            </tr>
            <tr>
                <td>
                    Av. de la Mancha 308
                </td>
            </tr>
            <tr>
                <td>
                    Fecha: <strong>{{now()}}</strong>
                </td>
                <td>
                    Zapopan, Jalisco. 45130
                </td>
            </tr>
            <tr>
                <td>
                    Cita No: <strong>{{ $appointment->id }}</strong>
                </td>
                <td>
                    admin@vet-botw.com
                </td>
            </tr>
        </table>

        <div style="margin: 0 auto; text-align: justify; font-size: 0.9rem; margin-top: 1.3rem; margin-bottom: 1.3rem;">
            La veterinaria BOTW, le informa que ha sido registrada su cita con los datos listados en la presente. Le recomendamos
            llegar 5 minutos antes de su cita y presentar este acuse en forma física o digital al llegar a la clinica para cualquier aclaración.
            Le recordamos amablemente que si la cita no ha sido pagada esta debe pagarse en la recepción al concluir su cita.
        </div>

        <table class="table">
            <thead class="thead">
                <tr>
                    <th>
                        <div class="th-div">Cliente No</div>
                    </th>
                    <th>
                        <div class="th-div">Cliente</div>
                    </th>
                    <th>
                        <div class="th-div">Mascota</div>
                    </th>
                    <th>
                        <div class="th-div">Fecha</div>
                    </th>
                    <th>
                        <div class="th-div">Hora</div>
                    </th>
                    <th>
                        <div class="th-div">Costo</div>
                    </th>
                    <th>
                        <div class="th-div">Pagado</div>
                    </th>
                </tr>
            </thead>
            <tr class="tr">
                <td>
                    <div style="text-align: center">{{ $appointment->user->id }}</div>
                </td>
                <td>
                    <div style="text-align: center">{{ $appointment->user->name . ' ' . $appointment->user->lastname }}</div>
                </td>
                <td>
                    <div style="text-align: center">{{ $appointment->pet->name }}</div>
                </td>
                @php
                    $date = new DateTimeImmutable($appointment->date);
                @endphp
                <td>
                    <div style="text-align: center">{{ $date->format('Y-m-d') }}</div>
                </td>
                <td>
                    <div style="text-align: center">{{ $date->format('H:i A') }}</div>
                </td>
                <td>
                    <div style="text-align: center">{{ $appointment->cost }}</div>
                </td>
                <td>
                    <div style="text-align: center">
                        {{ ($appointment->paid)? 'Si' : 'No' }}
                    </div>
                </td>
            </tr>
        </table>

        <div style="margin: 0 auto; text-align: justify; font-size: 0.9rem; margin-top: 1.3rem; margin-top: 3rem;">
            Quedamos atentos a cualquier duda y/o aclaración. <br />
            Equipo BOTW
        </div>
    </div>

</body>
</html>
