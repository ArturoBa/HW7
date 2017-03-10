<html>
<head>
    <title>Calle B</title>
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
        localS("control1", "red"); //Por default control1 es rojo
        var tiempo = [];
        i = 0;
        
        a = localStorage.getItem("time");
        if(a != null){
            tiempo = JSON.parse(a);
        }
    
        //Llamado del localStorage.setItem();
        function localS(name, data){
            return localStorage.setItem(name, data);
        }
        
    function cargar(){
        var color = localStorage.getItem("control1");
        aut = localStorage.getItem("autorization");

        if(aut == "no"){
            if(color == "red"){
                document.getElementById("main").style.background = "green"; //El color ahora es verde
                i++;
                
                //Si tiempo no tiene nada asignado, hay que determinar un tiempo por defecto
                if(tiempo != ""){
                    if(i > tiempo[0].green){
                        localS("control1", "green");
                    }
                }else{
                    if(i > 10){   
                        localS("control1", "green");
                    }   
                }
            }
            else if(color == "green"){
                document.getElementById("main").style.background = "yellow"; //El ahora es amarillo
                i++;
                
                if(tiempo != ""){
                amarillo = parseInt(tiempo[0].green) + parseInt(tiempo[0].yellow);
                    if(i > amarillo){
                        localS("control1", "yellow");  
                    }
                }else{
                    if(i > 13){
                    localS("control1", "yellow");    
                    }   
                }
            }
            else if(color == "yellow"){
                document.getElementById("main").style.background = "red"; //El color ahora es rojo
                localS("control1", "red");
                localS("autorization", "yes");
                i = 0;
            }
        }
    }
        setInterval(cargar, 1000);
    </script>
</body>
</html>
