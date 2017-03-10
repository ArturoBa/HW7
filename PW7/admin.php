<html>
<head>
    <title>Administrador</title>
    <style>
        body{
            background: #ccc;
        }
        div{
            margin: 10px;
            margin-left: 15%;
            font-family: Verdana;
            font-size: 20px;
        }
        
        input{
            background: #8ED1F0;
        }
        
        button{
            width: 40%;
            height: 50px;
            margin: 0px 0px 0px 70px;
            font-family: Verdana;
            font-size: 26px;
            border: solid 1px #555554;
            border-radius: 10px;
        }
        
        #r{
            /*Div rojo*/
            color: red;
        }
        
        #y{
            /*Div amarillo*/
            color: #C1C800;
        }
        
        #g{
            /*Div verde*/
            color: green;
        }
        
    </style>
</head>
<body>
    <div id="container">
        <div>
            <h2>Administrador de tiempo</h2>
        </div>
        <div id="r">
            El tiempo en rojo <strong>depender&aacute; siempre</strong> del otro sem&aacute;foro.
        </div>
        <div id="y">
            Tiempo en amarillo <input id="yellow" type="number"/> <em>segundos</em>
        </div>
        <div id="g">
            Tiempo en verde <input id="green" type="number"/> <em>segundos</em>
        </div>
        <div>
            <button onclick="setTime();" type="button">Ingresar</button>
        </div><div>
            <a href="index.php"><button type="button">Regresar</button></a>
        </div>
    
    </div>
    
    <script>
        var times = [];
        
        //Propiedad dentro del arreglo
        function prop(yellow, green){
            this.yellow = yellow;
            this.green = green;
        }
        
        //Limpiar campos
        function clean(){
            document.getElementById("yellow").value ="";
            document.getElementById("green").value = "";
        }
        function setTime(){
            //Para evitar seguir agredando datos en otras posiciones del Local Storage, ver si no esta vacio
            check = JSON.parse(localStorage.getItem("time"));
            if(check != null){
                times[0].yellow = document.getElementById("yellow").value;
                times[0].green = document.getElementById("green").value;
                
                //Valida campos vacios antes de entrar datos al Local Storage
                if(times[0].green != "" && times[0].yellow != ""){
                    act = JSON.stringify(times);
                    localStorage.setItem("time", act);
                    clean();
                }
                else{
                    alert("No puede dejar campos vacios, joven.");
                }
            }
            else{
                yellow = document.getElementById("yellow").value;
                green = document.getElementById("green").value;

                //Valida campos vacios antes de entrar datos al Local Storare
                if(yellow != ""  && green != ""){
                    times.push(new prop(yellow, green));
                    localStorage.setItem("time", JSON.stringify(times));
                    clean();
                }
                else{
                    alert("No puede dejar campos vacios, joven.");
                }
            }
        }
        
        //Dado que el tiempo sera un solo arreglo con dos propiedades, debo cargar el mismo arreglo siempre.
        //NOTA: para ello se debe asignar lo que habia en el Local Storage al arreglo global, ¡no hacerle push!
        check = localStorage.getItem("time");
        if(check != null){
            times = JSON.parse(check);
        }
    
    </script>
</body>

</html>