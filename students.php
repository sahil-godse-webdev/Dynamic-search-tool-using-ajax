<html>
    <head>
        <title>Students details-form</title>
        <style>
            #res{
                color: green;
            }
            
            *{
                font-family: calibri;
            }
            #left{
                width: 30%;

                height: auto;

                background: whitesmoke;

                padding: 10px;
                
                float: left;
            }
            
            #close{
                position: relative;

                float: right;

                font-size: 30px;
                
                cursor: pointer;
                
            }
            
            .editdiv{
                position: absolute;

                width: auto;

                height: auto;

                margin: 65px 525px;

                font-size: 20px;

                background: beige;

                padding: 65px;
                
                display: none;
            }
            
            #right{
                height: auto;

                width: 60%;

                padding: 10px;

                background: blanchedalmond;

                float: left;
            }
            #students{
                width: 100%;
                height: auto;
                background: #cb8686;
            }
            .std1{
                float: left;
                padding: 12px;
                background: whitesmoke;
                margin: 4px;
                border: 1px solid black;
                border-radius: 6px;
                
            }
            
            #search{
                
                margin: 2px 0 22px 6px;
                width: 450px;
                padding: 10px;
                height: 50px;
                font-size: 20px;
            }
            
        </style>
        
        
        <script src="jquery-3.3.1.min.js"></script>
        <script src="jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                $('#save').click(function(){
                    var name=$('#name').val();
                    var date=$('#doj').val();
                    var x=new XMLHttpRequest();
                    x.open('GET','register.php?name='+name+'&date='+date,true);
                    x.send();
                    x.onreadystatechange=function(){
                        if(x.readyState==4){
                            $('#res').fadeIn().html(x.responseText).delay(3000).fadeOut();
                             
                        }
                    }
                    
                });
                
                function getstud(t){
                    //alert("aaya getstud me");
                    var x=new XMLHttpRequest();
                    x.open('GET','getstuds.php?text='+t,true);
                    x.send();
                    x.onreadystatechange=function(){
                        if(x.readyState==4){
                            var obj= $.parseJSON(x.responseText);
                            console.log(obj);
                            //alert(obj.length); 
                            $('#students').html('');
                            for(i=0;i<obj.length;i++){
                                $("#students").append("<div class='std1'>\
                                    <h1>"+obj[i]['name']+"</h1>\
                                    <p>"+obj[i]['doj']+"</p>\
                                    <button class='edit' id='"+obj[i]["cid"]+"'>Edit</button>\
                                </div>");
                            }
                            $(".edit").click(function(){
                                editstuds();
                            })
                        }
                    }
                }
                
                function editstuds(){
                    //$(".editdiv").show('bounce',1000); 
                    var id= this.id;
                    alert(id);
                }
                
                $("#close").click(function(){
                        $('.editdiv').fadeOut(500);
                    });
                getstud();
                
                $("#search").keyup(function(){
                    var text= $(this).val();
                    getstud(text);
                })
                
                
            });
        </script>
    </head>
    <body>
        <div class="main">
            <div id="left">
                <h1>Registration form</h1>
                <p>
                    Name:<br>
                    <input type="text" id="name">
                </p>
                <p>
                    Date of joining:<br>
                    <input type="date" id="doj">
                </p>
                <p>
                    <input type="submit" id="save">
                </p>
                <p id="res"></p>
                
            </div>
            <div id="right">
                <h1>Registered students</h1>
                <input type="search" placeholder="Search for students" id="search"/>
                <div id="students">
              
                </div>
            </div>
        </div>
        
        <div class="editdiv">
            <span id="close">X</span>
            <h2>Edit data</h2>
            <p>
                Name:<br>
                <input type="text" id="uname">
            </p>
            <p>
                Doj:<br>
                <input type="text" id="udoj">
            </p>
            <p>
                <input type="submit" id="usave">
            </p>
        </div>
    </body>

</html>