<script>
    //pageloader
        var node = document.createElement("DIV");
        node.classList.add("loadingDiv"); // Create a <div> node
        node.innerHTML='<div class="loader"></div><p>loading..</p>';
        document.body.appendChild(node);   // Append <div> to <body> with id="myList"
        window.addEventListener('load', function() {
            fadeOutEffect();
            node.style.display="none";
        });

        // function removeLoader(){
            function fadeOutEffect() {
                var fadeEffect = setInterval(function () {
                    console.log(!node.style.opacity);
                    if (!node.style.opacity) {
                        node.style.opacity =1;
                    }
                    if (node.style.opacity > 0) {
                        node.style.opacity -= 0.4;
                    } else {
                        clearInterval(fadeEffect);
                    }
                }, 200);
            }
    //active link
    const l1 = document.querySelector(".l1");
    const l2 = document.querySelector(".l2");
    const l3 = document.querySelector(".l3");
    const x = window.location.pathname;
    console.log(x);
    if(x.includes("ahome.php"))
        l1.classList.add("act");
    else if(x.includes("aevents.php"))
        l2.classList.add("act");
    else if(x.includes("assign.php"))
        l3.classList.add("act");

        console.log(x);
    if(x.includes("home.php"))
        l1.classList.add("act");
    else if(x.includes("book.php"))
        l2.classList.add("act");
    else if(x.includes("gallery.php"))
        l3.classList.add("act");
    //close session
    function close(){
        session_unset();
        session_destroy();
    }

    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
