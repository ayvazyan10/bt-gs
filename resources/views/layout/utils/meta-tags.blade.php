@push('meta')
    <title>{{ empty($title) ? 'B&T - Gebäudeservice' : $title }}</title>
    <meta name="description" content="{{ empty($description) ? 'Unser Team mit zuverlässigen Mitarbeitern/innen sorgt für eine schnelle und unkomplizierte Abwicklung Ihrer Aufträge – damit Sie als Kunde mit uns zufrieden sind.' : $description }}">
    <meta name="keywords" content="{{ empty($keywords) ? 'Reinigungsservice, Gebäudeservice, Reinigung, Linoleumbelag, Steinböden,  Gebäudereinigung, Unterhaltsreinigung, Sonderreinigung, Grundreinigung, Glasreinigung, Büroreinigung, Praxisreinigung, Haushaltsreinigung, Teppichbodenreinigung, Teppichreinigung, Immenstadt,Allgäu, Kempten, Sonthofen, Oberstdorf, Oberstaufen, kleinwalsertal, fensterreinigung, glasreinigung, fensterputzer, putzer, putzen' : $keywords }}">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:title" content="{{ empty($title) ? 'B&T - Gebäudeservice' : $title }}">
    <meta property="og:description" content="{{ empty($description) ? 'Unser Team mit zuverlässigen Mitarbeitern/innen sorgt für eine schnelle und unkomplizierte Abwicklung Ihrer Aufträge – damit Sie als Kunde mit uns zufrieden sind.' : $description }}">
    <meta property="og:image" content="{{ empty($image) ? 'B&T - Gebäudeservice' : $image }}">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ Request::url() }}">
    <meta property="twitter:title" content="{{ empty($title) ? 'B&T - Gebäudeservice' : $title }}">
    <meta property="twitter:description" content="{{ empty($description) ? 'Unser Team mit zuverlässigen Mitarbeitern/innen sorgt für eine schnelle und unkomplizierte Abwicklung Ihrer Aufträge – damit Sie als Kunde mit uns zufrieden sind.' : $description }}">
    <meta property="twitter:image" content="{{ empty($image) ? 'B&T - Gebäudeservice' : $image }}">
@endpush
