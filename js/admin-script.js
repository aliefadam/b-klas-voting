let overlay = document.querySelector('.overlay');
let pilihan = document.querySelector('.pilihan')
let daftarPeserta = document.querySelector('.daftar-peserta');
let acak = document.querySelector('.acak');

function bukaOverlay(type) {
    if (type == 'overlay') {
        overlay.style.display = "flex";
        pilihan.style.display = "block";
    } else if (type == 'langsung') {
        pilihan.style.display = "none";
        daftarPeserta.style.display = "flex";
    } else if (type == 'acak') {
        acak.style.display = "flex";
        pilihan.style.display = "none";

        acak.innerHTML = `<h1 class="pilih-acak">Memilih Acak</h1>
                                <div class="lds-roller">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>`;

        setTimeout(function () {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    acak.innerHTML = xhttp.responseText;
                }
            };

            xhttp.open("GET", "peserta-acak.php", true);
            xhttp.send();
        }, 3000);
    }

}

function tutup(type) {
    if (type == "pilihan") {
        overlay.style.display = "none";
    } else if (type == "langsung") {
        daftarPeserta.style.display = "none";
        pilihan.style.display = "block";
    } else if (type == "acak") {
        acak.style.display = "none";
        pilihan.style.display = "block";
    }
}

let idPesertaTampilkan;

function tampilkan(idUser) {
    idPesertaTampilkan = idUser;
    window.location = `../functions/index.php?id-tampilkan=${idUser}`;
}

function hentikan(id) {
    window.location = `../functions/index.php?id-hentikan=${id}`;
}

function updateStarRating(total) {
    var starClasses = ['', '', '', '', ''];
    if (total >= 1 && total <= 1.9) {
        if (total > 1 && total <= 1.9) {
            starClasses[0] = '-fill';
            starClasses[1] = '-half';
        } else {
            starClasses[0] = '-fill';
            starClasses[1] = '';
        }
    } else if (total >= 2 && total <= 2.9) {
        if (total > 2 && total <= 2.9) {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '-half';
        } else {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '';
        }
    } else if (total >= 3 && total <= 3.9) {
        if (total > 3 && total <= 3.9) {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '-fill';
            starClasses[3] = '-half';
        } else {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '-fill';
            starClasses[3] = '';
        }
    } else if (total >= 4 && total <= 4.9) {
        if (total > 4 && total <= 4.9) {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '-fill';
            starClasses[3] = '-fill';
            starClasses[4] = '-half';
        } else {
            starClasses[0] = '-fill';
            starClasses[1] = '-fill';
            starClasses[2] = '-fill';
            starClasses[3] = '-fill';
            starClasses[4] = '';
        }
    } else if (total >= 5) {
        starClasses = ['-fill', '-fill', '-fill', '-fill', '-fill'];
    }

    // Update kelas-kelas bintang sesuai dengan kalkulasi di atas
    var starElements = document.querySelectorAll('.live-skor .bintang i');
    for (var i = 0; i < starClasses.length; i++) {
        starElements[i].className = 'bi bi-star' + starClasses[i] + ' ' + (i + 1);
    }
}



