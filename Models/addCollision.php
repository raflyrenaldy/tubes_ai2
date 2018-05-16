<?php
$con = @mysqli_connect('localhost', 'root', '', 'db_ai');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
$queryTruncate = mysqli_query($con,'TRUNCATE TABLE HASIL');
$queryKasusYes = 'SELECT COUNT(INCOME) as jumlah_yes FROM sample2 WHERE INCOME = ">50k" ';
$queryKasusNo = 'SELECT COUNT(INCOME) as jumlah_no FROM sample2 WHERE INCOME = "<=50k" ';
 $JumlahYes = 0;
  $JumlahKasus = mysqli_query($con,'select count(*) as jumlah_kasus from sample2');

        $JumlahKasusYes = mysqli_query($con,$queryKasusYes);
        $JumlahKasusNo = mysqli_query($con,$queryKasusNo);
        while( $JmlKasus = mysqli_fetch_assoc($JumlahKasus)){
              $JumlahKss = (int)$JmlKasus['jumlah_kasus'];
        }
       while(   $JumlahYes1 = mysqli_fetch_assoc($JumlahKasusYes)){         
                $JumlahYes = (int)$JumlahYes1['jumlah_yes'];  
       }
        while(   $JumlahNo1 = mysqli_fetch_assoc($JumlahKasusNo)){         
                $JumlahNo = (int)$JumlahNo1['jumlah_no'];  
       }
                  
        (float)$PerbandinganYes = $JumlahYes / $JumlahKss;    
        (float)$PerbandinganNo = $JumlahNo / $JumlahKss;                    
        $rumusEntropy = (-($PerbandinganNo) * log($PerbandinganNo,2)) + (-($PerbandinganYes) * log($PerbandinganYes,2));
         $getEntropy = round($rumusEntropy,4); // 4 angka di belakang koma
         $QueryInsertEntropyTotal = 'INSERT INTO HASIL (ATRIBUT,JML_KASUS,Yes,No,ENTROPY) VALUES ("total","'.$JumlahKss.'","'.$JumlahYes.'","'.$JumlahNo.'","'.$getEntropy.'") ';
         $InsertEntropyTotal = mysqli_query($con,$QueryInsertEntropyTotal);
//=========================================================================================================================================
         $Workclass1Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Federal-gov" AND income = ">50k"');
         $Workclass1No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Federal-gov" AND income = "<=50k" ');
         $Workclass1Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Federal-gov" '); 
         while( $jmlFGYes1 = mysqli_fetch_assoc($Workclass1Yes)){
              $JumlahFGYes = (int)$jmlFGYes1['jumlah_yes'];
        }
        while( $jmlFGNo1 = mysqli_fetch_assoc($Workclass1No)){
              $JumlahFGNo = (int)$jmlFGNo1['jumlah_no'];
        }
        while( $jmlFGJml = mysqli_fetch_assoc($Workclass1Jml)){
              $JumlahFGJml = (int)$jmlFGJml['jumlah_kasus'];
        }
                    
        (float)$PerbandinganYesFG = $JumlahFGYes / $JumlahFGJml;    
        (float)$PerbandinganNoFG = $JumlahFGNo / $JumlahFGJml;                    
        $rumusEntropyFG = (-($PerbandinganNoFG) * log($PerbandinganNoFG,2)) + (-($PerbandinganYesFG) * log($PerbandinganYesFG,2));
         $getEntropyFG = round($rumusEntropyFG,4); 
         $QueryInsertEntropyFederalGov = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Workclass")');
         $QueryInsertEntropyFG = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Federal-Gov","'.$JumlahFGJml.'","'.$JumlahFGYes.'","'.$JumlahFGNo.'","'.$getEntropyFG.'")') ;
//=========================================================================================================================================
          $Workclass2Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Local-gov" AND income = ">50k"');
         $Workclass2No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Local-gov" AND income = "<=50k" ');
         $Workclass2Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Local-gov" '); 
         while( $jmlLGYes1 = mysqli_fetch_assoc($Workclass2Yes)){
              $JumlahLGYes = (int)$jmlLGYes1['jumlah_yes'];
        }
        while( $jmlLGNo1 = mysqli_fetch_assoc($Workclass2No)){
              $JumlahLGNo = (int)$jmlLGNo1['jumlah_no'];
        }
        while( $jmlLGJml = mysqli_fetch_assoc($Workclass2Jml)){
              $JumlahLGJml = (int)$jmlLGJml['jumlah_kasus'];
        }
                    
        (float)$PerbandinganYesLG = $JumlahLGYes / $JumlahLGJml;    
        (float)$PerbandinganNoLG = $JumlahLGNo / $JumlahLGJml;                    
        $rumusEntropyLG = (-($PerbandinganNoLG) * log($PerbandinganNoLG,2)) + (-($PerbandinganYesLG) * log($PerbandinganYesLG,2));
         $getEntropyLG = round($rumusEntropyLG,4); 
              $QueryInsertEntropyLG = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Local-gov","'.$JumlahLGJml.'","'.$JumlahLGYes.'","'.$JumlahLGNo.'","'.$getEntropyLG.'")') ;
//=========================================================================================================================================
         $Workclass3Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Private" AND income = ">50k"');
         $Workclass3No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Private" AND income = "<=50k" ');
         $Workclass3Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Private" '); 
         while( $jmlPYes1 = mysqli_fetch_assoc($Workclass3Yes)){
              $JumlahPYes = (int)$jmlPYes1['jumlah_yes'];
        }
        while( $jmlPNo1 = mysqli_fetch_assoc($Workclass3No)){
              $JumlahPNo = (int)$jmlPNo1['jumlah_no'];
        }
        while( $jmlPJml = mysqli_fetch_assoc($Workclass3Jml)){
              $JumlahPJml = (int)$jmlPJml['jumlah_kasus'];

        }
         (float)$PerbandinganYesP = $JumlahPYes / $JumlahPJml;    
        (float)$PerbandinganNoP = $JumlahPNo / $JumlahPJml;                    
        $rumusEntropyP = (-($PerbandinganNoLG) * log($PerbandinganNoP,2)) + (-($PerbandinganNoP) * log($PerbandinganYesP,2));
         $getEntropyP = round($rumusEntropyP,4); 

         $QueryInsertEntropyP = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Private","'.$JumlahPJml.'","'.$JumlahPYes.'","'.$JumlahPNo.'","'.$getEntropyP.'")') ;
//=========================================================================================================================================
           $Workclass4Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Self-emp-inc" AND income = ">50k"');
         $Workclass4No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Self-emp-inc" AND income = "<=50k" ');
         $Workclass4Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Self-emp-inc" '); 
         while( $jmlSEIYes1 = mysqli_fetch_assoc($Workclass4Yes)){
              $JumlahSEIYes = (int)$jmlSEIYes1['jumlah_yes'];
        }
        while( $jmlSEINo1 = mysqli_fetch_assoc($Workclass4No)){
              $JumlahSEINo = (int)$jmlSEINo1['jumlah_no'];
        }
        while( $jmlSEIJml = mysqli_fetch_assoc($Workclass4Jml)){
              $JumlahSEIJml = (int)$jmlSEIJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSEI = $JumlahPYes / $JumlahPJml;    
        (float)$PerbandinganNoSEI = $JumlahPNo / $JumlahPJml;                    
        $rumusEntropySEI = (-($PerbandinganNoSEI) * log($PerbandinganNoSEI,2)) + (-($PerbandinganYesSEI) * log($PerbandinganYesSEI,2));
         $getEntropySEI = round($rumusEntropySEI,4); 

         $QueryInsertEntropySEI = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Self-emp-inc","'.$JumlahSEIJml.'","'.$JumlahSEIYes.'","'.$JumlahSEINo.'","'.$getEntropySEI.'")') ;
//=========================================================================================================================================
           $Workclass5Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Self-emp-not-inc" AND income = ">50k"');
         $Workclass5No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Self-emp-not-inc" AND income = "<=50k" ');
         $Workclass5Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Self-emp-not-inc" '); 
         while( $jmlSENIYes1 = mysqli_fetch_assoc($Workclass5Yes)){
              $JumlahSENIYes = (int)$jmlSENIYes1['jumlah_yes'];
        }
        while( $jmlSENINo1 = mysqli_fetch_assoc($Workclass5No)){
              $JumlahSENINo = (int)$jmlSENINo1['jumlah_no'];
        }
        while( $jmlSENIJml = mysqli_fetch_assoc($Workclass5Jml)){
              $JumlahSENIJml = (int)$jmlSENIJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSENI = $JumlahSENIYes / $JumlahSENIJml;    
        (float)$PerbandinganNoSENI = $JumlahSENINo / $JumlahSENIJml;                    
        $rumusEntropySENI = (-($PerbandinganNoSENI) * log($PerbandinganNoSENI,2)) + (-($PerbandinganYesSENI) * log($PerbandinganYesSENI,2));
         $getEntropySENI = round($rumusEntropySENI,4); 

         $QueryInsertEntropySEI = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Self-emp-not-inc","'.$JumlahSENIJml.'","'.$JumlahSENIYes.'","'.$JumlahSENINo.'","'.$getEntropySENI.'")') ;
//=========================================================================================================================================
        $Workclass6Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "State-gov" AND income = ">50k"');
        $Workclass6No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "State-gov" AND income = "<=50k" ');
        $Workclass6Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "State-gov" '); 
         while( $jmlSGYes1 = mysqli_fetch_assoc($Workclass6Yes)){
              $JumlahSGYes = (int)$jmlSGYes1['jumlah_yes'];
        }
        while( $jmlSGNo1 = mysqli_fetch_assoc($Workclass6No)){
              $JumlahSGNo = (int)$jmlSGNo1['jumlah_no'];
        }
        while( $jmlSGJml = mysqli_fetch_assoc($Workclass6Jml)){
              $JumlahSGJml = (int)$jmlSGJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSG = $JumlahSGYes / $JumlahSGJml;    
        (float)$PerbandinganNoSG = $JumlahSGNo / $JumlahSGJml;                    
        $rumusEntropySG = (-($PerbandinganNoSG) * log($PerbandinganNoSG,2)) + (-($PerbandinganYesSG) * log($PerbandinganYesSG,2));
         $getEntropySG = round($rumusEntropySG,4); 

         $QueryInsertEntropySEI = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("State-gov","'.$JumlahSGJml.'","'.$JumlahSGYes.'","'.$JumlahSGNo.'","'.$getEntropySG.'")') ;
//=========================================================================================================================================
        $Workclass7Yes= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_yes FROM sample2 WHERE Workclass = "Without-pay" AND income = ">50k"');
        $Workclass7No= mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_no FROM sample2 WHERE Workclass = "Without-pay" AND income = "<=50k" ');
        $Workclass7Jml = mysqli_query($con,'SELECT COUNT(Workclass) as jumlah_kasus FROM sample2 WHERE Workclass = "Without-pay" '); 
         while( $jmlWPYes1 = mysqli_fetch_assoc($Workclass7Yes)){
              $JumlahWPYes = (int)$jmlWPYes1['jumlah_yes'];
        }   
        while( $jmlWPNo1 = mysqli_fetch_assoc($Workclass7No)){
              $JumlahWPNo = (int)$jmlWPNo1['jumlah_no'];
        }
        while( $jmlWPJml = mysqli_fetch_assoc($Workclass7Jml)){
              $JumlahWPJml = (int)$jmlWPJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWP = $JumlahWPYes / $JumlahWPJml;    
        (float)$PerbandinganNoWP = $JumlahWPNo / $JumlahWPJml;                    
         $rumusEntropyWP = (-($PerbandinganNoWP) * log($PerbandinganNoWP,2)) + (-($PerbandinganYesWP) * log($PerbandinganYesWP,2));
         if(is_nan($rumusEntropyWP)){
            $rumusEntropyWP = 0;
         }
         $getEntropyWP = round($rumusEntropyWP,4); 

         $QueryInsertEntropySEI = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Without-pay","'.$JumlahWPJml.'","'.$JumlahWPYes.'","'.$JumlahWPNo.'","'.$getEntropyWP.'")') ;
//=========================================================================================================================================
        $FG = ($JumlahFGJml / $JumlahKss) * $getEntropyFG;
        
        $LG = ($JumlahLGJml / $JumlahKss) * $getEntropyLG;
        $P = ($JumlahPJml / $JumlahKss) * $getEntropyP;
        $SEI = ($JumlahSEIJml / $JumlahKss) * $getEntropySEI;
        $SENI = ($JumlahSENIJml / $JumlahKss) * $getEntropySENI;
        $SG = ($JumlahSGJml / $JumlahKss) * $getEntropySG;
        $WP = ($JumlahWPJml / $JumlahKss) * $getEntropyWP;
        (float)$GainTotalWorkclass = $getEntropy - $FG + $LG + $P + $SEI + $SENI + $SG + $WP;
       
        $getGainTotalWorkclass = round($GainTotalWorkclass,4);
        $InsertGainTotalWorkclass = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalWorkclass.' WHERE ATRIBUT = "Workclass" ');
         
//=========================================================================================================================================

            $Education1Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "11th" AND income = ">50k"');
        $Education1No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "11th" AND income = "<=50k" ');
        $Education1Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "11th" '); 
         while( $jml11Yes1 = mysqli_fetch_assoc($Education1Yes)){
              $Jumlah11Yes = (int)$jml11Yes1['jumlah_yes'];
        }   
        while( $jml11No1 = mysqli_fetch_assoc($Education1No)){
              $Jumlah11No = (int)$jml11No1['jumlah_no'];
        }
        while( $jml11Jml = mysqli_fetch_assoc($Education1Jml)){
              $Jumlah11Jml = (int)$jml11Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes11 = $Jumlah11Yes / $Jumlah11Jml;    
        (float)$PerbandinganNo11 = $Jumlah11No / $Jumlah11Jml;                    
         $rumusEntropy11 = (-($PerbandinganNo11) * log($PerbandinganNo11,2)) + (-($PerbandinganYes11) * log($PerbandinganYes11,2));
         if(is_nan($rumusEntropy11)){
            $rumusEntropy11 = 0;
         }
         $getEntropy11 = round($rumusEntropy11,4); 
        $QueryInsertEntropyEducation = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Education")');
         $QueryInsertEntropy11 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("11th","'.$Jumlah11Jml.'","'.$Jumlah11Yes.'","'.$Jumlah11No.'","'.$getEntropy11.'")') ;      
//=========================================================================================================================================
        $Education2Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "12th" AND income = ">50k"');
        $Education2No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "12th" AND income = "<=50k" ');
        $Education2Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "12th" '); 
         while( $jml12Yes1 = mysqli_fetch_assoc($Education2Yes)){
              $Jumlah12Yes = (int)$jml12Yes1['jumlah_yes'];
        }   
        while( $jml12No1 = mysqli_fetch_assoc($Education2No)){
              $Jumlah12No = (int)$jml12No1['jumlah_no'];
        }
        while( $jml12Jml = mysqli_fetch_assoc($Education2Jml)){
              $Jumlah12Jml = (int)$jml12Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes12 = $Jumlah12Yes / $Jumlah12Jml;    
        (float)$PerbandinganNo12 = $Jumlah12No / $Jumlah12Jml;                    
         $rumusEntropy12 = (-($PerbandinganNo12) * log($PerbandinganNo12,2)) + (-($PerbandinganYes12) * log($PerbandinganYes12,2));
         if(is_nan($rumusEntropy12)){
            $rumusEntropy12 = 0;
         }
         $getEntropy12 = round($rumusEntropy12,4); 
       
         $QueryInsertEntropy12 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("12th","'.$Jumlah12Jml.'","'.$Jumlah12Yes.'","'.$Jumlah12No.'","'.$getEntropy12.'")') ;      
//=========================================================================================================================================
        $Education3Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "10th" AND income = ">50k"');
        $Education3No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "10th" AND income = "<=50k" ');
        $Education3Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "10th" '); 
         while( $jml13Yes1 = mysqli_fetch_assoc($Education3Yes)){
              $Jumlah13Yes = (int)$jml13Yes1['jumlah_yes'];
        }   
        while( $jml13No1 = mysqli_fetch_assoc($Education3No)){
              $Jumlah13No = (int)$jml13No1['jumlah_no'];
        }
        while( $jml13Jml = mysqli_fetch_assoc($Education3Jml)){
              $Jumlah13Jml = (int)$jml13Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes13 = $Jumlah13Yes / $Jumlah13Jml;    
        (float)$PerbandinganNo13 = $Jumlah13No / $Jumlah13Jml;                    
         $rumusEntropy13 = (-($PerbandinganNo13) * log($PerbandinganNo13,2)) + (-($PerbandinganYes13) * log($PerbandinganYes13,2));
         if(is_nan($rumusEntropy13)){
            $rumusEntropy13 = 0;
         }
         $getEntropy13 = round($rumusEntropy13,4); 
       
         $QueryInsertEntropy13 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("10th","'.$Jumlah13Jml.'","'.$Jumlah13Yes.'","'.$Jumlah13No.'","'.$getEntropy13.'")') ;      
//=========================================================================================================================================
        $Education4Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "9th" AND income = ">50k"');
        $Education4No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "9th" AND income = "<=50k" ');
        $Education4Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "9th" '); 
         while( $jml9Yes1 = mysqli_fetch_assoc($Education4Yes)){
              $Jumlah9Yes = (int)$jml9Yes1['jumlah_yes'];
        }   
        while( $jml9No1 = mysqli_fetch_assoc($Education4No)){
              $Jumlah9No = (int)$jml9No1['jumlah_no'];
        }
        while( $jml9Jml = mysqli_fetch_assoc($Education4Jml)){
              $Jumlah9Jml = (int)$jml9Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes9 = $Jumlah9Yes / $Jumlah9Jml;    
        (float)$PerbandinganNo9 = $Jumlah9No / $Jumlah9Jml;                    
         $rumusEntropy9 = (-($PerbandinganNo9) * log($PerbandinganNo9,2)) + (-($PerbandinganYes9) * log($PerbandinganYes9,2));
         if(is_nan($rumusEntropy9)){
            $rumusEntropy9 = 0;
         }
         $getEntropy9 = round($rumusEntropy9,4); 
       
         $QueryInsertEntropy9 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("9th","'.$Jumlah9Jml.'","'.$Jumlah9Yes.'","'.$Jumlah9No.'","'.$getEntropy9.'")') ;      
//=========================================================================================================================================
        $Education5Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "1st-4th" AND income = ">50k"');
        $Education5No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "1st-4th" AND income = "<=50k" ');
        $Education5Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "1st-4th" '); 
         while( $jml1stYes1 = mysqli_fetch_assoc($Education5Yes)){
              $Jumlah1stYes = (int)$jml1stYes1['jumlah_yes'];
        }   
        while( $jml1stNo1 = mysqli_fetch_assoc($Education5No)){
              $Jumlah1stNo = (int)$jml1stNo1['jumlah_no'];
        }
        while( $jml1stJml = mysqli_fetch_assoc($Education5Jml)){
              $Jumlah1stJml = (int)$jml1stJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes1st = $Jumlah1stYes / $Jumlah1stJml;    
        (float)$PerbandinganNo1st = $Jumlah1stNo / $Jumlah1stJml;                    
         $rumusEntropy1st = (-($PerbandinganNo1st) * log($PerbandinganNo1st,2)) + (-($PerbandinganYes1st) * log($PerbandinganYes1st,2));
         if(is_nan($rumusEntropy1st)){
            $rumusEntropy1st = 0;
         }
         $getEntropy1st = round($rumusEntropy1st,4); 
       
         $QueryInsertEntropy1st = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("1st-4th","'.$Jumlah1stJml.'","'.$Jumlah1stYes.'","'.$Jumlah1stNo.'","'.$getEntropy1st.'")') ;      
//=========================================================================================================================================
        $Education6Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "5th-6th" AND income = ">50k"');
        $Education6No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "5th-6th" AND income = "<=50k" ');
        $Education6Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "5th-6th" '); 
         while( $jml5thYes1 = mysqli_fetch_assoc($Education6Yes)){
              $Jumlah5thYes = (int)$jml5thYes1['jumlah_yes'];
        }   
        while( $jml5thNo1 = mysqli_fetch_assoc($Education6No)){
              $Jumlah5thNo = (int)$jml5thNo1['jumlah_no'];
        }
        while( $jml5thJml = mysqli_fetch_assoc($Education6Jml)){
              $Jumlah5thJml = (int)$jml5thJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes5th = $Jumlah5thYes / $Jumlah5thJml;    
        (float)$PerbandinganNo5th = $Jumlah5thNo / $Jumlah5thJml;                    
         $rumusEntropy5th = (-($PerbandinganNo5th) * log($PerbandinganNo5th,2)) + (-($PerbandinganYes5th) * log($PerbandinganYes5th,2));
         if(is_nan($rumusEntropy5th)){
            $rumusEntropy5th = 0;
         }
         $getEntropy5th = round($rumusEntropy5th,4); 
       
         $QueryInsertEntropy5th = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("5th-6th","'.$Jumlah5thJml.'","'.$Jumlah5thYes.'","'.$Jumlah5thNo.'","'.$getEntropy5th.'")') ;      
//=========================================================================================================================================
        $Education7Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "7th-8th" AND income = ">50k"');
        $Education7No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "7th-8th" AND income = "<=50k" ');
        $Education7Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "7th-8th" '); 
         while( $jml7thYes1 = mysqli_fetch_assoc($Education7Yes)){
              $Jumlah7thYes = (int)$jml7thYes1['jumlah_yes'];
        }   
        while( $jml7thNo1 = mysqli_fetch_assoc($Education7No)){
              $Jumlah7thNo = (int)$jml7thNo1['jumlah_no'];
        }
        while( $jml7thJml = mysqli_fetch_assoc($Education7Jml)){
              $Jumlah7thJml = (int)$jml7thJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes7th = $Jumlah7thYes / $Jumlah7thJml;    
        (float)$PerbandinganNo7th = $Jumlah7thNo / $Jumlah7thJml;                    
         $rumusEntropy7th = (-($PerbandinganNo7th) * log($PerbandinganNo7th,2)) + (-($PerbandinganYes7th) * log($PerbandinganYes7th,2));
         if(is_nan($rumusEntropy7th)){
            $rumusEntropy7th = 0;
         }
         $getEntropy7th = round($rumusEntropy7th,4); 
       
         $QueryInsertEntropy7th = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("7th-8th","'.$Jumlah7thJml.'","'.$Jumlah7thYes.'","'.$Jumlah7thNo.'","'.$getEntropy7th.'")') ;      
//=========================================================================================================================================
        $Education8Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Assoc-acdm" AND income = ">50k"');
        $Education8No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Assoc-acdm" AND income = "<=50k" ');
        $Education8Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Assoc-acdm" '); 
         while( $jmlAssocYes1 = mysqli_fetch_assoc($Education8Yes)){
              $JumlahAssocYes = (int)$jmlAssocYes1['jumlah_yes'];
        }   
        while( $jmlAssocNo1 = mysqli_fetch_assoc($Education8No)){
              $JumlahAssocNo = (int)$jmlAssocNo1['jumlah_no'];
        }
        while( $jmlAssocJml = mysqli_fetch_assoc($Education8Jml)){
              $JumlahAssocJml = (int)$jmlAssocJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAssoc = $JumlahAssocYes / $JumlahAssocJml;    
        (float)$PerbandinganNoAssoc = $JumlahAssocNo / $JumlahAssocJml;                    
         $rumusEntropyAssoc = (-($PerbandinganNoAssoc) * log($PerbandinganNoAssoc,2)) + (-($PerbandinganYesAssoc) * log($PerbandinganYesAssoc,2));
         if(is_nan($rumusEntropyAssoc)){
            $rumusEntropyAssoc = 0;
         }
         $getEntropyAssoc = round($rumusEntropyAssoc,4); 
       
         $QueryInsertEntropyAssoc = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Assoc-acdm","'.$JumlahAssocJml.'","'.$JumlahAssocYes.'","'.$JumlahAssocNo.'","'.$getEntropyAssoc.'")') ;      
//=========================================================================================================================================
        $Education9Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Assoc-voc" AND income = ">50k"');
        $Education9No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Assoc-voc" AND income = "<=50k" ');
        $Education9Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Assoc-voc" '); 
         while( $jmlAssocVocYes1 = mysqli_fetch_assoc($Education9Yes)){
              $JumlahAssocVocYes = (int)$jmlAssocVocYes1['jumlah_yes'];
        }   
        while( $jmlAssocVocNo1 = mysqli_fetch_assoc($Education9No)){
              $JumlahAssocVocNo = (int)$jmlAssocVocNo1['jumlah_no'];
        }
        while( $jmlAssocVocJml = mysqli_fetch_assoc($Education9Jml)){
              $JumlahAssocVocJml = (int)$jmlAssocVocJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAssocVoc = $JumlahAssocVocYes / $JumlahAssocVocJml;    
        (float)$PerbandinganNoAssocVoc = $JumlahAssocVocNo / $JumlahAssocVocJml;                    
        $rumusEntropyAssocVoc = (-($PerbandinganNoAssocVoc) * log($PerbandinganNoAssocVoc,2)) + (-($PerbandinganYesAssocVoc) * log($PerbandinganYesAssocVoc,2));
         if(is_nan($rumusEntropyAssocVoc)){
            $rumusEntropyAssocVoc = 0;
         }
         $getEntropyAssocVoc = round($rumusEntropyAssocVoc,4); 
       
         $QueryInsertEntropyAssoVoc = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Assoc-voc","'.$JumlahAssocVocJml.'","'.$JumlahAssocVocYes.'","'.$JumlahAssocVocNo.'","'.$getEntropyAssocVoc.'")') ;      
//=========================================================================================================================================
        $Education10Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Bachelors" AND income = ">50k"');
        $Education10No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Bachelors" AND income = "<=50k" ');
        $Education10Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Bachelors" '); 
         while( $jmlBachelorsYes1 = mysqli_fetch_assoc($Education10Yes)){
              $JumlahBachelorsYes = (int)$jmlBachelorsYes1['jumlah_yes'];
        }   
        while( $jmlBachelorsNo1 = mysqli_fetch_assoc($Education10No)){
              $JumlahBachelorsNo = (int)$jmlBachelorsNo1['jumlah_no'];
        }
        while( $jmlBachelorsJml = mysqli_fetch_assoc($Education10Jml)){
              $JumlahBachelorsJml = (int)$jmlBachelorsJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesBachelors = $JumlahBachelorsYes / $JumlahBachelorsJml;    
        (float)$PerbandinganNoBachelors = $JumlahBachelorsNo / $JumlahBachelorsJml;                    
         $rumusEntropyBachelors = (-($PerbandinganNoBachelors) * log($PerbandinganNoBachelors,2)) + (-($PerbandinganYesBachelors) * log($PerbandinganYesBachelors,2));
         if(is_nan($rumusEntropyBachelors)){
            $rumusEntropyBachelors = 0;
         }
         $getEntropyBachelors = round($rumusEntropyBachelors,4); 
       
         $QueryInsertEntropBachelors = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Bachelors","'.$JumlahBachelorsJml.'","'.$JumlahBachelorsYes.'","'.$JumlahBachelorsNo.'","'.$getEntropyBachelors.'")') ;      
//=========================================================================================================================================
        $Education11Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Doctorate" AND income = ">50k"');
        $Education11No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Doctorate" AND income = "<=50k" ');
        $Education11Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Doctorate" '); 
         while( $jmlDoctorateYes1 = mysqli_fetch_assoc($Education11Yes)){
              $JumlahDoctorateYes = (int)$jmlDoctorateYes1['jumlah_yes'];
        }   
        while( $jmlDoctorateNo1 = mysqli_fetch_assoc($Education11No)){
              $JumlahDoctorateNo = (int)$jmlDoctorateNo1['jumlah_no'];
        }
        while( $jmlDoctorateJml = mysqli_fetch_assoc($Education11Jml)){
              $JumlahDoctorateJml = (int)$jmlDoctorateJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesDoctorate = $JumlahDoctorateYes / $JumlahDoctorateJml;    
        (float)$PerbandinganNoDoctorate = $JumlahDoctorateNo / $JumlahDoctorateJml;                    
         $rumusEntropyDoctorate = (-($PerbandinganNoDoctorate) * log($PerbandinganNoDoctorate,2)) + (-($PerbandinganYesDoctorate) * log($PerbandinganYesDoctorate,2));
         if(is_nan($rumusEntropyDoctorate)){
            $rumusEntropyDoctorate = 0;
         }
         $getEntropyDoctorate = round($rumusEntropyDoctorate,4); 
       
         $QueryInsertEntropyDoctorate = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Doctorate","'.$JumlahDoctorateJml.'","'.$JumlahDoctorateYes.'","'.$JumlahDoctorateNo.'","'.$getEntropyDoctorate.'")') ;      
//=========================================================================================================================================
        $Education12Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "HS-grad" AND income = ">50k"');
        $Education12No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "HS-grad" AND income = "<=50k" ');
        $Education12Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "HS-grad" '); 
         while( $jmlHSGradYes1 = mysqli_fetch_assoc($Education12Yes)){
              $JumlahHSGradYes = (int)$jmlHSGradYes1['jumlah_yes'];
        }   
        while( $jmlHSGradNo1 = mysqli_fetch_assoc($Education12No)){
              $JumlahHSGradNo = (int)$jmlHSGradNo1['jumlah_no'];
        }
        while( $jmlHSGradJml = mysqli_fetch_assoc($Education12Jml)){
              $JumlahHSGradJml = (int)$jmlHSGradJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHSGrad = $JumlahHSGradYes / $JumlahHSGradJml;    
        (float)$PerbandinganNoHSGrad = $JumlahHSGradNo / $JumlahHSGradJml;                    
         $rumusEntropyHSGrad = (-($PerbandinganNoHSGrad) * log($PerbandinganNoHSGrad,2)) + (-($PerbandinganYesHSGrad) * log($PerbandinganYesHSGrad,2));
         if(is_nan($rumusEntropyHSGrad)){
            $rumusEntropyHSGrad = 0;
         }
         $getEntropyHSGrad = round($rumusEntropyHSGrad,4); 
       
         $QueryInsertEntropyHSGrad = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("HS-grad","'.$JumlahHSGradJml.'","'.$JumlahHSGradYes.'","'.$JumlahHSGradNo.'","'.$getEntropyHSGrad.'")') ;      
//=========================================================================================================================================
        $Education13Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Masters" AND income = ">50k"');
        $Education13No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Masters" AND income = "<=50k" ');
        $Education13NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Masters" '); 
         while( $jmlMastersYes1 = mysqli_fetch_assoc($Education13Yes)){
              $JumlahMastersYes = (int)$jmlMastersYes1['jumlah_yes'];
        }   
        while( $jmlMastersNo1 = mysqli_fetch_assoc($Education13No)){
              $JumlahMastersNo = (int)$jmlMastersNo1['jumlah_no'];
        }
        while( $jmlMastersJml = mysqli_fetch_assoc($Education13NoJml)){
              $JumlahMastersJml = (int)$jmlMastersJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMasters = $JumlahMastersYes / $JumlahMastersJml;    
        (float)$PerbandinganNoMasters = $JumlahMastersNo / $JumlahMastersJml;                    
         $rumusEntropyMasters = (-($PerbandinganNoMasters) * log($PerbandinganNoMasters,2)) + (-($PerbandinganYesMasters) * log($PerbandinganYesMasters,2));
         if(is_nan($rumusEntropyMasters)){
            $rumusEntropyMasters = 0;
         }
         $getEntropyMasters = round($rumusEntropyMasters,4); 
       
         $QueryInsertEntropyMasters = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Masters","'.$JumlahMastersJml.'","'.$JumlahMastersYes.'","'.$JumlahMastersNo.'","'.$getEntropyMasters.'")') ;      
//=========================================================================================================================================      
        $Education14Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Preschool" AND income = ">50k"');
        $Education14No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Preschool" AND income = "<=50k" ');
        $Education14NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Preschool" '); 
         while( $jmlPreschoolYes1 = mysqli_fetch_assoc($Education14Yes)){
              $JumlahPreschoolYes = (int)$jmlPreschoolYes1['jumlah_yes'];
        }   
        while( $jmlPreschoolNo1 = mysqli_fetch_assoc($Education14No)){
              $JumlahPreschoolNo = (int)$jmlPreschoolNo1['jumlah_no'];
        }
        while( $jmlPreschoolJml = mysqli_fetch_assoc($Education14NoJml)){
              $JumlahPreschoolJml = (int)$jmlPreschoolJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesPreschool = $JumlahPreschoolYes / $JumlahPreschoolJml;    
        (float)$PerbandinganNoPreschool = $JumlahPreschoolNo / $JumlahPreschoolJml;                    
         $rumusEntropyPreschool = (-($PerbandinganNoPreschool) * log($PerbandinganNoPreschool,2)) + (-($PerbandinganYesPreschool) * log($PerbandinganYesPreschool,2));
         if(is_nan($rumusEntropyPreschool)){
            $rumusEntropyPreschool = 0;
         }
         $getEntropyPreschool = round($rumusEntropyPreschool,4); 
       
         $QueryInsertEntropyPreschool = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Preschool","'.$JumlahPreschoolJml.'","'.$JumlahPreschoolYes.'","'.$JumlahPreschoolNo.'","'.$getEntropyPreschool.'")') ;      
//=========================================================================================================================================    
        $Education15Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Prof-school" AND income = ">50k"');
        $Education15No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Prof-school" AND income = "<=50k" ');
        $Education15NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Prof-school" '); 
         while( $jmlProfschoolYes1 = mysqli_fetch_assoc($Education15Yes)){
              $JumlahProfschoolYes = (int)$jmlProfschoolYes1['jumlah_yes'];
        }   
        while( $jmlProfschoolNo1 = mysqli_fetch_assoc($Education15No)){
              $JumlahProfschoolNo = (int)$jmlProfschoolNo1['jumlah_no'];
        }
        while( $jmlProfschoolJml = mysqli_fetch_assoc($Education15NoJml)){
              $JumlahProfschoolJml = (int)$jmlProfschoolJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProfschool = $JumlahProfschoolYes / $JumlahProfschoolJml;    
        (float)$PerbandinganNoProfschool = $JumlahProfschoolNo / $JumlahProfschoolJml;                    
        $rumusEntropyProfschool = (-($PerbandinganNoProfschool) * log($PerbandinganNoProfschool,2)) + (-($PerbandinganYesProfschool) * log($PerbandinganYesProfschool,2));
         if(is_nan($rumusEntropyProfschool)){
            $rumusEntropyProfschool = 0;
         }
         $getEntropyProfschool = round($rumusEntropyProfschool,4); 
       
         $QueryInsertEntropyProfschool = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Prof-school","'.$JumlahProfschoolJml.'","'.$JumlahProfschoolYes.'","'.$JumlahProfschoolNo.'","'.$getEntropyProfschool.'")') ;      
//=========================================================================================================================================    
        $Education16Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Some-college" AND income = ">50k"');
        $Education16No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Some-college" AND income = "<=50k" ');
        $Education16NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Some-college" '); 
         while( $jmlSomecollegeYes1 = mysqli_fetch_assoc($Education16Yes)){
              $JumlahSomecollegeYes = (int)$jmlSomecollegeYes1['jumlah_yes'];
        }   
        while( $jmlSomecollegeNo1 = mysqli_fetch_assoc($Education16No)){
              $JumlahSomecollegeNo = (int)$jmlSomecollegeNo1['jumlah_no'];
        }
        while( $jmlSomecollegeJml = mysqli_fetch_assoc($Education16NoJml)){
              $JumlahSomecollegeJml = (int)$jmlSomecollegeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSomecollege = $JumlahSomecollegeYes / $JumlahSomecollegeJml;    
        (float)$PerbandinganNoSomecollege = $JumlahSomecollegeNo / $JumlahSomecollegeJml;                    
        $rumusEntropySomecollege = (-($PerbandinganNoSomecollege) * log($PerbandinganNoSomecollege,2)) + (-($PerbandinganYesSomecollege) * log($PerbandinganYesSomecollege,2));
         if(is_nan($rumusEntropySomecollege)){
            $rumusEntropySomecollege = 0;
         }
         $getEntropySomecollege = round($rumusEntropySomecollege,4); 
       
         $QueryInsertEntropySomecollege = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Some-college","'.$JumlahSomecollegeJml.'","'.$JumlahSomecollegeYes.'","'.$JumlahSomecollegeNo.'","'.$getEntropySomecollege.'")') ;      
//=========================================================================================================================================   
        $th9 = ($Jumlah9Jml / $JumlahKss) * $getEntropy9;        
        $th10 = ($Jumlah13Jml / $JumlahKss) * $getEntropy13;
        $th11 = ($Jumlah11Jml / $JumlahKss) * $getEntropy11;
        $th12 = ($Jumlah12Jml / $JumlahKss) * $getEntropy12;
        $st1 = ($Jumlah1stJml / $JumlahKss) * $getEntropy1st;
        $th5 = ($Jumlah5thJml / $JumlahKss) * $getEntropy5th;
        $th7 = ($Jumlah7thJml / $JumlahKss) * $getEntropy7th;
        $Assoc = ($JumlahAssocJml / $JumlahKss) * $getEntropyAssoc;
        $AssocVoc = ($JumlahAssocVocJml / $JumlahKss) * $getEntropyAssocVoc;
        $Bachelors = ($JumlahBachelorsJml / $JumlahKss) * $getEntropyBachelors;
        $HSGrad = ($JumlahHSGradJml / $JumlahKss) * $getEntropyHSGrad;
        $Masters = ($JumlahMastersJml / $JumlahKss) * $getEntropyMasters;
        $Preschool = ($JumlahPreschoolJml / $JumlahKss) * $getEntropyPreschool;
        $Profschool = ($JumlahProfschoolJml / $JumlahKss) * $getEntropyProfschool;
        $Somecollege = ($JumlahSomecollegeJml / $JumlahKss) * $getEntropySomecollege;

        (float)$GainTotalEducation = $getEntropy - $th9 + $th10 + $th11 + $th12 + $st1 + $th5 + $th7 + $Assoc + $AssocVoc + $Bachelors + $HSGrad + $Masters + $Preschool + $Profschool + $Somecollege;
       
        $getGainTotalEducation = round($GainTotalEducation,4);
        $InsertGainTotalEducation = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalEducation.' WHERE ATRIBUT = "Education" ');

//=========================================================================================================================================  
       $EdNum1Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "1" AND income = ">50k"');
        $EdNum1No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "1" AND income = "<=50k" ');
        $EdNum1NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "1" '); 
         while( $jmlNum1Yes1 = mysqli_fetch_assoc($EdNum1Yes)){
              $JumlahNum1Yes = (int)$jmlNum1Yes1['jumlah_yes'];
        }   
        while( $jmlNum1No1 = mysqli_fetch_assoc($EdNum1No)){
              $JumlahNum1No = (int)$jmlNum1No1['jumlah_no'];
        }
        while( $jmlNum1Jml = mysqli_fetch_assoc($EdNum1NoJml)){
              $JumlahNum1Jml = (int)$jmlNum1Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum1 = $JumlahNum1Yes / $JumlahNum1Jml;    
        (float)$PerbandinganNoNum1 = $JumlahNum1No / $JumlahNum1Jml;                    
        $rumusEntropyNum1 = (-($PerbandinganNoNum1) * log($PerbandinganNoNum1,2)) + (-($PerbandinganYesNum1) * log($PerbandinganYesNum1,2));
         if(is_nan($rumusEntropyNum1)){
            $rumusEntropyNum1 = 0;
         }
         $getEntropyNum1 = round($rumusEntropyNum1,4); 
        $QueryInsertEntropyEducationNum = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("education_num")');
         $QueryInsertEntropyNum1 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("1","'.$JumlahNum1Jml.'","'.$JumlahNum1Yes.'","'.$JumlahNum1No.'","'.$getEntropyNum1.'")') ;      
//=========================================================================================================================================   
        $EdNum2Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "2" AND income = ">50k"');
        $EdNum2No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "2" AND income = "<=50k" ');
        $EdNum2NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "2" '); 
         while( $jmlNum2Yes1 = mysqli_fetch_assoc($EdNum2Yes)){
              $JumlahNum2Yes = (int)$jmlNum2Yes1['jumlah_yes'];
        }   
        while( $jmlNum2No1 = mysqli_fetch_assoc($EdNum2No)){
              $JumlahNum2No = (int)$jmlNum2No1['jumlah_no'];
        }
        while( $jmlNum2Jml = mysqli_fetch_assoc($EdNum2NoJml)){
              $JumlahNum2Jml = (int)$jmlNum2Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum2 = $JumlahNum2Yes / $JumlahNum2Jml;    
        (float)$PerbandinganNoNum2 = $JumlahNum2No / $JumlahNum2Jml;                    
        $rumusEntropyNum2 = (-($PerbandinganNoNum2) * log($PerbandinganNoNum2,2)) + (-($PerbandinganYesNum2) * log($PerbandinganYesNum2,2));
         if(is_nan($rumusEntropyNum2)){
            $rumusEntropyNum2 = 0;
         }
         $getEntropyNum2 = round($rumusEntropyNum2,4); 
        
         $QueryInsertEntropyNum2 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("2","'.$JumlahNum2Jml.'","'.$JumlahNum2Yes.'","'.$JumlahNum2No.'","'.$getEntropyNum2.'")') ;      
//========================================================================================================================================= 
        $EdNum3Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "3" AND income = ">50k"');
        $EdNum3No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "3" AND income = "<=50k" ');
        $EdNum3NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "3" '); 
         while( $jmlNum3Yes1 = mysqli_fetch_assoc($EdNum3Yes)){
              $JumlahNum3Yes = (int)$jmlNum3Yes1['jumlah_yes'];
        }   
        while( $jmlNum3No1 = mysqli_fetch_assoc($EdNum3No)){
              $JumlahNum3No = (int)$jmlNum3No1['jumlah_no'];
        }
        while( $jmlNum3Jml = mysqli_fetch_assoc($EdNum3NoJml)){
              $JumlahNum3Jml = (int)$jmlNum3Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum3 = $JumlahNum3Yes / $JumlahNum3Jml;    
        (float)$PerbandinganNoNum3 = $JumlahNum3No / $JumlahNum3Jml;                    
        $rumusEntropyNum3 = (-($PerbandinganNoNum3) * log($PerbandinganNoNum3,2)) + (-($PerbandinganYesNum3) * log($PerbandinganYesNum3,2));
         if(is_nan($rumusEntropyNum3)){
            $rumusEntropyNum3 = 0;
         }
         $getEntropyNum3 = round($rumusEntropyNum3,4); 
        
         $QueryInsertEntropyNum3 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("3","'.$JumlahNum3Jml.'","'.$JumlahNum3Yes.'","'.$JumlahNum3No.'","'.$getEntropyNum3.'")') ;      
//=========================================================================================================================================
        $EdNum4Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "4" AND income = ">50k"');
        $EdNum4No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "4" AND income = "<=50k" ');
        $EdNum4NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "4" '); 
         while( $jmlNum4Yes1 = mysqli_fetch_assoc($EdNum4Yes)){
              $JumlahNum4Yes = (int)$jmlNum4Yes1['jumlah_yes'];
        }   
        while( $jmlNum4No1 = mysqli_fetch_assoc($EdNum4No)){
              $JumlahNum4No = (int)$jmlNum4No1['jumlah_no'];
        }
        while( $jmlNum4Jml = mysqli_fetch_assoc($EdNum4NoJml)){
              $JumlahNum4Jml = (int)$jmlNum4Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum4 = $JumlahNum4Yes / $JumlahNum4Jml;    
        (float)$PerbandinganNoNum4 = $JumlahNum4No / $JumlahNum4Jml;                    
        $rumusEntropyNum4 = (-($PerbandinganNoNum4) * log($PerbandinganNoNum4,2)) + (-($PerbandinganYesNum4) * log($PerbandinganYesNum4,2));
         if(is_nan($rumusEntropyNum4)){
            $rumusEntropyNum4 = 0;
         }
         $getEntropyNum4 = round($rumusEntropyNum4,4); 
        
         $QueryInsertEntropyNum4 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("4","'.$JumlahNum4Jml.'","'.$JumlahNum4Yes.'","'.$JumlahNum4No.'","'.$getEntropyNum4.'")') ;      
//=========================================================================================================================================
        $EdNum5Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "5" AND income = ">50k"');
        $EdNum5No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "5" AND income = "<=50k" ');
        $EdNum5NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "5" '); 
         while( $jmlNum5Yes1 = mysqli_fetch_assoc($EdNum5Yes)){
              $JumlahNum5Yes = (int)$jmlNum5Yes1['jumlah_yes'];
        }   
        while( $jmlNum5No1 = mysqli_fetch_assoc($EdNum5No)){
              $JumlahNum5No = (int)$jmlNum5No1['jumlah_no'];
        }
        while( $jmlNum5Jml = mysqli_fetch_assoc($EdNum5NoJml)){
              $JumlahNum5Jml = (int)$jmlNum5Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum5 = $JumlahNum5Yes / $JumlahNum5Jml;    
        (float)$PerbandinganNoNum5 = $JumlahNum5No / $JumlahNum5Jml;                    
        $rumusEntropyNum5 = (-($PerbandinganNoNum5) * log($PerbandinganNoNum5,2)) + (-($PerbandinganYesNum5) * log($PerbandinganYesNum5,2));
         if(is_nan($rumusEntropyNum5)){
            $rumusEntropyNum5 = 0;
         }
         $getEntropyNum5 = round($rumusEntropyNum5,4); 
        
         $QueryInsertEntropyNum5 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("5","'.$JumlahNum5Jml.'","'.$JumlahNum5Yes.'","'.$JumlahNum5No.'","'.$getEntropyNum5.'")') ;      
//=========================================================================================================================================
        $EdNum6Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "6" AND income = ">50k"');
        $EdNum6No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "6" AND income = "<=50k" ');
        $EdNum6NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "6" '); 
         while( $jmlNum6Yes1 = mysqli_fetch_assoc($EdNum6Yes)){
              $JumlahNum6Yes = (int)$jmlNum6Yes1['jumlah_yes'];
        }   
        while( $jmlNum6No1 = mysqli_fetch_assoc($EdNum6No)){
              $JumlahNum6No = (int)$jmlNum6No1['jumlah_no'];
        }
        while( $jmlNum6Jml = mysqli_fetch_assoc($EdNum6NoJml)){
              $JumlahNum6Jml = (int)$jmlNum6Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum6 = $JumlahNum6Yes / $JumlahNum6Jml;    
        (float)$PerbandinganNoNum6 = $JumlahNum6No / $JumlahNum6Jml;                    
        $rumusEntropyNum6 = (-($PerbandinganNoNum6) * log($PerbandinganNoNum6,2)) + (-($PerbandinganYesNum6) * log($PerbandinganYesNum6,2));
         if(is_nan($rumusEntropyNum6)){
            $rumusEntropyNum6 = 0;
         }
         $getEntropyNum6 = round($rumusEntropyNum6,4); 
        
         $QueryInsertEntropyNum6 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("6","'.$JumlahNum6Jml.'","'.$JumlahNum6Yes.'","'.$JumlahNum6No.'","'.$getEntropyNum6.'")') ;      
//=========================================================================================================================================
        $EdNum7Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "7" AND income = ">50k"');
        $EdNum7No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "7" AND income = "<=50k" ');
        $EdNum7NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "7" '); 
         while( $jmlNum7Yes1 = mysqli_fetch_assoc($EdNum7Yes)){
              $JumlahNum7Yes = (int)$jmlNum7Yes1['jumlah_yes'];
        }   
        while( $jmlNum7No1 = mysqli_fetch_assoc($EdNum7No)){
              $JumlahNum7No = (int)$jmlNum7No1['jumlah_no'];
        }
        while( $jmlNum7Jml = mysqli_fetch_assoc($EdNum7NoJml)){
              $JumlahNum7Jml = (int)$jmlNum7Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum7 = $JumlahNum7Yes / $JumlahNum7Jml;    
        (float)$PerbandinganNoNum7 = $JumlahNum7No / $JumlahNum7Jml;                    
        $rumusEntropyNum7 = (-($PerbandinganNoNum7) * log($PerbandinganNoNum7,2)) + (-($PerbandinganYesNum7) * log($PerbandinganYesNum7,2));
         if(is_nan($rumusEntropyNum7)){
            $rumusEntropyNum7 = 0;
         }
         $getEntropyNum7 = round($rumusEntropyNum7,4); 
        
         $QueryInsertEntropyNum7 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("7","'.$JumlahNum7Jml.'","'.$JumlahNum7Yes.'","'.$JumlahNum7No.'","'.$getEntropyNum7.'")') ;      
//=========================================================================================================================================
        $EdNum8Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "8" AND income = ">50k"');
        $EdNum8No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "8" AND income = "<=50k" ');
        $EdNum8NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "8" '); 
         while( $jmlNum8Yes1 = mysqli_fetch_assoc($EdNum8Yes)){
              $JumlahNum8Yes = (int)$jmlNum8Yes1['jumlah_yes'];
        }   
        while( $jmlNum8No1 = mysqli_fetch_assoc($EdNum8No)){
              $JumlahNum8No = (int)$jmlNum8No1['jumlah_no'];
        }
        while( $jmlNum8Jml = mysqli_fetch_assoc($EdNum8NoJml)){
              $JumlahNum8Jml = (int)$jmlNum8Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum8 = $JumlahNum8Yes / $JumlahNum8Jml;    
        (float)$PerbandinganNoNum8 = $JumlahNum8No / $JumlahNum8Jml;                    
        $rumusEntropyNum8 = (-($PerbandinganNoNum8) * log($PerbandinganNoNum8,2)) + (-($PerbandinganYesNum8) * log($PerbandinganYesNum8,2));
         if(is_nan($rumusEntropyNum8)){
            $rumusEntropyNum8 = 0;
         }
         $getEntropyNum8 = round($rumusEntropyNum8,4); 
        
         $QueryInsertEntropyNum8 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("8","'.$JumlahNum8Jml.'","'.$JumlahNum8Yes.'","'.$JumlahNum8No.'","'.$getEntropyNum8.'")') ;      
//=========================================================================================================================================
        $EdNum9Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "9" AND income = ">50k"');
        $EdNum9No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "9" AND income = "<=50k" ');
        $EdNum9NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "9" '); 
         while( $jmlNum9Yes1 = mysqli_fetch_assoc($EdNum9Yes)){
              $JumlahNum9Yes = (int)$jmlNum9Yes1['jumlah_yes'];
        }   
        while( $jmlNum9No1 = mysqli_fetch_assoc($EdNum9No)){
              $JumlahNum9No = (int)$jmlNum9No1['jumlah_no'];
        }
        while( $jmlNum9Jml = mysqli_fetch_assoc($EdNum9NoJml)){
              $JumlahNum9Jml = (int)$jmlNum9Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum9 = $JumlahNum9Yes / $JumlahNum9Jml;    
        (float)$PerbandinganNoNum9 = $JumlahNum9No / $JumlahNum9Jml;                    
        $rumusEntropyNum9 = (-($PerbandinganNoNum9) * log($PerbandinganNoNum9,2)) + (-($PerbandinganYesNum9) * log($PerbandinganYesNum9,2));
         if(is_nan($rumusEntropyNum9)){
            $rumusEntropyNum9 = 0;
         }
         $getEntropyNum9 = round($rumusEntropyNum9,4); 
        
         $QueryInsertEntropyNum9 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("9","'.$JumlahNum9Jml.'","'.$JumlahNum9Yes.'","'.$JumlahNum9No.'","'.$getEntropyNum9.'")') ;      
//=========================================================================================================================================
        $EdNum10Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "10" AND income = ">50k"');
        $EdNum10No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "10" AND income = "<=50k" ');
        $EdNum10NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "10" '); 
         while( $jmlNum10Yes1 = mysqli_fetch_assoc($EdNum10Yes)){
              $JumlahNum10Yes = (int)$jmlNum10Yes1['jumlah_yes'];
        }   
        while( $jmlNum10No1 = mysqli_fetch_assoc($EdNum10No)){
              $JumlahNum10No = (int)$jmlNum10No1['jumlah_no'];
        }
        while( $jmlNum10Jml = mysqli_fetch_assoc($EdNum10NoJml)){
              $JumlahNum10Jml = (int)$jmlNum10Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum10 = $JumlahNum10Yes / $JumlahNum10Jml;    
        (float)$PerbandinganNoNum10 = $JumlahNum10No / $JumlahNum10Jml;                    
        $rumusEntropyNum10 = (-($PerbandinganNoNum10) * log($PerbandinganNoNum10,2)) + (-($PerbandinganYesNum10) * log($PerbandinganYesNum10,2));
         if(is_nan($rumusEntropyNum10)){
            $rumusEntropyNum10 = 0;
         }
         $getEntropyNum10 = round($rumusEntropyNum10,4); 
        
         $QueryInsertEntropyNum10 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("10","'.$JumlahNum10Jml.'","'.$JumlahNum10Yes.'","'.$JumlahNum10No.'","'.$getEntropyNum10.'")') ;      
//=========================================================================================================================================
        $EdNum11Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "11" AND income = ">50k"');
        $EdNum11No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "11" AND income = "<=50k" ');
        $EdNum11NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "11" '); 
         while( $jmlNum11Yes1 = mysqli_fetch_assoc($EdNum11Yes)){
              $JumlahNum11Yes = (int)$jmlNum11Yes1['jumlah_yes'];
        }   
        while( $jmlNum11No1 = mysqli_fetch_assoc($EdNum11No)){
              $JumlahNum11No = (int)$jmlNum11No1['jumlah_no'];
        }
        while( $jmlNum11Jml = mysqli_fetch_assoc($EdNum11NoJml)){
              $JumlahNum11Jml = (int)$jmlNum11Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum11 = $JumlahNum11Yes / $JumlahNum11Jml;    
        (float)$PerbandinganNoNum11 = $JumlahNum11No / $JumlahNum11Jml;                    
        $rumusEntropyNum11 = (-($PerbandinganNoNum11) * log($PerbandinganNoNum11,2)) + (-($PerbandinganYesNum11) * log($PerbandinganYesNum11,2));
         if(is_nan($rumusEntropyNum11)){
            $rumusEntropyNum11 = 0;
         }
         $getEntropyNum11 = round($rumusEntropyNum11,4); 
        
         $QueryInsertEntropyNum11 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("11","'.$JumlahNum11Jml.'","'.$JumlahNum11Yes.'","'.$JumlahNum11No.'","'.$getEntropyNum11.'")') ;      
//=========================================================================================================================================
        $EdNum12Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "12" AND income = ">50k"');
        $EdNum12No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "12" AND income = "<=50k" ');
        $EdNum12NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "12" '); 
         while( $jmlNum12Yes1 = mysqli_fetch_assoc($EdNum12Yes)){
              $JumlahNum12Yes = (int)$jmlNum12Yes1['jumlah_yes'];
        }   
        while( $jmlNum12No1 = mysqli_fetch_assoc($EdNum12No)){
              $JumlahNum12No = (int)$jmlNum12No1['jumlah_no'];
        }
        while( $jmlNum12Jml = mysqli_fetch_assoc($EdNum12NoJml)){
              $JumlahNum12Jml = (int)$jmlNum12Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum12 = $JumlahNum12Yes / $JumlahNum12Jml;    
        (float)$PerbandinganNoNum12 = $JumlahNum12No / $JumlahNum12Jml;                    
        $rumusEntropyNum12 = (-($PerbandinganNoNum12) * log($PerbandinganNoNum12,2)) + (-($PerbandinganYesNum12) * log($PerbandinganYesNum12,2));
         if(is_nan($rumusEntropyNum12)){
            $rumusEntropyNum12 = 0;
         }
         $getEntropyNum12 = round($rumusEntropyNum12,4); 
        
         $QueryInsertEntropyNum12 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("12","'.$JumlahNum12Jml.'","'.$JumlahNum12Yes.'","'.$JumlahNum12No.'","'.$getEntropyNum12.'")') ;      
//=========================================================================================================================================
        $EdNum13Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "13" AND income = ">50k"');
        $EdNum13No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "13" AND income = "<=50k" ');
        $EdNum13NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "13" '); 
         while( $jmlNum13Yes1 = mysqli_fetch_assoc($EdNum13Yes)){
              $JumlahNum13Yes = (int)$jmlNum13Yes1['jumlah_yes'];
        }   
        while( $jmlNum13No1 = mysqli_fetch_assoc($EdNum13No)){
              $JumlahNum13No = (int)$jmlNum13No1['jumlah_no'];
        }
        while( $jmlNum13Jml = mysqli_fetch_assoc($EdNum13NoJml)){
              $JumlahNum13Jml = (int)$jmlNum13Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum13 = $JumlahNum13Yes / $JumlahNum13Jml;    
        (float)$PerbandinganNoNum13 = $JumlahNum13No / $JumlahNum13Jml;                    
        $rumusEntropyNum13 = (-($PerbandinganNoNum13) * log($PerbandinganNoNum13,2)) + (-($PerbandinganYesNum13) * log($PerbandinganYesNum13,2));
         if(is_nan($rumusEntropyNum13)){
            $rumusEntropyNum13 = 0;
         }
         $getEntropyNum13 = round($rumusEntropyNum13,4); 
        
         $QueryInsertEntropyNum13 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("13","'.$JumlahNum13Jml.'","'.$JumlahNum13Yes.'","'.$JumlahNum13No.'","'.$getEntropyNum13.'")') ;      
//=========================================================================================================================================
        $EdNum14Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "14" AND income = ">50k"');
        $EdNum14No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "14" AND income = "<=50k" ');
        $EdNum14NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "14" '); 
         while( $jmlNum14Yes1 = mysqli_fetch_assoc($EdNum14Yes)){
              $JumlahNum14Yes = (int)$jmlNum14Yes1['jumlah_yes'];
        }   
        while( $jmlNum14No1 = mysqli_fetch_assoc($EdNum14No)){
              $JumlahNum14No = (int)$jmlNum14No1['jumlah_no'];
        }
        while( $jmlNum14Jml = mysqli_fetch_assoc($EdNum14NoJml)){
              $JumlahNum14Jml = (int)$jmlNum14Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum14 = $JumlahNum14Yes / $JumlahNum14Jml;    
        (float)$PerbandinganNoNum14 = $JumlahNum14No / $JumlahNum14Jml;                    
        $rumusEntropyNum14 = (-($PerbandinganNoNum14) * log($PerbandinganNoNum14,2)) + (-($PerbandinganYesNum14) * log($PerbandinganYesNum14,2));
         if(is_nan($rumusEntropyNum14)){
            $rumusEntropyNum14 = 0;
         }
         $getEntropyNum14 = round($rumusEntropyNum14,4); 
        
         $QueryInsertEntropyNum14 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("14","'.$JumlahNum14Jml.'","'.$JumlahNum14Yes.'","'.$JumlahNum14No.'","'.$getEntropyNum14.'")') ;      
//=========================================================================================================================================
        $EdNum15Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "15" AND income = ">50k"');
        $EdNum15No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "15" AND income = "<=50k" ');
        $EdNum15NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "15" '); 
         while( $jmlNum15Yes1 = mysqli_fetch_assoc($EdNum15Yes)){
              $JumlahNum15Yes = (int)$jmlNum15Yes1['jumlah_yes'];
        }   
        while( $jmlNum15No1 = mysqli_fetch_assoc($EdNum15No)){
              $JumlahNum15No = (int)$jmlNum15No1['jumlah_no'];
        }
        while( $jmlNum15Jml = mysqli_fetch_assoc($EdNum15NoJml)){
              $JumlahNum15Jml = (int)$jmlNum15Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum15 = $JumlahNum15Yes / $JumlahNum15Jml;    
        (float)$PerbandinganNoNum15 = $JumlahNum15No / $JumlahNum15Jml;                    
        $rumusEntropyNum15 = (-($PerbandinganNoNum15) * log($PerbandinganNoNum15,2)) + (-($PerbandinganYesNum15) * log($PerbandinganYesNum15,2));
         if(is_nan($rumusEntropyNum15)){
            $rumusEntropyNum15 = 0;
         }
         $getEntropyNum15 = round($rumusEntropyNum15,4); 
        
         $QueryInsertEntropyNum15 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("15","'.$JumlahNum15Jml.'","'.$JumlahNum15Yes.'","'.$JumlahNum15No.'","'.$getEntropyNum15.'")') ;      
//=========================================================================================================================================
        $EdNum16Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "16" AND income = ">50k"');
        $EdNum16No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "16" AND income = "<=50k" ');
        $EdNum16NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "16" '); 
         while( $jmlNum16Yes1 = mysqli_fetch_assoc($EdNum16Yes)){
              $JumlahNum16Yes = (int)$jmlNum16Yes1['jumlah_yes'];
        }   
        while( $jmlNum16No1 = mysqli_fetch_assoc($EdNum16No)){
              $JumlahNum16No = (int)$jmlNum16No1['jumlah_no'];
        }
        while( $jmlNum16Jml = mysqli_fetch_assoc($EdNum16NoJml)){
              $JumlahNum16Jml = (int)$jmlNum16Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum16 = $JumlahNum16Yes / $JumlahNum16Jml;    
        (float)$PerbandinganNoNum16 = $JumlahNum16No / $JumlahNum16Jml;                    
        $rumusEntropyNum16 = (-($PerbandinganNoNum16) * log($PerbandinganNoNum16,2)) + (-($PerbandinganYesNum16) * log($PerbandinganYesNum16,2));
         if(is_nan($rumusEntropyNum16)){
            $rumusEntropyNum16 = 0;
         }
         $getEntropyNum16 = round($rumusEntropyNum16,4); 
        
         $QueryInsertEntropyNum16 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("16","'.$JumlahNum16Jml.'","'.$JumlahNum16Yes.'","'.$JumlahNum16No.'","'.$getEntropyNum16.'")') ;      
//=========================================================================================================================================
           $Num1 = ($JumlahNum1Jml / $JumlahKss) * $getEntropyNum1;        
        $Num2 = ($JumlahNum2Jml / $JumlahKss) * $getEntropyNum2;
        $Num3 = ($JumlahNum3Jml / $JumlahKss) * $getEntropyNum3;
        $Num4 = ($JumlahNum4Jml / $JumlahKss) * $getEntropyNum4;
        $Num5 = ($JumlahNum5Jml / $JumlahKss) * $getEntropyNum5;
        $Num6 = ($JumlahNum6Jml / $JumlahKss) * $getEntropyNum6;
        $Num7 = ($JumlahNum7Jml / $JumlahKss) * $getEntropyNum7;
        $Num8 = ($JumlahNum8Jml / $JumlahKss) * $getEntropyNum8;
        $Num9 = ($JumlahNum9Jml / $JumlahKss) * $getEntropyNum9;
        $Num10 =($JumlahNum10Jml / $JumlahKss) * $getEntropyNum10;
        $Num11 =($JumlahNum11Jml / $JumlahKss) * $getEntropyNum11;
        $Num12 =($JumlahNum12Jml / $JumlahKss) * $getEntropyNum12;
        $Num13 =($JumlahNum13Jml / $JumlahKss) * $getEntropyNum13;
        $Num14 =($JumlahNum14Jml / $JumlahKss) * $getEntropyNum14;
        $Num15 =($JumlahNum15Jml / $JumlahKss) * $getEntropyNum15;
        $Num16 =($JumlahNum16Jml / $JumlahKss) * $getEntropyNum16;
        (float)$GainTotalEdNum = $getEntropy - $Num1 + $Num2 + $Num3 + $Num4 + $Num5 + $Num6 + $Num7 + $Num8 + $Num9 + $Num10 + $Num11 + $Num12 + $Num13 + $Num14 + $Num15 + $Num16;
       
        $getGainTotalEdNum = round($GainTotalEdNum,4);
        $InsertGainTotalEdNum = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalEdNum.' WHERE ATRIBUT = "education_num" ');
//=========================================================================================================================================
        $MSDivorcedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Divorced" AND income = ">50k"');
        $MSDivorcedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Divorced" AND income = "<=50k" ');
        $MSDivorcedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Divorced" '); 
         while( $jmlDivorcedYes1 = mysqli_fetch_assoc($MSDivorcedYes)){
              $JumlahDivorcedYes = (int)$jmlDivorcedYes1['jumlah_yes'];
        }   
        while( $jmlDivorcedNo1 = mysqli_fetch_assoc($MSDivorcedNo)){
              $JumlahDivorcedNo = (int)$jmlDivorcedNo1['jumlah_no'];
        }
        while( $jmlDivorcedJml = mysqli_fetch_assoc($MSDivorcedJml)){
              $JumlahDivorcedJml = (int)$jmlDivorcedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesDivorced = $JumlahDivorcedYes / $JumlahDivorcedJml;    
        (float)$PerbandinganNoDivorced = $JumlahDivorcedNo / $JumlahDivorcedJml;                    
        $rumusEntropyDivorced = (-($PerbandinganNoDivorced) * log($PerbandinganNoDivorced,2)) + (-($PerbandinganYesDivorced) * log($PerbandinganYesDivorced,2));
         if(is_nan($rumusEntropyDivorced)){
            $rumusEntropyDivorced = 0;
         }
         $getEntropyDivorced = round($rumusEntropyDivorced,4); 
        $QueryInsertEntropyMaritalStatus = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("marital_status")');
         $QueryInsertEntropyDivorced = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Divorced","'.$JumlahDivorcedJml.'","'.$JumlahDivorcedYes.'","'.$JumlahDivorcedNo.'","'.$getEntropyDivorced.'")') ;
//=========================================================================================================================================
        $MSMarriedAFYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-AF-spouse" AND income = ">50k"');
        $MSMarriedAFNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-AF-spouse" AND income = "<=50k" ');
        $MSMarriedAFJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-AF-spouse" '); 
         while( $jmlMarriedAFYes1 = mysqli_fetch_assoc($MSMarriedAFYes)){
              $JumlahMarriedAFYes = (int)$jmlMarriedAFYes1['jumlah_yes'];
        }   
        while( $jmlMarriedAFNo1 = mysqli_fetch_assoc($MSMarriedAFNo)){
              $JumlahMarriedAFNo = (int)$jmlMarriedAFNo1['jumlah_no'];
        }
        while( $jmlMarriedAFJml = mysqli_fetch_assoc($MSMarriedAFJml)){
              $JumlahMarriedAFJml = (int)$jmlMarriedAFJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedAF = $JumlahMarriedAFYes / $JumlahMarriedAFJml;    
        (float)$PerbandinganNoMarriedAF = $JumlahMarriedAFNo / $JumlahMarriedAFJml;                    
        $rumusEntropyMarriedAF = (-($PerbandinganNoMarriedAF) * log($PerbandinganNoMarriedAF,2)) + (-($PerbandinganYesMarriedAF) * log($PerbandinganYesMarriedAF,2));
         if(is_nan($rumusEntropyMarriedAF)){
            $rumusEntropyMarriedAF = 0;
         }
         $getEntropyMarriedAF = round($rumusEntropyMarriedAF,4);
         $QueryInsertEntropyMarriedAF = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-AF-spouse","'.$JumlahMarriedAFJml.'","'.$JumlahMarriedAFYes.'","'.$JumlahMarriedAFNo.'","'.$getEntropyMarriedAF.'")') ;
//=========================================================================================================================================
        $MSMarriedCIVYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-civ-spouse" AND income = ">50k"');
        $MSMarriedCIVNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-civ-spouse" AND income = "<=50k" ');
        $MSMarriedCIVJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-civ-spouse" '); 
         while( $jmlMarriedCIVYes1 = mysqli_fetch_assoc($MSMarriedCIVYes)){
              $JumlahMarriedCIVYes = (int)$jmlMarriedCIVYes1['jumlah_yes'];
        }   
        while( $jmlMarriedCIVNo1 = mysqli_fetch_assoc($MSMarriedCIVNo)){
              $JumlahMarriedCIVNo = (int)$jmlMarriedCIVNo1['jumlah_no'];
        }
        while( $jmlMarriedCIVJml = mysqli_fetch_assoc($MSMarriedCIVJml)){
              $JumlahMarriedCIVJml = (int)$jmlMarriedCIVJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedCIV = $JumlahMarriedCIVYes / $JumlahMarriedCIVJml;    
        (float)$PerbandinganNoMarriedCIV = $JumlahMarriedCIVNo / $JumlahMarriedCIVJml;                    
        $rumusEntropyMarriedCIV = (-($PerbandinganNoMarriedCIV) * log($PerbandinganNoMarriedCIV,2)) + (-($PerbandinganYesMarriedCIV) * log($PerbandinganYesMarriedCIV,2));
         if(is_nan($rumusEntropyMarriedCIV)){
            $rumusEntropyMarriedCIV = 0;
         }
         $getEntropyMarriedCIV = round($rumusEntropyMarriedCIV,4);
         $QueryInsertEntropyMarriedCIV = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-civ-spouse","'.$JumlahMarriedCIVJml.'","'.$JumlahMarriedCIVYes.'","'.$JumlahMarriedCIVNo.'","'.$getEntropyMarriedCIV.'")') ;
//=========================================================================================================================================
        $MSMarriedSpouseYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-spouse-absent" AND income = ">50k"');
        $MSMarriedSpouseNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-spouse-absent" AND income = "<=50k" ');
        $MSMarriedSpouseJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-spouse-absent" '); 
         while( $jmlMarriedSpouseYes1 = mysqli_fetch_assoc($MSMarriedSpouseYes)){
              $JumlahMarriedSpouseYes = (int)$jmlMarriedSpouseYes1['jumlah_yes'];
        }   
        while( $jmlMarriedSpouseNo1 = mysqli_fetch_assoc($MSMarriedSpouseNo)){
              $JumlahMarriedSpouseNo = (int)$jmlMarriedSpouseNo1['jumlah_no'];
        }
        while( $jmlMarriedSpouseJml = mysqli_fetch_assoc($MSMarriedSpouseJml)){
              $JumlahMarriedSpouseJml = (int)$jmlMarriedSpouseJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedSpouse = $JumlahMarriedSpouseYes / $JumlahMarriedSpouseJml;    
        (float)$PerbandinganNoMarriedSpouse = $JumlahMarriedSpouseNo / $JumlahMarriedSpouseJml;                    
        $rumusEntropyMarriedSpouse = (-($PerbandinganNoMarriedSpouse) * log($PerbandinganNoMarriedSpouse,2)) + (-($PerbandinganYesMarriedSpouse) * log($PerbandinganYesMarriedSpouse,2));
         if(is_nan($rumusEntropyMarriedSpouse)){
            $rumusEntropyMarriedSpouse = 0;
         }
         $getEntropyMarriedSpouse = round($rumusEntropyMarriedSpouse,4);
         $QueryInsertEntropyMarriedSpouse = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-spouse-absent","'.$JumlahMarriedSpouseJml.'","'.$JumlahMarriedSpouseYes.'","'.$JumlahMarriedSpouseNo.'","'.$getEntropyMarriedSpouse.'")') ;
//=========================================================================================================================================
        $MSNeverYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Never-married" AND income = ">50k"');
        $MSNeverNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Never-married" AND income = "<=50k" ');
        $MSNeverJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Never-married" '); 
         while( $jmlNeverYes1 = mysqli_fetch_assoc($MSNeverYes)){
              $JumlahNeverYes = (int)$jmlNeverYes1['jumlah_yes'];
        }   
        while( $jmlNeverNo1 = mysqli_fetch_assoc($MSNeverNo)){
              $JumlahNeverNo = (int)$jmlNeverNo1['jumlah_no'];
        }
        while( $jmlNeverJml = mysqli_fetch_assoc($MSNeverJml)){
              $JumlahNeverJml = (int)$jmlNeverJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNever = $JumlahNeverYes / $JumlahNeverJml;    
        (float)$PerbandinganNoNever = $JumlahNeverNo / $JumlahNeverJml;                    
        $rumusEntropyNever = (-($PerbandinganNoNever) * log($PerbandinganNoNever,2)) + (-($PerbandinganYesNever) * log($PerbandinganYesNever,2));
         if(is_nan($rumusEntropyNever)){
            $rumusEntropyNever = 0;
         }
         $getEntropyNever = round($rumusEntropyNever,4);
         $QueryInsertEntropyNever = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Never-married","'.$JumlahNeverJml.'","'.$JumlahNeverYes.'","'.$JumlahNeverNo.'","'.$getEntropyNever.'")') ;
//=========================================================================================================================================
        $MSSeparatedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Separated" AND income = ">50k"');
        $MSSeparatedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Separated" AND income = "<=50k" ');
        $MSSeparatedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Separated" '); 
         while( $jmlSeparatedYes1 = mysqli_fetch_assoc($MSSeparatedYes)){
              $JumlahSeparatedYes = (int)$jmlSeparatedYes1['jumlah_yes'];
        }   
        while( $jmlSeparatedNo1 = mysqli_fetch_assoc($MSSeparatedNo)){
              $JumlahSeparatedNo = (int)$jmlSeparatedNo1['jumlah_no'];
        }
        while( $jmlSeparatedJml = mysqli_fetch_assoc($MSSeparatedJml)){
              $JumlahSeparatedJml = (int)$jmlSeparatedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSeparated = $JumlahSeparatedYes / $JumlahSeparatedJml;    
        (float)$PerbandinganNoSeparated = $JumlahSeparatedNo / $JumlahSeparatedJml;                    
        $rumusEntropySeparated = (-($PerbandinganNoSeparated) * log($PerbandinganNoSeparated,2)) + (-($PerbandinganYesSeparated) * log($PerbandinganYesSeparated,2));
         if(is_nan($rumusEntropySeparated)){
            $rumusEntropySeparated = 0;
         }
         $getEntropySeparated = round($rumusEntropySeparated,4);
         $QueryInsertEntropySeparated = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Separated","'.$JumlahSeparatedJml.'","'.$JumlahSeparatedYes.'","'.$JumlahSeparatedNo.'","'.$getEntropySeparated.'")') ;
//=========================================================================================================================================
        $MSWidowedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Widowed" AND income = ">50k"');
        $MSWidowedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Widowed" AND income = "<=50k" ');
        $MSWidowedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Widowed" '); 
         while( $jmlWidowedYes1 = mysqli_fetch_assoc($MSWidowedYes)){
              $JumlahWidowedYes = (int)$jmlWidowedYes1['jumlah_yes'];
        }   
        while( $jmlWidowedNo1 = mysqli_fetch_assoc($MSWidowedNo)){
              $JumlahWidowedNo = (int)$jmlWidowedNo1['jumlah_no'];
        }
        while( $jmlWidowedJml = mysqli_fetch_assoc($MSWidowedJml)){
              $JumlahWidowedJml = (int)$jmlWidowedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWidowed = $JumlahWidowedYes / $JumlahWidowedJml;    
        (float)$PerbandinganNoWidowed = $JumlahWidowedNo / $JumlahWidowedJml;                    
        $rumusEntropyWidowed = (-($PerbandinganNoWidowed) * log($PerbandinganNoWidowed,2)) + (-($PerbandinganYesWidowed) * log($PerbandinganYesWidowed,2));
         if(is_nan($rumusEntropyWidowed)){
            $rumusEntropyWidowed = 0;
         }
         $getEntropyWidowed = round($rumusEntropyWidowed,4);
         $QueryInsertEntropyWidowed = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Widowed","'.$JumlahWidowedJml.'","'.$JumlahWidowedYes.'","'.$JumlahWidowedNo.'","'.$getEntropyWidowed.'")') ;
//=========================================================================================================================================
        $Divorced = ($JumlahDivorcedJml / $JumlahKss) * $getEntropyDivorced;        
        $MarriedAF = ($JumlahMarriedAFJml / $JumlahKss) * $getEntropyMarriedAF;
        $MarriedCIV = ($JumlahMarriedCIVJml / $JumlahKss) * $getEntropyMarriedCIV;
        $MarriedSpouse = ($JumlahMarriedSpouseJml / $JumlahKss) * $getEntropyMarriedSpouse;
        $Never = ($JumlahNeverJml / $JumlahKss) * $getEntropyNever;
        $Separated = ($JumlahSeparatedJml / $JumlahKss) * $getEntropySeparated;
        $Widowed = ($JumlahWidowedJml / $JumlahKss) * $getEntropyWidowed;
        
        (float)$getGainTotalMS = $getEntropy - $Divorced + $MarriedAF + $MarriedCIV + $MarriedSpouse + $Never + $Separated + $Widowed;
       
        $getGainTotalMS = round($GainTotalEdNum,4);
        $InsertGainTotalMS = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalMS.' WHERE ATRIBUT = "marital_status" ');
//=========================================================================================================================================   
        $OAdmYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Adm-clerical" AND income = ">50k"');
        $OAdmNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Adm-clerical" AND income = "<=50k" ');
        $OAdmJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Adm-clerical" '); 
         while( $jmlAdmYes1 = mysqli_fetch_assoc($OAdmYes)){
              $JumlahAdmYes = (int)$jmlAdmYes1['jumlah_yes'];
        }   
        while( $jmlAdmNo1 = mysqli_fetch_assoc($OAdmNo)){
              $JumlahAdmNo = (int)$jmlAdmNo1['jumlah_no'];
        }
        while( $jmlAdmJml = mysqli_fetch_assoc($OAdmJml)){
              $JumlahAdmJml = (int)$jmlAdmJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAdm = $JumlahAdmYes / $JumlahAdmJml;    
        (float)$PerbandinganNoAdm = $JumlahAdmNo / $JumlahAdmJml;                    
        $rumusEntropyAdm = (-($PerbandinganNoAdm) * log($PerbandinganNoAdm,2)) + (-($PerbandinganYesAdm) * log($PerbandinganYesAdm,2));
         if(is_nan($rumusEntropyAdm)){
            $rumusEntropyAdm = 0;
         }
         $getEntropyAdm = round($rumusEntropyAdm,4);
              $QueryInsertEntropyOccupation = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Occupation")');
         $QueryInsertEntropyAdm = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Adm-clerical","'.$JumlahAdmJml.'","'.$JumlahAdmYes.'","'.$JumlahAdmNo.'","'.$getEntropyAdm.'")') ;
//=========================================================================================================================================
        $OArmedYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Armed-Forces" AND income = ">50k"');
        $OArmedNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Armed-Forces" AND income = "<=50k" ');
        $OArmedJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Armed-Forces" '); 
         while( $jmlArmedYes1 = mysqli_fetch_assoc($OArmedYes)){
              $JumlahArmedYes = (int)$jmlArmedYes1['jumlah_yes'];
        }   
        while( $jmlArmedNo1 = mysqli_fetch_assoc($OArmedNo)){
              $JumlahArmedNo = (int)$jmlArmedNo1['jumlah_no'];
        }
        while( $jmlArmedJml = mysqli_fetch_assoc($OArmedJml)){
              $JumlahArmedJml = (int)$jmlArmedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesArmed = $JumlahArmedYes / $JumlahArmedJml;    
        (float)$PerbandinganNoArmed = $JumlahArmedNo / $JumlahArmedJml;                    
        $rumusEntropyArmed = (-($PerbandinganNoArmed) * log($PerbandinganNoArmed,2)) + (-($PerbandinganYesArmed) * log($PerbandinganYesArmed,2));
         if(is_nan($rumusEntropyArmed)){
            $rumusEntropyArmed = 0;
         }
         $getEntropyArmed = round($rumusEntropyArmed,4);
         $QueryInsertEntropyArmed = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Armed-Forces","'.$JumlahArmedJml.'","'.$JumlahArmedYes.'","'.$JumlahArmedNo.'","'.$getEntropyArmed.'")') ;
//=========================================================================================================================================
        $OCraftYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Craft-repair" AND income = ">50k"');
        $OCraftNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Craft-repair" AND income = "<=50k" ');
        $OCraftJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Craft-repair" '); 
         while( $jmlCraftYes1 = mysqli_fetch_assoc($OCraftYes)){
              $JumlahCraftYes = (int)$jmlCraftYes1['jumlah_yes'];
        }   
        while( $jmlCraftNo1 = mysqli_fetch_assoc($OCraftNo)){
              $JumlahCraftNo = (int)$jmlCraftNo1['jumlah_no'];
        }
        while( $jmlCraftJml = mysqli_fetch_assoc($OCraftJml)){
              $JumlahCraftJml = (int)$jmlCraftJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesCraft = $JumlahCraftYes / $JumlahCraftJml;    
        (float)$PerbandinganNoCraft = $JumlahCraftNo / $JumlahCraftJml;                    
        $rumusEntropyCraft = (-($PerbandinganNoCraft) * log($PerbandinganNoCraft,2)) + (-($PerbandinganYesCraft) * log($PerbandinganYesCraft,2));
         if(is_nan($rumusEntropyCraft)){
            $rumusEntropyCraft = 0;
         }
         $getEntropyCraft = round($rumusEntropyCraft,4);
              
         $QueryInsertEntropyCraft = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Craft-repair","'.$JumlahCraftJml.'","'.$JumlahCraftYes.'","'.$JumlahCraftNo.'","'.$getEntropyCraft.'")') ;
//=========================================================================================================================================
        $OExecYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Exec-managerial" AND income = ">50k"');
        $OExecNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Exec-managerial" AND income = "<=50k" ');
        $OExecJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Exec-managerial" '); 
         while( $jmlExecYes1 = mysqli_fetch_assoc($OExecYes)){
              $JumlahExecYes = (int)$jmlExecYes1['jumlah_yes'];
        }   
        while( $jmlExecNo1 = mysqli_fetch_assoc($OExecNo)){
              $JumlahExecNo = (int)$jmlExecNo1['jumlah_no'];
        }
        while( $jmlExecJml = mysqli_fetch_assoc($OExecJml)){
              $JumlahExecJml = (int)$jmlExecJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesExec = $JumlahExecYes / $JumlahExecJml;    
        (float)$PerbandinganNoExec = $JumlahExecNo / $JumlahExecJml;                    
        $rumusEntropyExec = (-($PerbandinganNoExec) * log($PerbandinganNoExec,2)) + (-($PerbandinganYesExec) * log($PerbandinganYesExec,2));
         if(is_nan($rumusEntropyExec)){
            $rumusEntropyExec = 0;
         }
         $getEntropyExec = round($rumusEntropyExec,4);
              
         $QueryInsertEntropyExec = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Exec-managerial","'.$JumlahExecJml.'","'.$JumlahExecYes.'","'.$JumlahExecNo.'","'.$getEntropyExec.'")') ;
//=========================================================================================================================================    
        $OFarmingYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Farming-fishing" AND income = ">50k"');
        $OFarmingNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Farming-fishing" AND income = "<=50k" ');
        $OFarmingJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Farming-fishing" '); 
         while( $jmlFarmingYes1 = mysqli_fetch_assoc($OFarmingYes)){
              $JumlahFarmingYes = (int)$jmlFarmingYes1['jumlah_yes'];
        }   
        while( $jmlFarmingNo1 = mysqli_fetch_assoc($OFarmingNo)){
              $JumlahFarmingNo = (int)$jmlFarmingNo1['jumlah_no'];
        }
        while( $jmlFarmingJml = mysqli_fetch_assoc($OFarmingJml)){
              $JumlahFarmingJml = (int)$jmlFarmingJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesFarming = $JumlahFarmingYes / $JumlahFarmingJml;    
        (float)$PerbandinganNoFarming = $JumlahFarmingNo / $JumlahFarmingJml;                    
        $rumusEntropyFarming = (-($PerbandinganNoFarming) * log($PerbandinganNoFarming,2)) + (-($PerbandinganYesFarming) * log($PerbandinganYesFarming,2));
         if(is_nan($rumusEntropyFarming)){
            $rumusEntropyFarming = 0;
         }
         $getEntropyFarming = round($rumusEntropyFarming,4);
             
         $QueryInsertEntropyFarming = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Farming-fishing","'.$JumlahFarmingJml.'","'.$JumlahFarmingYes.'","'.$JumlahFarmingNo.'","'.$getEntropyFarming.'")') ;
//=========================================================================================================================================
        $OHandlersYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Handlers-cleaners" AND income = ">50k"');
        $OHandlersNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Handlers-cleaners" AND income = "<=50k" ');
        $OHandlersJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Handlers-cleaners" '); 
         while( $jmlHandlersYes1 = mysqli_fetch_assoc($OHandlersYes)){
              $JumlahHandlersYes = (int)$jmlHandlersYes1['jumlah_yes'];
        }   
        while( $jmlHandlersNo1 = mysqli_fetch_assoc($OHandlersNo)){
              $JumlahHandlersNo = (int)$jmlHandlersNo1['jumlah_no'];
        }
        while( $jmlHandlersJml = mysqli_fetch_assoc($OHandlersJml)){
              $JumlahHandlersJml = (int)$jmlHandlersJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHandlers = $JumlahHandlersYes / $JumlahHandlersJml;    
        (float)$PerbandinganNoHandlers = $JumlahHandlersNo / $JumlahHandlersJml;                    
        $rumusEntropyHandlers = (-($PerbandinganNoHandlers) * log($PerbandinganNoHandlers,2)) + (-($PerbandinganYesHandlers) * log($PerbandinganYesHandlers,2));
         if(is_nan($rumusEntropyHandlers)){
            $rumusEntropyHandlers = 0;
         }
         $getEntropyHandlers = round($rumusEntropyHandlers,4);
              
         $QueryInsertEntropyHandlers = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Handlers-cleaners","'.$JumlahHandlersJml.'","'.$JumlahHandlersYes.'","'.$JumlahHandlersNo.'","'.$getEntropyHandlers.'")') ;
//=========================================================================================================================================
        $OMachineYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Machine-op-inspct" AND income = ">50k"');
        $OMachineNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Machine-op-inspct" AND income = "<=50k" ');
        $OMachineJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Machine-op-inspct" '); 
         while( $jmlMachineYes1 = mysqli_fetch_assoc($OMachineYes)){
              $JumlahMachineYes = (int)$jmlMachineYes1['jumlah_yes'];
        }   
        while( $jmlMachineNo1 = mysqli_fetch_assoc($OMachineNo)){
              $JumlahMachineNo = (int)$jmlMachineNo1['jumlah_no'];
        }
        while( $jmlMachineJml = mysqli_fetch_assoc($OMachineJml)){
              $JumlahMachineJml = (int)$jmlMachineJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMachine = $JumlahMachineYes / $JumlahMachineJml;    
        (float)$PerbandinganNoMachine = $JumlahMachineNo / $JumlahMachineJml;                    
        $rumusEntropyMachine = (-($PerbandinganNoMachine) * log($PerbandinganNoMachine,2)) + (-($PerbandinganYesMachine) * log($PerbandinganYesMachine,2));
         if(is_nan($rumusEntropyMachine)){
            $rumusEntropyMachine = 0;
         }
         $getEntropyMachine = round($rumusEntropyMachine,4);
              
         $QueryInsertEntropyMachine = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Machine-op-inspct","'.$JumlahMachineJml.'","'.$JumlahMachineYes.'","'.$JumlahMachineNo.'","'.$getEntropyMachine.'")') ;
//=========================================================================================================================================
        $OOtherserviceYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Other-service" AND income = ">50k"');
        $OOtherserviceNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Other-service" AND income = "<=50k" ');
        $OOtherserviceJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Other-service" '); 
         while( $jmlOtherserviceYes1 = mysqli_fetch_assoc($OOtherserviceYes)){
              $JumlahOtherserviceYes = (int)$jmlOtherserviceYes1['jumlah_yes'];
        }   
        while( $jmlOtherserviceNo1 = mysqli_fetch_assoc($OOtherserviceNo)){
              $JumlahOtherserviceNo = (int)$jmlOtherserviceNo1['jumlah_no'];
        }
        while( $jmlOtherserviceJml = mysqli_fetch_assoc($OOtherserviceJml)){
              $JumlahOtherserviceJml = (int)$jmlOtherserviceJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherservice = $JumlahOtherserviceYes / $JumlahOtherserviceJml;    
        (float)$PerbandinganNoOtherservice = $JumlahOtherserviceNo / $JumlahOtherserviceJml;                    
        $rumusEntropyOtherservice = (-($PerbandinganNoOtherservice) * log($PerbandinganNoOtherservice,2)) + (-($PerbandinganYesOtherservice) * log($PerbandinganYesOtherservice,2));
         if(is_nan($rumusEntropyOtherservice)){
            $rumusEntropyOtherservice = 0;
         }
         $getEntropyOtherservice = round($rumusEntropyOtherservice,4);
              
         $QueryInsertEntropyOtherservice = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other-service","'.$JumlahOtherserviceJml.'","'.$JumlahOtherserviceYes.'","'.$JumlahOtherserviceNo.'","'.$getEntropyOtherservice.'")') ;
//=========================================================================================================================================
        $OPrivhouseYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Priv-house-serv" AND income = ">50k"');
        $OPrivhouseNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Priv-house-serv" AND income = "<=50k" ');
        $OPrivhouseJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Priv-house-serv" '); 
         while( $jmlPrivhouseYes1 = mysqli_fetch_assoc($OPrivhouseYes)){
              $JumlahPrivhouseYes = (int)$jmlPrivhouseYes1['jumlah_yes'];
        }   
        while( $jmlPrivhouseNo1 = mysqli_fetch_assoc($OPrivhouseNo)){
              $JumlahPrivhouseNo = (int)$jmlPrivhouseNo1['jumlah_no'];
        }
        while( $jmlPrivhouseJml = mysqli_fetch_assoc($OPrivhouseJml)){
              $JumlahPrivhouseJml = (int)$jmlPrivhouseJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesPrivhouse = $JumlahPrivhouseYes / $JumlahPrivhouseJml;    
        (float)$PerbandinganNoPrivhouse = $JumlahPrivhouseNo / $JumlahPrivhouseJml;                    
        $rumusEntropyPrivhouse = (-($PerbandinganNoPrivhouse) * log($PerbandinganNoPrivhouse,2)) + (-($PerbandinganYesPrivhouse) * log($PerbandinganYesPrivhouse,2));
         if(is_nan($rumusEntropyPrivhouse)){
            $rumusEntropyPrivhouse = 0;
         }
         $getEntropyPrivhouse = round($rumusEntropyPrivhouse,4);
              
         $QueryInsertEntropyPrivhouse = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Priv-house-serv","'.$JumlahPrivhouseJml.'","'.$JumlahPrivhouseYes.'","'.$JumlahPrivhouseNo.'","'.$getEntropyPrivhouse.'")') ;
//=========================================================================================================================================
        $OProfspecialtyYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Prof-specialty" AND income = ">50k"');
        $OProfspecialtyNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Prof-specialty" AND income = "<=50k" ');
        $OProfspecialtyJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Prof-specialty" '); 
         while( $jmlProfspecialtyYes1 = mysqli_fetch_assoc($OProfspecialtyYes)){
              $JumlahProfspecialtyYes = (int)$jmlProfspecialtyYes1['jumlah_yes'];
        }   
        while( $jmlProfspecialtyNo1 = mysqli_fetch_assoc($OProfspecialtyNo)){
              $JumlahProfspecialtyNo = (int)$jmlProfspecialtyNo1['jumlah_no'];
        }
        while( $jmlProfspecialtyJml = mysqli_fetch_assoc($OProfspecialtyJml)){
              $JumlahProfspecialtyJml = (int)$jmlProfspecialtyJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProfspecialty = $JumlahProfspecialtyYes / $JumlahProfspecialtyJml;    
        (float)$PerbandinganNoProfspecialty = $JumlahProfspecialtyNo / $JumlahProfspecialtyJml;                    
        $rumusEntropyProfspecialty = (-($PerbandinganNoProfspecialty) * log($PerbandinganNoProfspecialty,2)) + (-($PerbandinganYesProfspecialty) * log($PerbandinganYesProfspecialty,2));
         if(is_nan($rumusEntropyProfspecialty)){
            $rumusEntropyProfspecialty = 0;
         }
         $getEntropyProfspecialty = round($rumusEntropyProfspecialty,4);
              
         $QueryInsertEntropyProfspecialty = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Prof-specialty","'.$JumlahProfspecialtyJml.'","'.$JumlahProfspecialtyYes.'","'.$JumlahProfspecialtyNo.'","'.$getEntropyProfspecialty.'")') ;
//=========================================================================================================================================
        $OProtectiveYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Protective-serv" AND income = ">50k"');
        $OProtectiveNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Protective-serv" AND income = "<=50k" ');
        $OProtectiveJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Protective-serv" '); 
         while( $jmlProtectiveYes1 = mysqli_fetch_assoc($OProtectiveYes)){
              $JumlahProtectiveYes = (int)$jmlProtectiveYes1['jumlah_yes'];
        }   
        while( $jmlProtectiveNo1 = mysqli_fetch_assoc($OProtectiveNo)){
              $JumlahProtectiveNo = (int)$jmlProtectiveNo1['jumlah_no'];
        }
        while( $jmlProtectiveJml = mysqli_fetch_assoc($OProtectiveJml)){
              $JumlahProtectiveJml = (int)$jmlProtectiveJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProtective = $JumlahProtectiveYes / $JumlahProtectiveJml;    
        (float)$PerbandinganNoProtective = $JumlahProtectiveNo / $JumlahProtectiveJml;                    
        $rumusEntropyProtective = (-($PerbandinganNoProtective) * log($PerbandinganNoProtective,2)) + (-($PerbandinganYesProtective) * log($PerbandinganYesProtective,2));
         if(is_nan($rumusEntropyProtective)){
            $rumusEntropyProtective = 0;
         }
         $getEntropyProtective = round($rumusEntropyProtective,4);
              
         $QueryInsertEntropyProtective = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Protective-serv","'.$JumlahProtectiveJml.'","'.$JumlahProtectiveYes.'","'.$JumlahProtectiveNo.'","'.$getEntropyProtective.'")') ;
//=========================================================================================================================================
        $OSalesYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Sales" AND income = ">50k"');
        $OSalesNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Sales" AND income = "<=50k" ');
        $OSalesJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Sales" '); 
         while( $jmlSalesYes1 = mysqli_fetch_assoc($OSalesYes)){
              $JumlahSalesYes = (int)$jmlSalesYes1['jumlah_yes'];
        }   
        while( $jmlSalesNo1 = mysqli_fetch_assoc($OSalesNo)){
              $JumlahSalesNo = (int)$jmlSalesNo1['jumlah_no'];
        }
        while( $jmlSalesJml = mysqli_fetch_assoc($OSalesJml)){
              $JumlahSalesJml = (int)$jmlSalesJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSales = $JumlahSalesYes / $JumlahSalesJml;    
        (float)$PerbandinganNoSales = $JumlahSalesNo / $JumlahSalesJml;                    
        $rumusEntropySales = (-($PerbandinganNoSales) * log($PerbandinganNoSales,2)) + (-($PerbandinganYesSales) * log($PerbandinganYesSales,2));
         if(is_nan($rumusEntropySales)){
            $rumusEntropySales = 0;
         }
         $getEntropySales = round($rumusEntropySales,4);
              
         $QueryInsertEntropySales = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Sales","'.$JumlahSalesJml.'","'.$JumlahSalesYes.'","'.$JumlahSalesNo.'","'.$getEntropySales.'")') ;
//=========================================================================================================================================
        $OTechsupportYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Tech-support" AND income = ">50k"');
        $OTechsupportNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Tech-support" AND income = "<=50k" ');
        $OTechsupportJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Tech-support" '); 
         while( $jmlTechsupportYes1 = mysqli_fetch_assoc($OTechsupportYes)){
              $JumlahTechsupportYes = (int)$jmlTechsupportYes1['jumlah_yes'];
        }   
        while( $jmlTechsupportNo1 = mysqli_fetch_assoc($OTechsupportNo)){
              $JumlahTechsupportNo = (int)$jmlTechsupportNo1['jumlah_no'];
        }
        while( $jmlTechsupportJml = mysqli_fetch_assoc($OTechsupportJml)){
              $JumlahTechsupportJml = (int)$jmlTechsupportJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesTechsupport = $JumlahTechsupportYes / $JumlahTechsupportJml;    
        (float)$PerbandinganNoTechsupport = $JumlahTechsupportNo / $JumlahTechsupportJml;                    
        $rumusEntropyTechsupport = (-($PerbandinganNoTechsupport) * log($PerbandinganNoTechsupport,2)) + (-($PerbandinganYesTechsupport) * log($PerbandinganYesTechsupport,2));
         if(is_nan($rumusEntropyTechsupport)){
            $rumusEntropyTechsupport = 0;
         }
         $getEntropyTechsupport = round($rumusEntropyTechsupport,4);
              
         $QueryInsertEntropyTechsupport = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Tech-support","'.$JumlahTechsupportJml.'","'.$JumlahTechsupportYes.'","'.$JumlahTechsupportNo.'","'.$getEntropyTechsupport.'")') ;
//=========================================================================================================================================
        $OTransportYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Transport-moving" AND income = ">50k"');
        $OTransportNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Transport-moving" AND income = "<=50k" ');
        $OTransportJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Transport-moving" '); 
         while( $jmlTransportYes1 = mysqli_fetch_assoc($OTransportYes)){
              $JumlahTransportYes = (int)$jmlTransportYes1['jumlah_yes'];
        }   
        while( $jmlTransportNo1 = mysqli_fetch_assoc($OTransportNo)){
              $JumlahTransportNo = (int)$jmlTransportNo1['jumlah_no'];
        }
        while( $jmlTransportJml = mysqli_fetch_assoc($OTransportJml)){
              $JumlahTransportJml = (int)$jmlTransportJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesTransport = $JumlahTransportYes / $JumlahTransportJml;    
        (float)$PerbandinganNoTransport = $JumlahTransportNo / $JumlahTransportJml;                    
        $rumusEntropyTransport = (-($PerbandinganNoTransport) * log($PerbandinganNoTransport,2)) + (-($PerbandinganYesTransport) * log($PerbandinganYesTransport,2));
         if(is_nan($rumusEntropyTransport)){
            $rumusEntropyTransport = 0;
         }
         $getEntropyTransport = round($rumusEntropyTransport,4);
              
         $QueryInsertEntropyTransport = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Transport-moving","'.$JumlahTransportJml.'","'.$JumlahTransportYes.'","'.$JumlahTransportNo.'","'.$getEntropyTransport.'")') ;
//=========================================================================================================================================
        $Adm = ($JumlahAdmJml / $JumlahKss) * $getEntropyAdm;        
        $Armed = ($JumlahArmedJml / $JumlahKss) * $getEntropyArmed;
        $Craft = ($JumlahCraftJml / $JumlahKss) * $getEntropyCraft;
        $Exec = ($JumlahExecJml / $JumlahKss) * $getEntropyExec;
        $Farming = ($JumlahFarmingJml / $JumlahKss) * $getEntropyFarming;
        $Handlers = ($JumlahHandlersJml / $JumlahKss) * $getEntropyHandlers;
        $Machine = ($JumlahMachineJml / $JumlahKss) * $getEntropyMachine;
        $Otherservice = ($JumlahOtherserviceJml / $JumlahKss) * $getEntropyOtherservice;
        $Privhouse = ($JumlahPrivhouseJml / $JumlahKss) * $getEntropyPrivhouse;
        $Profspecialty = ($JumlahProfspecialtyJml / $JumlahKss) * $getEntropyProfspecialty;
        $Protective = ($JumlahProtectiveJml / $JumlahKss) * $getEntropyProtective;
        $Sales = ($JumlahSalesJml / $JumlahKss) * $getEntropySales;
        $Techsupport = ($JumlahTechsupportJml / $JumlahKss) * $getEntropyTechsupport;
        $Transport = ($JumlahTransportJml / $JumlahKss) * $getEntropyTransport;
        (float)$getGainTotalOccupation = $getEntropy - $Adm + $Armed + $Craft + $Exec + $Farming + $Handlers + $Machine + $Otherservice + $Privhouse + $Profspecialty + $Protective + $Sales + $Techsupport + $Transport ;
       
        $getGainTotalOccupation = round($getGainTotalOccupation,4);
        $InsertGainTotalOccupation = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalOccupation.' WHERE ATRIBUT = "Occupation" ');
//=========================================================================================================================================
        $RSHusbandYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Husband" AND income = ">50k"');
        $RSHusbandNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Husband" AND income = "<=50k" ');
        $RSHusbandJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Husband" '); 
         while( $jmlHusbandYes1 = mysqli_fetch_assoc($RSHusbandYes)){
              $JumlahHusbandYes = (int)$jmlHusbandYes1['jumlah_yes'];
        }   
        while( $jmlHusbandNo1 = mysqli_fetch_assoc($RSHusbandNo)){
              $JumlahHusbandNo = (int)$jmlHusbandNo1['jumlah_no'];
        }
        while( $jmlHusbandJml = mysqli_fetch_assoc($RSHusbandJml)){
              $JumlahHusbandJml = (int)$jmlHusbandJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHusband = $JumlahHusbandYes / $JumlahHusbandJml;    
        (float)$PerbandinganNoHusband = $JumlahHusbandNo / $JumlahHusbandJml;                    
        $rumusEntropyHusband = (-($PerbandinganNoHusband) * log($PerbandinganNoHusband,2)) + (-($PerbandinganYesHusband) * log($PerbandinganYesHusband,2));
         if(is_nan($rumusEntropyHusband)){
            $rumusEntropyHusband = 0;
         }
         $getEntropyHusband = round($rumusEntropyHusband,4);
              $QueryInsertEntropyRelationship = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Relationship")');
         $QueryInsertEntropyHusband = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Husband","'.$JumlahHusbandJml.'","'.$JumlahHusbandYes.'","'.$JumlahHusbandNo.'","'.$getEntropyHusband.'")') ;
//=========================================================================================================================================
        $RSNotinfamilyYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Not-in-family" AND income = ">50k"');
        $RSNotinfamilyNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Not-in-family" AND income = "<=50k" ');
        $RSNotinfamilyJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Not-in-family" '); 
         while( $jmlNotinfamilyYes1 = mysqli_fetch_assoc($RSNotinfamilyYes)){
              $JumlahNotinfamilyYes = (int)$jmlNotinfamilyYes1['jumlah_yes'];
        }   
        while( $jmlNotinfamilyNo1 = mysqli_fetch_assoc($RSNotinfamilyNo)){
              $JumlahNotinfamilyNo = (int)$jmlNotinfamilyNo1['jumlah_no'];
        }
        while( $jmlNotinfamilyJml = mysqli_fetch_assoc($RSNotinfamilyJml)){
              $JumlahNotinfamilyJml = (int)$jmlNotinfamilyJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNotinfamily = $JumlahNotinfamilyYes / $JumlahNotinfamilyJml;    
        (float)$PerbandinganNoNotinfamily = $JumlahNotinfamilyNo / $JumlahNotinfamilyJml;                    
        $rumusEntropyNotinfamily = (-($PerbandinganNoNotinfamily) * log($PerbandinganNoNotinfamily,2)) + (-($PerbandinganYesNotinfamily) * log($PerbandinganYesNotinfamily,2));
         if(is_nan($rumusEntropyNotinfamily)){
            $rumusEntropyNotinfamily = 0;
         }
         $getEntropyNotinfamily = round($rumusEntropyNotinfamily,4);
              
         $QueryInsertEntropyNotinfamily = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Not-in-family","'.$JumlahNotinfamilyJml.'","'.$JumlahNotinfamilyYes.'","'.$JumlahNotinfamilyNo.'","'.$getEntropyNotinfamily.'")') ;
//=========================================================================================================================================
        $RSOtherrelativeYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Other-relative" AND income = ">50k"');
        $RSOtherrelativeNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Other-relative" AND income = "<=50k" ');
        $RSOtherrelativeJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Other-relative" '); 
         while( $jmlOtherrelativeYes1 = mysqli_fetch_assoc($RSOtherrelativeYes)){
              $JumlahOtherrelativeYes = (int)$jmlOtherrelativeYes1['jumlah_yes'];
        }   
        while( $jmlOtherrelativeNo1 = mysqli_fetch_assoc($RSOtherrelativeNo)){
              $JumlahOtherrelativeNo = (int)$jmlOtherrelativeNo1['jumlah_no'];
        }
        while( $jmlOtherrelativeJml = mysqli_fetch_assoc($RSOtherrelativeJml)){
              $JumlahOtherrelativeJml = (int)$jmlOtherrelativeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherrelative = $JumlahOtherrelativeYes / $JumlahOtherrelativeJml;    
        (float)$PerbandinganNoOtherrelative = $JumlahOtherrelativeNo / $JumlahOtherrelativeJml;                    
        $rumusEntropyOtherrelative = (-($PerbandinganNoOtherrelative) * log($PerbandinganNoOtherrelative,2)) + (-($PerbandinganYesOtherrelative) * log($PerbandinganYesOtherrelative,2));
         if(is_nan($rumusEntropyOtherrelative)){
            $rumusEntropyOtherrelative = 0;
         }
         $getEntropyOtherrelative = round($rumusEntropyOtherrelative,4);
              
         $QueryInsertEntropyOtherrelative = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other-relative","'.$JumlahOtherrelativeJml.'","'.$JumlahOtherrelativeYes.'","'.$JumlahOtherrelativeNo.'","'.$getEntropyOtherrelative.'")') ;
//=========================================================================================================================================
        $RSOwnchildYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Own-child" AND income = ">50k"');
        $RSOwnchildNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Own-child" AND income = "<=50k" ');
        $RSOwnchildJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Own-child" '); 
         while( $jmlOwnchildYes1 = mysqli_fetch_assoc($RSOwnchildYes)){
              $JumlahOwnchildYes = (int)$jmlOwnchildYes1['jumlah_yes'];
        }   
        while( $jmlOwnchildNo1 = mysqli_fetch_assoc($RSOwnchildNo)){
              $JumlahOwnchildNo = (int)$jmlOwnchildNo1['jumlah_no'];
        }
        while( $jmlOwnchildJml = mysqli_fetch_assoc($RSOwnchildJml)){
              $JumlahOwnchildJml = (int)$jmlOwnchildJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOwnchild = $JumlahOwnchildYes / $JumlahOwnchildJml;    
        (float)$PerbandinganNoOwnchild = $JumlahOwnchildNo / $JumlahOwnchildJml;                    
        $rumusEntropyOwnchild = (-($PerbandinganNoOwnchild) * log($PerbandinganNoOwnchild,2)) + (-($PerbandinganYesOwnchild) * log($PerbandinganYesOwnchild,2));
         if(is_nan($rumusEntropyOwnchild)){
            $rumusEntropyOwnchild = 0;
         }
         $getEntropyOwnchild = round($rumusEntropyOwnchild,4);
              
         $QueryInsertEntropyOwnchild = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Own-child","'.$JumlahOwnchildJml.'","'.$JumlahOwnchildYes.'","'.$JumlahOwnchildNo.'","'.$getEntropyOwnchild.'")') ;
//=========================================================================================================================================
        $RSUnmarriedYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Unmarried" AND income = ">50k"');
        $RSUnmarriedNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Unmarried" AND income = "<=50k" ');
        $RSUnmarriedJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Unmarried" '); 
         while( $jmlUnmarriedYes1 = mysqli_fetch_assoc($RSUnmarriedYes)){
              $JumlahUnmarriedYes = (int)$jmlUnmarriedYes1['jumlah_yes'];
        }   
        while( $jmlUnmarriedNo1 = mysqli_fetch_assoc($RSUnmarriedNo)){
              $JumlahUnmarriedNo = (int)$jmlUnmarriedNo1['jumlah_no'];
        }
        while( $jmlUnmarriedJml = mysqli_fetch_assoc($RSUnmarriedJml)){
              $JumlahUnmarriedJml = (int)$jmlUnmarriedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesUnmarried = $JumlahUnmarriedYes / $JumlahUnmarriedJml;    
        (float)$PerbandinganNoUnmarried = $JumlahUnmarriedNo / $JumlahUnmarriedJml;                    
        $rumusEntropyUnmarried = (-($PerbandinganNoUnmarried) * log($PerbandinganNoUnmarried,2)) + (-($PerbandinganYesUnmarried) * log($PerbandinganYesUnmarried,2));
         if(is_nan($rumusEntropyUnmarried)){
            $rumusEntropyUnmarried = 0;
         }
         $getEntropyUnmarried = round($rumusEntropyUnmarried,4);
             
         $QueryInsertEntropyUnmarried = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Unmarried","'.$JumlahUnmarriedJml.'","'.$JumlahUnmarriedYes.'","'.$JumlahUnmarriedNo.'","'.$getEntropyUnmarried.'")') ;
//=========================================================================================================================================
        $RSWifeYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Wife" AND income = ">50k"');
        $RSWifeNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Wife" AND income = "<=50k" ');
        $RSWifeJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Wife" '); 
         while( $jmlWifeYes1 = mysqli_fetch_assoc($RSWifeYes)){
              $JumlahWifeYes = (int)$jmlWifeYes1['jumlah_yes'];
        }   
        while( $jmlWifeNo1 = mysqli_fetch_assoc($RSWifeNo)){
              $JumlahWifeNo = (int)$jmlWifeNo1['jumlah_no'];
        }
        while( $jmlWifeJml = mysqli_fetch_assoc($RSWifeJml)){
              $JumlahWifeJml = (int)$jmlWifeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWife = $JumlahWifeYes / $JumlahWifeJml;    
        (float)$PerbandinganNoWife = $JumlahWifeNo / $JumlahWifeJml;                    
        $rumusEntropyWife = (-($PerbandinganNoWife) * log($PerbandinganNoWife,2)) + (-($PerbandinganYesWife) * log($PerbandinganYesWife,2));
         if(is_nan($rumusEntropyWife)){
            $rumusEntropyWife = 0;
         }
         $getEntropyWife = round($rumusEntropyWife,4);
              
         $QueryInsertEntropyWife = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Wife","'.$JumlahWifeJml.'","'.$JumlahWifeYes.'","'.$JumlahWifeNo.'","'.$getEntropyWife.'")') ;
//=========================================================================================================================================
        $Husband = ($JumlahHusbandJml / $JumlahKss) * $getEntropyHusband;        
        $Notinfamily = ($JumlahNotinfamilyJml / $JumlahKss) * $getEntropyNotinfamily;
        $Otherrelative = ($JumlahOtherrelativeJml / $JumlahKss) * $getEntropyOtherrelative;        
        $Ownchild = ($JumlahOwnchildJml / $JumlahKss) * $getEntropyOwnchild;
        $Unmarried = ($JumlahUnmarriedJml / $JumlahKss) * $getEntropyUnmarried;
        $Wife = ($JumlahWifeJml / $JumlahKss) * $getEntropyWife;
     
        (float)$getGainTotalRelationship = $getEntropy - $Husband + $Notinfamily + $Otherrelative + $Ownchild + $Unmarried + $Wife;
       
        $getGainTotalRelationship = round($getGainTotalRelationship,4);
        $InsertGainTotalRelationship = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalRelationship.' WHERE ATRIBUT = "Relationship" ');
//=========================================================================================================================================
        $RaceAmerindianYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Amer-Indian-Eskimo" AND income = ">50k"');
        $RaceAmerindianNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Amer-Indian-Eskimo" AND income = "<=50k" ');
        $RaceAmerindianJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Amer-Indian-Eskimo" '); 
         while( $jmlAmerindianYes1 = mysqli_fetch_assoc($RaceAmerindianYes)){
              $JumlahAmerindianYes = (int)$jmlAmerindianYes1['jumlah_yes'];
        }   
        while( $jmlAmerindianNo1 = mysqli_fetch_assoc($RaceAmerindianNo)){
              $JumlahAmerindianNo = (int)$jmlAmerindianNo1['jumlah_no'];
        }
        while( $jmlAmerindianJml = mysqli_fetch_assoc($RaceAmerindianJml)){
              $JumlahAmerindianJml = (int)$jmlAmerindianJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAmerindian = $JumlahAmerindianYes / $JumlahAmerindianJml;    
        (float)$PerbandinganNoAmerindian = $JumlahAmerindianNo / $JumlahAmerindianJml;                    
        $rumusEntropyAmerindian = (-($PerbandinganNoAmerindian) * log($PerbandinganNoAmerindian,2)) + (-($PerbandinganYesAmerindian) * log($PerbandinganYesAmerindian,2));
         if(is_nan($rumusEntropyAmerindian)){
            $rumusEntropyAmerindian = 0;
         }
         $getEntropyAmerindian = round($rumusEntropyAmerindian,4);
              $QueryInsertEntropyRace = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Race")');
         $QueryInsertEntropyAmerindian = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Amer-Indian-Eskimo","'.$JumlahAmerindianJml.'","'.$JumlahAmerindianYes.'","'.$JumlahAmerindianNo.'","'.$getEntropyAmerindian.'")') ;
//=========================================================================================================================================
        $RaceAsianpacYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Asian-Pac-Islander" AND income = ">50k"');
        $RaceAsianpacNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Asian-Pac-Islander" AND income = "<=50k" ');
        $RaceAsianpacJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Asian-Pac-Islander" '); 
         while( $jmlAsianpacYes1 = mysqli_fetch_assoc($RaceAsianpacYes)){
              $JumlahAsianpacYes = (int)$jmlAsianpacYes1['jumlah_yes'];
        }   
        while( $jmlAsianpacNo1 = mysqli_fetch_assoc($RaceAsianpacNo)){
              $JumlahAsianpacNo = (int)$jmlAsianpacNo1['jumlah_no'];
        }
        while( $jmlAsianpacJml = mysqli_fetch_assoc($RaceAsianpacJml)){
              $JumlahAsianpacJml = (int)$jmlAsianpacJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAsianpac = $JumlahAsianpacYes / $JumlahAsianpacJml;    
        (float)$PerbandinganNoAsianpac = $JumlahAsianpacNo / $JumlahAsianpacJml;                    
        $rumusEntropyAsianpac = (-($PerbandinganNoAsianpac) * log($PerbandinganNoAsianpac,2)) + (-($PerbandinganYesAsianpac) * log($PerbandinganYesAsianpac,2));
         if(is_nan($rumusEntropyAsianpac)){
            $rumusEntropyAsianpac = 0;
         }
         $getEntropyAsianpac = round($rumusEntropyAsianpac,4);
             
         $QueryInsertEntropyAsianpac = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Asian-Pac-Islander","'.$JumlahAsianpacJml.'","'.$JumlahAsianpacYes.'","'.$JumlahAsianpacNo.'","'.$getEntropyAsianpac.'")') ;
//=========================================================================================================================================
        $RaceBlackYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Black" AND income = ">50k"');
        $RaceBlackNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Black" AND income = "<=50k" ');
        $RaceBlackJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Black" '); 
         while( $jmlBlackYes1 = mysqli_fetch_assoc($RaceBlackYes)){
              $JumlahBlackYes = (int)$jmlBlackYes1['jumlah_yes'];
        }   
        while( $jmlBlackNo1 = mysqli_fetch_assoc($RaceBlackNo)){
              $JumlahBlackNo = (int)$jmlBlackNo1['jumlah_no'];
        }
        while( $jmlBlackJml = mysqli_fetch_assoc($RaceBlackJml)){
              $JumlahBlackJml = (int)$jmlBlackJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesBlack = $JumlahBlackYes / $JumlahBlackJml;    
        (float)$PerbandinganNoBlack = $JumlahBlackNo / $JumlahBlackJml;                    
        $rumusEntropyBlack = (-($PerbandinganNoBlack) * log($PerbandinganNoBlack,2)) + (-($PerbandinganYesBlack) * log($PerbandinganYesBlack,2));
         if(is_nan($rumusEntropyBlack)){
            $rumusEntropyBlack = 0;
         }
         $getEntropyBlack = round($rumusEntropyBlack,4);
             
         $QueryInsertEntropyBlack = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Black","'.$JumlahBlackJml.'","'.$JumlahBlackYes.'","'.$JumlahBlackNo.'","'.$getEntropyBlack.'")') ;
//=========================================================================================================================================
        $RaceWhiteYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "White" AND income = ">50k"');
        $RaceWhiteNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "White" AND income = "<=50k" ');
        $RaceWhiteJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "White" '); 
         while( $jmlWhiteYes1 = mysqli_fetch_assoc($RaceWhiteYes)){
              $JumlahWhiteYes = (int)$jmlWhiteYes1['jumlah_yes'];
        }   
        while( $jmlWhiteNo1 = mysqli_fetch_assoc($RaceWhiteNo)){
              $JumlahWhiteNo = (int)$jmlWhiteNo1['jumlah_no'];
        }
        while( $jmlWhiteJml = mysqli_fetch_assoc($RaceWhiteJml)){
              $JumlahWhiteJml = (int)$jmlWhiteJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWhite = $JumlahWhiteYes / $JumlahWhiteJml;    
        (float)$PerbandinganNoWhite = $JumlahWhiteNo / $JumlahWhiteJml;                    
        $rumusEntropyWhite = (-($PerbandinganNoWhite) * log($PerbandinganNoWhite,2)) + (-($PerbandinganYesWhite) * log($PerbandinganYesWhite,2));
         if(is_nan($rumusEntropyWhite)){
            $rumusEntropyWhite = 0;
         }
         $getEntropyWhite = round($rumusEntropyWhite,4);
             
         $QueryInsertEntropyWhite = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("White","'.$JumlahWhiteJml.'","'.$JumlahWhiteYes.'","'.$JumlahWhiteNo.'","'.$getEntropyWhite.'")') ;
//=========================================================================================================================================
        $RaceOtherraceYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Other" AND income = ">50k"');
        $RaceOtherraceNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Other" AND income = "<=50k" ');
        $RaceOtherraceJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Other" '); 
         while( $jmlOtherraceYes1 = mysqli_fetch_assoc($RaceOtherraceYes)){
              $JumlahOtherraceYes = (int)$jmlOtherraceYes1['jumlah_yes'];
        }   
        while( $jmlOtherraceNo1 = mysqli_fetch_assoc($RaceOtherraceNo)){
              $JumlahOtherraceNo = (int)$jmlOtherraceNo1['jumlah_no'];
        }
        while( $jmlOtherraceJml = mysqli_fetch_assoc($RaceOtherraceJml)){
              $JumlahOtherraceJml = (int)$jmlOtherraceJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherrace = $JumlahOtherraceYes / $JumlahOtherraceJml;    
        (float)$PerbandinganNoOtherrace = $JumlahOtherraceNo / $JumlahOtherraceJml;                    
        $rumusEntropyOtherrace = (-($PerbandinganNoOtherrace) * log($PerbandinganNoOtherrace,2)) + (-($PerbandinganYesOtherrace) * log($PerbandinganYesOtherrace,2));
         if(is_nan($rumusEntropyOtherrace)){
            $rumusEntropyOtherrace = 0;
         }
         $getEntropyOtherrace = round($rumusEntropyOtherrace,4);
             
         $QueryInsertEntropyOtherrace = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other","'.$JumlahOtherraceJml.'","'.$JumlahOtherraceYes.'","'.$JumlahOtherraceNo.'","'.$getEntropyOtherrace.'")') ;
//=========================================================================================================================================
        $Amerindian = ($JumlahAmerindianJml / $JumlahKss) * $getEntropyAmerindian;        
        $Asianpac = ($JumlahAsianpacJml / $JumlahKss) * $getEntropyAsianpac;
        $Black = ($JumlahBlackJml / $JumlahKss) * $getEntropyBlack;        
        $White = ($JumlahWhiteJml / $JumlahKss) * $getEntropyWhite;
        $Otherrace = ($JumlahOtherraceJml / $JumlahKss) * $getEntropyOtherrace;
       
     
        (float)$getGainTotalRace = $getEntropy - $Amerindian + $Asianpac + $Black + $White + $Otherrace;
       
        $getGainTotalRace = round($getGainTotalRelationship,4);
        $InsertGainTotalRace = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalRace.' WHERE ATRIBUT = "Race" ');
//=========================================================================================================================================
        $SexFemaleYes= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_yes FROM sample2 WHERE Sex = "Female" AND income = ">50k"');
        $SexFemaleNo= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_no FROM sample2 WHERE Sex = "Female" AND income = "<=50k" ');
        $SexFemaleJml = mysqli_query($con,'SELECT COUNT(Sex) as jumlah_kasus FROM sample2 WHERE Sex = "Female" '); 
         while( $jmlFemaleYes1 = mysqli_fetch_assoc($SexFemaleYes)){
              $JumlahFemaleYes = (int)$jmlFemaleYes1['jumlah_yes'];
        }   
        while( $jmlFemaleNo1 = mysqli_fetch_assoc($SexFemaleNo)){
              $JumlahFemaleNo = (int)$jmlFemaleNo1['jumlah_no'];
        }
        while( $jmlFemaleJml = mysqli_fetch_assoc($SexFemaleJml)){
              $JumlahFemaleJml = (int)$jmlFemaleJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesFemale = $JumlahFemaleYes / $JumlahFemaleJml;    
        (float)$PerbandinganNoFemale = $JumlahFemaleNo / $JumlahFemaleJml;                    
        $rumusEntropyFemale = (-($PerbandinganNoFemale) * log($PerbandinganNoFemale,2)) + (-($PerbandinganYesFemale) * log($PerbandinganYesFemale,2));
         if(is_nan($rumusEntropyFemale)){
            $rumusEntropyFemale = 0;
         }
         $getEntropyFemale = round($rumusEntropyFemale,4);
              $QueryInsertEntropyRelationship = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Sex")');
         $QueryInsertEntropyFemale = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Female","'.$JumlahFemaleJml.'","'.$JumlahFemaleYes.'","'.$JumlahFemaleNo.'","'.$getEntropyFemale.'")') ;
//=========================================================================================================================================
         $SexMaleYes= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_yes FROM sample2 WHERE Sex = "Male" AND income = ">50k"');
        $SexMaleNo= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_no FROM sample2 WHERE Sex = "Male" AND income = "<=50k" ');
        $SexMaleJml = mysqli_query($con,'SELECT COUNT(Sex) as jumlah_kasus FROM sample2 WHERE Sex = "Male" '); 
         while( $jmlMaleYes1 = mysqli_fetch_assoc($SexMaleYes)){
              $JumlahMaleYes = (int)$jmlMaleYes1['jumlah_yes'];
        }   
        while( $jmlMaleNo1 = mysqli_fetch_assoc($SexMaleNo)){
              $JumlahMaleNo = (int)$jmlMaleNo1['jumlah_no'];
        }
        while( $jmlMaleJml = mysqli_fetch_assoc($SexMaleJml)){
              $JumlahMaleJml = (int)$jmlMaleJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMale = $JumlahMaleYes / $JumlahMaleJml;    
        (float)$PerbandinganNoMale = $JumlahMaleNo / $JumlahMaleJml;                    
        $rumusEntropyMale = (-($PerbandinganNoMale) * log($PerbandinganNoMale,2)) + (-($PerbandinganYesMale) * log($PerbandinganYesMale,2));
         if(is_nan($rumusEntropyMale)){
            $rumusEntropyMale = 0;
         }
         $getEntropyMale = round($rumusEntropyMale,4);
              
         $QueryInsertEntropyMale = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Male","'.$JumlahMaleJml.'","'.$JumlahMaleYes.'","'.$JumlahMaleNo.'","'.$getEntropyMale.'")') ;
//=========================================================================================================================================
        $Female = ($JumlahFemaleJml / $JumlahKss) * $getEntropyFemale;        
        $Male = ($JumlahMaleJml / $JumlahKss) * $getEntropyMale;
        
     
        (float)$getGainTotalSex = $getEntropy - $Female + $Male;
       
        $getGainTotalSex = round($getGainTotalSex,4);
        $InsertGainTotalSex = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalSex.' WHERE ATRIBUT = "Sex" ');
//=========================================================================================================================================
        
//=========================================================================================================================================
       

            $Education1Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "11th" AND income = ">50k"');
        $Education1No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "11th" AND income = "<=50k" ');
        $Education1Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "11th" '); 
         while( $jml11Yes1 = mysqli_fetch_assoc($Education1Yes)){
              $Jumlah11Yes = (int)$jml11Yes1['jumlah_yes'];
        }   
        while( $jml11No1 = mysqli_fetch_assoc($Education1No)){
              $Jumlah11No = (int)$jml11No1['jumlah_no'];
        }
        while( $jml11Jml = mysqli_fetch_assoc($Education1Jml)){
              $Jumlah11Jml = (int)$jml11Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes11 = $Jumlah11Yes / $Jumlah11Jml;    
        (float)$PerbandinganNo11 = $Jumlah11No / $Jumlah11Jml;                    
         $rumusEntropy11 = (-($PerbandinganNo11) * log($PerbandinganNo11,2)) + (-($PerbandinganYes11) * log($PerbandinganYes11,2));
         if(is_nan($rumusEntropy11)){
            $rumusEntropy11 = 0;
         }
         $getEntropy11 = round($rumusEntropy11,4); 
        $QueryInsertEntropyEducation = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Education")');
         $QueryInsertEntropy11 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("11th","'.$Jumlah11Jml.'","'.$Jumlah11Yes.'","'.$Jumlah11No.'","'.$getEntropy11.'")') ;      
//=========================================================================================================================================
        $Education2Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "12th" AND income = ">50k"');
        $Education2No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "12th" AND income = "<=50k" ');
        $Education2Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "12th" '); 
         while( $jml12Yes1 = mysqli_fetch_assoc($Education2Yes)){
              $Jumlah12Yes = (int)$jml12Yes1['jumlah_yes'];
        }   
        while( $jml12No1 = mysqli_fetch_assoc($Education2No)){
              $Jumlah12No = (int)$jml12No1['jumlah_no'];
        }
        while( $jml12Jml = mysqli_fetch_assoc($Education2Jml)){
              $Jumlah12Jml = (int)$jml12Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes12 = $Jumlah12Yes / $Jumlah12Jml;    
        (float)$PerbandinganNo12 = $Jumlah12No / $Jumlah12Jml;                    
         $rumusEntropy12 = (-($PerbandinganNo12) * log($PerbandinganNo12,2)) + (-($PerbandinganYes12) * log($PerbandinganYes12,2));
         if(is_nan($rumusEntropy12)){
            $rumusEntropy12 = 0;
         }
         $getEntropy12 = round($rumusEntropy12,4); 
       
         $QueryInsertEntropy12 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("12th","'.$Jumlah12Jml.'","'.$Jumlah12Yes.'","'.$Jumlah12No.'","'.$getEntropy12.'")') ;      
//=========================================================================================================================================
        $Education3Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "10th" AND income = ">50k"');
        $Education3No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "10th" AND income = "<=50k" ');
        $Education3Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "10th" '); 
         while( $jml13Yes1 = mysqli_fetch_assoc($Education3Yes)){
              $Jumlah13Yes = (int)$jml13Yes1['jumlah_yes'];
        }   
        while( $jml13No1 = mysqli_fetch_assoc($Education3No)){
              $Jumlah13No = (int)$jml13No1['jumlah_no'];
        }
        while( $jml13Jml = mysqli_fetch_assoc($Education3Jml)){
              $Jumlah13Jml = (int)$jml13Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes13 = $Jumlah13Yes / $Jumlah13Jml;    
        (float)$PerbandinganNo13 = $Jumlah13No / $Jumlah13Jml;                    
         $rumusEntropy13 = (-($PerbandinganNo13) * log($PerbandinganNo13,2)) + (-($PerbandinganYes13) * log($PerbandinganYes13,2));
         if(is_nan($rumusEntropy13)){
            $rumusEntropy13 = 0;
         }
         $getEntropy13 = round($rumusEntropy13,4); 
       
         $QueryInsertEntropy13 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("10th","'.$Jumlah13Jml.'","'.$Jumlah13Yes.'","'.$Jumlah13No.'","'.$getEntropy13.'")') ;      
//=========================================================================================================================================
        $Education4Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "9th" AND income = ">50k"');
        $Education4No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "9th" AND income = "<=50k" ');
        $Education4Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "9th" '); 
         while( $jml9Yes1 = mysqli_fetch_assoc($Education4Yes)){
              $Jumlah9Yes = (int)$jml9Yes1['jumlah_yes'];
        }   
        while( $jml9No1 = mysqli_fetch_assoc($Education4No)){
              $Jumlah9No = (int)$jml9No1['jumlah_no'];
        }
        while( $jml9Jml = mysqli_fetch_assoc($Education4Jml)){
              $Jumlah9Jml = (int)$jml9Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYes9 = $Jumlah9Yes / $Jumlah9Jml;    
        (float)$PerbandinganNo9 = $Jumlah9No / $Jumlah9Jml;                    
         $rumusEntropy9 = (-($PerbandinganNo9) * log($PerbandinganNo9,2)) + (-($PerbandinganYes9) * log($PerbandinganYes9,2));
         if(is_nan($rumusEntropy9)){
            $rumusEntropy9 = 0;
         }
         $getEntropy9 = round($rumusEntropy9,4); 
       
         $QueryInsertEntropy9 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("9th","'.$Jumlah9Jml.'","'.$Jumlah9Yes.'","'.$Jumlah9No.'","'.$getEntropy9.'")') ;      
//=========================================================================================================================================
        $Education5Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "1st-4th" AND income = ">50k"');
        $Education5No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "1st-4th" AND income = "<=50k" ');
        $Education5Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "1st-4th" '); 
         while( $jml1stYes1 = mysqli_fetch_assoc($Education5Yes)){
              $Jumlah1stYes = (int)$jml1stYes1['jumlah_yes'];
        }   
        while( $jml1stNo1 = mysqli_fetch_assoc($Education5No)){
              $Jumlah1stNo = (int)$jml1stNo1['jumlah_no'];
        }
        while( $jml1stJml = mysqli_fetch_assoc($Education5Jml)){
              $Jumlah1stJml = (int)$jml1stJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes1st = $Jumlah1stYes / $Jumlah1stJml;    
        (float)$PerbandinganNo1st = $Jumlah1stNo / $Jumlah1stJml;                    
         $rumusEntropy1st = (-($PerbandinganNo1st) * log($PerbandinganNo1st,2)) + (-($PerbandinganYes1st) * log($PerbandinganYes1st,2));
         if(is_nan($rumusEntropy1st)){
            $rumusEntropy1st = 0;
         }
         $getEntropy1st = round($rumusEntropy1st,4); 
       
         $QueryInsertEntropy1st = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("1st-4th","'.$Jumlah1stJml.'","'.$Jumlah1stYes.'","'.$Jumlah1stNo.'","'.$getEntropy1st.'")') ;      
//=========================================================================================================================================
        $Education6Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "5th-6th" AND income = ">50k"');
        $Education6No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "5th-6th" AND income = "<=50k" ');
        $Education6Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "5th-6th" '); 
         while( $jml5thYes1 = mysqli_fetch_assoc($Education6Yes)){
              $Jumlah5thYes = (int)$jml5thYes1['jumlah_yes'];
        }   
        while( $jml5thNo1 = mysqli_fetch_assoc($Education6No)){
              $Jumlah5thNo = (int)$jml5thNo1['jumlah_no'];
        }
        while( $jml5thJml = mysqli_fetch_assoc($Education6Jml)){
              $Jumlah5thJml = (int)$jml5thJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes5th = $Jumlah5thYes / $Jumlah5thJml;    
        (float)$PerbandinganNo5th = $Jumlah5thNo / $Jumlah5thJml;                    
         $rumusEntropy5th = (-($PerbandinganNo5th) * log($PerbandinganNo5th,2)) + (-($PerbandinganYes5th) * log($PerbandinganYes5th,2));
         if(is_nan($rumusEntropy5th)){
            $rumusEntropy5th = 0;
         }
         $getEntropy5th = round($rumusEntropy5th,4); 
       
         $QueryInsertEntropy5th = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("5th-6th","'.$Jumlah5thJml.'","'.$Jumlah5thYes.'","'.$Jumlah5thNo.'","'.$getEntropy5th.'")') ;      
//=========================================================================================================================================
        $Education7Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "7th-8th" AND income = ">50k"');
        $Education7No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "7th-8th" AND income = "<=50k" ');
        $Education7Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "7th-8th" '); 
         while( $jml7thYes1 = mysqli_fetch_assoc($Education7Yes)){
              $Jumlah7thYes = (int)$jml7thYes1['jumlah_yes'];
        }   
        while( $jml7thNo1 = mysqli_fetch_assoc($Education7No)){
              $Jumlah7thNo = (int)$jml7thNo1['jumlah_no'];
        }
        while( $jml7thJml = mysqli_fetch_assoc($Education7Jml)){
              $Jumlah7thJml = (int)$jml7thJml['jumlah_kasus'];
        }
         (float)$PerbandinganYes7th = $Jumlah7thYes / $Jumlah7thJml;    
        (float)$PerbandinganNo7th = $Jumlah7thNo / $Jumlah7thJml;                    
         $rumusEntropy7th = (-($PerbandinganNo7th) * log($PerbandinganNo7th,2)) + (-($PerbandinganYes7th) * log($PerbandinganYes7th,2));
         if(is_nan($rumusEntropy7th)){
            $rumusEntropy7th = 0;
         }
         $getEntropy7th = round($rumusEntropy7th,4); 
       
         $QueryInsertEntropy7th = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("7th-8th","'.$Jumlah7thJml.'","'.$Jumlah7thYes.'","'.$Jumlah7thNo.'","'.$getEntropy7th.'")') ;      
//=========================================================================================================================================
        $Education8Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Assoc-acdm" AND income = ">50k"');
        $Education8No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Assoc-acdm" AND income = "<=50k" ');
        $Education8Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Assoc-acdm" '); 
         while( $jmlAssocYes1 = mysqli_fetch_assoc($Education8Yes)){
              $JumlahAssocYes = (int)$jmlAssocYes1['jumlah_yes'];
        }   
        while( $jmlAssocNo1 = mysqli_fetch_assoc($Education8No)){
              $JumlahAssocNo = (int)$jmlAssocNo1['jumlah_no'];
        }
        while( $jmlAssocJml = mysqli_fetch_assoc($Education8Jml)){
              $JumlahAssocJml = (int)$jmlAssocJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAssoc = $JumlahAssocYes / $JumlahAssocJml;    
        (float)$PerbandinganNoAssoc = $JumlahAssocNo / $JumlahAssocJml;                    
         $rumusEntropyAssoc = (-($PerbandinganNoAssoc) * log($PerbandinganNoAssoc,2)) + (-($PerbandinganYesAssoc) * log($PerbandinganYesAssoc,2));
         if(is_nan($rumusEntropyAssoc)){
            $rumusEntropyAssoc = 0;
         }
         $getEntropyAssoc = round($rumusEntropyAssoc,4); 
       
         $QueryInsertEntropyAssoc = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Assoc-acdm","'.$JumlahAssocJml.'","'.$JumlahAssocYes.'","'.$JumlahAssocNo.'","'.$getEntropyAssoc.'")') ;      
//=========================================================================================================================================
        $Education9Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Assoc-voc" AND income = ">50k"');
        $Education9No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Assoc-voc" AND income = "<=50k" ');
        $Education9Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Assoc-voc" '); 
         while( $jmlAssocVocYes1 = mysqli_fetch_assoc($Education9Yes)){
              $JumlahAssocVocYes = (int)$jmlAssocVocYes1['jumlah_yes'];
        }   
        while( $jmlAssocVocNo1 = mysqli_fetch_assoc($Education9No)){
              $JumlahAssocVocNo = (int)$jmlAssocVocNo1['jumlah_no'];
        }
        while( $jmlAssocVocJml = mysqli_fetch_assoc($Education9Jml)){
              $JumlahAssocVocJml = (int)$jmlAssocVocJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAssocVoc = $JumlahAssocVocYes / $JumlahAssocVocJml;    
        (float)$PerbandinganNoAssocVoc = $JumlahAssocVocNo / $JumlahAssocVocJml;                    
        $rumusEntropyAssocVoc = (-($PerbandinganNoAssocVoc) * log($PerbandinganNoAssocVoc,2)) + (-($PerbandinganYesAssocVoc) * log($PerbandinganYesAssocVoc,2));
         if(is_nan($rumusEntropyAssocVoc)){
            $rumusEntropyAssocVoc = 0;
         }
         $getEntropyAssocVoc = round($rumusEntropyAssocVoc,4); 
       
         $QueryInsertEntropyAssoVoc = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Assoc-voc","'.$JumlahAssocVocJml.'","'.$JumlahAssocVocYes.'","'.$JumlahAssocVocNo.'","'.$getEntropyAssocVoc.'")') ;      
//=========================================================================================================================================
        $Education10Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Bachelors" AND income = ">50k"');
        $Education10No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Bachelors" AND income = "<=50k" ');
        $Education10Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Bachelors" '); 
         while( $jmlBachelorsYes1 = mysqli_fetch_assoc($Education10Yes)){
              $JumlahBachelorsYes = (int)$jmlBachelorsYes1['jumlah_yes'];
        }   
        while( $jmlBachelorsNo1 = mysqli_fetch_assoc($Education10No)){
              $JumlahBachelorsNo = (int)$jmlBachelorsNo1['jumlah_no'];
        }
        while( $jmlBachelorsJml = mysqli_fetch_assoc($Education10Jml)){
              $JumlahBachelorsJml = (int)$jmlBachelorsJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesBachelors = $JumlahBachelorsYes / $JumlahBachelorsJml;    
        (float)$PerbandinganNoBachelors = $JumlahBachelorsNo / $JumlahBachelorsJml;                    
         $rumusEntropyBachelors = (-($PerbandinganNoBachelors) * log($PerbandinganNoBachelors,2)) + (-($PerbandinganYesBachelors) * log($PerbandinganYesBachelors,2));
         if(is_nan($rumusEntropyBachelors)){
            $rumusEntropyBachelors = 0;
         }
         $getEntropyBachelors = round($rumusEntropyBachelors,4); 
       
         $QueryInsertEntropBachelors = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Bachelors","'.$JumlahBachelorsJml.'","'.$JumlahBachelorsYes.'","'.$JumlahBachelorsNo.'","'.$getEntropyBachelors.'")') ;      
//=========================================================================================================================================
        $Education11Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Doctorate" AND income = ">50k"');
        $Education11No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Doctorate" AND income = "<=50k" ');
        $Education11Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Doctorate" '); 
         while( $jmlDoctorateYes1 = mysqli_fetch_assoc($Education11Yes)){
              $JumlahDoctorateYes = (int)$jmlDoctorateYes1['jumlah_yes'];
        }   
        while( $jmlDoctorateNo1 = mysqli_fetch_assoc($Education11No)){
              $JumlahDoctorateNo = (int)$jmlDoctorateNo1['jumlah_no'];
        }
        while( $jmlDoctorateJml = mysqli_fetch_assoc($Education11Jml)){
              $JumlahDoctorateJml = (int)$jmlDoctorateJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesDoctorate = $JumlahDoctorateYes / $JumlahDoctorateJml;    
        (float)$PerbandinganNoDoctorate = $JumlahDoctorateNo / $JumlahDoctorateJml;                    
         $rumusEntropyDoctorate = (-($PerbandinganNoDoctorate) * log($PerbandinganNoDoctorate,2)) + (-($PerbandinganYesDoctorate) * log($PerbandinganYesDoctorate,2));
         if(is_nan($rumusEntropyDoctorate)){
            $rumusEntropyDoctorate = 0;
         }
         $getEntropyDoctorate = round($rumusEntropyDoctorate,4); 
       
         $QueryInsertEntropyDoctorate = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Doctorate","'.$JumlahDoctorateJml.'","'.$JumlahDoctorateYes.'","'.$JumlahDoctorateNo.'","'.$getEntropyDoctorate.'")') ;      
//=========================================================================================================================================
        $Education12Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "HS-grad" AND income = ">50k"');
        $Education12No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "HS-grad" AND income = "<=50k" ');
        $Education12Jml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "HS-grad" '); 
         while( $jmlHSGradYes1 = mysqli_fetch_assoc($Education12Yes)){
              $JumlahHSGradYes = (int)$jmlHSGradYes1['jumlah_yes'];
        }   
        while( $jmlHSGradNo1 = mysqli_fetch_assoc($Education12No)){
              $JumlahHSGradNo = (int)$jmlHSGradNo1['jumlah_no'];
        }
        while( $jmlHSGradJml = mysqli_fetch_assoc($Education12Jml)){
              $JumlahHSGradJml = (int)$jmlHSGradJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHSGrad = $JumlahHSGradYes / $JumlahHSGradJml;    
        (float)$PerbandinganNoHSGrad = $JumlahHSGradNo / $JumlahHSGradJml;                    
         $rumusEntropyHSGrad = (-($PerbandinganNoHSGrad) * log($PerbandinganNoHSGrad,2)) + (-($PerbandinganYesHSGrad) * log($PerbandinganYesHSGrad,2));
         if(is_nan($rumusEntropyHSGrad)){
            $rumusEntropyHSGrad = 0;
         }
         $getEntropyHSGrad = round($rumusEntropyHSGrad,4); 
       
         $QueryInsertEntropyHSGrad = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("HS-grad","'.$JumlahHSGradJml.'","'.$JumlahHSGradYes.'","'.$JumlahHSGradNo.'","'.$getEntropyHSGrad.'")') ;      
//=========================================================================================================================================
        $Education13Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Masters" AND income = ">50k"');
        $Education13No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Masters" AND income = "<=50k" ');
        $Education13NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Masters" '); 
         while( $jmlMastersYes1 = mysqli_fetch_assoc($Education13Yes)){
              $JumlahMastersYes = (int)$jmlMastersYes1['jumlah_yes'];
        }   
        while( $jmlMastersNo1 = mysqli_fetch_assoc($Education13No)){
              $JumlahMastersNo = (int)$jmlMastersNo1['jumlah_no'];
        }
        while( $jmlMastersJml = mysqli_fetch_assoc($Education13NoJml)){
              $JumlahMastersJml = (int)$jmlMastersJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMasters = $JumlahMastersYes / $JumlahMastersJml;    
        (float)$PerbandinganNoMasters = $JumlahMastersNo / $JumlahMastersJml;                    
         $rumusEntropyMasters = (-($PerbandinganNoMasters) * log($PerbandinganNoMasters,2)) + (-($PerbandinganYesMasters) * log($PerbandinganYesMasters,2));
         if(is_nan($rumusEntropyMasters)){
            $rumusEntropyMasters = 0;
         }
         $getEntropyMasters = round($rumusEntropyMasters,4); 
       
         $QueryInsertEntropyMasters = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Masters","'.$JumlahMastersJml.'","'.$JumlahMastersYes.'","'.$JumlahMastersNo.'","'.$getEntropyMasters.'")') ;      
//=========================================================================================================================================      
        $Education14Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Preschool" AND income = ">50k"');
        $Education14No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Preschool" AND income = "<=50k" ');
        $Education14NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Preschool" '); 
         while( $jmlPreschoolYes1 = mysqli_fetch_assoc($Education14Yes)){
              $JumlahPreschoolYes = (int)$jmlPreschoolYes1['jumlah_yes'];
        }   
        while( $jmlPreschoolNo1 = mysqli_fetch_assoc($Education14No)){
              $JumlahPreschoolNo = (int)$jmlPreschoolNo1['jumlah_no'];
        }
        while( $jmlPreschoolJml = mysqli_fetch_assoc($Education14NoJml)){
              $JumlahPreschoolJml = (int)$jmlPreschoolJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesPreschool = $JumlahPreschoolYes / $JumlahPreschoolJml;    
        (float)$PerbandinganNoPreschool = $JumlahPreschoolNo / $JumlahPreschoolJml;                    
         $rumusEntropyPreschool = (-($PerbandinganNoPreschool) * log($PerbandinganNoPreschool,2)) + (-($PerbandinganYesPreschool) * log($PerbandinganYesPreschool,2));
         if(is_nan($rumusEntropyPreschool)){
            $rumusEntropyPreschool = 0;
         }
         $getEntropyPreschool = round($rumusEntropyPreschool,4); 
       
         $QueryInsertEntropyPreschool = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Preschool","'.$JumlahPreschoolJml.'","'.$JumlahPreschoolYes.'","'.$JumlahPreschoolNo.'","'.$getEntropyPreschool.'")') ;      
//=========================================================================================================================================    
        $Education15Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Prof-school" AND income = ">50k"');
        $Education15No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Prof-school" AND income = "<=50k" ');
        $Education15NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Prof-school" '); 
         while( $jmlProfschoolYes1 = mysqli_fetch_assoc($Education15Yes)){
              $JumlahProfschoolYes = (int)$jmlProfschoolYes1['jumlah_yes'];
        }   
        while( $jmlProfschoolNo1 = mysqli_fetch_assoc($Education15No)){
              $JumlahProfschoolNo = (int)$jmlProfschoolNo1['jumlah_no'];
        }
        while( $jmlProfschoolJml = mysqli_fetch_assoc($Education15NoJml)){
              $JumlahProfschoolJml = (int)$jmlProfschoolJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProfschool = $JumlahProfschoolYes / $JumlahProfschoolJml;    
        (float)$PerbandinganNoProfschool = $JumlahProfschoolNo / $JumlahProfschoolJml;                    
        $rumusEntropyProfschool = (-($PerbandinganNoProfschool) * log($PerbandinganNoProfschool,2)) + (-($PerbandinganYesProfschool) * log($PerbandinganYesProfschool,2));
         if(is_nan($rumusEntropyProfschool)){
            $rumusEntropyProfschool = 0;
         }
         $getEntropyProfschool = round($rumusEntropyProfschool,4); 
       
         $QueryInsertEntropyProfschool = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Prof-school","'.$JumlahProfschoolJml.'","'.$JumlahProfschoolYes.'","'.$JumlahProfschoolNo.'","'.$getEntropyProfschool.'")') ;      
//=========================================================================================================================================    
        $Education16Yes= mysqli_query($con,'SELECT COUNT(Education) as jumlah_yes FROM sample2 WHERE Education = "Some-college" AND income = ">50k"');
        $Education16No= mysqli_query($con,'SELECT COUNT(Education) as jumlah_no FROM sample2 WHERE Education = "Some-college" AND income = "<=50k" ');
        $Education16NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE Education = "Some-college" '); 
         while( $jmlSomecollegeYes1 = mysqli_fetch_assoc($Education16Yes)){
              $JumlahSomecollegeYes = (int)$jmlSomecollegeYes1['jumlah_yes'];
        }   
        while( $jmlSomecollegeNo1 = mysqli_fetch_assoc($Education16No)){
              $JumlahSomecollegeNo = (int)$jmlSomecollegeNo1['jumlah_no'];
        }
        while( $jmlSomecollegeJml = mysqli_fetch_assoc($Education16NoJml)){
              $JumlahSomecollegeJml = (int)$jmlSomecollegeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSomecollege = $JumlahSomecollegeYes / $JumlahSomecollegeJml;    
        (float)$PerbandinganNoSomecollege = $JumlahSomecollegeNo / $JumlahSomecollegeJml;                    
        $rumusEntropySomecollege = (-($PerbandinganNoSomecollege) * log($PerbandinganNoSomecollege,2)) + (-($PerbandinganYesSomecollege) * log($PerbandinganYesSomecollege,2));
         if(is_nan($rumusEntropySomecollege)){
            $rumusEntropySomecollege = 0;
         }
         $getEntropySomecollege = round($rumusEntropySomecollege,4); 
       
         $QueryInsertEntropySomecollege = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Some-college","'.$JumlahSomecollegeJml.'","'.$JumlahSomecollegeYes.'","'.$JumlahSomecollegeNo.'","'.$getEntropySomecollege.'")') ;      
//=========================================================================================================================================   
        $th9 = ($Jumlah9Jml / $JumlahKss) * $getEntropy9;        
        $th10 = ($Jumlah13Jml / $JumlahKss) * $getEntropy13;
        $th11 = ($Jumlah11Jml / $JumlahKss) * $getEntropy11;
        $th12 = ($Jumlah12Jml / $JumlahKss) * $getEntropy12;
        $st1 = ($Jumlah1stJml / $JumlahKss) * $getEntropy1st;
        $th5 = ($Jumlah5thJml / $JumlahKss) * $getEntropy5th;
        $th7 = ($Jumlah7thJml / $JumlahKss) * $getEntropy7th;
        $Assoc = ($JumlahAssocJml / $JumlahKss) * $getEntropyAssoc;
        $AssocVoc = ($JumlahAssocVocJml / $JumlahKss) * $getEntropyAssocVoc;
        $Bachelors = ($JumlahBachelorsJml / $JumlahKss) * $getEntropyBachelors;
        $HSGrad = ($JumlahHSGradJml / $JumlahKss) * $getEntropyHSGrad;
        $Masters = ($JumlahMastersJml / $JumlahKss) * $getEntropyMasters;
        $Preschool = ($JumlahPreschoolJml / $JumlahKss) * $getEntropyPreschool;
        $Profschool = ($JumlahProfschoolJml / $JumlahKss) * $getEntropyProfschool;
        $Somecollege = ($JumlahSomecollegeJml / $JumlahKss) * $getEntropySomecollege;

        (float)$GainTotalEducation = $getEntropy - $th9 + $th10 + $th11 + $th12 + $st1 + $th5 + $th7 + $Assoc + $AssocVoc + $Bachelors + $HSGrad + $Masters + $Preschool + $Profschool + $Somecollege;
       
        $getGainTotalEducation = round($GainTotalEducation,4);
        $InsertGainTotalEducation = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalEducation.' WHERE ATRIBUT = "Education" ');

//=========================================================================================================================================  
       $EdNum1Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "1" AND income = ">50k"');
        $EdNum1No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "1" AND income = "<=50k" ');
        $EdNum1NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "1" '); 
         while( $jmlNum1Yes1 = mysqli_fetch_assoc($EdNum1Yes)){
              $JumlahNum1Yes = (int)$jmlNum1Yes1['jumlah_yes'];
        }   
        while( $jmlNum1No1 = mysqli_fetch_assoc($EdNum1No)){
              $JumlahNum1No = (int)$jmlNum1No1['jumlah_no'];
        }
        while( $jmlNum1Jml = mysqli_fetch_assoc($EdNum1NoJml)){
              $JumlahNum1Jml = (int)$jmlNum1Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum1 = $JumlahNum1Yes / $JumlahNum1Jml;    
        (float)$PerbandinganNoNum1 = $JumlahNum1No / $JumlahNum1Jml;                    
        $rumusEntropyNum1 = (-($PerbandinganNoNum1) * log($PerbandinganNoNum1,2)) + (-($PerbandinganYesNum1) * log($PerbandinganYesNum1,2));
         if(is_nan($rumusEntropyNum1)){
            $rumusEntropyNum1 = 0;
         }
         $getEntropyNum1 = round($rumusEntropyNum1,4); 
        $QueryInsertEntropyEducationNum = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("education_num")');
         $QueryInsertEntropyNum1 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("1","'.$JumlahNum1Jml.'","'.$JumlahNum1Yes.'","'.$JumlahNum1No.'","'.$getEntropyNum1.'")') ;      
//=========================================================================================================================================   
        $EdNum2Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "2" AND income = ">50k"');
        $EdNum2No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "2" AND income = "<=50k" ');
        $EdNum2NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "2" '); 
         while( $jmlNum2Yes1 = mysqli_fetch_assoc($EdNum2Yes)){
              $JumlahNum2Yes = (int)$jmlNum2Yes1['jumlah_yes'];
        }   
        while( $jmlNum2No1 = mysqli_fetch_assoc($EdNum2No)){
              $JumlahNum2No = (int)$jmlNum2No1['jumlah_no'];
        }
        while( $jmlNum2Jml = mysqli_fetch_assoc($EdNum2NoJml)){
              $JumlahNum2Jml = (int)$jmlNum2Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum2 = $JumlahNum2Yes / $JumlahNum2Jml;    
        (float)$PerbandinganNoNum2 = $JumlahNum2No / $JumlahNum2Jml;                    
        $rumusEntropyNum2 = (-($PerbandinganNoNum2) * log($PerbandinganNoNum2,2)) + (-($PerbandinganYesNum2) * log($PerbandinganYesNum2,2));
         if(is_nan($rumusEntropyNum2)){
            $rumusEntropyNum2 = 0;
         }
         $getEntropyNum2 = round($rumusEntropyNum2,4); 
        
         $QueryInsertEntropyNum2 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("2","'.$JumlahNum2Jml.'","'.$JumlahNum2Yes.'","'.$JumlahNum2No.'","'.$getEntropyNum2.'")') ;      
//========================================================================================================================================= 
        $EdNum3Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "3" AND income = ">50k"');
        $EdNum3No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "3" AND income = "<=50k" ');
        $EdNum3NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "3" '); 
         while( $jmlNum3Yes1 = mysqli_fetch_assoc($EdNum3Yes)){
              $JumlahNum3Yes = (int)$jmlNum3Yes1['jumlah_yes'];
        }   
        while( $jmlNum3No1 = mysqli_fetch_assoc($EdNum3No)){
              $JumlahNum3No = (int)$jmlNum3No1['jumlah_no'];
        }
        while( $jmlNum3Jml = mysqli_fetch_assoc($EdNum3NoJml)){
              $JumlahNum3Jml = (int)$jmlNum3Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum3 = $JumlahNum3Yes / $JumlahNum3Jml;    
        (float)$PerbandinganNoNum3 = $JumlahNum3No / $JumlahNum3Jml;                    
        $rumusEntropyNum3 = (-($PerbandinganNoNum3) * log($PerbandinganNoNum3,2)) + (-($PerbandinganYesNum3) * log($PerbandinganYesNum3,2));
         if(is_nan($rumusEntropyNum3)){
            $rumusEntropyNum3 = 0;
         }
         $getEntropyNum3 = round($rumusEntropyNum3,4); 
        
         $QueryInsertEntropyNum3 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("3","'.$JumlahNum3Jml.'","'.$JumlahNum3Yes.'","'.$JumlahNum3No.'","'.$getEntropyNum3.'")') ;      
//=========================================================================================================================================
        $EdNum4Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "4" AND income = ">50k"');
        $EdNum4No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "4" AND income = "<=50k" ');
        $EdNum4NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "4" '); 
         while( $jmlNum4Yes1 = mysqli_fetch_assoc($EdNum4Yes)){
              $JumlahNum4Yes = (int)$jmlNum4Yes1['jumlah_yes'];
        }   
        while( $jmlNum4No1 = mysqli_fetch_assoc($EdNum4No)){
              $JumlahNum4No = (int)$jmlNum4No1['jumlah_no'];
        }
        while( $jmlNum4Jml = mysqli_fetch_assoc($EdNum4NoJml)){
              $JumlahNum4Jml = (int)$jmlNum4Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum4 = $JumlahNum4Yes / $JumlahNum4Jml;    
        (float)$PerbandinganNoNum4 = $JumlahNum4No / $JumlahNum4Jml;                    
        $rumusEntropyNum4 = (-($PerbandinganNoNum4) * log($PerbandinganNoNum4,2)) + (-($PerbandinganYesNum4) * log($PerbandinganYesNum4,2));
         if(is_nan($rumusEntropyNum4)){
            $rumusEntropyNum4 = 0;
         }
         $getEntropyNum4 = round($rumusEntropyNum4,4); 
        
         $QueryInsertEntropyNum4 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("4","'.$JumlahNum4Jml.'","'.$JumlahNum4Yes.'","'.$JumlahNum4No.'","'.$getEntropyNum4.'")') ;      
//=========================================================================================================================================
        $EdNum5Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "5" AND income = ">50k"');
        $EdNum5No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "5" AND income = "<=50k" ');
        $EdNum5NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "5" '); 
         while( $jmlNum5Yes1 = mysqli_fetch_assoc($EdNum5Yes)){
              $JumlahNum5Yes = (int)$jmlNum5Yes1['jumlah_yes'];
        }   
        while( $jmlNum5No1 = mysqli_fetch_assoc($EdNum5No)){
              $JumlahNum5No = (int)$jmlNum5No1['jumlah_no'];
        }
        while( $jmlNum5Jml = mysqli_fetch_assoc($EdNum5NoJml)){
              $JumlahNum5Jml = (int)$jmlNum5Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum5 = $JumlahNum5Yes / $JumlahNum5Jml;    
        (float)$PerbandinganNoNum5 = $JumlahNum5No / $JumlahNum5Jml;                    
        $rumusEntropyNum5 = (-($PerbandinganNoNum5) * log($PerbandinganNoNum5,2)) + (-($PerbandinganYesNum5) * log($PerbandinganYesNum5,2));
         if(is_nan($rumusEntropyNum5)){
            $rumusEntropyNum5 = 0;
         }
         $getEntropyNum5 = round($rumusEntropyNum5,4); 
        
         $QueryInsertEntropyNum5 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("5","'.$JumlahNum5Jml.'","'.$JumlahNum5Yes.'","'.$JumlahNum5No.'","'.$getEntropyNum5.'")') ;      
//=========================================================================================================================================
        $EdNum6Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "6" AND income = ">50k"');
        $EdNum6No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "6" AND income = "<=50k" ');
        $EdNum6NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "6" '); 
         while( $jmlNum6Yes1 = mysqli_fetch_assoc($EdNum6Yes)){
              $JumlahNum6Yes = (int)$jmlNum6Yes1['jumlah_yes'];
        }   
        while( $jmlNum6No1 = mysqli_fetch_assoc($EdNum6No)){
              $JumlahNum6No = (int)$jmlNum6No1['jumlah_no'];
        }
        while( $jmlNum6Jml = mysqli_fetch_assoc($EdNum6NoJml)){
              $JumlahNum6Jml = (int)$jmlNum6Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum6 = $JumlahNum6Yes / $JumlahNum6Jml;    
        (float)$PerbandinganNoNum6 = $JumlahNum6No / $JumlahNum6Jml;                    
        $rumusEntropyNum6 = (-($PerbandinganNoNum6) * log($PerbandinganNoNum6,2)) + (-($PerbandinganYesNum6) * log($PerbandinganYesNum6,2));
         if(is_nan($rumusEntropyNum6)){
            $rumusEntropyNum6 = 0;
         }
         $getEntropyNum6 = round($rumusEntropyNum6,4); 
        
         $QueryInsertEntropyNum6 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("6","'.$JumlahNum6Jml.'","'.$JumlahNum6Yes.'","'.$JumlahNum6No.'","'.$getEntropyNum6.'")') ;      
//=========================================================================================================================================
        $EdNum7Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "7" AND income = ">50k"');
        $EdNum7No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "7" AND income = "<=50k" ');
        $EdNum7NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "7" '); 
         while( $jmlNum7Yes1 = mysqli_fetch_assoc($EdNum7Yes)){
              $JumlahNum7Yes = (int)$jmlNum7Yes1['jumlah_yes'];
        }   
        while( $jmlNum7No1 = mysqli_fetch_assoc($EdNum7No)){
              $JumlahNum7No = (int)$jmlNum7No1['jumlah_no'];
        }
        while( $jmlNum7Jml = mysqli_fetch_assoc($EdNum7NoJml)){
              $JumlahNum7Jml = (int)$jmlNum7Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum7 = $JumlahNum7Yes / $JumlahNum7Jml;    
        (float)$PerbandinganNoNum7 = $JumlahNum7No / $JumlahNum7Jml;                    
        $rumusEntropyNum7 = (-($PerbandinganNoNum7) * log($PerbandinganNoNum7,2)) + (-($PerbandinganYesNum7) * log($PerbandinganYesNum7,2));
         if(is_nan($rumusEntropyNum7)){
            $rumusEntropyNum7 = 0;
         }
         $getEntropyNum7 = round($rumusEntropyNum7,4); 
        
         $QueryInsertEntropyNum7 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("7","'.$JumlahNum7Jml.'","'.$JumlahNum7Yes.'","'.$JumlahNum7No.'","'.$getEntropyNum7.'")') ;      
//=========================================================================================================================================
        $EdNum8Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "8" AND income = ">50k"');
        $EdNum8No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "8" AND income = "<=50k" ');
        $EdNum8NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "8" '); 
         while( $jmlNum8Yes1 = mysqli_fetch_assoc($EdNum8Yes)){
              $JumlahNum8Yes = (int)$jmlNum8Yes1['jumlah_yes'];
        }   
        while( $jmlNum8No1 = mysqli_fetch_assoc($EdNum8No)){
              $JumlahNum8No = (int)$jmlNum8No1['jumlah_no'];
        }
        while( $jmlNum8Jml = mysqli_fetch_assoc($EdNum8NoJml)){
              $JumlahNum8Jml = (int)$jmlNum8Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum8 = $JumlahNum8Yes / $JumlahNum8Jml;    
        (float)$PerbandinganNoNum8 = $JumlahNum8No / $JumlahNum8Jml;                    
        $rumusEntropyNum8 = (-($PerbandinganNoNum8) * log($PerbandinganNoNum8,2)) + (-($PerbandinganYesNum8) * log($PerbandinganYesNum8,2));
         if(is_nan($rumusEntropyNum8)){
            $rumusEntropyNum8 = 0;
         }
         $getEntropyNum8 = round($rumusEntropyNum8,4); 
        
         $QueryInsertEntropyNum8 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("8","'.$JumlahNum8Jml.'","'.$JumlahNum8Yes.'","'.$JumlahNum8No.'","'.$getEntropyNum8.'")') ;      
//=========================================================================================================================================
        $EdNum9Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "9" AND income = ">50k"');
        $EdNum9No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "9" AND income = "<=50k" ');
        $EdNum9NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "9" '); 
         while( $jmlNum9Yes1 = mysqli_fetch_assoc($EdNum9Yes)){
              $JumlahNum9Yes = (int)$jmlNum9Yes1['jumlah_yes'];
        }   
        while( $jmlNum9No1 = mysqli_fetch_assoc($EdNum9No)){
              $JumlahNum9No = (int)$jmlNum9No1['jumlah_no'];
        }
        while( $jmlNum9Jml = mysqli_fetch_assoc($EdNum9NoJml)){
              $JumlahNum9Jml = (int)$jmlNum9Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum9 = $JumlahNum9Yes / $JumlahNum9Jml;    
        (float)$PerbandinganNoNum9 = $JumlahNum9No / $JumlahNum9Jml;                    
        $rumusEntropyNum9 = (-($PerbandinganNoNum9) * log($PerbandinganNoNum9,2)) + (-($PerbandinganYesNum9) * log($PerbandinganYesNum9,2));
         if(is_nan($rumusEntropyNum9)){
            $rumusEntropyNum9 = 0;
         }
         $getEntropyNum9 = round($rumusEntropyNum9,4); 
        
         $QueryInsertEntropyNum9 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("9","'.$JumlahNum9Jml.'","'.$JumlahNum9Yes.'","'.$JumlahNum9No.'","'.$getEntropyNum9.'")') ;      
//=========================================================================================================================================
        $EdNum10Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "10" AND income = ">50k"');
        $EdNum10No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "10" AND income = "<=50k" ');
        $EdNum10NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "10" '); 
         while( $jmlNum10Yes1 = mysqli_fetch_assoc($EdNum10Yes)){
              $JumlahNum10Yes = (int)$jmlNum10Yes1['jumlah_yes'];
        }   
        while( $jmlNum10No1 = mysqli_fetch_assoc($EdNum10No)){
              $JumlahNum10No = (int)$jmlNum10No1['jumlah_no'];
        }
        while( $jmlNum10Jml = mysqli_fetch_assoc($EdNum10NoJml)){
              $JumlahNum10Jml = (int)$jmlNum10Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum10 = $JumlahNum10Yes / $JumlahNum10Jml;    
        (float)$PerbandinganNoNum10 = $JumlahNum10No / $JumlahNum10Jml;                    
        $rumusEntropyNum10 = (-($PerbandinganNoNum10) * log($PerbandinganNoNum10,2)) + (-($PerbandinganYesNum10) * log($PerbandinganYesNum10,2));
         if(is_nan($rumusEntropyNum10)){
            $rumusEntropyNum10 = 0;
         }
         $getEntropyNum10 = round($rumusEntropyNum10,4); 
        
         $QueryInsertEntropyNum10 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("10","'.$JumlahNum10Jml.'","'.$JumlahNum10Yes.'","'.$JumlahNum10No.'","'.$getEntropyNum10.'")') ;      
//=========================================================================================================================================
        $EdNum11Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "11" AND income = ">50k"');
        $EdNum11No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "11" AND income = "<=50k" ');
        $EdNum11NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "11" '); 
         while( $jmlNum11Yes1 = mysqli_fetch_assoc($EdNum11Yes)){
              $JumlahNum11Yes = (int)$jmlNum11Yes1['jumlah_yes'];
        }   
        while( $jmlNum11No1 = mysqli_fetch_assoc($EdNum11No)){
              $JumlahNum11No = (int)$jmlNum11No1['jumlah_no'];
        }
        while( $jmlNum11Jml = mysqli_fetch_assoc($EdNum11NoJml)){
              $JumlahNum11Jml = (int)$jmlNum11Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum11 = $JumlahNum11Yes / $JumlahNum11Jml;    
        (float)$PerbandinganNoNum11 = $JumlahNum11No / $JumlahNum11Jml;                    
        $rumusEntropyNum11 = (-($PerbandinganNoNum11) * log($PerbandinganNoNum11,2)) + (-($PerbandinganYesNum11) * log($PerbandinganYesNum11,2));
         if(is_nan($rumusEntropyNum11)){
            $rumusEntropyNum11 = 0;
         }
         $getEntropyNum11 = round($rumusEntropyNum11,4); 
        
         $QueryInsertEntropyNum11 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("11","'.$JumlahNum11Jml.'","'.$JumlahNum11Yes.'","'.$JumlahNum11No.'","'.$getEntropyNum11.'")') ;      
//=========================================================================================================================================
        $EdNum12Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "12" AND income = ">50k"');
        $EdNum12No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "12" AND income = "<=50k" ');
        $EdNum12NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "12" '); 
         while( $jmlNum12Yes1 = mysqli_fetch_assoc($EdNum12Yes)){
              $JumlahNum12Yes = (int)$jmlNum12Yes1['jumlah_yes'];
        }   
        while( $jmlNum12No1 = mysqli_fetch_assoc($EdNum12No)){
              $JumlahNum12No = (int)$jmlNum12No1['jumlah_no'];
        }
        while( $jmlNum12Jml = mysqli_fetch_assoc($EdNum12NoJml)){
              $JumlahNum12Jml = (int)$jmlNum12Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum12 = $JumlahNum12Yes / $JumlahNum12Jml;    
        (float)$PerbandinganNoNum12 = $JumlahNum12No / $JumlahNum12Jml;                    
        $rumusEntropyNum12 = (-($PerbandinganNoNum12) * log($PerbandinganNoNum12,2)) + (-($PerbandinganYesNum12) * log($PerbandinganYesNum12,2));
         if(is_nan($rumusEntropyNum12)){
            $rumusEntropyNum12 = 0;
         }
         $getEntropyNum12 = round($rumusEntropyNum12,4); 
        
         $QueryInsertEntropyNum12 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("12","'.$JumlahNum12Jml.'","'.$JumlahNum12Yes.'","'.$JumlahNum12No.'","'.$getEntropyNum12.'")') ;      
//=========================================================================================================================================
        $EdNum13Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "13" AND income = ">50k"');
        $EdNum13No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "13" AND income = "<=50k" ');
        $EdNum13NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "13" '); 
         while( $jmlNum13Yes1 = mysqli_fetch_assoc($EdNum13Yes)){
              $JumlahNum13Yes = (int)$jmlNum13Yes1['jumlah_yes'];
        }   
        while( $jmlNum13No1 = mysqli_fetch_assoc($EdNum13No)){
              $JumlahNum13No = (int)$jmlNum13No1['jumlah_no'];
        }
        while( $jmlNum13Jml = mysqli_fetch_assoc($EdNum13NoJml)){
              $JumlahNum13Jml = (int)$jmlNum13Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum13 = $JumlahNum13Yes / $JumlahNum13Jml;    
        (float)$PerbandinganNoNum13 = $JumlahNum13No / $JumlahNum13Jml;                    
        $rumusEntropyNum13 = (-($PerbandinganNoNum13) * log($PerbandinganNoNum13,2)) + (-($PerbandinganYesNum13) * log($PerbandinganYesNum13,2));
         if(is_nan($rumusEntropyNum13)){
            $rumusEntropyNum13 = 0;
         }
         $getEntropyNum13 = round($rumusEntropyNum13,4); 
        
         $QueryInsertEntropyNum13 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("13","'.$JumlahNum13Jml.'","'.$JumlahNum13Yes.'","'.$JumlahNum13No.'","'.$getEntropyNum13.'")') ;      
//=========================================================================================================================================
        $EdNum14Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "14" AND income = ">50k"');
        $EdNum14No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "14" AND income = "<=50k" ');
        $EdNum14NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "14" '); 
         while( $jmlNum14Yes1 = mysqli_fetch_assoc($EdNum14Yes)){
              $JumlahNum14Yes = (int)$jmlNum14Yes1['jumlah_yes'];
        }   
        while( $jmlNum14No1 = mysqli_fetch_assoc($EdNum14No)){
              $JumlahNum14No = (int)$jmlNum14No1['jumlah_no'];
        }
        while( $jmlNum14Jml = mysqli_fetch_assoc($EdNum14NoJml)){
              $JumlahNum14Jml = (int)$jmlNum14Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum14 = $JumlahNum14Yes / $JumlahNum14Jml;    
        (float)$PerbandinganNoNum14 = $JumlahNum14No / $JumlahNum14Jml;                    
        $rumusEntropyNum14 = (-($PerbandinganNoNum14) * log($PerbandinganNoNum14,2)) + (-($PerbandinganYesNum14) * log($PerbandinganYesNum14,2));
         if(is_nan($rumusEntropyNum14)){
            $rumusEntropyNum14 = 0;
         }
         $getEntropyNum14 = round($rumusEntropyNum14,4); 
        
         $QueryInsertEntropyNum14 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("14","'.$JumlahNum14Jml.'","'.$JumlahNum14Yes.'","'.$JumlahNum14No.'","'.$getEntropyNum14.'")') ;      
//=========================================================================================================================================
        $EdNum15Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "15" AND income = ">50k"');
        $EdNum15No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "15" AND income = "<=50k" ');
        $EdNum15NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "15" '); 
         while( $jmlNum15Yes1 = mysqli_fetch_assoc($EdNum15Yes)){
              $JumlahNum15Yes = (int)$jmlNum15Yes1['jumlah_yes'];
        }   
        while( $jmlNum15No1 = mysqli_fetch_assoc($EdNum15No)){
              $JumlahNum15No = (int)$jmlNum15No1['jumlah_no'];
        }
        while( $jmlNum15Jml = mysqli_fetch_assoc($EdNum15NoJml)){
              $JumlahNum15Jml = (int)$jmlNum15Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum15 = $JumlahNum15Yes / $JumlahNum15Jml;    
        (float)$PerbandinganNoNum15 = $JumlahNum15No / $JumlahNum15Jml;                    
        $rumusEntropyNum15 = (-($PerbandinganNoNum15) * log($PerbandinganNoNum15,2)) + (-($PerbandinganYesNum15) * log($PerbandinganYesNum15,2));
         if(is_nan($rumusEntropyNum15)){
            $rumusEntropyNum15 = 0;
         }
         $getEntropyNum15 = round($rumusEntropyNum15,4); 
        
         $QueryInsertEntropyNum15 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("15","'.$JumlahNum15Jml.'","'.$JumlahNum15Yes.'","'.$JumlahNum15No.'","'.$getEntropyNum15.'")') ;      
//=========================================================================================================================================
        $EdNum16Yes= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_yes FROM sample2 WHERE education_num = "16" AND income = ">50k"');
        $EdNum16No= mysqli_query($con,'SELECT COUNT(education_num) as jumlah_no FROM sample2 WHERE education_num = "16" AND income = "<=50k" ');
        $EdNum16NoJml = mysqli_query($con,'SELECT COUNT(Education) as jumlah_kasus FROM sample2 WHERE education_num = "16" '); 
         while( $jmlNum16Yes1 = mysqli_fetch_assoc($EdNum16Yes)){
              $JumlahNum16Yes = (int)$jmlNum16Yes1['jumlah_yes'];
        }   
        while( $jmlNum16No1 = mysqli_fetch_assoc($EdNum16No)){
              $JumlahNum16No = (int)$jmlNum16No1['jumlah_no'];
        }
        while( $jmlNum16Jml = mysqli_fetch_assoc($EdNum16NoJml)){
              $JumlahNum16Jml = (int)$jmlNum16Jml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNum16 = $JumlahNum16Yes / $JumlahNum16Jml;    
        (float)$PerbandinganNoNum16 = $JumlahNum16No / $JumlahNum16Jml;                    
        $rumusEntropyNum16 = (-($PerbandinganNoNum16) * log($PerbandinganNoNum16,2)) + (-($PerbandinganYesNum16) * log($PerbandinganYesNum16,2));
         if(is_nan($rumusEntropyNum16)){
            $rumusEntropyNum16 = 0;
         }
         $getEntropyNum16 = round($rumusEntropyNum16,4); 
        
         $QueryInsertEntropyNum16 = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("16","'.$JumlahNum16Jml.'","'.$JumlahNum16Yes.'","'.$JumlahNum16No.'","'.$getEntropyNum16.'")') ;      
//=========================================================================================================================================
           $Num1 = ($JumlahNum1Jml / $JumlahKss) * $getEntropyNum1;        
        $Num2 = ($JumlahNum2Jml / $JumlahKss) * $getEntropyNum2;
        $Num3 = ($JumlahNum3Jml / $JumlahKss) * $getEntropyNum3;
        $Num4 = ($JumlahNum4Jml / $JumlahKss) * $getEntropyNum4;
        $Num5 = ($JumlahNum5Jml / $JumlahKss) * $getEntropyNum5;
        $Num6 = ($JumlahNum6Jml / $JumlahKss) * $getEntropyNum6;
        $Num7 = ($JumlahNum7Jml / $JumlahKss) * $getEntropyNum7;
        $Num8 = ($JumlahNum8Jml / $JumlahKss) * $getEntropyNum8;
        $Num9 = ($JumlahNum9Jml / $JumlahKss) * $getEntropyNum9;
        $Num10 =($JumlahNum10Jml / $JumlahKss) * $getEntropyNum10;
        $Num11 =($JumlahNum11Jml / $JumlahKss) * $getEntropyNum11;
        $Num12 =($JumlahNum12Jml / $JumlahKss) * $getEntropyNum12;
        $Num13 =($JumlahNum13Jml / $JumlahKss) * $getEntropyNum13;
        $Num14 =($JumlahNum14Jml / $JumlahKss) * $getEntropyNum14;
        $Num15 =($JumlahNum15Jml / $JumlahKss) * $getEntropyNum15;
        $Num16 =($JumlahNum16Jml / $JumlahKss) * $getEntropyNum16;
        (float)$GainTotalEdNum = $getEntropy - $Num1 + $Num2 + $Num3 + $Num4 + $Num5 + $Num6 + $Num7 + $Num8 + $Num9 + $Num10 + $Num11 + $Num12 + $Num13 + $Num14 + $Num15 + $Num16;
       
        $getGainTotalEdNum = round($GainTotalEdNum,4);
        $InsertGainTotalEdNum = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalEdNum.' WHERE ATRIBUT = "education_num" ');
//=========================================================================================================================================
        $MSDivorcedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Divorced" AND income = ">50k"');
        $MSDivorcedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Divorced" AND income = "<=50k" ');
        $MSDivorcedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Divorced" '); 
         while( $jmlDivorcedYes1 = mysqli_fetch_assoc($MSDivorcedYes)){
              $JumlahDivorcedYes = (int)$jmlDivorcedYes1['jumlah_yes'];
        }   
        while( $jmlDivorcedNo1 = mysqli_fetch_assoc($MSDivorcedNo)){
              $JumlahDivorcedNo = (int)$jmlDivorcedNo1['jumlah_no'];
        }
        while( $jmlDivorcedJml = mysqli_fetch_assoc($MSDivorcedJml)){
              $JumlahDivorcedJml = (int)$jmlDivorcedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesDivorced = $JumlahDivorcedYes / $JumlahDivorcedJml;    
        (float)$PerbandinganNoDivorced = $JumlahDivorcedNo / $JumlahDivorcedJml;                    
        $rumusEntropyDivorced = (-($PerbandinganNoDivorced) * log($PerbandinganNoDivorced,2)) + (-($PerbandinganYesDivorced) * log($PerbandinganYesDivorced,2));
         if(is_nan($rumusEntropyDivorced)){
            $rumusEntropyDivorced = 0;
         }
         $getEntropyDivorced = round($rumusEntropyDivorced,4); 
        $QueryInsertEntropyMaritalStatus = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("marital_status")');
         $QueryInsertEntropyDivorced = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Divorced","'.$JumlahDivorcedJml.'","'.$JumlahDivorcedYes.'","'.$JumlahDivorcedNo.'","'.$getEntropyDivorced.'")') ;
//=========================================================================================================================================
        $MSMarriedAFYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-AF-spouse" AND income = ">50k"');
        $MSMarriedAFNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-AF-spouse" AND income = "<=50k" ');
        $MSMarriedAFJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-AF-spouse" '); 
         while( $jmlMarriedAFYes1 = mysqli_fetch_assoc($MSMarriedAFYes)){
              $JumlahMarriedAFYes = (int)$jmlMarriedAFYes1['jumlah_yes'];
        }   
        while( $jmlMarriedAFNo1 = mysqli_fetch_assoc($MSMarriedAFNo)){
              $JumlahMarriedAFNo = (int)$jmlMarriedAFNo1['jumlah_no'];
        }
        while( $jmlMarriedAFJml = mysqli_fetch_assoc($MSMarriedAFJml)){
              $JumlahMarriedAFJml = (int)$jmlMarriedAFJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedAF = $JumlahMarriedAFYes / $JumlahMarriedAFJml;    
        (float)$PerbandinganNoMarriedAF = $JumlahMarriedAFNo / $JumlahMarriedAFJml;                    
        $rumusEntropyMarriedAF = (-($PerbandinganNoMarriedAF) * log($PerbandinganNoMarriedAF,2)) + (-($PerbandinganYesMarriedAF) * log($PerbandinganYesMarriedAF,2));
         if(is_nan($rumusEntropyMarriedAF)){
            $rumusEntropyMarriedAF = 0;
         }
         $getEntropyMarriedAF = round($rumusEntropyMarriedAF,4);
         $QueryInsertEntropyMarriedAF = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-AF-spouse","'.$JumlahMarriedAFJml.'","'.$JumlahMarriedAFYes.'","'.$JumlahMarriedAFNo.'","'.$getEntropyMarriedAF.'")') ;
//=========================================================================================================================================
        $MSMarriedCIVYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-civ-spouse" AND income = ">50k"');
        $MSMarriedCIVNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-civ-spouse" AND income = "<=50k" ');
        $MSMarriedCIVJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-civ-spouse" '); 
         while( $jmlMarriedCIVYes1 = mysqli_fetch_assoc($MSMarriedCIVYes)){
              $JumlahMarriedCIVYes = (int)$jmlMarriedCIVYes1['jumlah_yes'];
        }   
        while( $jmlMarriedCIVNo1 = mysqli_fetch_assoc($MSMarriedCIVNo)){
              $JumlahMarriedCIVNo = (int)$jmlMarriedCIVNo1['jumlah_no'];
        }
        while( $jmlMarriedCIVJml = mysqli_fetch_assoc($MSMarriedCIVJml)){
              $JumlahMarriedCIVJml = (int)$jmlMarriedCIVJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedCIV = $JumlahMarriedCIVYes / $JumlahMarriedCIVJml;    
        (float)$PerbandinganNoMarriedCIV = $JumlahMarriedCIVNo / $JumlahMarriedCIVJml;                    
        $rumusEntropyMarriedCIV = (-($PerbandinganNoMarriedCIV) * log($PerbandinganNoMarriedCIV,2)) + (-($PerbandinganYesMarriedCIV) * log($PerbandinganYesMarriedCIV,2));
         if(is_nan($rumusEntropyMarriedCIV)){
            $rumusEntropyMarriedCIV = 0;
         }
         $getEntropyMarriedCIV = round($rumusEntropyMarriedCIV,4);
         $QueryInsertEntropyMarriedCIV = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-civ-spouse","'.$JumlahMarriedCIVJml.'","'.$JumlahMarriedCIVYes.'","'.$JumlahMarriedCIVNo.'","'.$getEntropyMarriedCIV.'")') ;
//=========================================================================================================================================
        $MSMarriedSpouseYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Married-spouse-absent" AND income = ">50k"');
        $MSMarriedSpouseNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Married-spouse-absent" AND income = "<=50k" ');
        $MSMarriedSpouseJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Married-spouse-absent" '); 
         while( $jmlMarriedSpouseYes1 = mysqli_fetch_assoc($MSMarriedSpouseYes)){
              $JumlahMarriedSpouseYes = (int)$jmlMarriedSpouseYes1['jumlah_yes'];
        }   
        while( $jmlMarriedSpouseNo1 = mysqli_fetch_assoc($MSMarriedSpouseNo)){
              $JumlahMarriedSpouseNo = (int)$jmlMarriedSpouseNo1['jumlah_no'];
        }
        while( $jmlMarriedSpouseJml = mysqli_fetch_assoc($MSMarriedSpouseJml)){
              $JumlahMarriedSpouseJml = (int)$jmlMarriedSpouseJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMarriedSpouse = $JumlahMarriedSpouseYes / $JumlahMarriedSpouseJml;    
        (float)$PerbandinganNoMarriedSpouse = $JumlahMarriedSpouseNo / $JumlahMarriedSpouseJml;                    
        $rumusEntropyMarriedSpouse = (-($PerbandinganNoMarriedSpouse) * log($PerbandinganNoMarriedSpouse,2)) + (-($PerbandinganYesMarriedSpouse) * log($PerbandinganYesMarriedSpouse,2));
         if(is_nan($rumusEntropyMarriedSpouse)){
            $rumusEntropyMarriedSpouse = 0;
         }
         $getEntropyMarriedSpouse = round($rumusEntropyMarriedSpouse,4);
         $QueryInsertEntropyMarriedSpouse = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Married-spouse-absent","'.$JumlahMarriedSpouseJml.'","'.$JumlahMarriedSpouseYes.'","'.$JumlahMarriedSpouseNo.'","'.$getEntropyMarriedSpouse.'")') ;
//=========================================================================================================================================
        $MSNeverYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Never-married" AND income = ">50k"');
        $MSNeverNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Never-married" AND income = "<=50k" ');
        $MSNeverJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Never-married" '); 
         while( $jmlNeverYes1 = mysqli_fetch_assoc($MSNeverYes)){
              $JumlahNeverYes = (int)$jmlNeverYes1['jumlah_yes'];
        }   
        while( $jmlNeverNo1 = mysqli_fetch_assoc($MSNeverNo)){
              $JumlahNeverNo = (int)$jmlNeverNo1['jumlah_no'];
        }
        while( $jmlNeverJml = mysqli_fetch_assoc($MSNeverJml)){
              $JumlahNeverJml = (int)$jmlNeverJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNever = $JumlahNeverYes / $JumlahNeverJml;    
        (float)$PerbandinganNoNever = $JumlahNeverNo / $JumlahNeverJml;                    
        $rumusEntropyNever = (-($PerbandinganNoNever) * log($PerbandinganNoNever,2)) + (-($PerbandinganYesNever) * log($PerbandinganYesNever,2));
         if(is_nan($rumusEntropyNever)){
            $rumusEntropyNever = 0;
         }
         $getEntropyNever = round($rumusEntropyNever,4);
         $QueryInsertEntropyNever = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Never-married","'.$JumlahNeverJml.'","'.$JumlahNeverYes.'","'.$JumlahNeverNo.'","'.$getEntropyNever.'")') ;
//=========================================================================================================================================
        $MSSeparatedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Separated" AND income = ">50k"');
        $MSSeparatedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Separated" AND income = "<=50k" ');
        $MSSeparatedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Separated" '); 
         while( $jmlSeparatedYes1 = mysqli_fetch_assoc($MSSeparatedYes)){
              $JumlahSeparatedYes = (int)$jmlSeparatedYes1['jumlah_yes'];
        }   
        while( $jmlSeparatedNo1 = mysqli_fetch_assoc($MSSeparatedNo)){
              $JumlahSeparatedNo = (int)$jmlSeparatedNo1['jumlah_no'];
        }
        while( $jmlSeparatedJml = mysqli_fetch_assoc($MSSeparatedJml)){
              $JumlahSeparatedJml = (int)$jmlSeparatedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSeparated = $JumlahSeparatedYes / $JumlahSeparatedJml;    
        (float)$PerbandinganNoSeparated = $JumlahSeparatedNo / $JumlahSeparatedJml;                    
        $rumusEntropySeparated = (-($PerbandinganNoSeparated) * log($PerbandinganNoSeparated,2)) + (-($PerbandinganYesSeparated) * log($PerbandinganYesSeparated,2));
         if(is_nan($rumusEntropySeparated)){
            $rumusEntropySeparated = 0;
         }
         $getEntropySeparated = round($rumusEntropySeparated,4);
         $QueryInsertEntropySeparated = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Separated","'.$JumlahSeparatedJml.'","'.$JumlahSeparatedYes.'","'.$JumlahSeparatedNo.'","'.$getEntropySeparated.'")') ;
//=========================================================================================================================================
        $MSWidowedYes= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_yes FROM sample2 WHERE marital_status = "Widowed" AND income = ">50k"');
        $MSWidowedNo= mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_no FROM sample2 WHERE marital_status = "Widowed" AND income = "<=50k" ');
        $MSWidowedJml = mysqli_query($con,'SELECT COUNT(marital_status) as jumlah_kasus FROM sample2 WHERE marital_status = "Widowed" '); 
         while( $jmlWidowedYes1 = mysqli_fetch_assoc($MSWidowedYes)){
              $JumlahWidowedYes = (int)$jmlWidowedYes1['jumlah_yes'];
        }   
        while( $jmlWidowedNo1 = mysqli_fetch_assoc($MSWidowedNo)){
              $JumlahWidowedNo = (int)$jmlWidowedNo1['jumlah_no'];
        }
        while( $jmlWidowedJml = mysqli_fetch_assoc($MSWidowedJml)){
              $JumlahWidowedJml = (int)$jmlWidowedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWidowed = $JumlahWidowedYes / $JumlahWidowedJml;    
        (float)$PerbandinganNoWidowed = $JumlahWidowedNo / $JumlahWidowedJml;                    
        $rumusEntropyWidowed = (-($PerbandinganNoWidowed) * log($PerbandinganNoWidowed,2)) + (-($PerbandinganYesWidowed) * log($PerbandinganYesWidowed,2));
         if(is_nan($rumusEntropyWidowed)){
            $rumusEntropyWidowed = 0;
         }
         $getEntropyWidowed = round($rumusEntropyWidowed,4);
         $QueryInsertEntropyWidowed = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Widowed","'.$JumlahWidowedJml.'","'.$JumlahWidowedYes.'","'.$JumlahWidowedNo.'","'.$getEntropyWidowed.'")') ;
//=========================================================================================================================================
        $Divorced = ($JumlahDivorcedJml / $JumlahKss) * $getEntropyDivorced;        
        $MarriedAF = ($JumlahMarriedAFJml / $JumlahKss) * $getEntropyMarriedAF;
        $MarriedCIV = ($JumlahMarriedCIVJml / $JumlahKss) * $getEntropyMarriedCIV;
        $MarriedSpouse = ($JumlahMarriedSpouseJml / $JumlahKss) * $getEntropyMarriedSpouse;
        $Never = ($JumlahNeverJml / $JumlahKss) * $getEntropyNever;
        $Separated = ($JumlahSeparatedJml / $JumlahKss) * $getEntropySeparated;
        $Widowed = ($JumlahWidowedJml / $JumlahKss) * $getEntropyWidowed;
        
        (float)$getGainTotalMS = $getEntropy - $Divorced + $MarriedAF + $MarriedCIV + $MarriedSpouse + $Never + $Separated + $Widowed;
       
        $getGainTotalMS = round($GainTotalEdNum,4);
        $InsertGainTotalMS = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalMS.' WHERE ATRIBUT = "marital_status" ');
//=========================================================================================================================================   
        $OAdmYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Adm-clerical" AND income = ">50k"');
        $OAdmNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Adm-clerical" AND income = "<=50k" ');
        $OAdmJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Adm-clerical" '); 
         while( $jmlAdmYes1 = mysqli_fetch_assoc($OAdmYes)){
              $JumlahAdmYes = (int)$jmlAdmYes1['jumlah_yes'];
        }   
        while( $jmlAdmNo1 = mysqli_fetch_assoc($OAdmNo)){
              $JumlahAdmNo = (int)$jmlAdmNo1['jumlah_no'];
        }
        while( $jmlAdmJml = mysqli_fetch_assoc($OAdmJml)){
              $JumlahAdmJml = (int)$jmlAdmJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAdm = $JumlahAdmYes / $JumlahAdmJml;    
        (float)$PerbandinganNoAdm = $JumlahAdmNo / $JumlahAdmJml;                    
        $rumusEntropyAdm = (-($PerbandinganNoAdm) * log($PerbandinganNoAdm,2)) + (-($PerbandinganYesAdm) * log($PerbandinganYesAdm,2));
         if(is_nan($rumusEntropyAdm)){
            $rumusEntropyAdm = 0;
         }
         $getEntropyAdm = round($rumusEntropyAdm,4);
              $QueryInsertEntropyOccupation = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Occupation")');
         $QueryInsertEntropyAdm = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Adm-clerical","'.$JumlahAdmJml.'","'.$JumlahAdmYes.'","'.$JumlahAdmNo.'","'.$getEntropyAdm.'")') ;
//=========================================================================================================================================
        $OArmedYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Armed-Forces" AND income = ">50k"');
        $OArmedNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Armed-Forces" AND income = "<=50k" ');
        $OArmedJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Armed-Forces" '); 
         while( $jmlArmedYes1 = mysqli_fetch_assoc($OArmedYes)){
              $JumlahArmedYes = (int)$jmlArmedYes1['jumlah_yes'];
        }   
        while( $jmlArmedNo1 = mysqli_fetch_assoc($OArmedNo)){
              $JumlahArmedNo = (int)$jmlArmedNo1['jumlah_no'];
        }
        while( $jmlArmedJml = mysqli_fetch_assoc($OArmedJml)){
              $JumlahArmedJml = (int)$jmlArmedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesArmed = $JumlahArmedYes / $JumlahArmedJml;    
        (float)$PerbandinganNoArmed = $JumlahArmedNo / $JumlahArmedJml;                    
        $rumusEntropyArmed = (-($PerbandinganNoArmed) * log($PerbandinganNoArmed,2)) + (-($PerbandinganYesArmed) * log($PerbandinganYesArmed,2));
         if(is_nan($rumusEntropyArmed)){
            $rumusEntropyArmed = 0;
         }
         $getEntropyArmed = round($rumusEntropyArmed,4);
         $QueryInsertEntropyArmed = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Armed-Forces","'.$JumlahArmedJml.'","'.$JumlahArmedYes.'","'.$JumlahArmedNo.'","'.$getEntropyArmed.'")') ;
//=========================================================================================================================================
        $OCraftYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Craft-repair" AND income = ">50k"');
        $OCraftNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Craft-repair" AND income = "<=50k" ');
        $OCraftJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Craft-repair" '); 
         while( $jmlCraftYes1 = mysqli_fetch_assoc($OCraftYes)){
              $JumlahCraftYes = (int)$jmlCraftYes1['jumlah_yes'];
        }   
        while( $jmlCraftNo1 = mysqli_fetch_assoc($OCraftNo)){
              $JumlahCraftNo = (int)$jmlCraftNo1['jumlah_no'];
        }
        while( $jmlCraftJml = mysqli_fetch_assoc($OCraftJml)){
              $JumlahCraftJml = (int)$jmlCraftJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesCraft = $JumlahCraftYes / $JumlahCraftJml;    
        (float)$PerbandinganNoCraft = $JumlahCraftNo / $JumlahCraftJml;                    
        $rumusEntropyCraft = (-($PerbandinganNoCraft) * log($PerbandinganNoCraft,2)) + (-($PerbandinganYesCraft) * log($PerbandinganYesCraft,2));
         if(is_nan($rumusEntropyCraft)){
            $rumusEntropyCraft = 0;
         }
         $getEntropyCraft = round($rumusEntropyCraft,4);
              
         $QueryInsertEntropyCraft = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Craft-repair","'.$JumlahCraftJml.'","'.$JumlahCraftYes.'","'.$JumlahCraftNo.'","'.$getEntropyCraft.'")') ;
//=========================================================================================================================================
        $OExecYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Exec-managerial" AND income = ">50k"');
        $OExecNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Exec-managerial" AND income = "<=50k" ');
        $OExecJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Exec-managerial" '); 
         while( $jmlExecYes1 = mysqli_fetch_assoc($OExecYes)){
              $JumlahExecYes = (int)$jmlExecYes1['jumlah_yes'];
        }   
        while( $jmlExecNo1 = mysqli_fetch_assoc($OExecNo)){
              $JumlahExecNo = (int)$jmlExecNo1['jumlah_no'];
        }
        while( $jmlExecJml = mysqli_fetch_assoc($OExecJml)){
              $JumlahExecJml = (int)$jmlExecJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesExec = $JumlahExecYes / $JumlahExecJml;    
        (float)$PerbandinganNoExec = $JumlahExecNo / $JumlahExecJml;                    
        $rumusEntropyExec = (-($PerbandinganNoExec) * log($PerbandinganNoExec,2)) + (-($PerbandinganYesExec) * log($PerbandinganYesExec,2));
         if(is_nan($rumusEntropyExec)){
            $rumusEntropyExec = 0;
         }
         $getEntropyExec = round($rumusEntropyExec,4);
              
         $QueryInsertEntropyExec = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Exec-managerial","'.$JumlahExecJml.'","'.$JumlahExecYes.'","'.$JumlahExecNo.'","'.$getEntropyExec.'")') ;
//=========================================================================================================================================    
        $OFarmingYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Farming-fishing" AND income = ">50k"');
        $OFarmingNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Farming-fishing" AND income = "<=50k" ');
        $OFarmingJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Farming-fishing" '); 
         while( $jmlFarmingYes1 = mysqli_fetch_assoc($OFarmingYes)){
              $JumlahFarmingYes = (int)$jmlFarmingYes1['jumlah_yes'];
        }   
        while( $jmlFarmingNo1 = mysqli_fetch_assoc($OFarmingNo)){
              $JumlahFarmingNo = (int)$jmlFarmingNo1['jumlah_no'];
        }
        while( $jmlFarmingJml = mysqli_fetch_assoc($OFarmingJml)){
              $JumlahFarmingJml = (int)$jmlFarmingJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesFarming = $JumlahFarmingYes / $JumlahFarmingJml;    
        (float)$PerbandinganNoFarming = $JumlahFarmingNo / $JumlahFarmingJml;                    
        $rumusEntropyFarming = (-($PerbandinganNoFarming) * log($PerbandinganNoFarming,2)) + (-($PerbandinganYesFarming) * log($PerbandinganYesFarming,2));
         if(is_nan($rumusEntropyFarming)){
            $rumusEntropyFarming = 0;
         }
         $getEntropyFarming = round($rumusEntropyFarming,4);
             
         $QueryInsertEntropyFarming = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Farming-fishing","'.$JumlahFarmingJml.'","'.$JumlahFarmingYes.'","'.$JumlahFarmingNo.'","'.$getEntropyFarming.'")') ;
//=========================================================================================================================================
        $OHandlersYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Handlers-cleaners" AND income = ">50k"');
        $OHandlersNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Handlers-cleaners" AND income = "<=50k" ');
        $OHandlersJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Handlers-cleaners" '); 
         while( $jmlHandlersYes1 = mysqli_fetch_assoc($OHandlersYes)){
              $JumlahHandlersYes = (int)$jmlHandlersYes1['jumlah_yes'];
        }   
        while( $jmlHandlersNo1 = mysqli_fetch_assoc($OHandlersNo)){
              $JumlahHandlersNo = (int)$jmlHandlersNo1['jumlah_no'];
        }
        while( $jmlHandlersJml = mysqli_fetch_assoc($OHandlersJml)){
              $JumlahHandlersJml = (int)$jmlHandlersJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHandlers = $JumlahHandlersYes / $JumlahHandlersJml;    
        (float)$PerbandinganNoHandlers = $JumlahHandlersNo / $JumlahHandlersJml;                    
        $rumusEntropyHandlers = (-($PerbandinganNoHandlers) * log($PerbandinganNoHandlers,2)) + (-($PerbandinganYesHandlers) * log($PerbandinganYesHandlers,2));
         if(is_nan($rumusEntropyHandlers)){
            $rumusEntropyHandlers = 0;
         }
         $getEntropyHandlers = round($rumusEntropyHandlers,4);
              
         $QueryInsertEntropyHandlers = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Handlers-cleaners","'.$JumlahHandlersJml.'","'.$JumlahHandlersYes.'","'.$JumlahHandlersNo.'","'.$getEntropyHandlers.'")') ;
//=========================================================================================================================================
        $OMachineYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Machine-op-inspct" AND income = ">50k"');
        $OMachineNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Machine-op-inspct" AND income = "<=50k" ');
        $OMachineJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Machine-op-inspct" '); 
         while( $jmlMachineYes1 = mysqli_fetch_assoc($OMachineYes)){
              $JumlahMachineYes = (int)$jmlMachineYes1['jumlah_yes'];
        }   
        while( $jmlMachineNo1 = mysqli_fetch_assoc($OMachineNo)){
              $JumlahMachineNo = (int)$jmlMachineNo1['jumlah_no'];
        }
        while( $jmlMachineJml = mysqli_fetch_assoc($OMachineJml)){
              $JumlahMachineJml = (int)$jmlMachineJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMachine = $JumlahMachineYes / $JumlahMachineJml;    
        (float)$PerbandinganNoMachine = $JumlahMachineNo / $JumlahMachineJml;                    
        $rumusEntropyMachine = (-($PerbandinganNoMachine) * log($PerbandinganNoMachine,2)) + (-($PerbandinganYesMachine) * log($PerbandinganYesMachine,2));
         if(is_nan($rumusEntropyMachine)){
            $rumusEntropyMachine = 0;
         }
         $getEntropyMachine = round($rumusEntropyMachine,4);
              
         $QueryInsertEntropyMachine = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Machine-op-inspct","'.$JumlahMachineJml.'","'.$JumlahMachineYes.'","'.$JumlahMachineNo.'","'.$getEntropyMachine.'")') ;
//=========================================================================================================================================
        $OOtherserviceYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Other-service" AND income = ">50k"');
        $OOtherserviceNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Other-service" AND income = "<=50k" ');
        $OOtherserviceJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Other-service" '); 
         while( $jmlOtherserviceYes1 = mysqli_fetch_assoc($OOtherserviceYes)){
              $JumlahOtherserviceYes = (int)$jmlOtherserviceYes1['jumlah_yes'];
        }   
        while( $jmlOtherserviceNo1 = mysqli_fetch_assoc($OOtherserviceNo)){
              $JumlahOtherserviceNo = (int)$jmlOtherserviceNo1['jumlah_no'];
        }
        while( $jmlOtherserviceJml = mysqli_fetch_assoc($OOtherserviceJml)){
              $JumlahOtherserviceJml = (int)$jmlOtherserviceJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherservice = $JumlahOtherserviceYes / $JumlahOtherserviceJml;    
        (float)$PerbandinganNoOtherservice = $JumlahOtherserviceNo / $JumlahOtherserviceJml;                    
        $rumusEntropyOtherservice = (-($PerbandinganNoOtherservice) * log($PerbandinganNoOtherservice,2)) + (-($PerbandinganYesOtherservice) * log($PerbandinganYesOtherservice,2));
         if(is_nan($rumusEntropyOtherservice)){
            $rumusEntropyOtherservice = 0;
         }
         $getEntropyOtherservice = round($rumusEntropyOtherservice,4);
              
         $QueryInsertEntropyOtherservice = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other-service","'.$JumlahOtherserviceJml.'","'.$JumlahOtherserviceYes.'","'.$JumlahOtherserviceNo.'","'.$getEntropyOtherservice.'")') ;
//=========================================================================================================================================
        $OPrivhouseYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Priv-house-serv" AND income = ">50k"');
        $OPrivhouseNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Priv-house-serv" AND income = "<=50k" ');
        $OPrivhouseJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Priv-house-serv" '); 
         while( $jmlPrivhouseYes1 = mysqli_fetch_assoc($OPrivhouseYes)){
              $JumlahPrivhouseYes = (int)$jmlPrivhouseYes1['jumlah_yes'];
        }   
        while( $jmlPrivhouseNo1 = mysqli_fetch_assoc($OPrivhouseNo)){
              $JumlahPrivhouseNo = (int)$jmlPrivhouseNo1['jumlah_no'];
        }
        while( $jmlPrivhouseJml = mysqli_fetch_assoc($OPrivhouseJml)){
              $JumlahPrivhouseJml = (int)$jmlPrivhouseJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesPrivhouse = $JumlahPrivhouseYes / $JumlahPrivhouseJml;    
        (float)$PerbandinganNoPrivhouse = $JumlahPrivhouseNo / $JumlahPrivhouseJml;                    
        $rumusEntropyPrivhouse = (-($PerbandinganNoPrivhouse) * log($PerbandinganNoPrivhouse,2)) + (-($PerbandinganYesPrivhouse) * log($PerbandinganYesPrivhouse,2));
         if(is_nan($rumusEntropyPrivhouse)){
            $rumusEntropyPrivhouse = 0;
         }
         $getEntropyPrivhouse = round($rumusEntropyPrivhouse,4);
              
         $QueryInsertEntropyPrivhouse = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Priv-house-serv","'.$JumlahPrivhouseJml.'","'.$JumlahPrivhouseYes.'","'.$JumlahPrivhouseNo.'","'.$getEntropyPrivhouse.'")') ;
//=========================================================================================================================================
        $OProfspecialtyYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Prof-specialty" AND income = ">50k"');
        $OProfspecialtyNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Prof-specialty" AND income = "<=50k" ');
        $OProfspecialtyJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Prof-specialty" '); 
         while( $jmlProfspecialtyYes1 = mysqli_fetch_assoc($OProfspecialtyYes)){
              $JumlahProfspecialtyYes = (int)$jmlProfspecialtyYes1['jumlah_yes'];
        }   
        while( $jmlProfspecialtyNo1 = mysqli_fetch_assoc($OProfspecialtyNo)){
              $JumlahProfspecialtyNo = (int)$jmlProfspecialtyNo1['jumlah_no'];
        }
        while( $jmlProfspecialtyJml = mysqli_fetch_assoc($OProfspecialtyJml)){
              $JumlahProfspecialtyJml = (int)$jmlProfspecialtyJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProfspecialty = $JumlahProfspecialtyYes / $JumlahProfspecialtyJml;    
        (float)$PerbandinganNoProfspecialty = $JumlahProfspecialtyNo / $JumlahProfspecialtyJml;                    
        $rumusEntropyProfspecialty = (-($PerbandinganNoProfspecialty) * log($PerbandinganNoProfspecialty,2)) + (-($PerbandinganYesProfspecialty) * log($PerbandinganYesProfspecialty,2));
         if(is_nan($rumusEntropyProfspecialty)){
            $rumusEntropyProfspecialty = 0;
         }
         $getEntropyProfspecialty = round($rumusEntropyProfspecialty,4);
              
         $QueryInsertEntropyProfspecialty = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Prof-specialty","'.$JumlahProfspecialtyJml.'","'.$JumlahProfspecialtyYes.'","'.$JumlahProfspecialtyNo.'","'.$getEntropyProfspecialty.'")') ;
//=========================================================================================================================================
        $OProtectiveYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Protective-serv" AND income = ">50k"');
        $OProtectiveNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Protective-serv" AND income = "<=50k" ');
        $OProtectiveJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Protective-serv" '); 
         while( $jmlProtectiveYes1 = mysqli_fetch_assoc($OProtectiveYes)){
              $JumlahProtectiveYes = (int)$jmlProtectiveYes1['jumlah_yes'];
        }   
        while( $jmlProtectiveNo1 = mysqli_fetch_assoc($OProtectiveNo)){
              $JumlahProtectiveNo = (int)$jmlProtectiveNo1['jumlah_no'];
        }
        while( $jmlProtectiveJml = mysqli_fetch_assoc($OProtectiveJml)){
              $JumlahProtectiveJml = (int)$jmlProtectiveJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesProtective = $JumlahProtectiveYes / $JumlahProtectiveJml;    
        (float)$PerbandinganNoProtective = $JumlahProtectiveNo / $JumlahProtectiveJml;                    
        $rumusEntropyProtective = (-($PerbandinganNoProtective) * log($PerbandinganNoProtective,2)) + (-($PerbandinganYesProtective) * log($PerbandinganYesProtective,2));
         if(is_nan($rumusEntropyProtective)){
            $rumusEntropyProtective = 0;
         }
         $getEntropyProtective = round($rumusEntropyProtective,4);
              
         $QueryInsertEntropyProtective = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Protective-serv","'.$JumlahProtectiveJml.'","'.$JumlahProtectiveYes.'","'.$JumlahProtectiveNo.'","'.$getEntropyProtective.'")') ;
//=========================================================================================================================================
        $OSalesYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Sales" AND income = ">50k"');
        $OSalesNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Sales" AND income = "<=50k" ');
        $OSalesJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Sales" '); 
         while( $jmlSalesYes1 = mysqli_fetch_assoc($OSalesYes)){
              $JumlahSalesYes = (int)$jmlSalesYes1['jumlah_yes'];
        }   
        while( $jmlSalesNo1 = mysqli_fetch_assoc($OSalesNo)){
              $JumlahSalesNo = (int)$jmlSalesNo1['jumlah_no'];
        }
        while( $jmlSalesJml = mysqli_fetch_assoc($OSalesJml)){
              $JumlahSalesJml = (int)$jmlSalesJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesSales = $JumlahSalesYes / $JumlahSalesJml;    
        (float)$PerbandinganNoSales = $JumlahSalesNo / $JumlahSalesJml;                    
        $rumusEntropySales = (-($PerbandinganNoSales) * log($PerbandinganNoSales,2)) + (-($PerbandinganYesSales) * log($PerbandinganYesSales,2));
         if(is_nan($rumusEntropySales)){
            $rumusEntropySales = 0;
         }
         $getEntropySales = round($rumusEntropySales,4);
              
         $QueryInsertEntropySales = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Sales","'.$JumlahSalesJml.'","'.$JumlahSalesYes.'","'.$JumlahSalesNo.'","'.$getEntropySales.'")') ;
//=========================================================================================================================================
        $OTechsupportYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Tech-support" AND income = ">50k"');
        $OTechsupportNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Tech-support" AND income = "<=50k" ');
        $OTechsupportJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Tech-support" '); 
         while( $jmlTechsupportYes1 = mysqli_fetch_assoc($OTechsupportYes)){
              $JumlahTechsupportYes = (int)$jmlTechsupportYes1['jumlah_yes'];
        }   
        while( $jmlTechsupportNo1 = mysqli_fetch_assoc($OTechsupportNo)){
              $JumlahTechsupportNo = (int)$jmlTechsupportNo1['jumlah_no'];
        }
        while( $jmlTechsupportJml = mysqli_fetch_assoc($OTechsupportJml)){
              $JumlahTechsupportJml = (int)$jmlTechsupportJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesTechsupport = $JumlahTechsupportYes / $JumlahTechsupportJml;    
        (float)$PerbandinganNoTechsupport = $JumlahTechsupportNo / $JumlahTechsupportJml;                    
        $rumusEntropyTechsupport = (-($PerbandinganNoTechsupport) * log($PerbandinganNoTechsupport,2)) + (-($PerbandinganYesTechsupport) * log($PerbandinganYesTechsupport,2));
         if(is_nan($rumusEntropyTechsupport)){
            $rumusEntropyTechsupport = 0;
         }
         $getEntropyTechsupport = round($rumusEntropyTechsupport,4);
              
         $QueryInsertEntropyTechsupport = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Tech-support","'.$JumlahTechsupportJml.'","'.$JumlahTechsupportYes.'","'.$JumlahTechsupportNo.'","'.$getEntropyTechsupport.'")') ;
//=========================================================================================================================================
        $OTransportYes= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_yes FROM sample2 WHERE Occupation = "Transport-moving" AND income = ">50k"');
        $OTransportNo= mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_no FROM sample2 WHERE Occupation = "Transport-moving" AND income = "<=50k" ');
        $OTransportJml = mysqli_query($con,'SELECT COUNT(Occupation) as jumlah_kasus FROM sample2 WHERE Occupation = "Transport-moving" '); 
         while( $jmlTransportYes1 = mysqli_fetch_assoc($OTransportYes)){
              $JumlahTransportYes = (int)$jmlTransportYes1['jumlah_yes'];
        }   
        while( $jmlTransportNo1 = mysqli_fetch_assoc($OTransportNo)){
              $JumlahTransportNo = (int)$jmlTransportNo1['jumlah_no'];
        }
        while( $jmlTransportJml = mysqli_fetch_assoc($OTransportJml)){
              $JumlahTransportJml = (int)$jmlTransportJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesTransport = $JumlahTransportYes / $JumlahTransportJml;    
        (float)$PerbandinganNoTransport = $JumlahTransportNo / $JumlahTransportJml;                    
        $rumusEntropyTransport = (-($PerbandinganNoTransport) * log($PerbandinganNoTransport,2)) + (-($PerbandinganYesTransport) * log($PerbandinganYesTransport,2));
         if(is_nan($rumusEntropyTransport)){
            $rumusEntropyTransport = 0;
         }
         $getEntropyTransport = round($rumusEntropyTransport,4);
              
         $QueryInsertEntropyTransport = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Transport-moving","'.$JumlahTransportJml.'","'.$JumlahTransportYes.'","'.$JumlahTransportNo.'","'.$getEntropyTransport.'")') ;
//=========================================================================================================================================
        $Adm = ($JumlahAdmJml / $JumlahKss) * $getEntropyAdm;        
        $Armed = ($JumlahArmedJml / $JumlahKss) * $getEntropyArmed;
        $Craft = ($JumlahCraftJml / $JumlahKss) * $getEntropyCraft;
        $Exec = ($JumlahExecJml / $JumlahKss) * $getEntropyExec;
        $Farming = ($JumlahFarmingJml / $JumlahKss) * $getEntropyFarming;
        $Handlers = ($JumlahHandlersJml / $JumlahKss) * $getEntropyHandlers;
        $Machine = ($JumlahMachineJml / $JumlahKss) * $getEntropyMachine;
        $Otherservice = ($JumlahOtherserviceJml / $JumlahKss) * $getEntropyOtherservice;
        $Privhouse = ($JumlahPrivhouseJml / $JumlahKss) * $getEntropyPrivhouse;
        $Profspecialty = ($JumlahProfspecialtyJml / $JumlahKss) * $getEntropyProfspecialty;
        $Protective = ($JumlahProtectiveJml / $JumlahKss) * $getEntropyProtective;
        $Sales = ($JumlahSalesJml / $JumlahKss) * $getEntropySales;
        $Techsupport = ($JumlahTechsupportJml / $JumlahKss) * $getEntropyTechsupport;
        $Transport = ($JumlahTransportJml / $JumlahKss) * $getEntropyTransport;
        (float)$getGainTotalOccupation = $getEntropy - $Adm + $Armed + $Craft + $Exec + $Farming + $Handlers + $Machine + $Otherservice + $Privhouse + $Profspecialty + $Protective + $Sales + $Techsupport + $Transport ;
       
        $getGainTotalOccupation = round($getGainTotalOccupation,4);
        $InsertGainTotalOccupation = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalOccupation.' WHERE ATRIBUT = "Occupation" ');
//=========================================================================================================================================
        $RSHusbandYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Husband" AND income = ">50k"');
        $RSHusbandNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Husband" AND income = "<=50k" ');
        $RSHusbandJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Husband" '); 
         while( $jmlHusbandYes1 = mysqli_fetch_assoc($RSHusbandYes)){
              $JumlahHusbandYes = (int)$jmlHusbandYes1['jumlah_yes'];
        }   
        while( $jmlHusbandNo1 = mysqli_fetch_assoc($RSHusbandNo)){
              $JumlahHusbandNo = (int)$jmlHusbandNo1['jumlah_no'];
        }
        while( $jmlHusbandJml = mysqli_fetch_assoc($RSHusbandJml)){
              $JumlahHusbandJml = (int)$jmlHusbandJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesHusband = $JumlahHusbandYes / $JumlahHusbandJml;    
        (float)$PerbandinganNoHusband = $JumlahHusbandNo / $JumlahHusbandJml;                    
        $rumusEntropyHusband = (-($PerbandinganNoHusband) * log($PerbandinganNoHusband,2)) + (-($PerbandinganYesHusband) * log($PerbandinganYesHusband,2));
         if(is_nan($rumusEntropyHusband)){
            $rumusEntropyHusband = 0;
         }
         $getEntropyHusband = round($rumusEntropyHusband,4);
              $QueryInsertEntropyRelationship = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Relationship")');
         $QueryInsertEntropyHusband = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Husband","'.$JumlahHusbandJml.'","'.$JumlahHusbandYes.'","'.$JumlahHusbandNo.'","'.$getEntropyHusband.'")') ;
//=========================================================================================================================================
        $RSNotinfamilyYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Not-in-family" AND income = ">50k"');
        $RSNotinfamilyNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Not-in-family" AND income = "<=50k" ');
        $RSNotinfamilyJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Not-in-family" '); 
         while( $jmlNotinfamilyYes1 = mysqli_fetch_assoc($RSNotinfamilyYes)){
              $JumlahNotinfamilyYes = (int)$jmlNotinfamilyYes1['jumlah_yes'];
        }   
        while( $jmlNotinfamilyNo1 = mysqli_fetch_assoc($RSNotinfamilyNo)){
              $JumlahNotinfamilyNo = (int)$jmlNotinfamilyNo1['jumlah_no'];
        }
        while( $jmlNotinfamilyJml = mysqli_fetch_assoc($RSNotinfamilyJml)){
              $JumlahNotinfamilyJml = (int)$jmlNotinfamilyJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesNotinfamily = $JumlahNotinfamilyYes / $JumlahNotinfamilyJml;    
        (float)$PerbandinganNoNotinfamily = $JumlahNotinfamilyNo / $JumlahNotinfamilyJml;                    
        $rumusEntropyNotinfamily = (-($PerbandinganNoNotinfamily) * log($PerbandinganNoNotinfamily,2)) + (-($PerbandinganYesNotinfamily) * log($PerbandinganYesNotinfamily,2));
         if(is_nan($rumusEntropyNotinfamily)){
            $rumusEntropyNotinfamily = 0;
         }
         $getEntropyNotinfamily = round($rumusEntropyNotinfamily,4);
              
         $QueryInsertEntropyNotinfamily = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Not-in-family","'.$JumlahNotinfamilyJml.'","'.$JumlahNotinfamilyYes.'","'.$JumlahNotinfamilyNo.'","'.$getEntropyNotinfamily.'")') ;
//=========================================================================================================================================
        $RSOtherrelativeYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Other-relative" AND income = ">50k"');
        $RSOtherrelativeNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Other-relative" AND income = "<=50k" ');
        $RSOtherrelativeJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Other-relative" '); 
         while( $jmlOtherrelativeYes1 = mysqli_fetch_assoc($RSOtherrelativeYes)){
              $JumlahOtherrelativeYes = (int)$jmlOtherrelativeYes1['jumlah_yes'];
        }   
        while( $jmlOtherrelativeNo1 = mysqli_fetch_assoc($RSOtherrelativeNo)){
              $JumlahOtherrelativeNo = (int)$jmlOtherrelativeNo1['jumlah_no'];
        }
        while( $jmlOtherrelativeJml = mysqli_fetch_assoc($RSOtherrelativeJml)){
              $JumlahOtherrelativeJml = (int)$jmlOtherrelativeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherrelative = $JumlahOtherrelativeYes / $JumlahOtherrelativeJml;    
        (float)$PerbandinganNoOtherrelative = $JumlahOtherrelativeNo / $JumlahOtherrelativeJml;                    
        $rumusEntropyOtherrelative = (-($PerbandinganNoOtherrelative) * log($PerbandinganNoOtherrelative,2)) + (-($PerbandinganYesOtherrelative) * log($PerbandinganYesOtherrelative,2));
         if(is_nan($rumusEntropyOtherrelative)){
            $rumusEntropyOtherrelative = 0;
         }
         $getEntropyOtherrelative = round($rumusEntropyOtherrelative,4);
              
         $QueryInsertEntropyOtherrelative = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other-relative","'.$JumlahOtherrelativeJml.'","'.$JumlahOtherrelativeYes.'","'.$JumlahOtherrelativeNo.'","'.$getEntropyOtherrelative.'")') ;
//=========================================================================================================================================
        $RSOwnchildYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Own-child" AND income = ">50k"');
        $RSOwnchildNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Own-child" AND income = "<=50k" ');
        $RSOwnchildJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Own-child" '); 
         while( $jmlOwnchildYes1 = mysqli_fetch_assoc($RSOwnchildYes)){
              $JumlahOwnchildYes = (int)$jmlOwnchildYes1['jumlah_yes'];
        }   
        while( $jmlOwnchildNo1 = mysqli_fetch_assoc($RSOwnchildNo)){
              $JumlahOwnchildNo = (int)$jmlOwnchildNo1['jumlah_no'];
        }
        while( $jmlOwnchildJml = mysqli_fetch_assoc($RSOwnchildJml)){
              $JumlahOwnchildJml = (int)$jmlOwnchildJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOwnchild = $JumlahOwnchildYes / $JumlahOwnchildJml;    
        (float)$PerbandinganNoOwnchild = $JumlahOwnchildNo / $JumlahOwnchildJml;                    
        $rumusEntropyOwnchild = (-($PerbandinganNoOwnchild) * log($PerbandinganNoOwnchild,2)) + (-($PerbandinganYesOwnchild) * log($PerbandinganYesOwnchild,2));
         if(is_nan($rumusEntropyOwnchild)){
            $rumusEntropyOwnchild = 0;
         }
         $getEntropyOwnchild = round($rumusEntropyOwnchild,4);
              
         $QueryInsertEntropyOwnchild = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Own-child","'.$JumlahOwnchildJml.'","'.$JumlahOwnchildYes.'","'.$JumlahOwnchildNo.'","'.$getEntropyOwnchild.'")') ;
//=========================================================================================================================================
        $RSUnmarriedYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Unmarried" AND income = ">50k"');
        $RSUnmarriedNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Unmarried" AND income = "<=50k" ');
        $RSUnmarriedJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Unmarried" '); 
         while( $jmlUnmarriedYes1 = mysqli_fetch_assoc($RSUnmarriedYes)){
              $JumlahUnmarriedYes = (int)$jmlUnmarriedYes1['jumlah_yes'];
        }   
        while( $jmlUnmarriedNo1 = mysqli_fetch_assoc($RSUnmarriedNo)){
              $JumlahUnmarriedNo = (int)$jmlUnmarriedNo1['jumlah_no'];
        }
        while( $jmlUnmarriedJml = mysqli_fetch_assoc($RSUnmarriedJml)){
              $JumlahUnmarriedJml = (int)$jmlUnmarriedJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesUnmarried = $JumlahUnmarriedYes / $JumlahUnmarriedJml;    
        (float)$PerbandinganNoUnmarried = $JumlahUnmarriedNo / $JumlahUnmarriedJml;                    
        $rumusEntropyUnmarried = (-($PerbandinganNoUnmarried) * log($PerbandinganNoUnmarried,2)) + (-($PerbandinganYesUnmarried) * log($PerbandinganYesUnmarried,2));
         if(is_nan($rumusEntropyUnmarried)){
            $rumusEntropyUnmarried = 0;
         }
         $getEntropyUnmarried = round($rumusEntropyUnmarried,4);
             
         $QueryInsertEntropyUnmarried = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Unmarried","'.$JumlahUnmarriedJml.'","'.$JumlahUnmarriedYes.'","'.$JumlahUnmarriedNo.'","'.$getEntropyUnmarried.'")') ;
//=========================================================================================================================================
        $RSWifeYes= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_yes FROM sample2 WHERE Relationship = "Wife" AND income = ">50k"');
        $RSWifeNo= mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_no FROM sample2 WHERE Relationship = "Wife" AND income = "<=50k" ');
        $RSWifeJml = mysqli_query($con,'SELECT COUNT(Relationship) as jumlah_kasus FROM sample2 WHERE Relationship = "Wife" '); 
         while( $jmlWifeYes1 = mysqli_fetch_assoc($RSWifeYes)){
              $JumlahWifeYes = (int)$jmlWifeYes1['jumlah_yes'];
        }   
        while( $jmlWifeNo1 = mysqli_fetch_assoc($RSWifeNo)){
              $JumlahWifeNo = (int)$jmlWifeNo1['jumlah_no'];
        }
        while( $jmlWifeJml = mysqli_fetch_assoc($RSWifeJml)){
              $JumlahWifeJml = (int)$jmlWifeJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWife = $JumlahWifeYes / $JumlahWifeJml;    
        (float)$PerbandinganNoWife = $JumlahWifeNo / $JumlahWifeJml;                    
        $rumusEntropyWife = (-($PerbandinganNoWife) * log($PerbandinganNoWife,2)) + (-($PerbandinganYesWife) * log($PerbandinganYesWife,2));
         if(is_nan($rumusEntropyWife)){
            $rumusEntropyWife = 0;
         }
         $getEntropyWife = round($rumusEntropyWife,4);
              
         $QueryInsertEntropyWife = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Wife","'.$JumlahWifeJml.'","'.$JumlahWifeYes.'","'.$JumlahWifeNo.'","'.$getEntropyWife.'")') ;
//=========================================================================================================================================
        $Husband = ($JumlahHusbandJml / $JumlahKss) * $getEntropyHusband;        
        $Notinfamily = ($JumlahNotinfamilyJml / $JumlahKss) * $getEntropyNotinfamily;
        $Otherrelative = ($JumlahOtherrelativeJml / $JumlahKss) * $getEntropyOtherrelative;        
        $Ownchild = ($JumlahOwnchildJml / $JumlahKss) * $getEntropyOwnchild;
        $Unmarried = ($JumlahUnmarriedJml / $JumlahKss) * $getEntropyUnmarried;
        $Wife = ($JumlahWifeJml / $JumlahKss) * $getEntropyWife;
     
        (float)$getGainTotalRelationship = $getEntropy - $Husband + $Notinfamily + $Otherrelative + $Ownchild + $Unmarried + $Wife;
       
        $getGainTotalRelationship = round($getGainTotalRelationship,4);
        $InsertGainTotalRelationship = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalRelationship.' WHERE ATRIBUT = "Relationship" ');
//=========================================================================================================================================
        $RaceAmerindianYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Amer-Indian-Eskimo" AND income = ">50k"');
        $RaceAmerindianNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Amer-Indian-Eskimo" AND income = "<=50k" ');
        $RaceAmerindianJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Amer-Indian-Eskimo" '); 
         while( $jmlAmerindianYes1 = mysqli_fetch_assoc($RaceAmerindianYes)){
              $JumlahAmerindianYes = (int)$jmlAmerindianYes1['jumlah_yes'];
        }   
        while( $jmlAmerindianNo1 = mysqli_fetch_assoc($RaceAmerindianNo)){
              $JumlahAmerindianNo = (int)$jmlAmerindianNo1['jumlah_no'];
        }
        while( $jmlAmerindianJml = mysqli_fetch_assoc($RaceAmerindianJml)){
              $JumlahAmerindianJml = (int)$jmlAmerindianJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAmerindian = $JumlahAmerindianYes / $JumlahAmerindianJml;    
        (float)$PerbandinganNoAmerindian = $JumlahAmerindianNo / $JumlahAmerindianJml;                    
        $rumusEntropyAmerindian = (-($PerbandinganNoAmerindian) * log($PerbandinganNoAmerindian,2)) + (-($PerbandinganYesAmerindian) * log($PerbandinganYesAmerindian,2));
         if(is_nan($rumusEntropyAmerindian)){
            $rumusEntropyAmerindian = 0;
         }
         $getEntropyAmerindian = round($rumusEntropyAmerindian,4);
              $QueryInsertEntropyRace = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Race")');
         $QueryInsertEntropyAmerindian = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Amer-Indian-Eskimo","'.$JumlahAmerindianJml.'","'.$JumlahAmerindianYes.'","'.$JumlahAmerindianNo.'","'.$getEntropyAmerindian.'")') ;
//=========================================================================================================================================
        $RaceAsianpacYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Asian-Pac-Islander" AND income = ">50k"');
        $RaceAsianpacNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Asian-Pac-Islander" AND income = "<=50k" ');
        $RaceAsianpacJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Asian-Pac-Islander" '); 
         while( $jmlAsianpacYes1 = mysqli_fetch_assoc($RaceAsianpacYes)){
              $JumlahAsianpacYes = (int)$jmlAsianpacYes1['jumlah_yes'];
        }   
        while( $jmlAsianpacNo1 = mysqli_fetch_assoc($RaceAsianpacNo)){
              $JumlahAsianpacNo = (int)$jmlAsianpacNo1['jumlah_no'];
        }
        while( $jmlAsianpacJml = mysqli_fetch_assoc($RaceAsianpacJml)){
              $JumlahAsianpacJml = (int)$jmlAsianpacJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesAsianpac = $JumlahAsianpacYes / $JumlahAsianpacJml;    
        (float)$PerbandinganNoAsianpac = $JumlahAsianpacNo / $JumlahAsianpacJml;                    
        $rumusEntropyAsianpac = (-($PerbandinganNoAsianpac) * log($PerbandinganNoAsianpac,2)) + (-($PerbandinganYesAsianpac) * log($PerbandinganYesAsianpac,2));
         if(is_nan($rumusEntropyAsianpac)){
            $rumusEntropyAsianpac = 0;
         }
         $getEntropyAsianpac = round($rumusEntropyAsianpac,4);
             
         $QueryInsertEntropyAsianpac = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Asian-Pac-Islander","'.$JumlahAsianpacJml.'","'.$JumlahAsianpacYes.'","'.$JumlahAsianpacNo.'","'.$getEntropyAsianpac.'")') ;
//=========================================================================================================================================
        $RaceBlackYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Black" AND income = ">50k"');
        $RaceBlackNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Black" AND income = "<=50k" ');
        $RaceBlackJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Black" '); 
         while( $jmlBlackYes1 = mysqli_fetch_assoc($RaceBlackYes)){
              $JumlahBlackYes = (int)$jmlBlackYes1['jumlah_yes'];
        }   
        while( $jmlBlackNo1 = mysqli_fetch_assoc($RaceBlackNo)){
              $JumlahBlackNo = (int)$jmlBlackNo1['jumlah_no'];
        }
        while( $jmlBlackJml = mysqli_fetch_assoc($RaceBlackJml)){
              $JumlahBlackJml = (int)$jmlBlackJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesBlack = $JumlahBlackYes / $JumlahBlackJml;    
        (float)$PerbandinganNoBlack = $JumlahBlackNo / $JumlahBlackJml;                    
        $rumusEntropyBlack = (-($PerbandinganNoBlack) * log($PerbandinganNoBlack,2)) + (-($PerbandinganYesBlack) * log($PerbandinganYesBlack,2));
         if(is_nan($rumusEntropyBlack)){
            $rumusEntropyBlack = 0;
         }
         $getEntropyBlack = round($rumusEntropyBlack,4);
             
         $QueryInsertEntropyBlack = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Black","'.$JumlahBlackJml.'","'.$JumlahBlackYes.'","'.$JumlahBlackNo.'","'.$getEntropyBlack.'")') ;
//=========================================================================================================================================
        $RaceWhiteYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "White" AND income = ">50k"');
        $RaceWhiteNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "White" AND income = "<=50k" ');
        $RaceWhiteJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "White" '); 
         while( $jmlWhiteYes1 = mysqli_fetch_assoc($RaceWhiteYes)){
              $JumlahWhiteYes = (int)$jmlWhiteYes1['jumlah_yes'];
        }   
        while( $jmlWhiteNo1 = mysqli_fetch_assoc($RaceWhiteNo)){
              $JumlahWhiteNo = (int)$jmlWhiteNo1['jumlah_no'];
        }
        while( $jmlWhiteJml = mysqli_fetch_assoc($RaceWhiteJml)){
              $JumlahWhiteJml = (int)$jmlWhiteJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesWhite = $JumlahWhiteYes / $JumlahWhiteJml;    
        (float)$PerbandinganNoWhite = $JumlahWhiteNo / $JumlahWhiteJml;                    
        $rumusEntropyWhite = (-($PerbandinganNoWhite) * log($PerbandinganNoWhite,2)) + (-($PerbandinganYesWhite) * log($PerbandinganYesWhite,2));
         if(is_nan($rumusEntropyWhite)){
            $rumusEntropyWhite = 0;
         }
         $getEntropyWhite = round($rumusEntropyWhite,4);
             
         $QueryInsertEntropyWhite = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("White","'.$JumlahWhiteJml.'","'.$JumlahWhiteYes.'","'.$JumlahWhiteNo.'","'.$getEntropyWhite.'")') ;
//=========================================================================================================================================
        $RaceOtherraceYes= mysqli_query($con,'SELECT COUNT(Race) as jumlah_yes FROM sample2 WHERE Race = "Other" AND income = ">50k"');
        $RaceOtherraceNo= mysqli_query($con,'SELECT COUNT(Race) as jumlah_no FROM sample2 WHERE Race = "Other" AND income = "<=50k" ');
        $RaceOtherraceJml = mysqli_query($con,'SELECT COUNT(Race) as jumlah_kasus FROM sample2 WHERE Race = "Other" '); 
         while( $jmlOtherraceYes1 = mysqli_fetch_assoc($RaceOtherraceYes)){
              $JumlahOtherraceYes = (int)$jmlOtherraceYes1['jumlah_yes'];
        }   
        while( $jmlOtherraceNo1 = mysqli_fetch_assoc($RaceOtherraceNo)){
              $JumlahOtherraceNo = (int)$jmlOtherraceNo1['jumlah_no'];
        }
        while( $jmlOtherraceJml = mysqli_fetch_assoc($RaceOtherraceJml)){
              $JumlahOtherraceJml = (int)$jmlOtherraceJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesOtherrace = $JumlahOtherraceYes / $JumlahOtherraceJml;    
        (float)$PerbandinganNoOtherrace = $JumlahOtherraceNo / $JumlahOtherraceJml;                    
        $rumusEntropyOtherrace = (-($PerbandinganNoOtherrace) * log($PerbandinganNoOtherrace,2)) + (-($PerbandinganYesOtherrace) * log($PerbandinganYesOtherrace,2));
         if(is_nan($rumusEntropyOtherrace)){
            $rumusEntropyOtherrace = 0;
         }
         $getEntropyOtherrace = round($rumusEntropyOtherrace,4);
             
         $QueryInsertEntropyOtherrace = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Other","'.$JumlahOtherraceJml.'","'.$JumlahOtherraceYes.'","'.$JumlahOtherraceNo.'","'.$getEntropyOtherrace.'")') ;
//=========================================================================================================================================
        $Amerindian = ($JumlahAmerindianJml / $JumlahKss) * $getEntropyAmerindian;        
        $Asianpac = ($JumlahAsianpacJml / $JumlahKss) * $getEntropyAsianpac;
        $Black = ($JumlahBlackJml / $JumlahKss) * $getEntropyBlack;        
        $White = ($JumlahWhiteJml / $JumlahKss) * $getEntropyWhite;
        $Otherrace = ($JumlahOtherraceJml / $JumlahKss) * $getEntropyOtherrace;
       
     
        (float)$getGainTotalRace = $getEntropy - $Amerindian + $Asianpac + $Black + $White + $Otherrace;
       
        $getGainTotalRace = round($getGainTotalRelationship,4);
        $InsertGainTotalRace = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalRace.' WHERE ATRIBUT = "Race" ');
//=========================================================================================================================================
        $SexFemaleYes= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_yes FROM sample2 WHERE Sex = "Female" AND income = ">50k"');
        $SexFemaleNo= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_no FROM sample2 WHERE Sex = "Female" AND income = "<=50k" ');
        $SexFemaleJml = mysqli_query($con,'SELECT COUNT(Sex) as jumlah_kasus FROM sample2 WHERE Sex = "Female" '); 
         while( $jmlFemaleYes1 = mysqli_fetch_assoc($SexFemaleYes)){
              $JumlahFemaleYes = (int)$jmlFemaleYes1['jumlah_yes'];
        }   
        while( $jmlFemaleNo1 = mysqli_fetch_assoc($SexFemaleNo)){
              $JumlahFemaleNo = (int)$jmlFemaleNo1['jumlah_no'];
        }
        while( $jmlFemaleJml = mysqli_fetch_assoc($SexFemaleJml)){
              $JumlahFemaleJml = (int)$jmlFemaleJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesFemale = $JumlahFemaleYes / $JumlahFemaleJml;    
        (float)$PerbandinganNoFemale = $JumlahFemaleNo / $JumlahFemaleJml;                    
        $rumusEntropyFemale = (-($PerbandinganNoFemale) * log($PerbandinganNoFemale,2)) + (-($PerbandinganYesFemale) * log($PerbandinganYesFemale,2));
         if(is_nan($rumusEntropyFemale)){
            $rumusEntropyFemale = 0;
         }
         $getEntropyFemale = round($rumusEntropyFemale,4);
              $QueryInsertEntropyRelationship = mysqli_query($con,'INSERT INTO HASIL (ATRIBUT) VALUES ("Sex")');
         $QueryInsertEntropyFemale = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Female","'.$JumlahFemaleJml.'","'.$JumlahFemaleYes.'","'.$JumlahFemaleNo.'","'.$getEntropyFemale.'")') ;
//=========================================================================================================================================
         $SexMaleYes= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_yes FROM sample2 WHERE Sex = "Male" AND income = ">50k"');
        $SexMaleNo= mysqli_query($con,'SELECT COUNT(Sex) as jumlah_no FROM sample2 WHERE Sex = "Male" AND income = "<=50k" ');
        $SexMaleJml = mysqli_query($con,'SELECT COUNT(Sex) as jumlah_kasus FROM sample2 WHERE Sex = "Male" '); 
         while( $jmlMaleYes1 = mysqli_fetch_assoc($SexMaleYes)){
              $JumlahMaleYes = (int)$jmlMaleYes1['jumlah_yes'];
        }   
        while( $jmlMaleNo1 = mysqli_fetch_assoc($SexMaleNo)){
              $JumlahMaleNo = (int)$jmlMaleNo1['jumlah_no'];
        }
        while( $jmlMaleJml = mysqli_fetch_assoc($SexMaleJml)){
              $JumlahMaleJml = (int)$jmlMaleJml['jumlah_kasus'];
        }
         (float)$PerbandinganYesMale = $JumlahMaleYes / $JumlahMaleJml;    
        (float)$PerbandinganNoMale = $JumlahMaleNo / $JumlahMaleJml;                    
        $rumusEntropyMale = (-($PerbandinganNoMale) * log($PerbandinganNoMale,2)) + (-($PerbandinganYesMale) * log($PerbandinganYesMale,2));
         if(is_nan($rumusEntropyMale)){
            $rumusEntropyMale = 0;
         }
         $getEntropyMale = round($rumusEntropyMale,4);
              
         $QueryInsertEntropyMale = mysqli_query($con,'INSERT INTO HASIL (VALUE,JML_KASUS,Yes,No,ENTROPY) VALUES ("Male","'.$JumlahMaleJml.'","'.$JumlahMaleYes.'","'.$JumlahMaleNo.'","'.$getEntropyMale.'")') ;
//=========================================================================================================================================
        $Female = ($JumlahFemaleJml / $JumlahKss) * $getEntropyFemale;        
        $Male = ($JumlahMaleJml / $JumlahKss) * $getEntropyMale;
        
     
        (float)$getGainTotalSex = $getEntropy - $Female + $Male;
       
        $getGainTotalSex = round($getGainTotalSex,4);
        $InsertGainTotalSex = mysqli_query($con,'UPDATE HASIL SET GAIN = '.$getGainTotalSex.' WHERE ATRIBUT = "Sex" ');
//=========================================================================================================================================
?> 