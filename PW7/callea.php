<html>
<head>
    <title>Calle A</title>
    <style>
        #main{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="main"></div>
    
    <script>
        var color = "red";
        localS("autorization", "yes");
        var tiempo = [];
        i = 0;
        
        //Asignarle el tiempo que se determino, encontrado en el Local Storage
        a = localStorage.getItem("time");
        if(a != null){
            tiempo = JSON.parse(a);
        }
        
        
        //Llamado del div
        function getDiv(div){
            return document.getElementById(div);
        }
        
        //Llamado del Local Storage
        function localS(name, data){
            return localStorage.setItem(name, data);
        }
        
        //Control de luces
        function controlFlow(){
            aut = localStorage.getItem("autorization");
            if(aut == "yes")
                if(color == "red"){
                    getDiv("main").style.background = "green";
                    i++;
                    //Si la variable tiempo no tiene nada, entonces asignarle un valor por defecto
                    if(tiempo != ""){
                        if(i > tiempo[0].green){   
                            color = "green";
                            localS("control", "green") //Luz actual es verde
                        }
                    }
                    else{
                        if(i > 10){   
                            color = "green";
                            localS("control", "green") //Luz actual es verde
                        }
                    }
                }
                else if(color == "green"){
                    getDiv("main").style.background = "yellow";
                    i++;
                    
                    if(tiempo != ""){
                    amarillo = parseInt(tiempo[0].yellow) + parseInt(tiempo[0].green);
                        if(i > amarillo){
                            color= "yellow";
                            localS("control", "yellow") //Luz actual es amarilla
                        }
                    }
                    else{
                        if(i > 13){
                            color= "yellow";
                            localS("control", "yellow") //Luz actual es amarilla
                        }
                    }
                }
                else if(color == "yellow"){
                    color = "red";
                    getDiv("main").style.background = "red";
                    localS("control", "red"); //Luz actual es roja
                    localS("autorization", "no");
                    i = 0;
                }
        }
        
        setInterval(controlFlow, 1000);
    </script>
</body>
</html>