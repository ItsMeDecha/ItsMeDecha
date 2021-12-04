<html>
<head>
            <script>
                function copyme()
                {
                    var range = document.createRange();
                    range.selectNode(document.getElementById("stattt"));
                    window.getSelection().removeAllRanges(); 
                    window.getSelection().addRange(range); 
                    document.execCommand("copy");
                    window.getSelection().removeAllRanges();
                }
         
            </script>
    <meta charset="utf-8">
    <title>Angelic Script v1</title>
</head>
<body>
<?php
            //error_reporting(E_ERROR); //if there are any errors or something delete "//" before "error_reporting(E_ERROR)", refresh site and make ss.
?>
    <form method="get">
        Choose category:
        <select name="cat" id='cat'>
                <option id='c1' value="[[Amulets|Satanic Amulet]]">Amulet</option>
                <option id='c2' value="[[Belts|Belt]]">Belt</option>
                <option id='c3' value="[[Boots|Boots]]">Boots</option>
                <option id='c4' value="[[Charms|Charm]]">Charm</option>
                <option id='c5' value="[[Chestplates|Chestplate]]">Armor</option>
                <option id='c6' value="[[Gloves|Glove]]">Gloves</option>
                <option id='c7' value="[[Helmets|Helmet]]">Helmet</option>                
                <option id='c8' value="[[Potions|Potion]]">Potion</option>
                <option id='c9' value="[[Rings|Ring]]">Ring</option>
                <option id='c11' value="[[Shields|Shield]]">Shield</option>
                <option id='c12' value="[[Melee#1_Handed|Satanic 1H Melee weapon]]">1H Melee Weapon</option>
                <option id='c13' value="[[Melee|Satanic 2H Melee weapon]]">2H Melee Weapon</option>
                <option id='c14' value="[[Spell|Spell Weapon]]">Spell Weapon</option>
                <option id='c15' value="[[Bows#2_Handed|Satanic 2H Bow]]">Bow</option>
        </select><br>
        <script type="text/javascript">
             document.getElementById('cat').value = "<?php echo $_GET['cat'];?>";
        </script>
        <textarea name="stats"></textarea> </br>
        <input type="submit" value="Get wiki stuff"> <input type="button" value="Copy template" onclick="copyme()"></br>
    </form>
    <?php
        if(!empty($_GET["stats"]))

            {   global $cat;
                $cat=$_GET["cat"];
                global $x1;
                global $x2;
                global $numArray; //template array
                global $staArray; //stats array
                global $s1; $s1=0;
                global $s2; $s2=0;
                global $s3; $s3=0;
                $i=0;
                $k=0;
                global $o;
                $o=0;
                global $arr;
                $stats=nl2br($_GET["stats"]); // stats info
                $c_stats=strip_tags($stats); //stats info w/o tags
           //    echo "$stats\n";
             //   echo "<br><br>";
                $p1=fopen("template.txt", "r");                
                $p2=fopen("stats.txt", "r+");
                fwrite($p2,$c_stats);
                fclose($p2);
                $str=$stats;
              //  error_reporting(E_ERROR | E_PARSE);
            if($p2)
            {
                $staArray = explode("\n", file_get_contents("stats.txt"));
                
                
            }
               // foreach($staArray as $h)
               // echo $h."<br>";
                if($p1)
            {
                $numArray = explode("\n", file_get_contents("template.txt"));
                
                
            }
              //  foreach($numArray as $h)
               // echo $h."<br>";
             
                    
                    
                    global $p2;
                    $p2=fopen("stats.txt", "r");
                    while(!feof($p2))
                    {                       
                        $line2=fgets($p2);
                        $s1++;                              //stats start
                        $s3++;
                        if(substr($line2,0,5)=="item ")
                        break;
                     }
                     
                    while(!feof($p2))
                    {
                        $line2=fgets($p2);
                        $s2++;                                                               //stats end
                        if(substr($line2,0,1)=="["||substr($line2,0,5)=="Abili"||substr($line2,0,6)=="eClass"||substr($line2,0,3)=="Set"||substr($line2,1,4)==" Min")
                        {$s2++;
                        break;}
                    }
                   // echo $s1."<br>";
                   //echo $s2;
                    while($s3<$s2)
                    {  
                        $s3++;                       
                        //echo $line2;
                       if($s3==$s2-1)                       
                        {   
                            $s3=$s1+1;
                           // echo $s3;
                            break;
                        }
                        global $tier;
                        
                    }
                    fclose($p2);

                    $p2=fopen("stats.txt", "r");
                    global $tier;
                    while(!feof($p2))
                    {                             
                        $line2=fgets($p2);
                        $staArray[$i] = $line2;
                        $i++;
                        if(substr($line2,0,4)=="true")
                        {
                            global $tier;
                            $tier="<br>C<br><br>H<br><br>A<br><br>S<br><br>E";
                         //echo "$tier <br>";  
                            break;
                        }
                      //  echo $tier;
                    }
                     fclose($p2);
                     $p2=fopen("stats.txt", "r");
                            
                    while(!feof($p2))
                    {                          
                        $line2=fgets($p2);
                        $staArray[$i] = $line2;
                        $i++;
                        //echo " $line2 <br>"; 

                            if(substr($line2,0,5)=="Name:")  
                            {                                                   //item name
                            global $name;
                          $name=ltrim(substr($line2,5));
                          $name=rtrim($name);
                          $dl=strlen($name);
                          //echo $name." "."<br>";
                              for($ri=0;$ri<$dl;$ri++)
                              {   
                                  if($name[$ri]=="'")
                                      $name[$ri]="_";
                                  if($name[$ri]==" ")
                                      $name[$ri]="_";
                                  $name=strtolower($name);
                                  
                                  
                              }
                              $name="[[File:".$name.".png";
                           // echo "$name <br>";    
                            break; 
                            }    
                        }
                        fclose($p2);
                        $p2=fopen("stats.txt", "r");

                    while(!feof($p2))
                    {                             
                        $line2=fgets($p2);                 
                        $staArray[$i] = $line2;
                        $i++;
                      //  echo $line2;
                            if((substr($line2,0,5)=='Abili')||(substr($line2,0,3)=='Set'))
                            {
                               // echo $line2;
                              global $ab;
                              global $abc;
                              $abc=$line2;
                              $ab = $line2;
                                
                               // echo $ab;
                                break;
                                
                            }
                            
                            
                           // if(!(substr($line2,0,5)=='Abili')||!(substr($line2,0,3)=='Set'))
                            //{$ab=" ----";
                               
                            
                          //  if (feof($p2))
                           // break;

                        
                        
                            

                    }
                    fclose($p2);
                    $p2=fopen("stats.txt", "r");
                    while(!feof($p2))
                    {  
                            
                    $line2=fgets($p2);
                    $staArray[$i] = $line2;
                    $i++;

                         if(substr($line2,1,5)==' Min ')
                        {                                                           //min slots
                            global $smin;
                            $smin=(substr($line2,0,1));
                            //echo "min sockets: ".$smin."<br>";
                            break;
                   
                        }
                    }
                     while(!feof($p2))
                    {  
                      
                        $line2=fgets($p2);
                        $staArray[$i] = $line2;
                        $i++;                                                       //max slots

                        if(substr($line2,1,5)==' Max ')
                        {
                            global $smax;
                            $smax=(substr($line2,0,1));                            
                          // echo "max sockets: ".$smax."<br>";
                            break;
                        }

                    }

                    if(!feof($p2))
                    {   global $smin;
                        global $smax;
                        global $sockets;
                        global $sss;
                        if($smin==$smax)
                        {
                            $sockets=$smin;
                        }
                        
                        
                        if($smin < $smax)
                        $sockets=$smin." - ".$smax;

                        if($smin > $smax)
                        $sockets=$smax." - ".$smin;


                      // echo $sockets;
                    
                }
                    while(!feof($p2))
                    {                             
                        $line2=fgets($p2);
                        $staArray[$i] = $line2;
                        $i++;
                        
                        global $tier;
                                                                                    //item tier
                        if((substr($line2,0,10)=="Item Tier:")&&($tier!="<br>C<br><br>H<br><br>A<br><br>S<br><br>E"))
                        {
                            global $tier;
                            $tier=ltrim(substr($line2,11));
                     //       echo "$tier <br>";  
                            break;
                        }
                        
                    }

                    fclose($p2);
                     $p2=fopen("stats.txt", "r");
                      
                    while(!feof($p2))
                    {                             
                        $line2=fgets($p2);                 //damage type xD!
                        $staArray[$i] = $line2;
                        $i++;
                        if((substr($line2,0,4)=="[phy")||(substr($line2,0,4)=="[mag")||(substr($line2,0,4)=="[col")||(substr($line2,0,4)=="[fir")||(substr($line2,0,4)=="[win")||(substr($line2,0,4)=="[poi"))
                        {
                                
                                $dmg=substr($line2,1);
                                //echo $dmg."<br>";
                                $ni=strlen(rtrim($dmg));
                                $dmg=substr($dmg,0,$ni-1);
                                //echo $dmg;
                                $nw=explode(', ',$dmg);
                               //echo $dmg;
                                function dmgtypes()
                                {
                                global $nw;
                                foreach($nw as $kk)
                                {
                                   // echo $kk;
                                $aaa=strlen($kk)-2;
                                    
                                
                                if(substr($kk,$aaa)=="/*"||substr($kk,$aaa)=="*/")
                                $kk="";
                                if($kk!=="")
                                echo ucfirst($kk)."<br>";
                                //echo $kk;
                                }
                                }
                                //dmgtypes();
                                break;
                                
                                
                        }
                        
                        
                        if(substr($line2,0,8)=="physical")
                        {   global $dmg;                           
                            $dmg = "Physical";                           
                       //    echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,4)=="fire")
                        {   global $dmg;                           
                            $dmg = "Fire";                           
                      //     echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,4)=="cold")
                        {   global $dmg;                           
                            $dmg = "Cold";                           
                      //     echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,9)=="lightning")
                        {   global $dmg;                           
                            $dmg = "Lightning";                           
                     //      echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,9)=="elemental")
                        {   global $dmg;                           
                            $dmg = "Elemental";                           
                    //       echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,6)=="poison")
                        {   global $dmg;                           
                            $dmg = "Poison";                           
                   //        echo $dmg."<br>";
                           break;
                        }
                        if((substr($line2,0,4)=="Wind")||(substr($line2,0,4)=="wind"))
                        {   global $dmg;                           
                            $dmg = "Wind";                           
                   //        echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,5)=="magic")
                        {   global $dmg;                           
                            $dmg = "Magic";                           
                   //        echo $dmg."<br>";
                           break;
                        }
                        if(substr($line2,0,7)=="nothing")
                        {   global $dmg;                           
                            $dmg = "----";                           
                       //    echo $dmg."<br>";
                           break;
                        }
                    } 
                      for($i=$s1;$i<$s2;$i++)
                      {
                          $statArray[$i]=$staArray[$i];
                        //  echo "$staArray[$i] <br>";
                      }         
                    global $s4;
                    $s4=$s3-1;
                  // echo"<pre>";
                   // print_r($staArray);
                  //  echo"</pre>";
                    global $e;
                    $e=1;
                    $s3=$s1;

                    function stta(){
                    do
                    {   global $stat;
                         global $s3;
                        global $s2;
                        global $staArray;
                        global $e;
                        
                       

                        $stat=$staArray[$s3]; 
                        if(substr($stat,2,4)=="[INV")
                        {$stat="Talent $e";
                        $e++;}
                        
                       
                       echo " ".$stat."<br>";
                        $s3++;  
                      
                    }
                    while($s3<$s2);}
                    //stta();
                  
                  
                  //  $string=$c_stats;
                  //  $done=sta($str,"[item]","[true]");
                        //i ll kms ffs
               fclose($p1);
               fclose($p2);
                $p2=fopen("stats.txt",'r');
                while(!feof($p2))
                {                             
                    $line2=fgets($p2);    
                        global $class;
                        global $cls;
                        $cls=$line2;
                        
                        
                    if (substr($line2,0,6)=="eClass")
                    {
                    $class=substr($line2,7);
                    $class=explode(" ",$class);
                  // echo $class[0];
                   $cldlg =$class[0];
                   $dl=strlen($cldlg[0]);
                   
                   function classes(){
                        
                       global $class;
                       
                    echo "[[";    
                    
                    $cd= ucfirst($class[0]);
                    if ($cd=="Plaguedoctor")
                    $cd="Plague Doctor";
                    echo $cd;
                    echo "]]";}
                    global $cls;
                    $cls=1;
                    break;
                    }
                    
                    else 
                    {
                        global $cls; 
                        $cls=0;   
                    }


                }
               // classes();
                
                fclose($p2);
            
               global $sArray;
               global $s10Array;
               foreach($statArray as $x)
               {
                   if(preg_match('/\d+ Damage/',$x)&&($x==$staArray[$s4]))
                         {  $npi=array();
                            $okej=$x;
                            $npi=explode(' ',$okej);
                            //echo $x[0]
                            global $bdmg;
                            $bdmg=$npi[0];
                            $sArray[0]=number_format($npi[0])." Base ".$npi[1];
                            $s10Array[0]=number_format(ceil($npi[0]*2.35), 0)." Base ".$npi[1];
                           // echo $s10Array[0];
                         }
         
                 if(preg_match('/\d+.\d+ aps/',$x)||(preg_match('/\d+ aps/',$x)))
                 
                 {
                     //echo $x[0];
                     $aps=$x;
                     $aps=explode(" ",$aps);

                     $sArray[1]=$aps[0]." ".ucfirst($aps[1]);
                     $s10Array[1]=$sArray[1];
                 }
         
                 if(preg_match('/\d+% Block/',$x))
                 {
                     //echo $x[0];
                     $sArray[2]=$x;
                     $s10Array[2]=$sArray[2];
                 }
                 
                 if(preg_match('/\d+% Dodge/',$x))
                 {
                     //echo $x[0];
                     $sArray[3]=$x; 
                     $s10Array[3]=$sArray[3];
                 }
         
                 if(preg_match('/\d+ Speed/',$x))
                 {
                     //echo $x[0];
                     $sArray[4]=$x; 
                     $s10Array[4]=$sArray[4];
                 }
          
                 if(preg_match('/\d+ Strength/',$x))
                 {
                     //echo $x[0];
                     //$sArray[5]=$x;
                     $npi=array();
                            $okej=$x;
                            $npi=explode(' ',$okej);
                            $sArray[5]=number_format($npi[0])." ".$npi[1];
                            $s10Array[5]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Strength/',$x))
                 {
                     //echo $x[0];
                     //$sArray[6]=$x;
                     $npi=array();
                            $okej=$x;
                            $npi=explode(' ',$okej);
                            $sArray[6]=($npi[0])." ".$npi[1];
                            $s10Array[6]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1];
                 }  

                 if(preg_match('/\d+ Energy/',$x))
                 {
                     //echo $x[0];
                    // $sArray[7]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[7]=number_format($npi[0])." ".$npi[1];
                     $s10Array[7]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Energy/',$x))
                 {
                     //echo $x[0];
                     //$sArray[8]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[8]=$npi[0]." ".$npi[1];
                     $s10Array[8]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1];
                 }

                 if(preg_match('/\d+ Armor/',$x))
                 {
                     //echo $x[0];
                     //$sArray[9]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[9]=number_format($npi[0])." ".$npi[1];
                     $s10Array[9]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                     
                 }
         
                 if(preg_match('/\d+% Armor/',$x))
                 {
                     //echo $x[0];
                     //$sArray[10]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[10]=$npi[0]." ".$npi[1];
                     $s10Array[10]=number_format(ceil($npi[0] * 2.4), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+ Stamina/',$x))
                 {
                     //echo $x[0];
                     //$sArray[11]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[11]=number_format($npi[0])." ".$npi[1];
                     $s10Array[11]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Stamina/',$x))
                 {
                     //echo $x[0];
                     //$sArray[12]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[12]=$npi[0]." ".$npi[1];
                     $s10Array[12]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1];
                 } 
                 
                 
         
                 if(preg_match('/\d+ Elemental Damage/',$x))
                 {
                     //echo $x[0];
                     $sArray[13]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[13]=(number_format($npi[0]))." ".$npi[1];
                     $s10Array[13]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Elemental Damage/',$x))
                 {
                     //echo $x[0];
                     //$sArray[14]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[14]=$npi[0]." ".$npi[1];
                     $s10Array[14]=number_format(ceil($npi[0] * 2.4), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Attack Speed/',$x))
                 {
                     //echo $x[0];
                     //$sArray[15]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[15]=$npi[0]." ".$npi[1]." ".$npi[2];
                     $s10Array[15]=ceil(number_format($npi[0] * 2.35))."% ".$npi[1]." ".$npi[2];
                 }
         
                 if(preg_match('/\d+% Ability Power/',$x))
                 {
                     //echo $x[0];
                     $sArray[16]=$x;
                     $s10Array[16]=$x;
                 }
         
                 if(preg_match('/\d+% Attack Power/',$x))
                 {
                     //echo $x[0];
                     $sArray[17]=$x;
                     $s10Array[17]=$x;
                 }
         
                 if(preg_match('/\d+ All Talents/',$x))
                 {
                     //echo $x[0];
                     $sArray[18]=$x;
                     $s10Array[18]=$x;
                 }
         
                 if(preg_match('/\d+% Health/',$x))
                 {
                     //echo $x[0];
                     //$sArray[19]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[19]=$npi[0]." ".$npi[1];
                     $s10Array[19]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Mana/',$x)&&(preg_match('/\d+.\d+% Mana Per Second/',$x)==false)&&(preg_match('/\d+% Mana Per Second/',$x)==false))
                 {
                     //echo $x[0];
                     //$sArray[20]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     //echo $okej;
                     $sArray[20]=$npi[0]." ".$npi[1];
                     //echo $npi[0];
                     $s10Array[20]=number_format(ceil((int)$npi[0] * 2.35), 0)."% ".$npi[1];
                     
                    // $s10Array[20]=number_format((number_format($npi[0] * 2.35, 0)))."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Critical Chance/',$x))
                 {
                     //echo $x[0];
                     $sArray[21]=$x;
                     $s10Array[21]=$x;
                 }
         
                 if(preg_match('/\d+% Critical Damage/',$x))
                 {
                     //echo $x[0];
                     //$sArray[22]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[22]=$npi[0]." ".$npi[1];
                     $s10Array[22]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+ Damage Return/',$x))
                 {
                     //echo $x[0];
                     //$sArray[23]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[23]=number_format($npi[0])." ".$npi[1];
                     $s10Array[23]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Damage Return/',$x))
                 {
                     //echo $x[0];
                     //$sArray[24]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[24]=$npi[0]." ".$npi[1];
                     $s10Array[24]=number_format(ceil($npi[0] * 2.4), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+ Damage/',$x)&&(preg_match('/\d+ Damage Return/',$x)==false)&&(preg_match('/\d+ Elemental Damage/',$x)==false))
                 {
                     //echo $x[0];
                     //$sArray[25]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     //echo $npi[0];
                     $num=$npi[0];
                    // echo $npi[0];
                     $sArray[25]=number_format($npi[0])." ".$npi[1];
                     $s10Array[25]=ceil(($num * 2.35))." ".$npi[1];
                 }
         
                 if(preg_match('/\d+% Damage/',$x)&&(preg_match('/\d+% Damage Return/',$x)==false)&&(preg_match('/\d+% Elemental Damage/',$x)==false)&&(preg_match('/\d+% Damage Reduction/', $x)==false))
                 {
                     //echo $x[0];
                     //$sArray[26]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[26]=$npi[0]." ".$npi[1];
                     $s10Array[26]=number_format(ceil($npi[0] * 2.4), 0)."% ".$npi[1];
                 }
         
                 if(preg_match('/\d+% cdr/',$x))
                 {
                     //echo $x;
                     
                     $cdr=explode(" ",$x);
                    // echo $cdr[0]." ".$cdr
                     $sArray[27]=$cdr[0]." ".ucfirst($cdr[1]);
                     $s10Array[27]=number_format(ceil($cdr[0] * 2.35), 0)."% ".ucfirst($cdr[1]);
                 }
         
                 if(preg_match('/\d+% Damage Reduction/',$x))
                 {
                     //echo $x[0];
                     $sArray[28]=$x;
                     $s10Array[28]=$x;
                 }
         
                 if(preg_match('/\d+ All Stats/',$x))
                 {
                     //echo $x[0];
                     //$sArray[29]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[29]=number_format($npi[0])." ".$npi[1]." ".$npi[2];;
                     $s10Array[29]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1]." ".$npi[2];
                 }
         
                 if(preg_match('/\d+% All Stats/',$x))
                 {
                     //echo $x[0];
                     $sArray[30]=$x;
                     $s10Array[30]=$x;
                 }
         
                 if(preg_match('/\d+.\d+ Life Per Second/',$x)||(preg_match('/\d+ Health Per Second/',$x)))
                 {
                     //echo $x[0];
                     //$sArray[31]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[31]=$npi[0]." ".$npi[1]." ".$npi[2]." ".$npi[3];
                     $s10Array[31]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1]." ".$npi[2]." ".$npi[3];
                 }
         
                 if(preg_match('/\d+.\d+ Mana Per Second/',$x)||(preg_match('/\d+ Mana Per Second/',$x)))
                 {
                     //echo $x[0];
                     //$sArray[32]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[32]=$npi[0]." ".$npi[1]." ".$npi[2]." ".$npi[3];
                     $s10Array[32]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1]." ".$npi[2]." ".$npi[3];
                 }
         
                 if(preg_match('/\d+.\d+% Life Per Second/',$x)||(preg_match('/\d+% Health Per Second/',$x)))
                 {
                     //echo $x[0];
                     //$sArray[33]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[33]=$npi[0]." ".$npi[1]." ".$npi[2]." ".$npi[3];
                     $s10Array[33]=number_format(ceil($npi[0] * 3), 1)."% ".$npi[1]." ".$npi[2]." ".$npi[3];
                 }
         
                 if(preg_match('/\d+.\d+% Mana Per Second/',$x)||(preg_match('/\d+% Mana Per Second/',$x)))
                 {
                     //echo $x[0];
                     //$sArray[34]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[34]=$npi[0]." ".$npi[1]." ".$npi[2]." ".$npi[3];
                     $s10Array[34]=number_format(ceil($npi[0] * 3), 1)."% ".$npi[1]." ".$npi[2]." ".$npi[3];
                 }
         
                 if(preg_match('/\d+ Health Per Kill/',$x))
                 {
                     //echo $x[0];
                     $sArray[35]=$x;
                     $s10Array[35]=$x;
                 }
         
                 if(preg_match('/\d+ Mana Per Kill/',$x))
                 {
                     //echo $x[0];
                     $sArray[36]=$x;
                     $s10Array[36]=$x;

                 }
         
                 if(preg_match('/\d+ Max Health/',$x))
                 {
                     //echo $x[0];
                     //$sArray[37]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[37]=number_format($npi[0])." ".$npi[1]." ".$npi[2];
                     $s10Array[37]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1]." ".$npi[2];
                 }
         
                 if(preg_match('/\d+ Max Mana/',$x))
                 {
                     //echo $x[0];
                     //$sArray[38]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[38]=number_format($npi[0])." ".$npi[1]." ".$npi[2];
                     $s10Array[38]=number_format(ceil($npi[0] * 2.35), 0)." ".$npi[1]." ".$npi[2];
                 }
         
                 if(preg_match('/\d+.\d+% Life Per Hit/',$x)||preg_match('/\d+% Life Per Hit/',$x))
                 {
                     //echo $x[0];
                     $sArray[39]=$x;
                     $s10Array[39]=$x;
                 }
         
                 if(preg_match('/\d+.\d+% Mana Per Hit/',$x)||preg_match('/\d+% Mana Per Hit/',$x))
                 {
                     //echo $x[0];
                     $sArray[40]=$x;
                     $s10Array[40]=$x;
                 }
         
                 if(preg_match('/\d+% Magic Find/',$x))
                 {
                     //echo $x[0];
                     //$sArray[41]=$x;
                     $npi=array();
                     $okej=$x;
                     $npi=explode(' ',$okej);
                     $sArray[41]=$npi[0]." ".$npi[1]." ".$npi[2];
                     $s10Array[41]=number_format(ceil($npi[0] * 2.35), 0)."% ".$npi[1]." ".$npi[2];
                 }
         
                 if(preg_match('/\d+% Exp Gain/',$x))
                 {
                     //echo $x[0];
                     $sArray[42]=$x;
                     $s10Array[42]=$x;
                 }
         
                 if(preg_match('/\d+% All Resistances/',$x))
                 {
                     //echo $x[0];
                     $sArray[43]=$x;
                     $s10Array[43]=$x;
                 }
         
                 if(preg_match('/\d+% Max/',$x))
                 {
                     //echo $x[0];
                     $sArray[44]=$x;
                     $s10Array[44]=$x;
                 }
         
                 if(preg_match('/\d+% Random/',$x)||(preg_match('/\d+% Fire Res/',$x))||(preg_match('/\d+% Poison Res/',$x))||(preg_match('/\d+% Wind Res/',$x))||(preg_match('/\d+% Cold Res/',$x))||(preg_match('/\d+% Lightning Res/',$x)))
                 {
                     //echo $x[0];
                     $sArray[45]=$x;
                     $s10Array[45]=$x;
                 }
                 if(preg_match('/\d+% Random/',$x))
                 {
                     //echo $x[0];
                     $sArray[46]=$x;
                     $s10Array[46]=$x;
                 }
                 if(preg_match('/Talent \d+/',$x))
                 {
                     //echo $x[0];
                     $sArray[47]=$x;
                     $s10Array[47]=$x;
                 }
                 
                 if(preg_match('/1 Random Stat/',$x))
                 {
                     //echo $x[0];
                     $sArray[48]="1 [[Random Stats|Random Stat]]";
                     $s10Array[48]="1 [[Random Stats|Random Stat]]";

                 }
                 
               }
              // ksort($sArray);

              ksort($sArray);
              ksort($s10Array);
             // print_r($sArray);
              global $cat;
              global $cls;
             //  echo $name ."<br>";
             //  echo $tier ."<br>";
             //echo $s1." ".$s2." ".$s3." ";
             //$_GET = array();
             //$cat=$_GET["cat"];
             echo "<br><br><div id='stattt' >";
             echo "'''{{PAGENAME}}''' is a pair of [[Equipment|Satanic]] ".$cat." found in [[Hero Siege|Hero Siege]].<br>";
             echo '&lttabber&gt<br>';
             echo "100% Quality=<br>";
             echo "{{#tag:tabber|Level 1=";
             echo "{{{!}} class=&quotarticle-table&quot<br>";
             echo "!Tier<br>";
             echo "!Sprite<br>";
             echo "!Stats<br>";
             echo "!Sockets<br>";
             echo "!Damage Types<br>";
             echo "!Ability<br>";
             echo "{{!}}-<br>";
             echo "{{!}} ".$tier."<br>";
             echo "{{!}}".$name."{{!}}center{{!}}thumb]]<br>";
             echo "{{!}} ";
                foreach($sArray as $p)
                {   
                    echo $p."<br><br>";
                }
              
                if($cls==1)
                {
                    classes();
                    echo "<br>";
                }
            
           
             echo "{{!}} ".$sockets."<br>";
             if(($dmg=="Fire")||($dmg=="Cold")||($dmg=="Wind")||($dmg=="Magic")||($dmg=="----")||($dmg=="Poison")||($dmg=="Lightning")||($dmg=="Elemental")||($dmg=="Physical"))
             echo "{{!}} ".$dmg."<br>";
             if(($dmg!=="Fire")&&($dmg!=="Cold")&&($dmg!=="Wind")&&($dmg!=="Magic")&&($dmg!=="----")&&($dmg!=="Poison")&&($dmg!=="Lightning")&&($dmg!=="Elemental")&&($dmg!=="Physical"))
            {
                echo "{{!}} ";
                dmgtypes();
            }

            if((substr($ab,0,5)=='Abili')||(substr($ab,0,3)=='Set'))
             echo "{{!}} ".$ab."<br>";
             else
             echo "{{!}} ----<br>";

             echo "{{!}}}<br><br>";
             echo "{{!}}-{{!}}<br><br>";
             echo "Level 10=<br>";
             echo "{{{!}} class=&quotarticle-table&quot<br>";
             echo "!Tier<br>";
             echo "!Sprite<br>";
             echo "!Stats<br>";
             echo "!Sockets<br>";
             echo "!Damage Types<br>";
             echo "!Ability<br>";
             echo "{{!}}-<br>";
             echo "{{!}}".$tier."<br>";
             echo "{{!}}".$name."{{!}}center{{!}}thumb]]<br>";
             echo "{{!}}";
             foreach($s10Array as $p10)
             {   
                 echo $p10."<br><br>";
             }
             if($cls==1)
                {
                    classes();
                    echo "<br>";
                }
             
             echo "{{!}}".$sockets."<br>";
             if(($dmg=="Fire")||($dmg=="Cold")||($dmg=="Wind")||($dmg=="Magic")||($dmg=="----")||($dmg=="Poison")||($dmg=="Lightning")||($dmg=="Elemental")||($dmg=="Physical"))
             echo "{{!}} ".$dmg."<br>";
             if(($dmg!=="Fire")&&($dmg!=="Cold")&&($dmg!=="Wind")&&($dmg!=="Magic")&&($dmg!=="----")&&($dmg!=="Poison")&&($dmg!=="Lightning")&&($dmg!=="Elemental")&&($dmg!=="Physical"))
            {
                echo "{{!}} ";
                dmgtypes();
            }
             if((substr($ab,0,5)=='Abili')||(substr($ab,0,3)=='Set'))
             echo "{{!}} ".$ab."<br>";
             else
             echo "{{!}} ----<br>";
             echo "{{!}}}<br>";
             echo "}}<br>";
             echo "&lt/tabber&gt<br>";
             echo "</div>";
            }   
            if(isset($_GET["stats"]))
            foreach($sArray as $key=>$val){
                $val = '';
                $sArray[$key] = $val;
            }
           // print_r($sArray);
//$p3=fopen("stats.txt",'w');
           // file_put_contents("stats.txt", "");
//fclose($p3);

    ?>
</body>
</html>