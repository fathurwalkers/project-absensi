<?php

require_once 'engine/functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="body">
        <!-- <center> -->
        <h4>Ada absen yang sedang berlangsung</h4>
        <p>terbuka untuk 5 menit lagi</p>
        <p>
            <button onclick="window.location.href='scanner.php'" class="btn btn-primary" id="cekaktif">
                Klik disini untuk absen
            </button>
        </p>
        <!-- </center> -->
    </div>

    <script>
        let currentTime = new Date().toLocaleTimeString("id-ID", {
            timezone: "Asia/Makassar"
        });

        let minTime = "06.00";
        let maxTime = "15.00";

        if (currentTime >= minTime && currentTime <= maxTime) {
            console.log('Absen Aktif');
            document.getElementById('cekaktif').disabled = false;
        } else {
            console.log('Absen tidak Aktif');
            document.getElementById('cekaktif').disabled = true;
        }



        // var enableDisable = function() {
        //     var UTC_hours = new Date().getUTCHours() + 1;
        //     if (UTC_hours > 16 && UTC_hours < 22) {
        //         console.log('Absen Aktif');
        //         // document.getElementById('cekaktif').disabled = false;
        //     } else {
        //         console.log('Absen Tidak Aktif');
        //         // document.getElementById('cekaktif').disabled = true;
        //     }
        // };









        // document.getElementById("cekaktif").disabled = true;








        // document.getElementById('cekaktif') {
        //     var Time = function(timeString) {
        //         var t = timeString.split(":");
        //         this.hour = parseInt(t[0]);
        //         this.minutes = parseInt(t[1]);
        //         this.isBiggerThan = function(other) {
        //             return (this.hour > other.hour) || (this.hour === other.hour) && (this.minutes > other.minutes);
        //         };
        //     }

        //     var timeIsBetween = function(start, end, check) {
        //         return (start.hour <= end.hour) ? check.isBiggerThan(start) && !check.isBiggerThan(end) :
        //             (check.isBiggerThan(start) && check.isBiggerThan(end)) || (!check.isBiggerThan(start) && !check.isBiggerThan(end));
        //     }


        //     var openTime = new Time("05:50");
        //     var closeTime = new Time("06:30");
        //     var checkTime = new Time("02:30");

        //     var isBetween = timeIsBetween(openTime, closeTime, checkTime);
        // }
    </script>
</body>

</html>