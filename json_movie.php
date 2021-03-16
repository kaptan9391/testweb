<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <select id="movie" onscroll="load()" onchange="select_movie()"></select><br>
    <input type="text" id="year" value=""><br>
    <input type="text" id="title" value=""><br>
    <textarea id="cast" cols="30" rows="10"> </textarea><br>
    <input type="text" id="genres" value=""><br>
    <?php
    $jsonfile = file_get_contents("movies.json");
    ?>
    <script>
        var str = "";
        var jsonEx = <?php echo $jsonfile ?>;
        var select = document.getElementById("movie");
        load()
        var i = 0;
        function load() {
            i += 12;
            console.log(i)
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = jsonEx[i].year + ':' + jsonEx[i].title;
            select.appendChild(opt);
        }


        function select_movie() {
            var id = document.getElementById("movie").value;
            console.log(jsonEx[id]["genres"]);
            document.getElementById("year").value = jsonEx[id].year;
            document.getElementById("title").value = jsonEx[id].title;
            document.getElementById("cast").value = jsonEx[id]["cast"];
            document.getElementById("genres").value = jsonEx[id]["genres"];
        }
    </script>
</body>

</html>