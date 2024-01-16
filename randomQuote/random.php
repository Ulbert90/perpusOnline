<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--browsrap-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 22rem; margin-top: 2rem; border: none;">

            <div class="card-body">
                <img src="../img/kaguya.gif" class="card-img-top" alt="..." style="border-radius: 5px;" ;>
                <p class=" card-text fs-3 text-center mt-4 ">
                    <?php

// Daftar kutipan
$quotes = array(
    "Emang Salah Saya dimana Wong Saya Suka Kok...",
    "Muka Nyengir Hati Ingin Nyatir.",
    "Udah nyaman eh berujung HTSan🥀.",
    "Saya Manusia Biasa Makan Nasi...",
    "Yo Ndak Tau La Kok Tanya Saya.",
    "HTS kok minta kepastian.",
    "Orang Cerdas Fans Onic",
    "Banyakin Makan Nasi Daripada Kebnaynakan Makan Harapan",
    "Banyakin Makan Nasi Daripada Kebnaynakan Makan Harapan",
);

// Memilih kutipan secara acak
$randomIndex = array_rand($quotes);
$randomQuote = $quotes[$randomIndex];

// Menampilkan kutipan
echo $randomQuote;

?>
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="alert "></div>
    </div>
</body>

</html>