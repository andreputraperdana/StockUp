<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Barcode</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container d-flex justify-content-center" style="margin-top: 200px;">
        {{-- <div class="mb-3">{!! DNS1D::getBarcodeSVG('2001'.'22082000', 'EAN13', 3, 100, '#2A3239', true) !!}</div> --}}
        <div class="mb-3">{!! DNS1D::getBarcodeSVG($KodeBarang, 'EAN13', 3, 100, '#2A3239', true) !!}</div>
    </div>
</body>

</html>
