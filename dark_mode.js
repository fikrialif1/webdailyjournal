document.getElementById("darkmode").onclick = function() {

    
    // fungsi untuk body
    const tekscard = document.querySelectorAll("body"); 
    for (let i = 0; i < tekscard.length; i++) {
        if (tekscard[i].classList.contains("bg-dark")) {
        tekscard[i].classList.remove("bg-dark");
        tekscard[i].classList.add("bg-white");
    } else {
        tekscard[i].classList.remove("bg-white");
        tekscard[i].classList.add("bg-dark");
    }
    }

    // text
    const teks = document.querySelectorAll("#text"); 
    for (let i = 0; i < teks.length; i++) {
        if (teks[i].classList.contains("text-dark")) {
        teks[i].classList.remove("text-dark");
        teks[i].classList.add("text-white");
    } else {
        teks[i].classList.remove("text-white");
        teks[i].classList.add("text-dark");
    }
    }

    const table = document.querySelectorAll("table"); 
    for (let i = 0; i < teks.length; i++) {
        if (table[i].classList.contains("table-dark")) {
        table[i].classList.remove("table-dark");
        table[i].classList.add("table-light");
    } else {
        table[i].classList.remove("table-light");
        table[i].classList.add("table-dark");
    }
    }
    
    };