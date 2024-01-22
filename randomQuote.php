<?php
$quotes = [
    "Hidup adalah tentang membuat dampak, bukan hanya tentang bertahan hidup.",
    "Jangan biarkan kegagalan menghentikanmu. Biarkan itu menginspirasi Anda.",
    "Kesuksesan bukanlah kunci kebahagiaan. Kebahagiaan adalah kunci kesuksesan. Jika Anda mencintai apa yang Anda lakukan, Anda akan berhasil.",
    "Jika Anda tidak membangun mimpimu, seseorang akan menyewa Anda untuk membantu membangun mimpinya.",
    "Keberanian bukanlah ketiadaan ketakutan, tapi kemampuan untuk melalui ketakutan itu.",
];

// Fungsi untuk mendapatkan kutipan acak
function getRandomQuote($quotes) {
    $randomIndex = array_rand($quotes);
    return $quotes[$randomIndex];
}

// Tampilkan kutipan acak saat halaman dimuat
$randomQuote = getRandomQuote($quotes);
?>

<!-- Gunakan $randomQuote sesuai kebutuhan, misalnya untuk menampilkan di HTML -->